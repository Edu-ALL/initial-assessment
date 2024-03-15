<?php

namespace App\Repositories;

use App\Interfaces\AnswerRepositoryInterface;
use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use App\Models\UserClient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AnswerRepository implements AnswerRepositoryInterface
{
    public function syncAnswer($user, $category_id, $collectionAnswers)
    {
        $question_ids = $new_answer = [];

        $question_ids = Question::where('category_id', $category_id)->pluck('id');

        foreach ($collectionAnswers as $answer) {
            $answer_descirptive = $score = null;

            if (isset($answer['answer_descriptive'])) {
                if ($answer['answer_descriptive'] != '') {
                    $answer_descirptive = $answer['answer_descriptive'];
                }
            }

            if (isset($answer['score'])) {
                if ($answer['score'] != '') {
                    $score = $answer['score'];
                }
            }

            $new_answer[] = [
                'user_id' => $user->id,
                'answer_id' => $answer['id'],
                'question_id' => $answer['question_id'],
                'sub_question_id' => $answer['sub_question_id'],
                'answer_descriptive' => $answer_descirptive,
                'score' => $score,
            ];
        }


        count($question_ids) > 0 ? Answer::where('user_id', $user->id)->whereIn('question_id', $question_ids)->delete() : null;

        return Answer::insert($new_answer);
    }

    public function responseAnswer($user, $answer_id)
    {
        $answer = $user->answers()->get();
        // $question = Option::with('question',  'sub_question')
        //     ->where('question_id', $answer->question_id)
        //     ->when($answer->sub_question_id != null, function ($q) use ($answer) {
        //         $q->where('sub_question_id', $answer->sub_question_id);
        //     })->get();

        // $response = [
        //     'answer_id' => $answer->id,
        //     'option_answer' => $answer->option_answer,
        //     'title_of_answer' => $answer->title_of_answer,
        //     'point' => $answer->point
        // ];

        return $answer;
    }
}
