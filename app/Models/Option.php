<?php

namespace App\Models;

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
        return $this->belongsTo(Question::class, 'category_id', 'id');
    }

    public function sub_question()
    {
        return $this->belongsTo(SubQuestion::class, 'sub_question_id', 'id');
    }
}
