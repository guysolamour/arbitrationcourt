<?php

namespace App\Http\Controllers\Front\Dashboard;

use App\Models\Question;
use Guysolamour\Administrable\Http\Controllers\BaseController;

class QuizController extends BaseController
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = Question::get();

        return front_view('dashboard.quiz.index', compact('questions'));
    }
}

