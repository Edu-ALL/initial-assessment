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
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('took_ia')->default(0)->after('phone_number');
            $table->boolean('is_vip')->default(false)->after('phone_number');
            $table->text('destination')->nullable()->after('phone_number');
            $table->string('grade')->nullable()->after('phone_number');
            $table->string('school')->nullable()->after('phone_number');
            $table->string('address')->nullable()->after('phone_number');
            $table->string('city')->nullable()->after('phone_number');
            $table->string('state')->nullable()->after('phone_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('took_ia');
            $table->dropColumn('is_vip');
            $table->dropColumn('destination');
            $table->dropColumn('grade');
            $table->dropColumn('school');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('state');
        });
    }
};
