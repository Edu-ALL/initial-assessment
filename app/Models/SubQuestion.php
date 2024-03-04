<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'title',
        'description',
        'question_type',
        'answer_type',
        'total_point',
        'minimum_answer',
        'maximum_answer'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public function options()
    {
        return $this->hasMany(Option::class, 'sub_question_id', 'id');
    }
}
