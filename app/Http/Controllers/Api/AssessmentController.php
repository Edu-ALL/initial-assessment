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

    public function storeAnswer(Request $request)
    {
        $category_id = $request->category;
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

            $insertedAnswer = $this->answerRepository->syncAnswer($user, $category_id, $collectionAnswer);

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

        try {
            $question_withSQ = Question::has('sub_questions')->with(['sub_questions.answers'])->get();
            $question_withoutSQ = Question::doesntHave('sub_questions')->with(['answers'])->get();

            $user = User::find(1);

            $merge = $question_withSQ->merge($question_withoutSQ);

            $questions = $merge->where('category_id', $request->category)->sortBy('id');

            foreach ($questions as $key => $question) {

                if ($question->sub_questions()->count() == 0 && $question->answers()->where('user_id', $user->id)->count() > 0) {
                    foreach ($question->answers()->where('user_id', $user->id)->get() as $answer) {
                        if ($answer->option()->count() > 0) {
                            $optionDetail[$key][] = [
                                'id' => $answer->option->id,
                                'question_id' => $answer->option->question_id,
                                'sub_question_id' => $answer->option->sub_question_id,
                                'reference_to' => $answer->option->reference_to,
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
                        'answer' => $optionDetail[$key]
                    ];
                }

                if ($question->sub_questions()->count() > 0) {
                    foreach ($question->sub_questions as $sub_question) {
                        if ($sub_question->answers()->where('user_id', $user->id)->count() > 0) {
                            foreach ($sub_question->answers()->where('user_id', $user->id)->get() as $answer) {
                                if ($answer->option()->count() > 0) {
                                    $optionDetail['s' . $sub_question->id][] = [
                                        'id' => $answer->option->id,
                                        'question_id' => $answer->option->question_id,
                                        'sub_question_id' => $answer->option->sub_question_id,
                                        'reference_to' => $answer->option->reference_to,
                                        'title_of_answer' => $answer->option->title_of_answer,
                                        'option_answer' => $answer->option->option_answer,
                                        'point' => $answer->option->point,
                                        'answer_descriptive' => $answer->answer_descriptive,
                                        'score' => $answer->score,

                                    ];
                                } else {
                                    $optionDetail['s' . $sub_question->id][] = [
                                        'id' => null,
                                        'question_id' => $answer->question_id,
                                        'sub_question_id' => $answer->sub_question_id,
                                        'answer_descriptive' => $answer->answer_descriptive,
                                        'score' => $answer->score,
                                    ];
                                }
                            }

                            $response[] = [
                                'answer' => $optionDetail['s' . $sub_question->id]
                            ];
                        }
                    }
                }
            }

            DB::commit();
        } catch (Exception $e) {
            Log::error('Get answer failed | ' . $e->getMessage() . ' | ' . $e->getFile() . ' on line ' . $e->getLine());
            return response()->json([
                'success' => false,
                'message' => "get answer failed " . $e
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => "Get answer successfully",
            'data' => $response
        ]);
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

    public function getRanking(Request $request)
    {
        return UserPoint::select()->with('question')->where('user_id', 1)->get()->groupBy('question.category_id');

        $defaultRank = [-4, -3, -2, -1];
        $points = [50, 60, 70, 50];
        $new_points = [];
        $is_duplicate = false;

        $counted = array_count_values($points);

        $duplicateValue = null;

        foreach ($counted as $val => $count) {
            if ($count > 1) {
                $duplicateValue = $val;
            }
        }

        $keysDuplicate = array_keys($points, $duplicateValue);

        foreach ($points as $key => $point) {
            $is_duplicate = false;
            $new_points[$key] = $point;
            foreach ($keysDuplicate as $keyDuplicate) {
                if ($key == $keyDuplicate) {
                    $is_duplicate = true;
                }
            }

            if ($is_duplicate) {
                $new_points[$key] = $point + $defaultRank[$key];
            }
        }

        return $new_points;
    }
}
