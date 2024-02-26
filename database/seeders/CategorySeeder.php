<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = [
            [
                'name' => 'Exploration',
                'description' => '<b>How well have you explored yourself?</b> This area aims to understand your personality, values, interests, and skills/aptitudes that will help you develop your career plan and decide what is best for your future!'
            ],
            [
                'name' => 'Profile Building',
                'description' => '<b>Let’s see how many activities you’ve joined!</b> This area aims to educate you on the importance of building your unique strengths and accumulating experiences, making you stand out in a competitive landscape and setting the stage for your success beyond high school!'
            ],
            [
                'name' => 'Academic',
                'description' => '<b>What subjects will be beneficial for your intended major?</b> This area aims to understand better what academic profile you will need when applying to university, as they measure your understanding and analytical skill in specific subjects such as language, mathematics, science, social science, etc.'
            ],
            [
                'name' => 'Writing',
                'description' => '<b>How well can you explain yourself through writing?</b> This area aims to prepare you on what will be expected of your university application essays, as they are the one way you get to show the university who you are beyond your academics—what your interests are, what your personality is like, and why you\'re a great fit for them.'
            ],
        ];

        DB::table('category')->insert($seeds);
    }
}
