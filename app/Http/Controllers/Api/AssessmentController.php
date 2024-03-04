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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
        $option_id = [];
        $answers = $request->answers;
        $rules = [];

        // TODO:
        # Buat validasi untuk maksimal/minimum jawaban
        # Point untuk spesial case

        // $question_id = $request->question_id;
        // $sub_question_id = $request->question_id;

        // $question = $sub_question_id != null ? SubQuestion::find($sub_question_id) : Question::find($question_id);

        $user = User::find(1);

        foreach ($answers as $key => $answer) {

            $rules[$key . '.question_id'] = 'required|exists:questions,id';
            $rules[$key . '.sub_question_id'] = 'nullable|exists:sub_questions,id';
            $rules[$key . '.is_answer'] = 'required|boolean';
            $rules[$key . '.answer_descriptive'] = 'nullable';
        }

        // return $rules;

        # validation
        // $rules = [
        //     'question_id' => 'required|exists:questions,id',
        //     'sub_question_id' => 'nullable|exists:sub_questions,id',
        //     'option_id' => [
        //         $question->question_type == 'mandatory' ? 'required' : 'nullable',
        //         'exists:options,id',
        //     ],
        //     'answer_descriptive' => $question->question_type == 'mandatory' && $question->answer_type != 'option' ? 'required' : 'nullable',
        //     'is_checked' => 'nullable|in:true,false'
        // ];

        // $incomingRequest = [
        //     'option_id' => $request->option_id,
        //     'answer_descriptive' => $request->answer_descriptive,
        //     'question_id' => $question_id,
        //     'sub_question_id' => $sub_question_id,
        //     'is_checked' => $request->is_checked
        // ];

        $validator = Validator::make($answers, $rules);


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
            'data' => $this->answerRepository->responseAnswer($user, 1)
        ]);
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
