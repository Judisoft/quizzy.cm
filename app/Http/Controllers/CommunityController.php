<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class CommunityController extends Controller
{
    public function community(Request $request)
    {
        $search = $request->input('search');
        $is_search = false;

        if ($search) {
            $quizzies = Quiz::where('title', 'LIKE', "%{$search}%")
                            ->orderBy('id', 'DESC')
                            ->with('questions', 'user')
                            ->paginate(25);
            $is_search = true;
        } else {
            $quizzies = Quiz::orderBy('id', 'DESC')->with('questions', 'user')->paginate(25);
        }
        $top_quizzes = Quiz::orderBy('views', 'DESC')->take(4)->get();
        
        return view('community', compact('quizzies', 'top_quizzes', 'is_search'));
    }
}
