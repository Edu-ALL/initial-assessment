<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            DB::statement("ALTER TABLE questions MODIFY COLUMN point_type ENUM('option', 'question', 'sub_question', 'faculty', 'no_point', 'standard_test', 'description', 'slot', 'score', 'scale') NOT NULL");
        });

        Schema::table('sub_questions', function (Blueprint $table) {
            DB::statement("ALTER TABLE sub_questions MODIFY COLUMN point_type ENUM('option', 'question', 'sub_question', 'faculty', 'no_point', 'standard_test', 'description', 'slot', 'score', 'scale') NOT NULL");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            //
        });
    }
};
