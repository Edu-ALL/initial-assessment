<?php

namespace App\Repositories;

use App\Interfaces\AnswerRepositoryInterface;
use App\Models\Option;
use App\Models\UserClient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AnswerRepository implements AnswerRepositoryInterface
{
    public function syncAnswer($user, $answerDetails)
    {
        $key = array_keys($answerDetails);
        if ($answerDetails['is_checked']) {
            return $user->answers()->attach($answerDetails);
        } else if (!$answerDetails['is_checked']) {
            return $user->answers()->detach($answerDetails);
        }
    }

    public function responseAnswer($user, $answer_id)
    {
        $answer = $user->answers()->where('answer_id', $answer_id)->first();
        // $question = Option::with('question',  'sub_question')
        //     ->where('question_id', $answer->question_id)
        //     ->when($answer->sub_question_id != null, function ($q) use ($answer) {
        //         $q->where('sub_question_id', $answer->sub_question_id);
        //     })->get();

        $response = [
            'answer_id' => $answer->id,
            'option_answer' => $answer->option_answer,
            'title_of_answer' => $answer->title_of_answer,
            'point' => $answer->point
        ];

        return $response;
    }
}
