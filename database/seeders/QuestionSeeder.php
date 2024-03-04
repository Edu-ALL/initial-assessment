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
                'category_id' => 1,
                'title' => 'What are your current interests?',
                'description' => NULL,
                'question_type' => 'mandatory',
                'answer_type' => 'option',
                'total_point' => 3,
                'minimum_answer' => 1,
                'maximum_answer' => 6
            ],
            [ #2
                'category_id' => 1,
                'title' => 'What is your daily schedule?',
                'description' => NULL,
                'question_type' => 'mandatory',
                'answer_type' => 'option',
                'total_point' => 14,
                'minimum_answer' => 1,
                'maximum_answer' => 8
            ],
            [ #3
                'category_id' => 1,
                'title' => 'What do you identify as your strengths?',
                'description' => 'can pick more than one',
                'question_type' => 'mandatory',
                'answer_type' => 'option',
                'total_point' => 0,
                'minimum_answer' => 1,
                'maximum_answer' => 9
            ],
            [ #4
                'category_id' => 1,
                'title' => 'What do you identify as your weaknesses?',
                'description' => 'can pick more than one',
                'question_type' => 'mandatory',
                'answer_type' => 'option',
                'total_point' => 0,
                'minimum_answer' => 1,
                'maximum_answer' => 9
            ],
            [ #5
                'category_id' => 1,
                'title' => 'What are your goals?',
                'description' => null,
                'question_type' => 'mandatory',
                'answer_type' => 'description',
                'total_point' => 6,
                'minimum_answer' => 1,
                'maximum_answer' => 2
            ],
            [ #6
                'category_id' => 1,
                'title' => 'Where is your dream country to study in?',
                'description' => 'can pick more than one',
                'question_type' => 'optional',
                'answer_type' => 'option',
                'total_point' => 6,
                'minimum_answer' => 1,
                'maximum_answer' => 7
            ],
            [ #7
                'category_id' => 1,
                'title' => 'What is your dream university?',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
        ];

        DB::table('questions')->insert($seeds);
    }
}
