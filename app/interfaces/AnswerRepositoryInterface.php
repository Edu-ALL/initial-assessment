<?php

namespace App\Interfaces;

interface AnswerRepositoryInterface
{
    public function syncAnswer($user, $category_id, $answerDetails);
}
