<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Quiz;
use App\Models\Team;
use Auth;

class BookmarkController extends Controller
{

    public function index()
    {
        $user_bookmarks = Bookmark::where('user_id', auth()->user()->id)->with('quiz')->get();
        $current_team_id = Auth::user()->currentTeam->id;
        $team_users = Team::find($current_team_id);
        if($team_users->allUsers())
        {
            foreach($team_users->allUsers() as $user)
            $suggested_quizzes = Quiz::where('user_id', $user->id)->orderBy('number_of_likes', 'DESC')->limit(10)->get();
        }

        return view('bookmarks', compact('user_bookmarks', 'suggested_quizzes'));
    }

    public function addBookmark(Request $request)
    {
        $bookmark = new Bookmark;
        $bookmark->user_id = $request->user_id;
        $bookmark->quiz_id = $request->quiz_id;

        $bookmark->save();

        return response()->json(['success' => 'Quiz bookmarked']);
    }

    public function getBookmarkedQuizQuestions(Quiz $quiz)
    {
        $questions = Quiz::find($quiz->id)->questions;
        // dd($questions);

        return view('quiz-questions-detail', compact('questions', 'quiz'));
    }
}
