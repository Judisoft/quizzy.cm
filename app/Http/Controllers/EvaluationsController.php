<?php

namespace App\Http\Controllers;

use App\Models\QuizScore;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;

class EvaluationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluations = QuizScore::where('user_id', auth()->user()->id)->with('quiz')->orderBy('id', 'DESC')->paginate(25);

        return view('evaluations', compact('evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEvaluation()
    {
        $user_quizzes = Quiz::where('user_id', Auth::user()->id)->get();
        return view('create-evaluation', compact('user_quizzes'));
    }

    public function postEvaluation(Request $request) {
        $quiz = Quiz::find($request->id);
        if($quiz->attempts_permitted != 1) {
            $quiz->attempts_permitted = 1;
            $quiz->update();
            return response()->json([
                'success' => 'Quiz set as evaluation'
            ]);
        } else {
            $quiz->attempts_permitted = 3; // Every quiz is default to be taken 3 times
            $quiz->update();

            return response()->json([
                'success' => 'Quiz unset as evaluation'
            ]);
        }
        
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::find($id);
        $questions = $quiz->questions;
        $score = $quiz->quiz_scores->max();
        return view('evaluation-detail', compact('quiz', 'questions', 'score'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyEvaluation($id)
    {
        // destroy
    }
}
