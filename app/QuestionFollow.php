<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class QuestionFollow extends Model
{
    protected $fillable = ['user_id', 'question_id'];

    public function questions()
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }
}
