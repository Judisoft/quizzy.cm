<?php

namespace App\Http\Controllers;

use App\Models\PerformanceAnalysis;
use Illuminate\Http\Request;
use Auth;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizScore;
use App\Models\User;
use App\Models\Like;

class AnalyticsController extends Controller
{
    public function analyseUsersContent()
    {
        $user_questions = Question::where('user_id', Auth::user()->id)->get();
        $auth_user_scores = QuizScore::where('user_id', Auth::user()->id)->with('quiz')->get();
        $user_quizzes = Quiz::where('user_id', Auth::user()->id)->get();
        $likes = Like::where('user_id', Auth::user()->id)->get();
        $quizzes = Quiz::where('user_id', Auth::user()->id)->get();
        $share_btn = \Share::currentPage('Quizzy')
                            ->facebook()
                            ->twitter()
                            ->linkedin()
                            ->telegram()
                            ->whatsapp()        
                            ->reddit();

        return view('analytics', compact('user_questions', 'user_quizzes', 'likes', 'quizzes', 'auth_user_scores', 'share_btn'));
    }

    public function getStats(Request $request)
    {
        $id = $request->quiz_id;

        $user_scores = QuizScore::where('quiz_id', $id)->with('user')->get();
        
        return response()->json($user_scores);
    }

    public function quizPerformanceAnalysis(Request $request)
    {
        $quiz_performance =  new PerformanceAnalysis();
        $quiz_performance->quiz_id = $request->quiz_id;
        $quiz_performance->user_id = $request->user_id;
        $quiz_performance->question_id = $request->question_id;
        $quiz_performance->answer_correct = $request->correct_answer;
        $quiz_performance->save();
        $quiz = Quiz::find($request->quiz_id);
        $questions = $quiz->questions;
        $topics_to_revise = PerformanceAnalysis::with('question.topic')
                                                ->where('quiz_id', $quiz->id)
                                                ->where('user_id', Auth::user()->id)
                                                ->where('answer_correct', 0)
                                                ->latest()
                                                ->take($questions->count())
                                                ->get();
        $questions_report = PerformanceAnalysis::with('question')
                                                ->where('quiz_id', $quiz->id)
                                                ->where('user_id', Auth::user()->id)
                                                ->latest()
                                                ->take($questions->count())
                                                ->get();
        
        return response()->json([
            'sucess' => 'performance saved',
            'topics_to_revise' => $topics_to_revise,
            'questions_report' => $questions_report
            ]);
    }

    public function getUserPerformance($user_id, $quiz_id)
    {
        $user_performance = PerformanceAnalysis::where('user_id', $user_id)->with('question', 'quiz_score')->orderBy('created_at', 'desc')->Paginate(25);
        $user = User::find($user_id);
        
        // dd($user_performance);
        return view('user_performance', compact('user_performance', 'user'));
    }
}
