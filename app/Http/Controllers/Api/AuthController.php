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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    private AnswerRepositoryInterface $answerRepository;
    private QuestionRepositoryInterface $questionRepository;

    public function __construct(AnswerRepositoryInterface $answerRepository, QuestionRepositoryInterface $questionRepository)
    {
        $this->answerRepository = $answerRepository;
        $this->questionRepository = $questionRepository;
    }

    # sign In using ticket number
    public function signIn(Request $request)
    {
        $rules = [
            'ticket_no' => 'required',
        ];

        $incomingRequest = $request->only(['ticket_no']);

        $validator = Validator::make($incomingRequest, $rules);

        # threw error if validation fails
        if ($validator->fails())
            return response()->json(['error' => 'Cannot process the request.']);


        # collect the validated request
        $validated = $request->collect();

        try {
            $response = $this->getClientInfo($validated['ticket_no']);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }


        # variable response contains the response we got from the CRM http
        $data = $response['response'];

        # variable user contains User model which will created if does not exist
        $user = $response['user'];

        # generate token
        $token = $user->createToken('Access-EduAll-Assessment', ['client'])->accessToken;
        $data['token'] = $token;

        return response()->json([
            'success' => true,
            'message' => 'Access granted',
            'data' => $data
        ]);
    }

    public function checkAuth(Request $request)
    {
        $user = auth()->guard('api')->user();

        $ticketId = $request->user()->ticket_id;

        # send request to get data client using ticket id from crm
        $response = $this->getClientInfo($ticketId, $user);
        $data = $response['response'];

        $data['quest'] = $this->answerRepository->checklistQuest($user->id);

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    private function getClientInfo($ticket_no, $user)
    {

        # can be customized depends on the endpoint
        $endpoint = "http://127.0.0.1:8000/api/v1/get/user/by/TKT/{$ticket_no}";

        # create 
        $response = Http::get($endpoint);

        # catch when sending the request to $endpoints failed
        if ($response->failed()) {
            throw new Exception('Cannot process the request. Please try another ticket number.');
        }

        # catch the success if request to $endpoints failed but not giving 500 error code
        if ($response['success'] === false)
            throw new Exception($response['message']);


        $data = $response->collect('data')->map(function ($value) use ($user) {

            if (array_key_exists('took_initial_assessment', $value)) {
                $value['took_initial_assessment'] =  $this->answerRepository->haveFilledInitialAssessment($value['id']) ? 1 : 0;
            }

            $value['took_quest'] = $user->took_quest;

            return $value;
        });

        if (!$user = User::where('ticket_id', $data['clientevent']['ticket_id'])->first()) {

            # insert user into edu all assessment db
            $user = new User();
            $user->uuid = Str::uuid();
            $user->ticket_id = $data['clientevent']['ticket_id'];
            $user->full_name =  $data['client']['full_name'];
            $user->email = $data['client']['email'];
            $user->phone_number = $data['client']['phone'];
            $user->state = $data['client']['address']['state'];
            $user->city = $data['client']['address']['city'];
            $user->address = $data['client']['address']['address'];
            $user->school = $data['client']['education']['school'];
            $user->grade = $data['client']['education']['grade'];
            $user->destination = json_encode($data['client']['country']);
            $user->is_vip = $data['client']['is_vip'];
            $user->took_ia = $data['client']['took_initial_assessment'];
            $user->created_at = Carbon::now();
            $user->save();
        }


        # manipulate the user took_initial_assessment

        return [
            'response' => $data,
            'user' => $user
        ];
    }

    public function signOut(Request $request)
    {
        try {

            # revoke the access token
            $request->user()->token()->revoke();
        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'message' => "We've encountered an issue that prevents us from continuing the process further."
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Signed out'
        ]);
    }
}
