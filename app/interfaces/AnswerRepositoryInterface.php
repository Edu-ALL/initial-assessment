<?php

namespace App\Interfaces;

interface AnswerRepositoryInterface
{
    public function syncAnswer($user, $answerDetails);
    public function responseAnswer($user, $answer_id);
}
