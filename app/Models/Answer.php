<?php

namespace App\Models;

use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    // public $timestamps = false;
    protected $table = 'user_question_answers';

    protected $fillable = [
        'user_id',
        'answer_id',
        'question_id',
        'sub_question_id',
        'answer_descriptive',
        'point',
        'score',
    ];

    public function option()
    {
        return $this->belongsTo(Option::class, 'answer_id', 'id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}
