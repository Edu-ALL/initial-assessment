<?php

namespace App\Interfaces;

interface QuestionRepositoryInterface
{
    public function getQuestion($category, $user);
}
