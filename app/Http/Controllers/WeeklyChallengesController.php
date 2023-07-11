<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Score;
use App\Models\User;
use App\Models\Subject;
use App\Models\Challenge;
use App\Models\Week;
use Auth;
use Carbon\Carbon;


class WeeklyChallengesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['weekly.challenge', 'challenge.attempt'])->only('getChallengeQuestions');
    }

    
    public function getChallengeQuestions()
    {        
        $last_week = Score::where('user_id', Auth::user()->id)->orderBy('week_id', 'DESC')->first();
        $current_week_id =  $last_week->week_id + 1;

        $questions = Week::find($current_week_id)->questions;

        $high_score = Score::where('created_at', '>=', Carbon::now()->subDay())->max('score');
        $total_challengers = Score::select('user_id')->where('created_at', '>=', Carbon::now()->subDay())->distinct()->get()->count();

        $user_score = Score::whereDate('created_at', '>=', Carbon::now()->startOfWeek()->format('Y-m-d H:i:s'))
                                    ->whereDate('created_at', '<=', Carbon::now()->endOfWeek()->format('Y-m-d H:i:s'))
                                    ->where('user_id', auth()->user()->id);

        $quiz_time = 0;
        $quiz_points = 0;

        foreach($questions as $question)
        {
            $quiz_time += $question->duration;
            $quiz_points += $question->points;
        }
        // if ($user_score->exists())
        // {
        //     $user_can_take_challenge = False;

        //     $last_week_id = $user_score->max('week_id');
        //     $current_week_id = $last_week_id;

        // } else {
        //     $user_can_take_challenge = True;
        //     $last_week_id = (Score::max('week_id') != null) ? Score::max('week_id') : 0;
        //     $current_week_id = $last_week_id;
        // }

        return view('weekly-challenge', compact('questions', 'current_week_id', 'high_score', 'total_challengers', 'quiz_points', 'quiz_time'));
    }

    // public function renderChallenge()
    // {
    //     $last_week_id = Score::max('week_id');

    //     // verify if user can take test
    //     $can_take_challenge = True;

    //     $user_current_week_id = Score::whereDate('created_at', '>=', Carbon::now()->startOfWeek()->format('Y-m-d H:i:s'))
    //     ->whereDate('created_at', '<=', Carbon::now()->endOfWeek()->format('Y-m-d H:i:s'))
    //     ->where('user_id', auth()->user()->id)
    //     ->max('week_id'); 
        
    //     if($user_current_week_id == $last_week_id)
    //     {
    //         $can_take_challenge = False;
    //     }

    //     $questions = Question::where('subject_id', 2)->inRandomOrder()->limit(5)->get();
    //     // $questions = [];

    //     // $max_questions = 100;

    //     // $sub_quest_num = ['biology' => 40, 
    //     // 'chemistry' => 20,
    //     //  'physics' => 20, 
    //     // 'general_knowledge' => 10, 
    //     // 'french' => 10
    //     //     ];

    //     // $subject = ['biology', 'chemistry', 'physics', 'general_knowledge', 'french'];

    //     //     // return dd(count($subject));

    //     // for($i = 0; $i < count($subject); $i++)
    //     // {
    //     //     $question = array(Question::where('subject', $subject[$i])->inRandomOrder()->limit($sub_quest_num[$subject[$i]])->get());

    //     //     $questions = array_merge([],$question);
            
    //     //     // return dd($questions);
    //     // }
        
    //     // Render challenge only on saturdays

    //     if (date('D') == 'Sat')
    //     {
    //         return view('weekly-challenge', compact('questions', 'last_week_id','can_take_challenge'));
    //     } else{
    //         abort(403, 'Medxam Challenge is available on Saturdays only'); 
    //     }

        
    // }

    public function postScore(Request $request) {   

        $chal_score = new Score;
        $user_score = Score::whereDate('created_at', '>=', Carbon::now()->startOfWeek()->format('Y-m-d H:i:s'))
                                    ->whereDate('created_at', '<=', Carbon::now()->endOfWeek()->format('Y-m-d H:i:s'))
                                    ->where('user_id', auth()->user()->id);
        if($user_score->exists())
        {
            $chal_score->week_id = $request->week_id + 1;
        } else {
            $chal_score->week_id = $request->week_id;
        }
        $chal_score->user_id = $request->user_id;
        $chal_score->score = $request->user_score;

        $chal_score->save();
        return response()->json('success', 201);
    }

    public function leadersBoard()
    {
        $current_week_id = (Score::max('week_id') != null) ? Score::max('week_id') : 1 ;

        // $user_scores = Score::where('week_id', $current_week_id)->orderBy('score', 'desc')->get();
        $user_scores = Score::where('created_at', '>=', Carbon::now()->subDay())->get();

        return view('leadersboard', compact('user_scores', 'current_week_id'));
    }

    public function postleadersBoard(Request $request)
    {
        return redirect()->back()->with($current_week_id);
    }
}
