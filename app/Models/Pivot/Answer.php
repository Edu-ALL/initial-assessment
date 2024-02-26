<?php

namespace App\Models\Pivot;

use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'user_question_answers';

    protected $fillable = [
        'user_id',
        'question_id',
        'answer_id',
        'answer_descriptive',
        'point'
    ];

    public function option()
    {
        return $this->belongsTo(Option::class, 'option_id', 'id');
    }
}
