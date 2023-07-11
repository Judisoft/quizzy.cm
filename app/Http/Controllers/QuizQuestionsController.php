<?php

namespace App\Http\Controllers;

use App\Mail\QuizNotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Quiz;
use App\Models\Level;
use App\Models\Topic;
use App\Models\QuizQuestion;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Auth;

class QuizQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::orderBy('title', 'asc')->get();
        $levels = Level::orderBy('class_id', 'asc')->get();
        $topics = Topic::orderBy('id', 'asc')->get();
        return view('create-quiz', compact('subjects', 'levels', 'topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'optionA' => 'required',
            'optionB' => 'required',
            'optionC' => 'required',
            'optionD' => 'required',
            'answer' => 'required',
            'points' => 'required',
            'duration' => 'required',
            'level_id' => 'required',
            'subject_id' => 'required',
            'topic_id' => 'required',
            'quiz_title' => 'required'
        ],
        [
            'content.required' => 'Please enter the question',
            // 'content.unique' => 'This question already exist',
            'optionA.required' => 'Enter option A',
            'optionB.required' => 'Enter option B',
            'optionC.required' => 'Enter option C',
            'optionD.required' => 'Enter option D',
            'points.required' => 'Enter the number of points a user gets for providing the correct answer to this question',
            'duration.required' => 'Enter the duration of this question in minutes',
            'level_id.required' => 'Level is required',
            'subject_id.required' => 'Subject is required',
            'topic_id.required' => 'Topic is required'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'error' => $validator->errors()
                ]);
    
        } else {
            // save questions
            $question = new Question;
            $question->content = $request->content;
            $question->A = $request->optionA;
            $question->B = $request->optionB;
            $question->C = $request->optionC;
            $question->D = $request->optionD;
            $question->answer = $request->answer;
            $question->points = $request->points;
            $question->duration = $request->duration;
            $question->user_id = Auth::user()->id;
            $question->subject_id = $request->subject_id;
            $question->topic_id = $request->topic_id;
            $question->level_id = $request->level_id;

            $question->save();

            // Save quiz

            if(Quiz::where('title', $request->quiz_title)->doesntExist())
            {
                $quiz = new Quiz;
                $quiz->title = $request->quiz_title;
                $quiz->slug = Str::slug($request->quiz_title, '-');
                $quiz->subject_id = $request->subject_id;
                $quiz->user_id = Auth::user()->id;
                $quiz->team_id = Auth::user()->current_team_id;

                $quiz->save();
                
            }
            
            $q_id = Quiz::where('title', $request->quiz_title)->first();

            //save quiz questions
            $quiz_question = new QuizQuestion;
            $quiz_question->quiz_id = $q_id->id;
            $quiz_question->question_id = $question->id;//$question->id;

            $quiz_question->save();
            
            return response()->json([
                'success' => 'Question saved'
                ]);
        }

        // $quiz_id = Quiz::where('user_id', Auth::user()->id)->latest();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::find($id);
        $subjects = Subject::all();
        $user_questions = Question::where('user_id', Auth::user()->id)
                                    ->where('subject_id', $quiz->subject_id)
                                    ->get();
        return view('edit-quiz', compact('quiz', 'subjects', 'user_questions'));
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
        $quiz = Quiz::find($id);
        $quiz->title = $request->input('quiz_title');
        $quiz->slug = Str::slug($quiz->title, '-');
        $quiz->subject_id = $request->input('subject_id');
        $question_ids = $request->input('question_id');
        $quiz->update();
        $quiz->questions()->sync($question_ids);

        return back()->with('success', 'Quiz updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
