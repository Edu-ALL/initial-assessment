<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = [
            [ #21
                'id' => 21,
                'category_id' => 5,
                'title' => 'Take the 5 minute ONE*T test to find out which jobs would fit you!',
                'description' => NULL,
                'question_type' => 'optional',
                'answer_type' => 'both',
                'point_type' => 'sub_question',
                'total_point' => 2,
                'minimum_answer' => 1,
                'maximum_answer' => 6
            ],
            [ #22
                'id' => 22,
                'category_id' => 5,
                'title' => 'Get to understand more about your dreams! Participate in a sharing session!Take the 5 minute ONE*T test to find out which jobs would fit you!',
                'description' => NULL,
                'question_type' => 'optional',
                'answer_type' => 'both',
                'point_type' => 'sub_question',
                'total_point' => 2,
                'minimum_answer' => 1,
                'maximum_answer' => 7
            ],
            [ #23
                'id' => 23,
                'category_id' => 6,
                'title' => 'Visit an NGO booth and be inspired to help out (encourage NGO to also create a small activity)',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'both',
                'point_type' => 'sub_question',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 4
            ],
            [ #24
                'id' => 24,
                'category_id' => 6,
                'title' => 'Participate in STEM+ activities to gauge what interests you!',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'both',
                'point_type' => 'sub_question',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 4
            ],
            [ #25
                'id' => 25,
                'category_id' => 7,
                'title' => 'Take a short SAT/IELTS/TOEFL diagnostic test to know what to improve!',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'both',
                'point_type' => 'score',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 3
            ],
            [ #26
                'id' => 26,
                'category_id' => 7,
                'title' => 'What major are you planning to go to based on your consultation and your subject selection?',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'description',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [ #27
                'id' => 27,
                'category_id' => 8,
                'title' => 'Compare the US and UK/Asia essays',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'description',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [ #28
                'id' => 28,
                'category_id' => 8,
                'title' => 'Compare the AI and handmade essays',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'description',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 2
            ],


            [ #29
                'id' => 29,
                'category_id' => 9,
                'title' => 'Tell us what booth you visited!',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'description',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],

        ];

        DB::table('questions')->insert($seeds);
    }
}
