<?php

namespace App\Models\Pivot;

use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Answer extends Pivot
{
    use HasFactory;

    // public $timestamps = false;
    protected $table = 'user_question_answers';

    protected $fillable = [
        'user_id',
        'answer_id',
        'answer_descriptive',
        'point',
    ];
}
