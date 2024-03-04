<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\AnswerRepositoryInterface;
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

class UserAnswerController extends Controller
{
    private AnswerRepositoryInterface $answerRepository;

    public function __construct(AnswerRepositoryInterface $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    public function store(Request $request)
    {
        $option_id = [];
        // return json_encode($request->options);
        // TODO:
        # Buat validasi untuk maksimal/minimum jawaban
        # Point untuk spesial case

        // $question_id = $request->question_id;
        // $sub_question_id = $request->question_id;

        // $question = $sub_question_id != null ? SubQuestion::find($sub_question_id) : Question::find($question_id);

        $user = User::find(1);

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

        // $validator = Validator::make($incomingRequest, $rules);


        # threw error if validation fails
        // if ($validator->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'error' => $validator->errors()
        //     ]);
        // }



        // return $request->options;


        DB::beginTransaction();
        try {

            $this->answerRepository->syncAnswer($user, $request->options);

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
}
