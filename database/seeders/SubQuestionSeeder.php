<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = [
            [
                'id' => 1,
                'question_id' => 1,
                'title' => 'Academic (general majors)',
                'description' => NULL,
                'question_type' => 'mandatory',
                'answer_type' => 'option',
                'point_type' => 'faculty',
                'total_point' => 3,
                'minimum_answer' => 1,
                'maximum_answer' => 3
            ],
            [
                'id' => 2,
                'question_id' => 1,
                'title' => 'Non-academic',
                'description' => NULL,
                'question_type' => 'mandatory',
                'answer_type' => 'option',
                'point_type' => 'faculty',
                'total_point' => 3,
                'minimum_answer' => 1,
                'maximum_answer' => 3
            ],
            [
                'id' => 3,
                'question_id' => 5,
                'title' => 'Academic',
                'description' => NULL,
                'question_type' => 'optional',
                'answer_type' => 'option',
                'point_type' => 'sub_question',
                'total_point' => 3,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [
                'id' => 4,
                'question_id' => 5,
                'title' => 'Personal (for example your dream job)',
                'description' => NULL,
                'question_type' => 'optional',
                'answer_type' => 'option',
                'point_type' => 'sub_question',
                'total_point' => 3,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],


            [
                'id' => 5,
                'question_id' => 8,
                'title' => 'How many competitions have you won or participated in?',
                'description' => 'Please specify the level (international, national, school)',
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'option',
                'total_point' => 4,
                'minimum_answer' => 1,
                'maximum_answer' => 4
            ],
            [
                'id' => 6,
                'question_id' => 8,
                'title' => 'How many internships have you participated in?',
                'description' => 'Please state the duration of your internship.',
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'slot',
                'total_point' => 2,
                'minimum_answer' => 1,
                'maximum_answer' => 2
            ],
            [
                'id' => 7,
                'question_id' => 8,
                'title' => 'How many volunteering opportunities have you joined?',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'slot',
                'total_point' => 4,
                'minimum_answer' => 1,
                'maximum_answer' => 4
            ],
            [
                'id' => 8,
                'question_id' => 8,
                'title' => 'How many school clubs have you done?',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'slot',
                'total_point' => 2,
                'minimum_answer' => 1,
                'maximum_answer' => 4
            ],
            [
                'id' => 9,
                'question_id' => 8,
                'title' => 'How many out-of-school activities have you done?',
                'description' => '(e.g coding/robotic/ cooking classes)',
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'slot',
                'total_point' => 4,
                'minimum_answer' => 1,
                'maximum_answer' => 4
            ],
            [
                'id' => 10,
                'question_id' => 8,
                'title' => 'How many summer/winter programs have you attended?',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'slot',
                'total_point' => 2,
                'minimum_answer' => 1,
                'maximum_answer' => 2
            ],
            [
                'id' => 11,
                'question_id' => 9,
                'title' => 'In what field was your personal project in?',
                'description' => null,
                'question_type' => 'mandatory',
                'answer_type' => 'description',
                'point_type' => 'sub_question',
                'total_point' => 1.75,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [
                'id' => 12,
                'question_id' => 9,
                'title' => 'Please provide a brief description!',
                'description' => null,
                'question_type' => 'mandatory',
                'answer_type' => 'description',
                'point_type' => 'sub_question',
                'total_point' => 1.75,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [
                'id' => 13,
                'question_id' => 9,
                'title' => 'Are you interested in conducting one?',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'no_point',
                'total_point' => 0,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [
                'id' => 14,
                'question_id' => 9,
                'title' => 'If yes, in what topic do you want to develop a project?',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'no_point',
                'total_point' => 0,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [
                'id' => 15,
                'question_id' => 10,
                'title' => 'In what field was your research project in?',
                'description' => null,
                'question_type' => 'mandatory',
                'answer_type' => 'description',
                'point_type' => 'sub_question',
                'total_point' => 1.75,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [
                'id' => 16,
                'question_id' => 10,
                'title' => 'Please provide a brief description',
                'description' => null,
                'question_type' => 'mandatory',
                'answer_type' => 'description',
                'point_type' => 'sub_question',
                'total_point' => 1.75,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [
                'id' => 17,
                'question_id' => 10,
                'title' => 'Are you interested in conducting one?',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'no_point',
                'total_point' => 0,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [
                'id' => 18,
                'question_id' => 10,
                'title' => 'If yes, in what topic do you want to develop a project?',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'no_point',
                'total_point' => 0,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [
                'id' => 19,
                'question_id' => 13,
                'title' => "I don't know",
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'description',
                'total_point' => 6,
                'minimum_answer' => 1,
                'maximum_answer' => 2
            ],
            [
                'id' => 20,
                'question_id' => 13,
                'title' => "I know",
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'description',
                'total_point' => 12,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],

            [
                'id' => 21,
                'question_id' => 14,
                'title' => "IELTS",
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'standard_test',
                'total_point' => 4,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [
                'id' => 22,
                'question_id' => 14,
                'title' => "TOEFL",
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'standard_test',
                'total_point' => 4,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [
                'id' => 23,
                'question_id' => 14,
                'title' => "SAT",
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'standard_test',
                'total_point' => 4,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],

            [
                'id' => 24,
                'question_id' => 20,
                'title' => "Competitions",
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'description',
                'total_point' => 5,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [
                'id' => 25,
                'question_id' => 20,
                'title' => "Workshops",
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'description',
                'total_point' => 5,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
            [
                'id' => 26,
                'question_id' => 20,
                'title' => "Self-writing (journals, stories, etc.)",
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'description',
                'total_point' => 5,
                'minimum_answer' => 1,
                'maximum_answer' => 1
            ],
        ];

        DB::table('sub_questions')->insert($seeds);
    }
}
