<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Option;
use App\Models\Question;
use App\Models\SubQuestion;
use App\Models\User;
use App\Models\UserPoint;
use App\Repositories\AnswerRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Foreach_;

class AssessmentController extends Controller
{
    private AnswerRepositoryInterface $answerRepository;
    private QuestionRepositoryInterface $questionRepository;

    public function __construct(AnswerRepositoryInterface $answerRepository, QuestionRepositoryInterface $questionRepository)
    {
        $this->answerRepository = $answerRepository;
        $this->questionRepository = $questionRepository;
    }

    public function storeAnswer(Request $request)
    {
        $category_id = $request->category;
        $answers = [];
        foreach ($request->all() as $request1) {
            foreach ($request1 as $request2) {
                foreach ($request2 as $request3) {
                    $answers[] = $request3;
                }
            }
        }

        $answers;
        $collectionAnswer = new Collection;
        $collectionAnswer = collect($answers);

        $user = User::find(1);

        DB::beginTransaction();
        try {

            $insertedAnswer = $this->answerRepository->syncAnswer($user, $category_id, $collectionAnswer);

            DB::commit();
        } catch (Exception $e) {

            DB::rollBack();
            Log::error('Store Answer failed | ' . $e->getMessage() . ' | ' . $e->getFile() . ' on line ' . $e->getLine());
            return response()->json([
                'success' => false,
                'message' => "Store answer failed " . $e
            ]);
        }


        return response()->json([
            'success' => true,
            'message' => "Answer successfully stored",
            'data' => $insertedAnswer
        ]);
    }


    public function getQuestion(Request $request)
    {
        $category_id = $request->category;

        try {

            $question = $this->questionRepository->getOptionOnly($category_id);

            DB::commit();
        } catch (Exception $e) {

            Log::error('Get question failed | ' . $e->getMessage() . ' | ' . $e->getFile() . ' on line ' . $e->getLine());
            return response()->json([
                'success' => false,
                'message' => "get question failed " . $e
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => "Get question successfully",
            'data' => $question
        ]);
    }

    public function getAnswer(Request $request)
    {
        $response = $optionDetail = [];

        try {
            $question_withSQ = Question::has('sub_questions')->with(['sub_questions.answers'])->get();
            $question_withoutSQ = Question::doesntHave('sub_questions')->with(['answers'])->get();

            $user = User::find(1);

            $merge = $question_withSQ->merge($question_withoutSQ);

            $questions = $merge->where('category_id', $request->category)->sortBy('id');

            foreach ($questions as $key => $question) {

                if ($question->sub_questions()->count() == 0 && $question->answers()->where('user_id', $user->id)->count() > 0) {
                    foreach ($question->answers()->where('user_id', $user->id)->get() as $answer) {
                        if ($answer->option()->count() > 0) {
                            $optionDetail[$key][] = [
                                'id' => $answer->option->id,
                                'question_id' => $answer->option->question_id,
                                'sub_question_id' => $answer->option->sub_question_id,
                                'reference_to' => $answer->option->reference_to,
                                'title_of_answer' => $answer->option->title_of_answer,
                                'option_answer' => $answer->option->option_answer,
                                'point' => $answer->option->point,
                                'answer_descriptive' => $answer->answer_descriptive,
                                'score' => $answer->score,

                            ];
                        } else {
                            $optionDetail[$key][] = [
                                'id' => null,
                                'question_id' => $answer->question_id,
                                'sub_question_id' => $answer->sub_question_id,
                                'answer_descriptive' => $answer->answer_descriptive,
                                'score' => $answer->score,
                            ];
                        }
                    }
                    $response[] = [
                        'answer' => $optionDetail[$key]
                    ];
                }

                if ($question->sub_questions()->count() > 0) {
                    foreach ($question->sub_questions as $sub_question) {
                        if ($sub_question->answers()->where('user_id', $user->id)->count() > 0) {
                            foreach ($sub_question->answers()->where('user_id', $user->id)->get() as $answer) {
                                if ($answer->option()->count() > 0) {
                                    $optionDetail['s' . $sub_question->id][] = [
                                        'id' => $answer->option->id,
                                        'question_id' => $answer->option->question_id,
                                        'sub_question_id' => $answer->option->sub_question_id,
                                        'reference_to' => $answer->option->reference_to,
                                        'title_of_answer' => $answer->option->title_of_answer,
                                        'option_answer' => $answer->option->option_answer,
                                        'point' => $answer->option->point,
                                        'answer_descriptive' => $answer->answer_descriptive,
                                        'score' => $answer->score,

                                    ];
                                } else {
                                    $optionDetail['s' . $sub_question->id][] = [
                                        'id' => null,
                                        'question_id' => $answer->question_id,
                                        'sub_question_id' => $answer->sub_question_id,
                                        'answer_descriptive' => $answer->answer_descriptive,
                                        'score' => $answer->score,
                                    ];
                                }
                            }

                            $response[] = [
                                'answer' => $optionDetail['s' . $sub_question->id]
                            ];
                        }
                    }
                }
            }

            DB::commit();
        } catch (Exception $e) {
            Log::error('Get answer failed | ' . $e->getMessage() . ' | ' . $e->getFile() . ' on line ' . $e->getLine());
            return response()->json([
                'success' => false,
                'message' => "get answer failed " . $e
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => "Get answer successfully",
            'data' => $response
        ]);
    }

    public function getSubOption(Request $request)
    {
        $curriculum = $request->curriculum;

        try {

            $sub_option = $this->questionRepository->getOptionByCurriculum($curriculum);

            DB::commit();
        } catch (Exception $e) {

            Log::error('Get sub option failed | ' . $e->getMessage() . ' | ' . $e->getFile() . ' on line ' . $e->getLine());
            return response()->json([
                'success' => false,
                'message' => "get sub option failed " . $e
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => "Get sub option successfully",
            'data' => $sub_option
        ]);
    }

    public function getRanking(Request $request)
    {
        $user = User::find(1);

        $userPoints =  UserPoint::leftjoin('questions', 'questions.id', '=', 'user_points.question_id')
            ->leftjoin('category', 'category.id', '=', 'questions.category_id')
            ->select(DB::raw('SUM(user_points.point) as point'), 'name')
            ->where('user_id', $user->id)
            ->where('questions.category_id', '<', 5) # Only initial assessment
            ->groupBy('name')
            ->get();

        $decrease = -4;
        $categories = Category::where('id', '<', 5)->get();

        foreach ($categories as $key => $category) {
            $points[] = [
                'category' => $category->name,
                'point' => 0
            ];

            $defaultRank[] = $decrease;
            $decrease++;
        }


        if ($userPoints->count() > 0) {
            $i = 0;
            foreach ($userPoints as $userPoint) {
                $points[$i] = [
                    'category' => $userPoint['name'],
                    'point' => $userPoint['point']
                ];
                $i++;
            }
        }


        $collectionPoint = collect($points);

        $duplicateValue = $collectionPoint->duplicates('point')->unique();


        $new_points = $collectionPoint;
        if (count($duplicateValue) > 0) {
            foreach ($collectionPoint as $key => $point) {
                $is_duplicate = false;

                foreach ($duplicateValue as $value) {
                    if ($point['point'] == $value) {
                        $is_duplicate = true;
                    }
                }

                if ($is_duplicate) {
                    $new_points[$key] = [
                        'category' => $point['category'],
                        'point' => $point['point'] + $defaultRank[$key],
                    ];
                }
            }
        }


        $sorted =  $new_points->sortBy('point');

        return $sorted->values()->all();


        // $counted = [];
        // foreach (array_count_values($points) as $key => $value) {
        //     $counted[$key] = $value;
        // }


        // $new_points = [];
        // $is_duplicate = false;

        // $counted = array_count_values($points);

        // $duplicateValue = null;

        // foreach ($counted as $val => $count) {
        //     if ($count > 1) {
        //         $duplicateValue = $val;
        //     }
        // }

        // $keysDuplicate = array_keys($points, $duplicateValue);

        // foreach ($points as $key => $point) {
        //     $is_duplicate = false;
        //     $new_points[$key] = $point;
        //     foreach ($keysDuplicate as $keyDuplicate) {
        //         if ($key == $keyDuplicate) {
        //             $is_duplicate = true;
        //         }
        //     }

        //     if ($is_duplicate) {
        //         $new_points[$key] = $point + $defaultRank[$key];
        //     }
        // }

        // $sorted = collect($new_points);

        // $sorted = $sorted->sort();

        // return $sorted;
    }

    public function getReport(Request $request)
    {
        $user = User::find(1);
        $result = [];

        $userPoint = UserPoint::with('question', 'question.category')->where('user_id', $user->id)->get();

        // $userPointCategory = $userPoint->where('')

        $majors = $userPoint->where('sub_question_id', 1)->sum('point');
        $daily_schedules = $userPoint->where('question_id', 2)->sum('point');
        $goals = $userPoint->whereIn('sub_question_id', [3, 4])->sum('point');
        $dream_country = $userPoint->where('question_id', 6)->sum('point');
        $competition = $userPoint->where('sub_question_id', 5)->sum('point');
        $internship = $userPoint->where('sub_question_id', 6)->sum('point');
        $voluntering = $userPoint->where('sub_question_id', 7)->sum('point');
        $school_club = $userPoint->where('sub_question_id', 8)->sum('point');
        $out_of_school = $userPoint->where('sub_question_id', 9)->sum('point');

        $result['majors'] = isset($majors) && $majors < 2 ? true : false;
        $result['daily_shedules'] = isset($daily_schedules) && $daily_schedules < 5 ? true : false;
        $result['goals'] = isset($goals) && $goals < 3 ? true : false;
        $result['dream_country'] = isset($dream_country) && $dream_country < 0 ? true : false;
        $result['competition'] = isset($competition) && $competition == 1 ? true : false;
        $result['internship'] = isset($internship) && $internship == 1 ? true : false;
        $result['voluntering'] = isset($voluntering) && $voluntering == 1 ? true : false;
        $result['school_club'] = isset($school_club) && $school_club < 1 ? true : false;
        $result['out_of_school'] = isset($out_of_school) && $out_of_school < 2 ? true : false;

        return $result;
    }
}
