<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helper\LoggerController;
use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use App\Models\UserPoint;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    protected AnswerRepositoryInterface $answerRepository;
    protected QuestionRepositoryInterface $questionRepository;

    public function __construct(AnswerRepositoryInterface $answerRepository, QuestionRepositoryInterface $questionRepository)
    {
        $this->answerRepository = $answerRepository;
        $this->questionRepository = $questionRepository;
    }

    public function index(Request $request)
    {
        (new LoggerController)->accessing_warning('get User List');

        $users = User::where('type', 0)->paginate(10);

        if (isset($request->q) || $request->q != null) {
            $users = User::where('type', 0)->where('full_name', 'like', '%' . $request->q . '%')->paginate(10);
        }

        $message = $users->count() > 0 ? 'Users found' : 'No user found';


        # manipulate each user
        # adding the filled_ia & quest completeness
        foreach ($users as $user) {


            $user['filled_ia'] = $this->answerRepository->haveFilledInitialAssessment($user->id) ? 1 : 0;


            # query to get quest completeness status
            $user['quest'] = $this->answerRepository->checklistQuest($user->id);
        }


        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $users
        ]);
    }

    public function show($user_uuid)
    {
        $user = User::with(['answers_many'])->where('uuid', $user_uuid)->firstOrFail();

        # mapping user info
        $mapped_user = [
            'id' => $user->id,
            'ticket_id' => $user->ticket_id,
            'full_name' => $user->full_name,
            'email' => $user->email,
            'phone_number' => $user->phone_number,
            'state' => $user->state,
            'city' => $user->city,
            'address' => $user->address,
            'school' => $user->school,
            'grade' => $user->grade,
            'destination' => json_decode($user->destination),
            'took_ia' => $this->answerRepository->haveFilledInitialAssessment($user->id) ? 1 : 0,
            'took_quest' => $user->took_quest,
            'created_at' => $user->created_at
        ];

        $questions = Question::with(['category', 'sub_questions', 'answers', 'sub_questions.answers'])
            ->whereHas('answers', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->whereHas('sub_questions.answers', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })->get();


        $questionAnswerExploration = $this->answerRepository->getQuestionAnswerByCategory(1, $user);
        $questionAnswerProfileBuilding = $this->answerRepository->getQuestionAnswerByCategory(2, $user);
        $questionAnswerAcademic = $this->answerRepository->getQuestionAnswerByCategory(3, $user);
        $questionAnswerWriting = $this->answerRepository->getQuestionAnswerByCategory(4, $user);

        $questExploration = $this->answerRepository->getQuestionAnswerByCategory(5, $user);
        $questProfileBuilding = $this->answerRepository->getQuestionAnswerByCategory(6, $user);
        $questAcademic = $this->answerRepository->getQuestionAnswerByCategory(7, $user);
        $questWriting = $this->answerRepository->getQuestionAnswerByCategory(8, $user);
        $questSponsor = $this->answerRepository->getQuestionAnswerByCategory(9, $user);

        $mapped_answers_IA = array_merge($questionAnswerExploration, $questionAnswerProfileBuilding, $questionAnswerAcademic, $questionAnswerWriting);

        $mapped_answers_Quest = array_merge($questExploration, $questProfileBuilding, $questAcademic, $questWriting, $questSponsor);

        $data['IA'] = $mapped_answers_IA;
        $data['Quest'] = $mapped_answers_Quest;

        return response()->json([
            'success' => true,
            'data' => [
                'user' => $mapped_user,
                'IA' => $mapped_answers_IA,
                'Quest' => $mapped_answers_Quest

            ]
        ]);
    }

    public function updateTookQuest(Request $request)
    {
        $user = auth()->guard('api')->user();

        $rules = [
            'took_quest' => 'required|in:0,1',
        ];

        $incomingRequest = $request->only(['took_quest']);

        $validator = Validator::make($incomingRequest, $rules);

        # threw error if validation fails
        if ($validator->fails())
            return response()->json(['error' => 'Cannot process the request.']);

        # collect the validated request
        $validated = $request->collect();

        // return gettype($validated->toArray());
        try {
            $user = User::where('id', $user->id)->update($validated->toArray());
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Successfully update took quest',
            // 'data' => $user
        ]);
    }

    public function dashboard()
    {
        try {
            $users = User::where('type', 0)->get();

            $userPoints =  UserPoint::leftjoin('questions', 'questions.id', '=', 'user_points.question_id')
                ->leftjoin('category', 'category.id', '=', 'questions.category_id')
                ->select(DB::raw('SUM(user_points.point) as point'), 'name', 'user_id')
                ->where('questions.category_id', '>', 4) # Only quest
                ->groupBy('name')
                ->groupBy('user_id')
                ->get();


            $data = [
                'user' => $users->count(),
                'took_ia' => $users->where('took_ia', 1)->count(),
                'took_quest' => $users->where('took_quest', 1)->count(),
                'quest' => [
                    'Exploration' => $userPoints->where('name', 'Exploration')->where('point', 2)->count(),
                    'Profile Building' => $userPoints->where('name', 'Profile Building')->where('point', 1)->count(),
                    'Academic Profiling' => $userPoints->where('name', 'Academic Profiling')->where('point', 1)->count(),
                    'Writing' => $userPoints->where('name', 'Writing')->where('point', 1)->count(),
                    'Sponsor' => $userPoints->where('name', 'Sponsor')->where('point', 1)->count(),
                ]
            ];
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Successfully get data dashboard',
            'data' => $data
        ]);
    }
}
