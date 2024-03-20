<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubImprovementReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'improvement_report_id',
        'improvement',
    ];

    protected $table = 'sub_improvement_report';

    public function improvement_report()
    {
        return $this->belongsTo(ImprovementReport::class, 'improvement_report_id', 'id');
    }
}
