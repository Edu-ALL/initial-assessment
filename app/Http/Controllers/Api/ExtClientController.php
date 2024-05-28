<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Token;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;
use Illuminate\Support\Str;

class ExtClientController extends Controller
{
    private AnswerRepositoryInterface $answerRepository;
    private QuestionRepositoryInterface $questionRepository;

    public function __construct(AnswerRepositoryInterface $answerRepository, QuestionRepositoryInterface $questionRepository)
    {
        $this->answerRepository = $answerRepository;
        $this->questionRepository = $questionRepository;
    }

    public function getTookIA(Request $request)
    {
        $request->route('uuid_crm');

        $rules = [
            'uuid_crm' => 'required',
        ];

        $tookIA = false;

        $incomingRequest['uuid_crm'] = $request->route('uuid_crm');

        $validator = Validator::make($incomingRequest, $rules);

        # threw error if validation fails
        if ($validator->fails()) {
            Log::warning($validator->errors());
            return response()->json(['error' => 'Cannot process the request.' . json_encode($validator->errors())], 400);
        }

        # collect the validated request
        $validated = $incomingRequest;

        try {
            $user = User::where('uuid_crm', $validated['uuid_crm'])->first();

            if (isset($user))
                $tookIA = $this->answerRepository->haveFilledInitialAssessment($user->id);
        } catch (Exception $e) {
            Log::error('get took IA failed: ' . $e->getMessage() . ' | Line: ' . $e->getLine());
            return response()->json([
                'error' => 'get took IA failed' . $e->getMessage()
            ], 500);
        }

        return response()->json([
            'success' => true,
            'data' => $tookIA
        ]);
    }
}
