<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Pivot\Answer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'ticket_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
    ];

    // public function answers()
    // {
    //     return $this->belongsToMany(Option::class, 'user_question_answers', 'user_id', 'answer_id')->using(Answer::class)->withPivot('answer_descriptive')->withTimestamps();
    // }
}
