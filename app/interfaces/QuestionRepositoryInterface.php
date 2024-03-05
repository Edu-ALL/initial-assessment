<?php

namespace App\Interfaces;

interface QuestionRepositoryInterface
{
    public function getQuestion($category, $user);
    public function getQuestionById($question_id);
    public function getSubQuestionById($sub_question_id);
}
