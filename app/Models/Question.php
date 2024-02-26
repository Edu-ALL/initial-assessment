<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'question_type',
        'answer_type',
        'total_point',
        'minimum_answer',
        'maximum_answer'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function sub_questions()
    {
        return $this->hasMany(SubQuestion::class, 'question_id', 'id');
    }

    public function options()
    {
        return $this->hasMany(Option::class, 'category_id', 'id');
    }
}
