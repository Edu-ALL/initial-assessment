<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = [
            'uuid' => Str::uuid(),
            'ticket_id' => null,
            'full_name' => 'Admin IA',
            'email' => 'admin@edu-all.com',
            'phone_number' => fake()->phoneNumber(),
            'type' => 1,
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now(),
        ];

        DB::table('users')->insert($seeds);
    }
}
