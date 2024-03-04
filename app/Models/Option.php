<?php

namespace App\Models;

use App\Models\Pivot\Answer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'sub_question_id',
        'title_of_answer',
        'option_answer',
        'point'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public function sub_question()
    {
        return $this->belongsTo(SubQuestion::class, 'sub_question_id', 'id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_question_answer', 'answer_id', 'user_id')->using(Answer::class);
    }
}
