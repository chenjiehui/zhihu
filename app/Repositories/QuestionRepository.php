<?php

namespace App\Repositories;

use App\Question;

class QuestionRepository
{
    public function getQuestionById($id)
    {
        return $question = Question::find($id);
    }

    public function create(array $data)
    {
        return Question::create($data);
    }

    public function getAllQuestions()
    {
        return Question::published()->latest('updated_at')->with('user')->get();
    }

}
