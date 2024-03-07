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
                'id' => 4,
                'question_id' => 8,
                'title' => 'How many internships have you participated in?',
                'description' => 'Please state the duration of your internship.',
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'option',
                'total_point' => 2,
                'minimum_answer' => 1,
                'maximum_answer' => 2
            ],
            [
                'id' => 5,
                'question_id' => 8,
                'title' => 'How many volunteering opportunities have you joined?',
                'description' => null,
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
                'title' => 'How many school clubs have you done?',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'option',
                'total_point' => 2,
                'minimum_answer' => 1,
                'maximum_answer' => 4
            ],
            [
                'id' => 7,
                'question_id' => 8,
                'title' => 'How many out-of-school activities have you done?',
                'description' => '(e.g coding/robotic/ cooking classes)',
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'option',
                'total_point' => 4,
                'minimum_answer' => 1,
                'maximum_answer' => 4
            ],
            [
                'id' => 8,
                'question_id' => 8,
                'title' => 'How many summer/winter programs have you attended?',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'option',
                'total_point' => 2,
                'minimum_answer' => 1,
                'maximum_answer' => 2
            ],
            [
                'id' => 9,
                'question_id' => 9,
                'title' => 'If Yes',
                'description' => null,
                'question_type' => 'mandatory',
                'answer_type' => 'description',
                'point_type' => 'sub_question',
                'total_point' => 3.5,
                'minimum_answer' => 1,
                'maximum_answer' => 2
            ],
            [
                'id' => 10,
                'question_id' => 9,
                'title' => 'If No',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'no_point',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 2
            ],
            [
                'id' => 11,
                'question_id' => 10,
                'title' => 'If Yes',
                'description' => null,
                'question_type' => 'mandatory',
                'answer_type' => 'description',
                'point_type' => 'sub_question',
                'total_point' => 3.5,
                'minimum_answer' => 1,
                'maximum_answer' => 2
            ],
            [
                'id' => 12,
                'question_id' => 10,
                'title' => 'If No',
                'description' => null,
                'question_type' => 'optional',
                'answer_type' => 'description',
                'point_type' => 'no_point',
                'total_point' => 1,
                'minimum_answer' => 1,
                'maximum_answer' => 2
            ],
        ];

        DB::table('sub_questions')->insert($seeds);
    }
}
