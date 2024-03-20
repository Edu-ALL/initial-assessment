<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImprovementReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'report_id',
        'question_id',
        'sub_question_id',
        'improvement',
    ];

    protected $table = 'improvement_report';

    public function reports()
    {
        return $this->belongsTo(Report::class, 'report_id', 'id');
    }

    public function sub_questions()
    {
        return $this->belongsTo(SubQuestion::class, 'question_id', 'id');
    }

    public function questions()
    {
        return $this->belongsTo(Question::class, 'sub_question_id', 'id');
    }

    public function sub_improvement_reports()
    {
        return $this->hasMany(SubImprovementReport::class, 'improvement_report_id', 'id');
    }
}
