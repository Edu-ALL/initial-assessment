<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BulkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            QuestionSeeder::class,
            QuestQuestionSeeder::class,
            SubQuestionSeeder::class,
            QuestSubQuestionSeeder::class,
            OptionSeeder::class,
            QuestOptionSeeder::class,
        ]);
    }
}
