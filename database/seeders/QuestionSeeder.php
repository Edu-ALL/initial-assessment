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
            [
                'category_id' => 1,
                'title' => 'What are your current interests?',
                'description' => NULL,
                'question_type' => 'mandatory',
                'answer_type' => 'option',
                'total_point' => 3,
                'minimum_answer' => 1,
                'maximum_answer' => 6
            ]
        ];

        DB::table('questions')->insert($seeds);
    }
}
