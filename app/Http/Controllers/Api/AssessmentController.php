<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Answer;
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

    // public function storeAnswerOld(Request $request)
    // {

    //     $answers = $request->answers;
    //     $next_category = $request->next_category;
    //     $rules = $check_validations = $poin_details = [];
    //     $input_question = $input_sub_question = null;
    //     $collectionAnswer = new Collection;
    //     $collectionAnswer = collect($answers);
    //     $new_request = $request->all();

    //     $user = User::find(1);

    //     $rules['next_category'] = 'nullable|exists:category,id';

    //     foreach ($answers as $key => $answer) {

    //         if ($answer['sub_question_id'] != null) {
    //             $input_sub_question = $this->questionRepository->getSubQuestionById($answer['sub_question_id']);
    //             $check_validations[] = [
    //                 'question_id' => null,
    //                 'sub_question_id' => $input_sub_question->id,
    //                 'question_type' => $input_sub_question->question_type,
    //                 'minimum_answer' => $input_sub_question->minimum_answer,
    //                 'maximum_answer' => $input_sub_question->maximum_answer,
    //             ];
    //         } else {
    //             $input_question = $this->questionRepository->getQuestionById($answer['question_id']);
    //             $check_validations[] = [
    //                 'question_id' => $input_question->id,
    //                 'sub_question_id' => null,
    //                 'question_type' => $input_question->question_type,
    //                 'minimum_answer' => $input_question->minimum_answer,
    //                 'maximum_answer' => $input_question->maximum_answer,
    //             ];
    //         }

    //         $rules['answers.' . $key . '.question_id'] = 'required|exists:questions,id';
    //         $rules['answers.' . $key . '.sub_question_id'] = 'nullable|exists:sub_questions,id';
    //         $rules['answers.' . $key . '.is_answer'] = 'required|boolean';
    //         $rules['answers.' . $key . '.answer_descriptive'] = 'nullable';
    //     }


    //     # Set validation minimum, maximum & required answer
    //     foreach ($check_validations as $check_validation) {
    //         if ($check_validation['sub_question_id'] != null) {
    //             $count = $collectionAnswer->where('sub_question_id', $check_validation['sub_question_id'])->where('is_answer', true)->count();
    //         } else if ($check_validation['sub_question_id'] == null) {
    //             $count = $collectionAnswer->where('question_id', $check_validation['question_id'])->where('is_answer', true)->count();
    //         }

    //         if ($check_validation['question_id'] != null || $check_validation['sub_question_id'] != null) {
    //             $new_request['answer'] = $count;

    //             $rules['answer'] = [
    //                 function ($attribute, $value, $fail) use ($check_validation) {
    //                     if ($value == 0 && $check_validation['question_type'] == 'mandatory') {
    //                         $fail('Answer required');
    //                     } else if ($value > $check_validation['maximum_answer']) {
    //                         $fail('Maximum answer');
    //                     } else if ($value < $check_validation['minimum_answer']) {
    //                         $fail('Minimum answer');
    //                     }
    //                 }
    //             ];
    //         }
    //     }

    //     $validator = Validator::make($new_request, $rules);

    //     # threw error if validation fails
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'success' => false,
    //             'error' => $validator->errors()
    //         ]);
    //     }

    //     DB::beginTransaction();
    //     try {

    //         $this->answerRepository->syncAnswer($user, $answers);

    //         // TODO:
    //         # 1. store point 

    //         $question = $this->questionRepository->getQuestion($next_category, $user);

    //         DB::commit();
    //     } catch (Exception $e) {

    //         DB::rollBack();
    //         Log::error('Store Answer failed | ' . $e->getMessage() . ' | ' . $e->getFile() . ' on line ' . $e->getLine());
    //         return response()->json([
    //             'success' => false,
    //             'message' => "Store answer failed " . $e
    //         ]);
    //     }


    //     return response()->json([
    //         'success' => true,
    //         'message' => "Answer successfully stored",
    //         'data' => $question
    //     ]);
    // }

    public function storeAnswer(Request $request)
    {
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

            // TODO:
            # 1. set point by description 
            $this->setPoint($collectionAnswer, $user->id);

            $insertedAnswer = $this->answerRepository->syncAnswer($user, $collectionAnswer);

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
            // foreach ($collectionAnswer->where('sub_question_id', $sub_question_id)->unique('title_of_answer') as $key => $checkAnswer) {
            //     $countFaculty[] = count($checkAnswer);
            // }

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
                $option = Option::where('id', $option_id)->first();
                $point += $option->point;
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
        $answer = $collectionAnswer->where('sub_question_id', $sub_question_id)->first();

        $sub_question = SubQuestion::where('id', $sub_question_id)->first();

        switch ($sub_question->title) {
            case 'IELTS':
                if ($answer['score'] <= 4 || $answer['score'] == 0 || $answer['score'] == null) {
                    $point = 1;
                } else if ($answer['score'] == 5) {
                    $point = 2;
                } else if ($answer['score'] > 5 && $answer['score'] <= 7) {
                    $point = 3;
                } else if ($answer['score'] > 7 && $answer['score'] <= 9) {
                    $point = 4;
                }
                break;

            case 'TOEFL':
                if ($answer['score'] < 60 || $answer['score'] == 0 || $answer['score'] == null) {
                    $point = 1;
                } else if ($answer['score'] >= 60 && $answer['score'] < 80) {
                    $point = 2;
                } else if ($answer['score'] >= 80 && $answer['score'] < 100) {
                    $point = 3;
                } else if ($answer['score'] >= 100 && $answer['score'] <= 120) {
                    $point = 4;
                }
                break;

            case 'SAT':
                if ($answer['score'] < 1100 || $answer['score'] == 0 || $answer['score'] == null) {
                    $point = 1;
                } else if ($answer['score'] >= 1100 && $answer['score'] < 1300) {
                    $point = 2;
                } else if ($answer['score'] >= 1300 && $answer['score'] < 1500) {
                    $point = 3;
                } else if ($answer['score'] >= 1500) {
                    $point = 4;
                }
                break;
        }

        return $point;
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
        $question_withSQ = Question::has('sub_questions')->with(['sub_questions.answers'])->get();
        $question_withoutSQ = Question::doesntHave('sub_questions')->with(['answers'])->get();

        $user = User::find(1);

        $merge = $question_withSQ->merge($question_withoutSQ)->sortBy('id');

        $questions = $merge->where('category_id', $request->category);

        foreach ($questions as $key => $question) {

            if ($question->sub_questions()->count() == 0 && $question->answers()->where('user_id', $user->id)->count() > 0) {
                foreach ($question->answers()->where('user_id', $user->id)->get() as $answer) {
                    if ($answer->option()->count() > 0) {
                        $optionDetail[$key][] = [
                            'id' => $answer->option->id,
                            'question_id' => $answer->option->question_id,
                            'sub_question_id' => $answer->option->sub_question_id,
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
                    'answer' => $optionDetail[$key],

                ];
            }

            if ($question->sub_questions()->count() > 0) {
                foreach ($question->sub_questions as $key2 => $sub_question) {

                    if ($sub_question->answers()->where('user_id', $user->id)->count() > 0) {
                        foreach ($sub_question->answers()->where('user_id', $user->id)->get() as $answer) {
                            if ($answer->option()->count() > 0) {
                                $optionDetail[$key2][] = [
                                    'id' => $answer->option->id,
                                    'question_id' => $answer->option->question_id,
                                    'sub_question_id' => $answer->option->sub_question_id,
                                    'title_of_answer' => $answer->option->title_of_answer,
                                    'option_answer' => $answer->option->option_answer,
                                    'point' => $answer->option->point,
                                    'answer_descriptive' => $answer->answer_descriptive,
                                    'score' => $answer->score,

                                ];
                            } else {
                                $optionDetail[$key2][] = [
                                    'id' => null,
                                    'question_id' => $answer->question_id,
                                    'sub_question_id' => $answer->sub_question_id,
                                    'answer_descriptive' => $answer->answer_descriptive,
                                    'score' => $answer->score,
                                ];
                            }
                        }
                        $response[] = [
                            'answer' => $optionDetail[$key2]

                        ];
                    }
                }
            }
        }

        return $response;
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
}
