<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestSubQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = [
            [
                'id' => 27,
                'question_id' => 21,
                'title' => 'Redirect/pop up to external website',
                'description' => NULL,
                'question_type' => 'optional',
                'answer_type' => 'option',
                'point_type' => 'option',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [
                'id' => 28,
                'question_id' => 21,
                'title' => 'Score',
                'description' => NULL,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'score',
                'total_point' => 2,
                'minimum_answer' => 1,
                'maximum_answer' => 6
            ],

            [
                'id' => 29,
                'question_id' => 22,
                'title' => 'Who they spoke to?',
                'description' => NULL,
                'question_type' => 'optional',
                'answer_type' => 'option',
                'point_type' => 'sub_question',
                'total_point' => 2,
                'minimum_answer' => 1,
                'maximum_answer' => 6
            ],
            [
                'id' => 30,
                'question_id' => 22,
                'title' => 'Reflect on what you just learned! Let us know what was the most valuable lesson you obtained from them?',
                'description' => NULL,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'description',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],

            [
                'id' => 31,
                'question_id' => 23,
                'title' => 'Which NGO representative did you meet?',
                'description' => NULL,
                'question_type' => 'optional',
                'answer_type' => 'option',
                'point_type' => 'description',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 3
            ],
            [
                'id' => 32,
                'question_id' => 23,
                'title' => 'How do you think you can use your skills and/or interests to contribute to their causes?',
                'description' => NULL,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'description',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],

            [
                'id' => 33,
                'question_id' => 24,
                'title' => 'What topic did you learn about in this area?',
                'description' => NULL,
                'question_type' => 'optional',
                'answer_type' => 'option',
                'point_type' => 'description',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [
                'id' => 34,
                'question_id' => 24,
                'title' => 'From your observation, what potential project can you think of?',
                'description' => NULL,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'description',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],

            [
                'id' => 35,
                'question_id' => 27,
                'title' => 'Tell us what makes both these essays different?',
                'description' => NULL,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'description',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],

            [
                'id' => 36,
                'question_id' => 28,
                'title' => 'Tell us what makes both these essays different?',
                'description' => NULL,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'description',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],

        ];

        DB::table('sub_questions')->insert($seeds);
    }
}
