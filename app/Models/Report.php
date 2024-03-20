<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category_id',
        'surpass',
        'heading_improvement',
    ];

    protected $table = 'report';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function improvement_reports()
    {
        return $this->hasMany(ImprovementReport::class, 'report_id', 'id');
    }
}
