<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswerRequest;
use Auth;
use App\Repositories\AnswerRepository;

class AnswersController extends Controller
{
    protected $answerRepository;

    public function __construct(AnswerRepository $answerRepository)
    {   
        return $this->answerRepository = $answerRepository;
    }

    public function store(StoreAnswerRequest $request, $questionId)
    {
        $data = [
            'user_id' => Auth::id(),
            'body' => $request->input('body'),
            'question_id' => $questionId,
        ];
        
        $answer = $this->answerRepository->create($data);

        $answer->question()->increment('answers_count');

        return back();
        
    }
}
