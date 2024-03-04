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
                'question_id' => 1,
                'title' => 'Academic (general majors)',
                'description' => NULL,
                'question_type' => 'mandatory',
                'answer_type' => 'option',
                'total_point' => 3,
                'minimum_answer' => 1,
                'maximum_answer' => 3
            ],
            [
                'question_id' => 1,
                'title' => 'Non-academic',
                'description' => NULL,
                'question_type' => 'mandatory',
                'answer_type' => 'option',
                'total_point' => 3,
                'minimum_answer' => 1,
                'maximum_answer' => 3
            ]
        ];

        DB::table('sub_questions')->insert($seeds);
    }
}
