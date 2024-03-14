<?php

namespace App\Interfaces;

interface QuestionRepositoryInterface
{
    public function getOptionOnly($category_id);
    public function getQuestionOnly($category_id);
    public function getQuestion($category, $user);
    public function getQuestionById($question_id);
    public function getSubQuestionById($sub_question_id);
    public function getOptionByCurriculum($curriculum_id);
}
