<?php

namespace App\Repositories;

use App\Interfaces\AnswerRepositoryInterface;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Option;
use App\Models\Question;
use App\Models\SubQuestion;
use App\Models\User;
use App\Models\UserClient;
use App\Models\UserPoint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AnswerRepository implements AnswerRepositoryInterface
{
    public function syncAnswer($user, $category_id, $collectionAnswers)
    {
        # Set point
        $this->setPoint($collectionAnswers, $user->id);

        $question_ids = $new_answer = [];

        $question_ids = Question::where('category_id', $category_id)->pluck('id');

        foreach ($collectionAnswers as $answer) {
            $answer_descirptive = $score = null;

            if (isset($answer['answer_descriptive'])) {
                if ($answer['answer_descriptive'] != '') {
                    $answer_descirptive = $answer['answer_descriptive'];
                }
            }

            if (isset($answer['score'])) {
                if ($answer['score'] != '') {
                    $score = $answer['score'];
                }
            }

            $new_answer[] = [
                'user_id' => $user->id,
                'answer_id' => $answer['id'],
                'question_id' => $answer['question_id'],
                'sub_question_id' => $answer['sub_question_id'],
                'answer_descriptive' => $answer_descirptive,
                'score' => $score,
            ];
        }

        count($question_ids) > 0 ? Answer::where('user_id', $user->id)->whereIn('question_id', $question_ids)->delete() : null;

        return Answer::insert($new_answer);
    }

    # Set point untuk spesial case
    protected function setPoint($collectionAnswer, $user_id)
    {
        $point_details = $question_ids = [];

        $i = 0;

        foreach ($collectionAnswer->where('sub_question_id', '!=', null)->unique('sub_question_id') as $subQuestions) {
            $question_ids[] = $subQuestions['question_id'];
            $point_details[$i]['user_id'] = $user_id;
            $point_details[$i]['question_id'] = $subQuestions['question_id'];
            $point_details[$i]['sub_question_id'] = $subQuestions['sub_question_id'];

            $dbSubQuestion = SubQuestion::where('id', $subQuestions['sub_question_id'])->first();

            switch ($dbSubQuestion['point_type']) {
                case 'no_point':
                    $point_details[$i]['point'] = 0;
                    break;

                case 'faculty':
                    $point_details[$i]['point'] = $this->setPointByFaculty($subQuestions['sub_question_id'], $collectionAnswer);
                    break;

                case 'option':
                    $point_details[$i]['point'] = $this->setPointByOption($subQuestions['question_id'], $subQuestions['sub_question_id'], $collectionAnswer);
                    break;

                case 'sub_question':
                    $point_details[$i]['point'] = $this->setPointBySubQuestion($subQuestions['sub_question_id'], $collectionAnswer);
                    break;

                case 'description':
                    $point_details[$i]['point'] = $subQuestions['answer_descriptive'] != null ? $dbSubQuestion->total_point : 0;
                    break;

                case 'slot':
                    $point_details[$i]['point'] = $this->setPointBySlot($subQuestions['sub_question_id'], $collectionAnswer);
                    break;

                case 'standard_test':
                    $point_details[$i]['point'] = $this->setPointByStandardTest($subQuestions['sub_question_id'], $collectionAnswer);
                    break;

                case 'score':
                    $point_details[$i]['point'] = $subQuestions['score'] != null ? $dbSubQuestion->total_point : 0;
                    break;
            }

            $i++;
        }

        foreach ($collectionAnswer->where('sub_question_id', '=', null)->unique('question_id') as  $Questions) {
            $question_ids[] = $Questions['question_id'];
            $point_details[$i]['user_id'] = $user_id;
            $point_details[$i]['question_id'] = $Questions['question_id'];
            $point_details[$i]['sub_question_id'] = null;

            $dbQuestion = Question::where('id', $Questions['question_id'])->first();

            switch ($dbQuestion->point_type) {

                case 'no_point':
                    $point_details[$i]['point'] = 0;
                    break;

                case 'option':
                    $point_details[$i]['point'] = $this->setPointByOption($Questions['question_id'], null, $collectionAnswer);
                    break;

                case 'question':
                    $point_details[$i]['point'] = $this->setPointByQuestion($Questions['question_id'], $collectionAnswer);
                    break;

                case 'description':
                    $point_details[$i]['point'] = $Questions['answer_descriptive'] != null ? $dbQuestion->total_point : 0;
                    break;

                case 'scale':
                    $point_details[$i]['point'] = $Questions['score'] != null ? $Questions['score'] + 1 : 0;
                    break;

                case 'score':
                    $point_details[$i]['point'] = $Questions['score'] != null ? $dbQuestion->total_point : 0;
                    break;
            }
            $i++;
        }

        count($question_ids) > 0 ? UserPoint::where('user_id', $user_id)->whereIn('question_id', $question_ids)->delete() : null;
        count($point_details) > 0 ? UserPoint::insert($point_details) : null;
        return $point_details;
    }

    protected function setPointByQuestion($question_id, $collectionAnswer)
    {
        $point = 0;

        if ($collectionAnswer->where('question_id', $question_id)->count() > 0) {
            $point = Question::where('id', $question_id)->sum('total_point');
        }

        return $point;
    }

    protected function setPointBySubQuestion($sub_question_id, $collectionAnswer)
    {
        $point = 0;

        if ($collectionAnswer->where('sub_question_id', $sub_question_id)->count() > 0) {
            $point = SubQuestion::where('id', $sub_question_id)->sum('total_point');
        }

        return $point;
    }

    protected function setPointByFaculty($sub_question_id, $collectionAnswer)
    {
        $point = 0;

        if ($collectionAnswer->where('sub_question_id', $sub_question_id)->count() > 0) {

            $countFaculty = $collectionAnswer->where('sub_question_id', $sub_question_id)->countBy('title_of_answer');

            if (count($countFaculty) == 3) {
                $point = 1;
            } else if (count($countFaculty) == 2) {
                $point = 2;
            } else if (count($countFaculty) == 1) {
                $point = 3;
            }
        }

        return $point;
    }

    protected function setPointByOption($question_id, $sub_question_id, $collectionAnswer)
    {
        $point = 0;
        $option_ids = null;

        if ($sub_question_id != null) {
            $option_ids = $collectionAnswer->where('sub_question_id', $sub_question_id)->pluck('id');
        } else {
            $option_ids = $collectionAnswer->where('question_id', $question_id)->pluck('id');
        }

        if ($option_ids != null) {
            foreach ($option_ids as $option_id) {
                if ($option_id != null) {
                    $option = Option::where('id', $option_id)->first();
                    $point += $option->point;
                }
            }
        }

        return $point;
    }

    protected function setPointBySlot($sub_question_id, $collectionAnswer)
    {
        $point = $count = 0;

        $count = $collectionAnswer->where('sub_question_id', $sub_question_id)->where('answer_descriptive', '!=', null)->count();
        $sub_question = SubQuestion::where('id', $sub_question_id)->first();

        $point = $count != 0 ? $count * $sub_question->total_point : 0;

        return $point;
    }

    protected function setPointByStandardTest($sub_question_id, $collectionAnswer)
    {
        $point = 0;
        $answer = $collectionAnswer->where('sub_question_id', $sub_question_id)->first();

        $sub_question = SubQuestion::where('id', $sub_question_id)->first();

        $score = gettype($answer['score'])  == 'string' ? (int)$answer['score'] : $answer['score'];

        switch ($sub_question->title) {
            case 'IELTS':
                if ($score <= 4 || $score == 0 || $score == null) {
                    $point = 1;
                } else if ($score == 5) {
                    $point = 2;
                } else if ($score > 5 && $score <= 7) {
                    $point = 3;
                } else if ($score > 7 && $score <= 9) {
                    $point = 4;
                }
                break;

            case 'TOEFL':
                if ($score < 60 || $score == 0 || $score == null) {
                    $point = 1;
                } else if ($score >= 60 && $score < 80) {
                    $point = 2;
                } else if ($score >= 80 && $score < 100) {
                    $point = 3;
                } else if ($score >= 100 && $score <= 120) {
                    $point = 4;
                }
                break;

            case 'SAT':
                $point = 1;
                if ($score < 1100 || $score == 0 || $score == null) {
                    $point = 1;
                } else if ($score >= 1100 && $score < 1300) {
                    $point = 2;
                } else if ($score >= 1300 && $score < 1500) {
                    $point = 3;
                } else if ($score >= 1500) {
                    $point = 4;
                }
                break;
        }

        return $point;
    }

    public function checklistQuest($user_id)
    {
        $userPoints =  UserPoint::leftjoin('questions', 'questions.id', '=', 'user_points.question_id')
            ->leftjoin('category', 'category.id', '=', 'questions.category_id')
            ->select(DB::raw('SUM(user_points.point) as point'), 'name')
            ->where('user_id', $user_id)
            ->where('questions.category_id', '>', 4) # Only quest
            ->groupBy('name')
            ->get();

        $result = [
            'Exploration' => false,
            'Profile Building' => false,
            'Academic Profiling' => false,
            'Writing' => false,
            'Sponsor (fun quest)' => false,
        ];

        if ($userPoints->count() > 0) {
            foreach ($userPoints as $key => $userPoint) {
                switch ($userPoint->name) {
                    case 'Exploration':
                        $result[$userPoint['name']] = $userPoint['point'] == 2 ? true : false;
                        break;

                    case 'Profile Building':
                        $result[$userPoint['name']] = $userPoint['point'] == 1 ? true : false;
                        break;

                    case 'Academic Profiling':
                        $result[$userPoint['name']] = $userPoint['point'] == 1 ? true : false;
                        break;

                    case 'Writing':
                        $result[$userPoint['name']] = $userPoint['point'] == 1 ? true : false;
                        break;

                    case 'Sponsor (fun quest)':
                        $result[$userPoint['name']] = $userPoint['point'] == 1 ? true : false;
                        break;

                    default:
                        $result[$userPoint['name']] = false;
                        break;
                }
            }
        }

        return $result;
    }

    public function haveFilledInitialAssessment($userId)
    {
        
        $categories = Category::where('id', '<=', 4)->pluck('id')->toArray();
        # query to get the information about 
        # is the user has filled in the initial assessment form?
        $filled = User::where('id', $userId);
        
        $i = 1;
        while ($i <= count($categories)) {

            $filled = $filled->whereHas('answers.question', function ($query) use ($i) {

                $query->where('category_id', $i);

            });

        $i++;
        }

        return $filled = $filled->exists();
    }
}
