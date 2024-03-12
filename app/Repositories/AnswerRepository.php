<?php

namespace App\Repositories;

use App\Interfaces\AnswerRepositoryInterface;
use App\Models\Answer;
use App\Models\Option;
use App\Models\UserClient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AnswerRepository implements AnswerRepositoryInterface
{
    public function syncAnswer($user, $collectionAnswers)
    {
        $old_ids = $question_ids = [];
        $new_answer = [];

        foreach ($collectionAnswers->unique('question_id') as $answer) {
            $question_ids[] = $answer['question_id'];



            // $new_answer[$answer['id']] = ['answer_descriptive' => $answer['answer_descriptive']];
        }

        foreach ($collectionAnswers as $answer) {
            if ($answer['id'] != null) {
                $new_answer[] = [
                    'user_id' => $user->id,
                    'answer_id' => $answer['id'],
                    'question_id' => $answer['question_id'],
                    'sub_question_id' => $answer['sub_question_id'],
                    'answer_descriptive' => null
                ];
            } else {
                $new_answer[] = [
                    'user_id' => $user->id,
                    'answer_id' => null,
                    'question_id' => $answer['question_id'],
                    'sub_question_id' => $answer['sub_question_id'],
                    'answer_descriptive' => $answer['answer_descriptive']
                ];
            }
        }

        // return $new_answer;

        count($question_ids) > 0 ? Answer::where('user_id', $user->id)->whereIn('question_id', $question_ids)->delete() : null;
        // $old_answers = $user->answers()->whereIn('question_id', $question_ids)->get();

        return Answer::insert($new_answer);
        // $user->answers()->attach($new_answer);
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
