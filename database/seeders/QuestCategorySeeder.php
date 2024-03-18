<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = [
            [
                'name' => 'Exploration',
                'description' => 'Develop your career plan and decide what is best for your future!'
            ],
            [
                'name' => 'Profile Building',
                'description' => 'Set the stage for your success beyond high school and understand how to stand out in a competitive landscape!'
            ],
            [
                'name' => 'Academic Profiling',
                'description' => 'Understand better what academic profile will suit your intended major!'
            ],
            [
                'name' => 'Writing',
                'description' => 'Find out what essay can get you accepted into exceptional universities!'
            ],
            [
                'name' => 'Sponsor (fun quest)',
                'description' => 'Just like the saying “work hard, play hard”, take time and refresh at our collaborator booths outside!'
            ],
        ];

        DB::table('category')->insert($seeds);
    }
}
