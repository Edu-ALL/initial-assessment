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

    private function getClientInfo($ticket_no, $user = null)
    {
        $checkUser = User::where('ticket_id', $ticket_no)->first();

        if (!isset($checkUser)) {
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

                $userId = $user !== NULL ? $user->id : null;

                if (array_key_exists('id', $value)) {
                    $value['id'] =  $userId;
                }

                if (array_key_exists('took_initial_assessment', $value)) {
                    $value['took_initial_assessment'] =  $this->answerRepository->haveFilledInitialAssessment($userId) ? 1 : 0;
                    $value['took_quest'] = $user != null ? $user->took_quest : 0;
                    $value['type'] = 0;
                }



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

            $data = $response->collect('data')->map(function ($value) use ($user) {

                $userId = $user !== NULL ? $user->id : null;

                if (array_key_exists('id', $value)) {
                    $value['id'] =  $userId;
                }

                if (array_key_exists('took_initial_assessment', $value)) {
                    $value['took_initial_assessment'] = $this->answerRepository->haveFilledInitialAssessment($userId) ? 1 : 0;
                    $value['took_quest'] = $user != null ? $user->took_quest : 0;
                    $value['type'] = 0;
                }


                return $value;
            });

            $data['quest'] = $this->answerRepository->checklistQuest($user->id);
            # manipulate the user took_initial_assessment
        } else {
            $data = [
                'client' => [
                    'id' => $checkUser->id,
                    'is_vip' => intval($checkUser->is_vip) == 0 ? false : true,
                    'took_initial_assessment' => $this->answerRepository->haveFilledInitialAssessment($checkUser->id) ? 1 : 0,
                    'full_name' => $checkUser->full_name,
                    'email' => $checkUser->email,
                    'phone' => $checkUser->phone_number,
                    'address' => [
                        'state' => $checkUser->state,
                        'city' => $checkUser->city,
                        'address' => $checkUser->address,
                    ],
                    'education' => [
                        'school' => $checkUser->school,
                        'grade' => $checkUser->grade,
                    ],
                    'country' => $checkUser->destination != null ? json_decode($checkUser->destination) : [
                        null
                    ],
                    'took_quest' => intval($checkUser->took_quest),
                    'type' => 0
                ],
                'client_event' => [
                    'id' => $checkUser->id,
                    'ticket_id' => $checkUser->ticket_id
                ]
            ];

            $data['quest'] = $this->answerRepository->checklistQuest($checkUser->id);

            $user = $checkUser;
        }

        return [
            'response' => $data,
            'user' => $user
        ];
    }

    # sign In using ticket number
    public function signInByUUID(Request $request)
    {
        $rules = [
            'client_uuid' => 'required',
        ];

        $incomingRequest['client_uuid'] = $request->route('client_uuid');

        $validator = Validator::make($incomingRequest, $rules);

        # threw error if validation fails
        if ($validator->fails())
            return response()->json(['error' => 'Cannot process the request.']);

        # collect the validated request
        $validated = $incomingRequest;

        try {
            $response = $this->getClientInfoByUUID($validated['client_uuid']);
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

    private function getClientInfoByUUID($uuid, $user = null)
    {

        $checkUser = User::where('uuid_crm', $uuid)->first();

        if (!isset($checkUser)) {
            # can be customized depends on the endpoint
            $endpoint = "http://127.0.0.1:8000/api/v1/get/user/by/UUID/{$uuid}";

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

                $userId = $user !== NULL ? $user->id : null;

                if (array_key_exists('id', $value)) {
                    $value['id'] =  $userId;
                }

                if (array_key_exists('took_initial_assessment', $value)) {
                    $value['took_initial_assessment'] =  $this->answerRepository->haveFilledInitialAssessment($userId) ? 1 : 0;
                    $value['took_quest'] = $user != null ? $user->took_quest : 0;
                    $value['type'] = 0;
                }

                return $value;
            });


            if (!$user = User::where('uuid_crm', $data['client']['uuid_crm'])->first()) {

                # insert user into edu all assessment db
                $user = new User();
                $user->uuid = Str::uuid();
                $user->uuid_crm = $data['client']['uuid_crm'];
                $user->ticket_id = null;
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


            $data = $response->collect('data')->map(function ($value) use ($user) {

                $userId = $user !== NULL ? $user->id : null;

                if (array_key_exists('id', $value)) {
                    $value['id'] =  $userId;
                }

                if (array_key_exists('took_initial_assessment', $value)) {
                    $value['took_initial_assessment'] = $this->answerRepository->haveFilledInitialAssessment($userId) ? 1 : 0;
                    $value['took_quest'] = $user != null ? $user->took_quest : 0;
                    $value['type'] = 0;
                }

                unset($value['uuid_crm']);

                return $value;
            });



            $data['quest'] = $this->answerRepository->checklistQuest($user->id);
            # manipulate the user took_initial_assessment

        } else {
            $data = [
                'client' => [
                    'id' => $checkUser->id,
                    'is_vip' => intval($checkUser->is_vip) == 0 ? false : true,
                    'took_initial_assessment' => $this->answerRepository->haveFilledInitialAssessment($checkUser->id) ? 1 : 0,
                    'full_name' => $checkUser->full_name,
                    'email' => $checkUser->email,
                    'phone' => $checkUser->phone_number,
                    'address' => [
                        'state' => $checkUser->state,
                        'city' => $checkUser->city,
                        'address' => $checkUser->address,
                    ],
                    'education' => [
                        'school' => $checkUser->school,
                        'grade' => $checkUser->grade,
                    ],
                    'country' => $checkUser->destination != null ? json_decode($checkUser->destination) : [
                        null
                    ],
                    'took_quest' => intval($checkUser->took_quest),
                    'type' => 0
                ],
                'client_event' => [
                    'id' => $checkUser->id,
                    'ticket_id' => $checkUser->ticket_id
                ]
            ];

            $data['quest'] = $this->answerRepository->checklistQuest($checkUser->id);

            $user = $checkUser;
        }


        return [
            'response' => $data,
            'user' => $user
        ];
    }

    public function checkAuth(Request $request)
    {
        $user = auth()->guard('api')->user();

        $ticketId = isset($request->user()->ticket_id) ? $request->user()->ticket_id : null;

        if ($ticketId == null) {
            # send request to get data client using uuid from crm
            $response = $this->getClientInfoByUUID($request->user()->uuid_crm);
        } else {
            # send request to get data client using ticket id from crm
            $response = $this->getClientInfo($ticketId, $user);
        }
        $data = $response['response'];
        $data['token'] = $request->bearerToken();


        return response()->json([
            'success' => true,
            'data' => $data
        ]);
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
