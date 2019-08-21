<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FollowQuestionController extends Controller
{
    public function follow($questionId)
    {
        Auth::User()->followThis($questionId);

        return back(); 
    }
}
