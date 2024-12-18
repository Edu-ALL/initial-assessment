<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

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
        'uuid_crm',
        'ticket_id',
        'full_name',
        'email',
        'phone_number',
        'state',
        'city',
        'address',
        'school',
        'grade',
        'destination',
        'is_vip',
        'took_ia',
        'took_quest',
        'type',
        'password',
    ];

    protected $hidden = [
        'password'
    ];

    public $timestamps = false;


    public function answers()
    {
        return $this->hasMany(Answer::class, 'user_id', 'id');
    }

    public function answers_many()
    {
        return $this->belongsToMany(Option::class, 'user_question_answers', 'user_id', 'answer_id');
    }

    public function question_many()
    {
        return $this->belongsToMany(Question::class, 'user_question_answers', 'user_id', 'answer_id');
    }

    public function sub_question_many()
    {
        return $this->belongsToMany(SubQuestion::class, 'user_question_answers', 'user_id', 'answer_id');
    }
}
