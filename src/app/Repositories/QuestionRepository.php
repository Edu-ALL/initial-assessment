<?php

namespace App\Repositories;

use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Category;
use App\Models\Option;
use App\Models\Question;
use App\Models\SubQuestion;
use App\Models\UserClient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class QuestionRepository implements QuestionRepositoryInterface
{

    public function getOptionOnly($category_id)
    {

        $response = [];

        $questions = Question::where('category_id', $category_id)->get();
        foreach ($questions as $question) {
            if ($question->sub_questions()->count() > 0) {
                foreach ($question->sub_questions as $sub_question) {
                    if (count($option = Option::where('sub_question_id', $sub_question->id)->orderBy('option_answer', 'ASC')->get()) > 0) {
                        $mapping = $this->mappingOption($option);
                        $response['option' . $question->id . '-' . $sub_question->id] = $mapping;
                    }
                }
            } else {
                if (count($option = Option::where('question_id', $question->id)->orderBy('option_answer', 'ASC')->get()) > 0) {
                    $mapping = $this->mappingOption($option);
                    $response['option' . $question->id] = $mapping;
                }
            }
        }


        return $response;
    }


    public function getQuestion($category_id, $user)
    {
        $response = $arrAnswer = [];

        if ($user->answers()->count() > 0) {
            $answers = $user->answers()->get();
            foreach ($answers as $answer) {
                $arrAnswer[] = [
                    'answer_id' => $answer->pivot->answer_id,
                    'answer_descriptive' => $answer->pivot->answer_descriptive
                ];
            }
        }

        $question_withSQ = Question::has('sub_questions')->with(['sub_questions', 'sub_questions.options'])->get();
        $question_withoutSQ = Question::doesntHave('sub_questions')->with('options')->get();

        $questions = $question_withSQ->merge($question_withoutSQ);

        $newQuestion = $this->formatDataQuestion($questions, $arrAnswer);

        $category = Category::find($category_id);

        $response[$category->name] = $newQuestion->where('category_id', $category->id);

        return $response;
    }

    public function formatDataQuestion($questions, $arrAnswer)
    {

        $questions = $questions->map(function ($question) use ($arrAnswer) {
            $data = [
                'id' => $question->id,
                'category_id' => $question->category_id,
                'title' => $question->title,
                'description' => $question->description,
                'question_type' => $question->question_type,
                'answer_type' => $question->answer_type,
                'point_type' => $question->point_type,
                'total_point' => $question->total_point,
                'minimum_answer' => $question->minimum_answer,
                'maximum_answer' => $question->maximum_answer,
                'created_at' => $question->created_at,
            ];

            if ($question->sub_questions()->count() > 0) {
                $sub_questions = $question->sub_questions;
                $sub_questions = $sub_questions->map(function ($sub_question) use ($arrAnswer) {
                    $format_sub_question = [
                        'id' => $sub_question->id,
                        'question_id' => $sub_question->question_id,
                        'title' => $sub_question->title,
                        'description' => $sub_question->description,
                        'question_type' => $sub_question->question_type,
                        'answer_type' => $sub_question->answer_type,
                        'point_type' => $sub_question->point_type,
                        'total_point' => $sub_question->total_point,
                        'minimum_answer' => $sub_question->minimum_answer,
                        'maximum_answer' => $sub_question->maximum_answer,
                        'created_at' => $sub_question->created_at,
                    ];

                    if ($sub_question->options()->count() > 0) {
                        $options = $sub_question->options;
                        $options = $options->map(function ($option) use ($arrAnswer) {
                            $key = null;
                            $is_answer = false;

                            if (array_search($option->id, array_column($arrAnswer, 'answer_id')) !== false) {
                                $is_answer = true;
                                $key = array_search($option->id, array_column($arrAnswer, 'answer_id'));
                            }

                            $format_options = [
                                'id' => $option->id,
                                'question_id' => $option->question_id,
                                'sub_question_id' => $option->sub_question_id,
                                'title_of_answer' => $option->title_of_answer,
                                'option_answer' => $option->option_answer,
                                'point' => $option->point,
                                'is_answer' => $is_answer,
                                'answer_descriptive' => $key != null ? $arrAnswer[$key]['answer_descriptive'] : null,
                            ];

                            return $format_options;
                        });

                        $format_sub_question['options'] = $options;
                    }

                    return $format_sub_question;
                });
                $data['sub_question'] = $sub_questions;
            }

            return $data;
        });

        return $questions;
    }

    public function getQuestionById($question_id)
    {
        return Question::find($question_id);
    }

    public function getSubQuestionById($sub_question_id)
    {
        return SubQuestion::find($sub_question_id);
    }

    public function getOptionByCurriculum($curriculum_id)
    {

        $curriculum = null;

        switch ($curriculum_id) {
            case 122:
            case 123:
                $curriculum = 'IB';
                break;

            case 124:
            case 125:
                $curriculum = 'Cambridge';
                break;

            case 126:
                $curriculum = 'National';
                break;
        }
        $response['sub_option'] = Option::where('reference_to', $curriculum)->get();

        if ($curriculum == null)
            $response = null;

        return $response;
    }

    protected function mappingOption($options)
    {
        return $options->map(function ($opt) {
            return [
                'id' => $opt->id,
                'question_id' => $opt->question_id,
                'sub_question_id' => $opt->sub_question_id,
                'reference_to' => $opt->reference_to,
                'title_of_answer' => $opt->title_of_answer,
                'option_answer' => $opt->option_answer,
                'point' => $opt->point,
                'answer_descriptive' => $opt->answer_descriptive,
                'score' => $opt->score,
            ];
        });
    }
}
