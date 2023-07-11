<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\QuizScore;
use App\Models\Quiz;
use Auth;

class isQuizAttemptValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $quiz_id = $request->route('quiz')->id;
        $quiz_attempts = Quiz::find($quiz_id)->attempts_permitted;
        $userHasTakenQuiz = QuizScore::where('user_id', auth()->user()->id)->where('quiz_id', $quiz_id)->exists();
        $quizAttemptCount = QuizScore::where('user_id', auth()->user()->id)->where('quiz_id', $quiz_id)->count();
        if ($userHasTakenQuiz && $quiz_attempts == 1)
        {
            return back()->with('error', 'You are not permitted to take this quiz more than once. It is set as an evaluation.');
        } else if ($quizAttemptCount == 3) {
            return back()->with('error', 'You have reached the quiz attempt limit for this quiz');
        }
        return $next($request);
    }
}
