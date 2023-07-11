<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizScore;
use App\Models\Question;
use App\Models\Team;
use App\Models\TeamInvitation;
use App\Models\WeeklyChallenge;
use Carbon\Carbon;
use Auth;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('profile')->only('dashboard');
    }


    public function dashboard()
    {
        $quizzes = Quiz::all();
        $questions = Question::all();
        $participants = WeeklyChallenge::select('user_id')->distinct();
        $scheduled_quizzes = Quiz::where('team_id', Auth::user()->current_team_id)
                                  ->where('attempts_permitted', 1)
                                  ->where('created_at', '>=', Carbon::now()->subDays(3))->get(); // fetch only evaluations that are 3 days old
        $team = Team::find(Auth::user()->current_team_id);
        $invitations = TeamInvitation::where('email', Auth::user()->email)->get();

        $scores = QuizScore::with('quiz')->where('user_id', Auth::user()->id)->get();
        $result = [['quiz', 'score']];

        foreach ($scores as $key=>$value) {
            $result[++$key] = [$value->quiz->title, (int)(($value->score / $value->max_quiz_score) * 100)];
        }
        // dd($result);
        $result = json_encode($result);
        return view('dashboard', compact('quizzes','questions', 'participants', 'scheduled_quizzes', 'team', 'result', 'invitations'));
    }
}
