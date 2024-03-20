<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('improvement_report', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('report_id');

            $table->integer('question_id');
            $table->foreign('question_id')->references('id')->on('questions')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('sub_question_id')->nullable();
            $table->foreign('sub_question_id')->references('id')->on('sub_questions')->onUpdate('cascade')->onDelete('cascade');

            $table->text('improvement')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('improvement_report');
    }
};
