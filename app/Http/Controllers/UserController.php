<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helper\LoggerController;
use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
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

    public function index()
    {
        (new LoggerController)->accessing_warning('get User List');

        $users = User::where('type', 0)->get();
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
            'created_at' => $user->created_at
        ];

        $questionAnswerExploration = $this->getQuestionAnswerByCategory(1, $user);
        $questionAnswerProfileBuilding = $this->getQuestionAnswerByCategory(2, $user);
        $questionAnswerAcademic = $this->getQuestionAnswerByCategory(3, $user);
        $questionAnswerWriting = $this->getQuestionAnswerByCategory(4, $user);

        $mapped_answers = array_merge($questionAnswerExploration, $questionAnswerProfileBuilding, $questionAnswerAcademic, $questionAnswerWriting);

        return response()->json([
            'success' => true,
            'data' => [
                'user' => $mapped_user,
                'answer' => $mapped_answers

            ]
        ]);
    }

    private function getQuestionAnswerByCategory($category_id, $user)
    {
        # get the questions & answer for exploration    
        $questions = Question::with('sub_questions')->where('category_id', $category_id)->orderBy('id', 'ASC')->get();

        $category_name = $this->getCategoryName($category_id);

        foreach ($questions as $question) {

            if ($question->sub_questions->count() > 0) {

                foreach ($question->sub_questions as $sub_question) {

                    $mapped_answers[$category_name][] = [
                        'question' => $question->title,
                        'sub_question' => $sub_question->title,
                        'answer' => Answer::with('option')->where('user_id', $user->id)->where('sub_question_id', $sub_question->id)->get()->map(function ($value) {
                            return $value->option->option_answer;
                        })
                    ];
                }

                continue;
            }

            $mapped_answers[$category_name][] = [
                'question' => $question->title,
                'sub_question' => null,
                'answer' => Answer::with('option')->where('user_id', $user->id)->where('question_id', $question->id)->get()->map(function ($value) {
                    return $value->option->option_answer;
                })
            ];
        }

        return $mapped_answers;
    }

    private function getCategoryName($category_id)
    {
        $category = Category::find($category_id);
        return $category->name;
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
}
