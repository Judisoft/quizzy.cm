<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Quiz;
use App\Models\Level;
use App\Models\User;

class QuizPracticeModeController extends Controller
{
    public function getSubjects()
    {
        $subjects = Subject::all();
        
        return view('subject-questions', compact('subjects'));
    }

    public function getSubjectQuestions($subject_id, Request $request) 
    {
        $subject = Subject::find($subject_id);
        $questions = Question::with('user', 'level', 'subject', 'topic')->where('subject_id', $subject_id)->orderBy('topic_id')->paginate(25);
        $topics = $subject->topics;
        $levels = Level::all();
        $share_btn = \Share::currentPage('Quizzy')
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();

        return view('questions-by-subject', compact('questions', 'subject', 'topics', 'levels', 'subject_id', 'share_btn'));
    }

    public function nextQuestion() 
    {
        // $question = Question::find($request->id);
        // $next_qid = Question::where('id', '>', $request->id)->where('subject_id', $request->subject_id)->min('id');
        // $previous_qid = Question::where('id', '<', $request->id)->where('subject_id', $request->subject_id)->max('id');
        // $next_question = Question::find($next_qid);
        // $previous_question = Question::find($previous_qid);
        // $subject = Subject::find($subject_id);

        // return response()->json([
        //     'subject' => $subject,
        //     'question' => $next_question,
        // ]);

        $questions = Question::all();

        return response()->json([
            'data' => $questions
        ]);

        // return view('question-item', compact('question', 'subject', 'id', 'next_qid', 'next_question', 'previous_question'));
        
    }

    public function sortQuestions(Request $request)
    {    
        $questions = Question::with('user', 'level', 'subject')
                              ->where([['level_id', '=', $request->level_id],
                                        ['subject_id', '=', $request->subject_id],
                                        ['topic_id', '=', $request->topic_id]
                              ])
                              ->get();
        // $questions = new Question;
        // if($request->level_id && $request->topic_id)
        // {
        //     $questions = Question::with('user', 'level', 'subject')
        //                       ->where([['level_id', '=', $request->level_id],
        //                                 ['subject_id', '=', $request->subject_id],
        //                                 ['topic_id', '=', $request->topic_id]
        //                       ])
        //                       ->get();
        // }

        // if($request->level_id || $request->topic_id)
        // {
        //     $questions = Question::with('user', 'level', 'subject')
        //                         ->where('subject_id', $request->subject_id)
        //                         ->orWhere('level_id', $request->level_id)
        //                         ->orWhere('topic_id', $request->topic_id)
        //                         ->get();
        // }
        
        return response()->json(
            [
                'questions' => $questions
            ]
        );
    }
}
