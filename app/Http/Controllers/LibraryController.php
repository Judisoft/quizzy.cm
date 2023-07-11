<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Like;
use App\Models\Share;
use Auth;

class LibraryController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('subject')->where('user_id', Auth::user()->id)->with('subject')->orderBy('id', 'DESC')->get();
        $liked_quizzes = Like::where('user_id', Auth::user()->id)->with('quiz.subject')->orderBy('id', 'DESC')->get();
        $shared_quizzes = Share::where('receipient_id', Auth::user()->id)->with('quiz.subject')->orderBy('id', 'DESC')->get();

        return view('library', compact('quizzes', 'liked_quizzes', 'shared_quizzes'));
    }
}
