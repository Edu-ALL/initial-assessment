<?php

namespace App\Repositories;

use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Category;
use App\Models\Option;
use App\Models\Question;
use App\Models\UserClient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class QuestionRepository implements QuestionRepositoryInterface
{
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
                'description' => $question->description,
                'answer_type' => $question->answer_type,
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
                        'category_id' => $sub_question->category_id,
                        'description' => $sub_question->description,
                        'answer_type' => $sub_question->answer_type,
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

                            if ($key = array_search($option->id, array_column($arrAnswer, 'answer_id')) !== false) {
                                $is_answer = true;
                            }

                            $format_options = [
                                'id' => $option->id,
                                'question_id' => $option->question_id,
                                'sub_question_id' => $option->sub_question_id,
                                'title_of_answer' => $option->title_of_answer,
                                'option_answer' => $option->option_answer,
                                'point' => $option->point,
                                'is_answer' => $is_answer,
                                'answer_descriptive' => $arrAnswer[$key]['answer_descriptive'],
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
}
