<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\LoggerController;
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
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
        $nullArray = array_keys($answers, null);

        if (count($nullArray) > 0) {
            foreach ($nullArray as $value) {
                unset($answers[$value]);
            }
        }

        $collectionAnswer = new Collection;
        $collectionAnswer = collect($answers);

        (new LoggerController)->trying_warning('store answer', $collectionAnswer);

        $user = auth()->guard('api')->user();

        DB::beginTransaction();
        try {

            $insertedAnswer = $this->answerRepository->syncAnswer($user, $category_id, $collectionAnswer);

            if ($category_id == 4) {
                User::where('id', $user->id)->update(['took_ia' => 1]);

                if ($user->uuid_crm != null) {
                    Http::withHeaders([
                        'crm_authorization' => env('CRM_AUTHORIZATION_KEY')
                    ])->post(env('URL_CRM') . 'api/assessment/update', [
                        'uuid' => $user->uuid_crm
                    ]);
                }
            }

            DB::commit();
        } catch (Exception $e) {

            DB::rollBack();

            (new LoggerController)->error('store answer', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'error_line' => $e->getLine()
            ]);

            return response()->json([
                'success' => false,
                'message' => "Store answer failed " . $e
            ]);
        }

        (new LoggerController)->success('stored answer');

        return response()->json([
            'success' => true,
            'message' => "Answer successfully stored",
            'data' => $insertedAnswer
        ]);
    }


    public function getQuestion(Request $request)
    {
        (new LoggerController)->accessing_warning('get questions');

        $category_id = $request->category;

        try {

            $question = $this->questionRepository->getOptionOnly($category_id);

            DB::commit();
        } catch (Exception $e) {

            (new LoggerController)->error('get questions', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'error_line' => $e->getLine()
            ]);

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

        (new LoggerController)->accessing_warning('get answer');

        $response = $optionDetail = [];

        try {
            $question_withSQ = Question::has('sub_questions')->with(['sub_questions.answers'])->get();
            $question_withoutSQ = Question::doesntHave('sub_questions')->with(['answers'])->get();

            $user = auth()->guard('api')->user();

            $merge = $question_withSQ->merge($question_withoutSQ);

            $questions = $merge->where('category_id', $request->category)->sortBy('id');

            $checkAnswer = Answer::where('user_id', $user->id)->whereHas('question', function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })->get();

            foreach ($questions as $key => $question) {

                if ($question->sub_questions()->count() == 0) {
                    if ($question->answers()->where('user_id', $user->id)->count() > 0) {
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
                    } else {
                        $optionDetail[$key][] = null;
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
                        } else {
                            $optionDetail['s' . $sub_question->id][] = null;
                        }
                        $response[] = [
                            'answer' => $optionDetail['s' . $sub_question->id]
                        ];
                    }
                }
            }

            if ($checkAnswer->count() == 0)
                $response = [];
            DB::commit();
        } catch (Exception $e) {

            (new LoggerController)->error('get answer', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'error_line' => $e->getLine()
            ]);

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
        (new LoggerController)->accessing_warning('get sub option');

        $curriculum = $request->curriculum;

        try {

            $sub_option = $this->questionRepository->getOptionByCurriculum($curriculum);

            DB::commit();
        } catch (Exception $e) {

            (new LoggerController)->error('get sub option', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'error_line' => $e->getLine()
            ]);

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
        (new LoggerController)->accessing_warning('get ranking');

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
        // (new LoggerController)->trying_warning('download report');
        $identifier = $request->user;
        $is_uuid = false;
        $is_preview = $request->get('is_preview');

        # check identifier is id or uuid
        if (preg_match("/[a-z]/i", $identifier)) {
            $is_uuid = true;
        }

        $validator = Validator::make($request->route()->parameters(), [
            'user' => [
                'required',
                function ($q) use ($is_uuid) {
                    if ($is_uuid) {
                        Rule::exists('users', 'uuid_crm');
                    } else {
                        Rule::exists('users', 'id');
                    }
                }
                // Rule::exists('users', 'id')->where(fn ($q) => $q->orWhere('uuid_crm', $identifier)),

            ]
        ]);

        if ($validator->fails())
            return response()->json(['error' => $validator->errors()->all()]);


        try {
            if ($is_uuid) {
                $user = User::where('uuid_crm', $identifier)->first();
            } else {
                $user = User::find($request->user);
            }

            $answer = Answer::with('option')->where('user_id', $user->id)->get();
            $curri = $answer->where('question_id', 11)->first();
            $academic_interests = $answer->where('sub_question_id', 1);
            $non_academic_interests = $answer->where('sub_question_id', 2);

            $ansCurri = null;
            if (isset($curri)) {
                $ansCurri = $curri->option->option_answer;
                if ($curri->option->option_answer == 'Others') {
                    $ansCurri = $curri->answer_descriptive;
                }
            }

            // $categories = Category::where('id', '<', 5)->get();
            // foreach ($categories as $category) {
            //     $userPoints = UserPoint::where('user_id', $user->id)->whereHas('question', function ($query) use ($category) {
            //         $query->where('category_id', $category->id);
            //     })->get();

            //     $reports['score'][$category->name] = $this->calcPercentage($category, $userPoints->sum('point'));
            // }

            // $totalPercentage = 0;
            // foreach ($reports['score'] as $key => $value) {
            //     $totalPercentage += $value;
            // }

            // $reports['score']['total'] = $totalPercentage == 0 || $totalPercentage == null ? 0 : round($totalPercentage / 4);

            $reports = $this->calcPoint($user->id);

            if ($reports['score']['total'] < 30) {
                $reports['result'] = 0;
            } else if ($reports['score']['total'] < 65) {
                $reports['result'] = 1;
            } else if ($reports['score']['total'] >= 65 && $reports['score']['total'] < 85) {
                $reports['result'] = 2;
            } else if ($reports['score']['total'] >= 85 && $reports['score']['total'] <= 100) {
                $reports['result'] = 3;
            }

            $reports['client'] = [
                'name' => $user->full_name,
                'grade' => $user->grade,
                'school' => $user->school,
                'curriculum' => $ansCurri,
                'academic_interests' => implode(', ', $academic_interests->pluck('option.option_answer')->toArray()),
                'non_academic_interests' => implode(', ', $non_academic_interests->pluck('option.option_answer')->toArray()),
            ];

            // return view('report.IA.report', ['reports' => $reports, 'user' => $user]);
            // exit(0);

            if (in_array(500, $reports)) {
                return response()->json([
                    'success' => false,
                    'message' => "Data answer not found",
                ], 500);
            }

            $pdf = Pdf::loadView('report.IA.report', ['reports' => $reports, 'user' => $user])->setPaper('a4', 'landscape');
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "failed to download report IA " . $e->getMessage() . ' Line ' . $e->getLine()
            ], 500);
        }


        if ($is_preview) {
            return $pdf->stream('Personalized Assessment Report - ' . $user->full_name . '.pdf', array("Attachment" => false));
            exit(0);
        }
        return $pdf->download('Personalized Assessment Report - ' . $user->full_name . '.pdf');
    }

    protected function calcPercentage($category, $point)
    {
        $maxPoint = 25;
        $percentage = 0;
        if ($point == 0 || $point == null) {
            $point = 0;
        } else {

            if ($point >= $maxPoint) {
                $percentage = 100;
            } else {
                $percentage = ($point / $maxPoint) * 100;
            }
        }

        return $percentage;
    }

    protected function checkReport($user_id)
    {
        // (new LoggerController)->accessing_warning('check report');

        $categories = Category::where('id', '<', 5)->get();

        foreach ($categories as $category) {
            $userPoints = UserPoint::where('user_id', $user_id)->whereHas('question', function ($query) use ($category) {
                $query->where('category_id', $category->id);
            })->get();

            if (count($userPoints) >= 0) {
                switch ($category->id) {
                    case 1:
                        $major = Answer::with('option')->where('user_id', $user_id)->where('sub_question_id', 1)->get();
                        $country = Answer::with('option')->where('user_id', $user_id)->where('question_id', 6)->get();
                        $university = Answer::where('user_id', $user_id)->where('question_id', 7)->get();
                        $result[1]['major'] = implode(', ', $major->pluck('option.option_answer')->toArray());
                        $result[1]['country'] = implode(', ', $country->pluck('option.option_answer')->toArray());
                        $result[1]['university'] = implode(', ', $university->pluck('answer_descriptive')->toArray());
                        $result[1]['is_surpass'] = $userPoints->sum('point') >= 20 ? true : false;
                        $result[1][1] = $userPoints->where('sub_question_id', 1)->sum('point') < 2 ? true : false;
                        $result[1][2] = $userPoints->where('question_id', 2)->sum('point') < 5 ? true : false;
                        $result[1][3] = $userPoints->where('question_id', 5)->sum('point') < 3 ? true : false;
                        $result[1][4] = $userPoints->where('question_id', 6)->sum('point') < 1 ? true : false;
                        break;

                    case 2:
                        $result[2]['is_surpass'] = $userPoints->sum('point') >= 18 ? true : false;
                        $result[2][1] = $userPoints->where('sub_question_id', 5)->sum('point') <= 1 ? true : false;
                        $result[2][2] = $userPoints->where('sub_question_id', 6)->sum('point') <= 1 ? true : false;
                        $result[2][3] = $userPoints->where('sub_question_id', 7)->sum('point') <= 2 ? true : false;
                        $result[2][4] = $userPoints->where('sub_question_id', 8)->sum('point') <= 1 ? true : false;
                        $result[2][5] = $userPoints->where('sub_question_id', 9)->sum('point') <= 2 ? true : false;
                        $result[2][6] = $userPoints->where('sub_question_id', 10)->sum('point') < 1 ? true : false;
                        $result[2][7] = $userPoints->where('question_id', 9)->sum('point') < 1 ? true : false;
                        $result[2][8] = $userPoints->where('question_id', 10)->sum('point') < 1 ? true : false;
                        break;

                    case 3:
                        $result[3]['is_surpass'] = $userPoints->sum('point') >= 18 ? true : false;
                        $result[3][1] = $userPoints->where('question_id', 14)->avg('point') == 1 || $userPoints->where('question_id', 14)->sum('point') == 0 ? true : false;
                        $result[3][2] = true;
                        break;

                    case 4:
                        $result[4]['is_surpass'] = false;
                        $result[4][1] = $userPoints->whereIn('question_id', [18, 19])->avg('point')  <= 3 ? true : false;
                        $result[4][2] = $userPoints->where('question_id', 20)->sum('point')  <= 5 ? true : false;
                }
            } else {
                $result[$category->id] = 500;
            }
        }


        return $result;
    }

    public function getReportQuest(Request $request)
    {
        $identifier = $request->user;
        $is_uuid = false;

        # check identifier is id or uuid
        if (preg_match("/[a-z]/i", $identifier)) {
            $is_uuid = true;
        }

        $validator = Validator::make($request->route()->parameters(), [
            'user' => [
                'required',
                function ($q) use ($is_uuid) {
                    if ($is_uuid) {
                        Rule::exists('users', 'uuid_crm');
                    } else {
                        Rule::exists('users', 'id');
                    }
                }
            ]
        ]);

        if ($validator->fails())
            return response()->json(['error' => $validator->errors()->all()]);


        try {
            // $user = auth()->guard('api')->user();

            if ($is_uuid) {
                $user = User::where('uuid_crm', $identifier)->first();
            } else {
                $user = User::find($request->user);
            }


            $reports = $this->checkReportQuest($user->id);
            // $reports[1][1] = false;
            // $reports[1][2] = true;
            // $reports[2][1] = false;
            // $reports[2][2] = true;
            // $reports[3][1] = false;
            // $reports[3][2] = true;
            // $reports[4][1] = false;
            // $reports[4][2] = true;
            // $reports['checkListQuest']['Exploration'] = true;
            // $reports['checkListQuest']['Profile Building'] = true;
            // $reports['checkListQuest']['Academic Profiling'] = true;
            // $reports['checkListQuest']['Writing'] = true;
            // $reports[1]['onet'][0]['Realistic'] = 40;
            // $reports[1]['onet'][1]['Investigative'] = 35;
            // $reports[1]['onet'][2]['Artistic'] = 30;
            // $reports[1]['onet'][3]['Social'] = 20;
            // $reports[1]['onet'][4]['Enterprising'] = 10;
            // $reports[1]['onet'][5]['Conventional'] = 10;
            // $reports[3]['subject_selection'] = 'Jawaban';

            if (in_array(500, $reports)) {
                return response()->json([
                    'success' => false,
                    'message' => "Data answer not found",
                ], 500);
            }

            $pdf = Pdf::loadView('report.Quest.report', ['reports' => $reports, 'user' => $user]);

            // $pdf = Pdf::loadView('report.IA.report', ['reports' => $reports, 'user' => $user]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "failed to download report Quest " . $e->getMessage() . ' Line ' . $e->getLine()
            ], 500);
        }


        // return view('report.Quest.report', ['reports' => $reports, 'user' => $user]);
        // return $pdf->stream('report.pdf', array("Attachment" => false));
        // exit(0);
        return $pdf->download('Activity Report - ' . $user->full_name . '.pdf');
    }


    protected function checkReportQuest($user_id)
    {

        $result['checkListQuest'] = $this->answerRepository->checklistQuest($user_id);

        $categories = Category::where('id', '>', 4)->get();
        foreach ($categories as $category) {
            $userPoints = UserPoint::where('user_id', $user_id)->whereHas('question', function ($query) use ($category) {
                $query->where('category_id', $category->id);
            })->get();

            if (count($userPoints) >= 0) {
                switch ($category->id) {
                    case 5:
                        $onet = Answer::with('option')->where('user_id', $user_id)->where('question_id', 21)->orderBy('score', 'DESC')->get();
                        $b = $onet->map(function ($value) {
                            if (isset($value->option)) {
                                return [
                                    $value->option->option_answer => $value->score
                                ];
                            } else {
                                return null;
                            }
                        });
                        $result[1]['onet'] = $b;

                        $result[1][1] = $userPoints->where('question_id', 21)->sum('point') == 2 ? true : false;
                        $result[1][2] = $userPoints->where('question_id', 22)->sum('point') == 2 ? true : false;
                        break;

                    case 6:
                        $result[2][1] = $userPoints->where('question_id', 23)->sum('point') == 1 ? true : false;
                        $result[2][2] = $userPoints->where('question_id', 24)->sum('point') == 1 ? true : false;
                        break;

                    case 7:
                        $subject_selection = Answer::where('user_id', $user_id)->where('question_id', 26)->first();
                        $result[3]['subject_selection'] = isset($subject_selection) ? $subject_selection->answer_descriptive : '';

                        $result[3][1] = $userPoints->where('question_id', 25)->sum('point') == 1 ? true : false;
                        $result[3][2] = $userPoints->where('question_id', 26)->sum('point') == 1 ? true : false;
                        break;

                    case 8:
                        $result[4][1] = $userPoints->where('question_id', 27)->sum('point') == 1 ? true : false;
                        $result[4][2] = $userPoints->where('question_id', 28)->sum('point') == 1 ? true : false;
                }
            } else {
                $result[$category->id] = 500;
            }
        }

        return $result;
    }

    public function getReportSummary(Request $request)
    {
        $identifier = $request->user;
        $is_uuid = false;
        $is_preview = $request->get('is_preview');

        # check identifier is id or uuid
        if (preg_match("/[a-z]/i", $identifier)) {
            $is_uuid = true;
        }

        $validator = Validator::make($request->route()->parameters(), [
            'user' => [
                'required',
                function ($q) use ($is_uuid) {
                    if ($is_uuid) {
                        Rule::exists('users', 'uuid_crm');
                    } else {
                        Rule::exists('users', 'id');
                    }
                }
            ]
        ]);

        if ($validator->fails())
            return response()->json(['error' => $validator->errors()->all()]);


        try {
            if ($is_uuid) {
                $user = User::where('uuid_crm', $identifier)->first();
            } else {
                $user = User::find($request->user);
            }

            $jsonAnswers = app('App\Http\Controllers\UserController')->show($user->uuid);
            $userAnswers = json_decode($jsonAnswers->content(), true);

            $pdf = Pdf::loadView('report.IA.summary', ['userAnswers' => $userAnswers['data']['IA']]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "failed to download report summary " . $e->getMessage() . ' Line ' . $e->getLine()
            ], 500);
        }

        // return view('report.IA.summary', ['userAnswers' => $userAnswers['data']['IA']]);
        // return $pdf->stream('report.pdf', array("Attachment" => false));
        // exit(0);
        if ($is_preview) {
            return $pdf->stream('Answer - ' . $user->full_name . '.pdf', array("Attachment" => false));
            exit(0);
        }

        return $pdf->download('Answer - ' . $user->full_name . '.pdf');
    }

    public function calcPoint($user_id)
    {
        $categories = Category::where('id', '<', 5)->get();
        foreach ($categories as $category) {
            $userPoints = UserPoint::where('user_id', $user_id)->whereHas('question', function ($query) use ($category) {
                $query->where('category_id', $category->id);
            })->get();

            $reports['score'][$category->name] = $this->calcPercentage($category, $userPoints->sum('point'));
        }

        $totalPercentage = 0;
        foreach ($reports['score'] as $key => $value) {
            $totalPercentage += $value;
        }

        $reports['score']['total'] = $totalPercentage == 0 || $totalPercentage == null ? 0 : round($totalPercentage / 4);

        return $reports;
    }
}
