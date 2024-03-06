<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Option;
use App\Models\Pivot\Answer;
use App\Models\Question;
use App\Models\SubQuestion;
use App\Models\User;
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

        $answers = $request->answers;
        $next_category = $request->next_category;
        $rules = $check_validations = $poin_details = [];
        $input_question = $input_sub_question = null;
        $collectionAnswer = new Collection;
        $collectionAnswer = collect($answers);
        $new_request = $request->all();

        $user = User::find(1);

        $rules['next_category'] = 'nullable|exists:category,id';

        foreach ($answers as $key => $answer) {

            if ($answer['sub_question_id'] != null) {
                $input_sub_question = $this->questionRepository->getSubQuestionById($answer['sub_question_id']);
                $check_validations[] = [
                    'question_id' => null,
                    'sub_question_id' => $input_sub_question->id,
                    'question_type' => $input_sub_question->question_type,
                    'minimum_answer' => $input_sub_question->minimum_answer,
                    'maximum_answer' => $input_sub_question->maximum_answer,
                ];
            } else {
                $input_question = $this->questionRepository->getQuestionById($answer['question_id']);
                $check_validations[] = [
                    'question_id' => $input_question->id,
                    'sub_question_id' => null,
                    'question_type' => $input_question->question_type,
                    'minimum_answer' => $input_question->minimum_answer,
                    'maximum_answer' => $input_question->maximum_answer,
                ];
            }

            $rules['answers.' . $key . '.question_id'] = 'required|exists:questions,id';
            $rules['answers.' . $key . '.sub_question_id'] = 'nullable|exists:sub_questions,id';
            $rules['answers.' . $key . '.is_answer'] = 'required|boolean';
            $rules['answers.' . $key . '.answer_descriptive'] = 'nullable';
        }


        # Set validation minimum, maximum & required answer
        foreach ($check_validations as $check_validation) {
            if ($check_validation['sub_question_id'] != null) {
                $count = $collectionAnswer->where('sub_question_id', $check_validation['sub_question_id'])->where('is_answer', true)->count();
            } else if ($check_validation['sub_question_id'] == null) {
                $count = $collectionAnswer->where('question_id', $check_validation['question_id'])->where('is_answer', true)->count();
            }

            if ($check_validation['question_id'] != null || $check_validation['sub_question_id'] != null) {
                $new_request['answer'] = $count;

                $rules['answer'] = [
                    function ($attribute, $value, $fail) use ($check_validation) {
                        if ($value == 0 && $check_validation['question_type'] == 'mandatory') {
                            $fail('Answer required');
                        } else if ($value > $check_validation['maximum_answer']) {
                            $fail('Maximum answer');
                        } else if ($value < $check_validation['minimum_answer']) {
                            $fail('Minimum answer');
                        }
                    }
                ];
            }
        }

        $validator = Validator::make($new_request, $rules);

        # threw error if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors()
            ]);
        }

        DB::beginTransaction();
        try {

            $this->answerRepository->syncAnswer($user, $answers);

            // TODO:
            # 1. store point 

            $question = $this->questionRepository->getQuestion($next_category, $user);

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
            'data' => $question
        ]);
    }


    # Set point untuk spesial case
    protected function setPoint($collectionAnswer, $user_id)
    {
        $point_details = [];

        foreach ($collectionAnswer->where('sub_question_id', '!=', null)->unique('sub_question_id') as $subQuestions) {

            $point_details['user_id'] = $user_id;
            $point_details['question_id'] = $subQuestions->question_id;
            $point_details['sub_question_id'] = $subQuestions->sub_question_id;

            switch ($subQuestions->point_type) {
                case 'faculty':
                    $point_details['point'] = $this->setPointByFaculty($subQuestions->sub_question_id, $collectionAnswer);
                    break;

                case 'option':
                    $point_details['point'] = $this->setPointByOption($subQuestions->question_id, $subQuestions->sub_question_id, $collectionAnswer);
                    break;

                case 'sub_question':
                    $point_details['point'] = $this->setPointBySubQuestion($subQuestions->sub_question_id, $collectionAnswer);
                    break;

                case 'no_point':
                    $point_details['point'] = 0;
            }
        }

        foreach ($collectionAnswer->where('sub_question_id', '=', null)->unique('sub_question_id') as $Questions) {
            $point_details['user_id'] = $user_id;
            $point_details['question_id'] = $Questions->question_id;
            $point_details['sub_question_id'] = null;

            switch ($Questions->point_type) {

                case 'option':
                    $point_details['point'] = $this->setPointByOption($Questions->question_id, null, $collectionAnswer);
                    break;

                case 'question':
                    $point_details['point'] = $this->setPointBySubQuestion($Questions->question_id, $collectionAnswer);
                    break;

                case 'no_point':
                    $point_details['point'] = 0;
            }
        }
    }

    protected function setPointByQuestion($question_id, $collectionAnswer)
    {
        $point = 0;

        if ($collectionAnswer->where('question_id', $question_id)->where('is_answer', true)->count() > 0) {
            $point = Question::where('id', $question_id)->sum('total_point');
        }

        return $point;
    }

    protected function setPointBySubQuestion($sub_question_id, $collectionAnswer)
    {
        $point = 0;

        if ($collectionAnswer->where('sub_question_id', $sub_question_id)->where('is_answer', true)->count() > 0) {
            $point = SubQuestion::where('id', $sub_question_id)->sum('total_point');
        }

        return $point;
    }

    protected function setPointByFaculty($sub_question_id, $collectionAnswer)
    {
        $point = 0;

        if ($collectionAnswer->where('sub_question_id', $sub_question_id)->count() > 0) {
            $countFaculty = [];
            foreach ($collectionAnswer->where('sub_question_id', $sub_question_id)->unique('title_of_answer') as $key => $checkAnswer) {
                $countFaculty[$checkAnswer['title_of_answer']] = $collectionAnswer->where('title_of_answer', $checkAnswer['title_of_answer'])->where('is_answer', true)->count();
            }

            if (array_search(3, $countFaculty)) {
                $point = 1;
            } else if (array_search(2, $countFaculty)) {
                $point = 2;
            } else if (array_search(1, $countFaculty)) {
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
            $option_ids = $collectionAnswer->where('sub_question_id', $sub_question_id)->where('is_answer', true)->pluck('id');
        } else {
            $option_ids = $collectionAnswer->where('question_id', $question_id)->where('is_answer', true)->pluck('id');
        }

        $point = $option_ids != null ? Option::whereIn('id', $option_ids)->sum('point') : 0;

        return $point;
    }

    public function getQuestion(Request $request)
    {
        $category_id = $request->category;

        $user = User::find(1);

        try {

            $question = $this->questionRepository->getQuestion($category_id, $user);

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
