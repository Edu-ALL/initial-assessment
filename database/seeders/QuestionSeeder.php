<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = [
            [ #1
                'id' => 1,
                'category_id' => 1,
                'title' => 'What are your current interests?',
                'description' => NULL,
                'question_type' => 'mandatory',
                'answer_type' => 'option',
                'point_type' => 'faculty',
                'total_point' => 3,
                'minimum_answer' => 1,
                'maximum_answer' => 6
            ],
            [ #2
                'id' => 2,
                'category_id' => 1,
                'title' => 'What is your daily schedule?',
                'description' => NULL,
                'question_type' => 'mandatory',
                'answer_type' => 'option',
                'point_type' => 'option',
                'total_point' => 14,
                'minimum_answer' => 1,
                'maximum_answer' => 8
            ],
            [ #3
                'id' => 3,
                'category_id' => 1,
                'title' => 'What do you identify as your strengths?',
                'description' => 'can pick more than one',
                'question_type' => 'mandatory',
                'answer_type' => 'option',
                'point_type' => 'no_point',
                'total_point' => 0,
                'minimum_answer' => 1,
                'maximum_answer' => 9
            ],
            [ #4
                'id' => 4,
                'category_id' => 1,
                'title' => 'What do you identify as your weaknesses?',
                'description' => 'can pick more than one',
                'question_type' => 'mandatory',
                'answer_type' => 'option',
                'point_type' => 'option',
                'total_point' => 0,
                'minimum_answer' => 1,
                'maximum_answer' => 9
            ],
            [ #5
                'id' => 5,
                'category_id' => 1,
                'title' => 'What are your goals?',
                'description' => null,
                'question_type' => 'mandatory',
                'answer_type' => 'description',
                'point_type' => 'option',
                'total_point' => 6,
                'minimum_answer' => 1,
                'maximum_answer' => 2
            ],
            [ #6
                'id' => 6,
                'category_id' => 1,
                'title' => 'Where is your dream country to study in?',
                'description' => 'can pick more than one',
                'question_type' => 'optional',
                'answer_type' => 'option',
                'point_type' => 'question',
                'total_point' => 6,
                'minimum_answer' => 1,
                'maximum_answer' => 7
            ],
            [ #7
                'id' => 7,
                'category_id' => 1,
                'title' => 'What is your dream university?',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'option',
                'total_point' => 18,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],


            [ #8
                'id' => 8,
                'category_id' => 2,
                'title' => 'What activities have you done?',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'option',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 20
            ],
            [ #9
                'id' => 9,
                'category_id' => 2,
                'title' => 'Have you ever created a personal project?',
                'description' => "'A personal project combines your passion and the skills you've honed over the years, where you dedicate time and effort to achieve a goal, whether it's launching a business, writing a book, creating art, making a website, etc.",
                'question_type' => 'mandatory',
                'answer_type' => 'description',
                'point_type' => 'sub_question',
                'total_point' => 3.5,
                'minimum_answer' => 1,
                'maximum_answer' => 2
            ],
            [ #10
                'id' => 10,
                'category_id' => 2,
                'title' => 'Have you ever conducted a research project?',
                'description' => "A research project is a detailed study where you look closely at a specific topic, question, or problem to learn more about it. You gather information, analyze it, and share your findings, for example a journal or essay.",
                'question_type' => 'mandatory',
                'answer_type' => 'description',
                'point_type' => 'sub_question',
                'total_point' => 3.5,
                'minimum_answer' => 1,
                'maximum_answer' => 2
            ],
        ];

        DB::table('questions')->insert($seeds);
    }
}
