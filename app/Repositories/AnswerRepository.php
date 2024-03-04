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
        $old_ids = $question_ids = [];
        $new_answer = [];

        foreach ($answerDetails as $answer) {
            $question_ids[] = $answer['question_id'];

            if ($answer['is_answer']) {
                $new_answer[$answer['id']] = ['answer_descriptive' => $answer['answer_descriptive']];
            }
        }

        $old_answers = $user->answers()->whereIn('question_id', $question_ids)->get();

        foreach ($old_answers as $old_answer) {
            $old_ids[] = $old_answer->id;
        }

        $user->answers()->detach($old_ids);

        $user->answers()->attach($new_answer);
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
