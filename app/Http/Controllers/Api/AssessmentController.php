<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Option;
use App\Models\Question;
use App\Models\Report;
use App\Models\SubQuestion;
use App\Models\User;
use App\Models\UserPoint;
use App\Repositories\AnswerRepository;
use Barryvdh\DomPDF\Facade\Pdf;
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

        $user = auth()->guard('api')->user();

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

            $user = auth()->guard('api')->user();

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
        $user = auth()->guard('api')->user();

        $userPoints =  UserPoint::leftjoin('questions', 'questions.id', '=', 'user_points.question_id')
            ->leftjoin('category', 'category.id', '=', 'questions.category_id')
            ->select(DB::raw('SUM(user_points.point) as point'), 'name')
            ->where('user_id', $user->id)
            ->where('questions.category_id', '<', 5) # Only initial assessment
            ->groupBy('name')
            ->get();

        $decrease = -4;
        $categories = Category::where('id', '<', 5)->get();

        foreach ($categories as $key => $category) {
            $points[] = [
                'category' => $category->name,
                'point' => 0
            ];

            $defaultRank[] = $decrease;
            $decrease++;
        }


        if ($userPoints->count() > 0) {
            $i = 0;
            foreach ($userPoints as $userPoint) {
                $points[$i] = [
                    'category' => $userPoint['name'],
                    'point' => $userPoint['point']
                ];
                $i++;
            }
        }


        $collectionPoint = collect($points);

        $duplicateValue = $collectionPoint->duplicates('point')->unique();


        $new_points = $collectionPoint;
        if (count($duplicateValue) > 0) {
            foreach ($collectionPoint as $key => $point) {
                $is_duplicate = false;

                foreach ($duplicateValue as $value) {
                    if ($point['point'] == $value) {
                        $is_duplicate = true;
                    }
                }

                if ($is_duplicate) {
                    $new_points[$key] = [
                        'category' => $point['category'],
                        'point' => $point['point'] + $defaultRank[$key],
                    ];
                }
            }
        }


        $sorted =  $new_points->sortBy('point');

        return $sorted->values()->all();
    }

    public function getReport(Request $request)
    {

        $user = auth()->guard('api')->user();

        $reports =  Report::with(['category', 'improvement_reports', 'improvement_reports.sub_improvement_reports'])->where('category_id', '<', 5)->get();

        $reports = $reports->map(function ($report) use ($user) {
            $checkSurpass = $this->checkReport($report->category_id, $user->id);
            if ($checkSurpass == 500) {
                return 500;
            }
            $data = [
                'id' => $report->id,
                'category_id' => $report->category_id,
                'surpass' => $report->surpass,
                'heading_improvement' => $report->heading_improvement,
                'category_name' => $report->category->name,
                'is_surpass' => $checkSurpass['surpass'],
            ];

            if ($report->improvement_reports()->count() > 0) {
                $improvement_reports = $report->improvement_reports;
                $improvement_reports = $improvement_reports->map(function ($improvement_report) use ($report, $user) {
                    $checkReport = $this->checkReport($report->category_id, $user->id, $improvement_report->question_id, $improvement_report->sub_question_id);
                    if ($checkReport == 500) {
                        return 500;
                    }
                    $format_improvement_report  = [
                        'id' => $improvement_report->id,
                        'report_id' => $improvement_report->report_id,
                        'question_id' => $improvement_report->question_id,
                        'sub_question_id' => $improvement_report->sub_question_id,
                        'improvement' => $improvement_report->improvement,
                        'is_improvement' => $checkReport['main_improvement'],
                    ];

                    if ($improvement_report->sub_improvement_reports()->count() > 0) {
                        $sub_improvement_reports = $improvement_report->sub_improvement_reports;
                        $sub_improvement_reports = $sub_improvement_reports->map(function ($sub_improvement_report) use ($checkReport) {
                            $format_sub_improvement_report = [
                                'id' => $sub_improvement_report->id,
                                'improvement_report_id' => $sub_improvement_report->improvement_report_id,
                                'improvement' => $sub_improvement_report->improvement,
                                'is_improvement' => $checkReport['sub_improvement'],
                            ];

                            return $format_sub_improvement_report;
                        });
                        $format_improvement_report['sub_improvement_reports'] = $sub_improvement_reports;
                    }
                    return $format_improvement_report;
                });
                $data['improvement_reports'] = $improvement_reports;
            }

            return $data;
        });


        if (in_array(500, $reports->toArray())) {
            return response()->json([
                'success' => false,
                'message' => "Data answer not found",
            ], 500);
        }


        $pdf = Pdf::loadView('report.report', ['reports' => $reports, 'user' => $user]);
        return $pdf->download('report.pdf');
    }

    protected function checkReport($category_id, $user_id, $question_id = null, $sub_question_id = null)
    {
        $result = ['surpass' => false, 'main_improvement' => false, 'sub_improvement' => false];

        $userPointByCategory = UserPoint::where('user_id', $user_id)->whereHas('question', function ($query) use ($category_id) {
            $query->where('category_id', $category_id);
        })->get();

        if (count($userPointByCategory) == 0) {
            $result = 500;
        }

        if ($question_id != null || $sub_question_id != null) {

            $userPoint = UserPoint::where('user_id', $user_id)->get();

            if (count($userPoint) > 0) {

                switch ($category_id) {
                    case 1:
                        $result['surpass'] = $userPointByCategory->sum('point') >= 20 ? true : false;
                        break;

                    case 2:
                        $result['surpass'] = $userPointByCategory->sum('point') >= 18 ? true : false;
                        break;

                    case 3:
                        $result['surpass'] = $userPointByCategory->sum('point') >= 18 ? true : false;
                        break;

                    default:
                        # code...
                        break;
                }

                switch ($question_id) {
                    case $question_id = 2:
                        $result['main_improvement'] = $userPoint->where('question_id', 2)->sum('point') < 5 ? true : false;
                        break;

                    case $question_id = 5:
                        $result['main_improvement'] = $userPoint->where('question_id', 5)->sum('point') < 3 ? true : false;
                        break;

                    case $question_id = 6:
                        $result['main_improvement'] = $userPoint->where('question_id', 6)->sum('point') < 1 ? true : false;
                        break;

                    case $question_id = 9:
                        $result['main_improvement'] = $userPoint->where('question_id', 9)->sum('point') == 0 ? true : false;
                        break;

                    case $question_id = 10:
                        $result['main_improvement'] = $userPoint->where('question_id', 10)->sum('point') == 0 ? true : false;
                        break;

                    case $question_id = 14:
                        $result['main_improvement'] = $userPoint->where('question_id', 14)->avg('point') == 1 || $userPoint->where('question_id', 14)->sum('point') == 0 ? true : false;
                        break;

                    case $question_id = 18:
                        $result['main_improvement'] = $userPoint->whereIn('question_id', [18, 19])->sum('point') < 3 ? true : false;
                        break;

                    case $question_id = 20:
                        $result['main_improvement'] = $userPoint->where('question_id', 20)->sum('point') == 5 ? true : false;
                        break;
                }

                if ($sub_question_id != null) {
                    switch ($sub_question_id) {
                        case 1:
                            $result['main_improvement'] = $userPoint->where('sub_question_id', 1)->sum('point') < 2 ? true : false;
                            break;

                        case 5:
                            $result['main_improvement'] = $userPoint->where('sub_question_id', 5)->sum('point') == 1 ? true : false;
                            break;

                        case 6:
                            $result['main_improvement'] = $userPoint->where('sub_question_id', 6)->sum('point') == 1 ? true : false;
                            break;

                        case 7:
                            $result['main_improvement'] = $userPoint->where('sub_question_id', 7)->sum('point') == 2 ? true : false;
                            break;

                        case 8:
                            $result['main_improvement'] = $userPoint->where('sub_question_id', 8)->sum('point') < 1 ? true : false;
                            break;

                        case 9:
                            $result['main_improvement'] = $userPoint->where('sub_question_id', 9)->sum('point') < 2 ? true : false;
                            break;

                        case 10:
                            $result['main_improvement'] = $userPoint->where('sub_question_id', 10)->sum('point') == 0 ? true : false;
                            break;
                    }
                }
            } else {
                $result = 500;
            }
        }

        return $result;
    }
}
