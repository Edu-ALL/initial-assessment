<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Answer as ModelsAnswer;
use App\Models\Option;
use App\Models\Pivot\Answer;
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

        // return ModelsAnswer::where('id', 152)->first();
        $next_category = $request->next_category;

        // return $request->all();
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

        // return $answers;

        DB::beginTransaction();
        try {

            $this->setPoint($collectionAnswer, $user->id);

            $a = $this->answerRepository->syncAnswer($user, $collectionAnswer);

            // TODO:
            # 1. store point 

            // $question = $this->questionRepository->getQuestion($next_category, $user);

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
            'data' => $a
        ]);
    }


    # Set point untuk spesial case
    protected function setPoint($collectionAnswer, $user_id)
    {
        $point_details = [];

        $i = 0;

        foreach ($collectionAnswer->where('sub_question_id', '!=', null)->unique('sub_question_id') as $subQuestions) {

            $point_details[$i]['user_id'] = $user_id;

            $dbSubQuestion = SubQuestion::where('id', $subQuestions['sub_question_id'])->first();

            switch ($dbSubQuestion['point_type']) {
                case 'faculty':
                    $point_details[$i]['question_id'] = $subQuestions['question_id'];
                    $point_details[$i]['sub_question_id'] = $subQuestions['sub_question_id'];
                    $point_details[$i]['point'] = $this->setPointByFaculty($subQuestions['sub_question_id'], $collectionAnswer);
                    break;

                case 'option':
                    $point_details[$i]['question_id'] = $subQuestions['question_id'];
                    $point_details[$i]['sub_question_id'] = $subQuestions['sub_question_id'];
                    $point_details[$i]['point'] = $this->setPointByOption($subQuestions['question_id'], $subQuestions['sub_question_id'], $collectionAnswer);
                    break;

                case 'sub_question':
                    $point_details[$i]['point'] = $this->setPointBySubQuestion($subQuestions['sub_question_id'], $collectionAnswer);
                    break;

                case 'no_point':
                    $point_details[$i]['point'] = 0;
            }

            count($point_details) > 0 ? UserPoint::insert($point_details) : null;
            $i++;
        }

        foreach ($collectionAnswer->where('sub_question_id', '=', null)->unique('sub_question_id') as  $Questions) {
            $point_details[$i]['user_id'] = $user_id;
            $point_details[$i]['question_id'] = $Questions['question_id'];
            $point_details[$i]['sub_question_id'] = null;

            $dbQuestion = Question::where('id', $Questions['question_id'])->first();

            switch ($dbQuestion->point_type) {

                case 'option':
                    $point_details[$i]['point'] = $this->setPointByOption($Questions['question_id'], null, $collectionAnswer);
                    break;

                case 'question':
                    $point_details[$i]['point'] = $this->setPointBySubQuestion($Questions['question_id'], $collectionAnswer);
                    break;

                case 'no_point':
                    $point_details[$i]['point'] = 0;
            }
            $i++;
        }

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

        $point = $option_ids != null ? Option::whereIn('id', $option_ids)->sum('point') : 0;

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
}
