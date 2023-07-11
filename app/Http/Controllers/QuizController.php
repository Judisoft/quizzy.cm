<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuizUpdate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Level;
use App\Models\PerformanceAnalysis;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizScore;
use App\Models\Topic;
use App\Models\User;
use App\Models\Team;
use Auth;
use Cookie;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware(['quiz.attempt', 'valid.quiz.taker'])->only(['quizGenerator']);
    }

 
    public function quizGenerator(Quiz $quiz, Request $request)
    {
        // set cookie to prevent view count on page refresh
        if(Auth::guest()){ 
            $cookie_name = (Str::replace('.','',($request->ip())).'-'. $quiz->id); //guest user identified by ip
            } else {
                $cookie_name = (Auth::user()->id.'-'. $quiz->id);//logged in user
            }
        // Increment quiz view
        if(Cookie::get($cookie_name) == ''){
            $cookie_name = Cookie::queue($cookie_name, '1', 60);
            $quiz->incrementViewCount();
        }

        
        // Has user taken the quiz already?
        // If yes, deny access if quiz_attempts_set = 1
        // Else grant access
        $user_attempts = QuizScore::select('attempts')
                                    ->where('user_id', auth()->user()->id)
                                    ->where('quiz_id', $quiz->id);
                                    // ->get();
        
        if($user_attempts->exists() && $quiz->attempts_permitted == 1)
        {
            // Deny access
            $quiz_attempts = $quiz->attempts_permitted;
            $error_message = 'The author of this quiz has placed a restriction to the number of times you can take this quiz to'.' '.$quiz_attempts;
            
            // return view('403', compact('error_message'));
            return back()->with('error', $error_message);
        }
        
        $subjects = Subject::all();        
        $questions = $quiz->questions;

        $quiz_time = 0;
        $quiz_points = 0;

        foreach($questions as $question)
        {
            $quiz_time += $question->duration;
            $quiz_points += $question->points;
        }

        $share_btn = \Share::currentPage('Quizzy')
                            ->facebook()
                            ->twitter()
                            ->linkedin()
                            ->telegram()
                            ->whatsapp()        
                            ->reddit();
        $users = User::all();
        $high_score = QuizScore::where('quiz_id', $quiz->id)->where('user_id', Auth::user()->id)->max('score'); // user's highscore
        $quiz_high_score = QuizScore::where('quiz_id', $quiz->id)->max('score');
        $ranks = QuizScore::select('user_id')->where('quiz_id', $quiz->id)->distinct()->orderBy('score', 'DESC')->Paginate(50);
        $total_quiz_takers = QuizScore::select('user_id')->where('quiz_id', $quiz->id)->distinct()->get()->count();
       
        return view('quiz-detail', compact('questions', 'subjects', 'quiz', 'quiz_time', 'quiz_points', 'share_btn', 'users', 'ranks', 'total_quiz_takers', 'high_score', 'quiz_high_score'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUserQuiz($quiz_id)
    {
        $quiz = Quiz::find($quiz_id);
        return view('user_quiz', compact('quiz'));
    }


    function saveQuizName(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|unique:quizzes',
            'duration' => 'nullable',
            'slug' => 'nullable'
            ],
            [
                'title.required'=> 'Quiz title cannot be empty',
                'title.unique' => 'This quiz name is not available',
                'title.min' => 'Quiz title too short'
            ]);
        if ($validator->fails())
        {
            return response()->json([
                'error' => $validator->errors()
                ]);

        } else {
            $quiz = new Quiz;
            $quiz->title = $request->title;
            $quiz->slug = Str::slug($request->title, '-');
            $quiz->subject_id = $request->subject_id;
            $quiz->user_id = $request->user_id;
            $quiz->team_id = Auth::user()->current_team_id;
            // $quiz->subject_id = 1;

            $quiz->save();

            return response()->json([
                'success' => 'Quiz created'
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
        // $validator = $request->validate([
        //     
        // ]);

        $quiz = new QuizQuestion;
        $quiz->question_id = $request->question_id;
        $quiz->quiz_id = $request->quiz_id;

        $quiz->save();

        if($quiz)
        {
            return response()->json([
                'success' => 'question'.' '.$request->question_id .' '. 'saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Oups something went wrong'
            ]);
        }
       
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
    public function destroy($id)
    {
        //
    }

    public function sortQuizQuestions(Request $request)
    {
        return response()->json($request);
    }

    /**
     * add questions to quiz item
     */

    public function addQuizQuestions($subject_id,$quiz_id)
    {
        $questions = Question::where('subject_id', $subject_id)->orderBy('subject_id')->paginate(25);
        $user_quiz = Quiz::find($quiz_id);
        $subject = Subject::find($subject_id);
        return view('add-quiz-questions', compact('questions', 'user_quiz', 'subject'));
    }

    public function getAllQuizzess(Request $request)
    {
        $search = $request->input('search');
        

        if($search)
        {
            $quizzes = Quiz::query()->where('title', 'LIKE', "%{$search}%")->with('subject')->orderBy('id', 'DESC')->paginate(25);
        } else {
            $quizzes =  Quiz::with('subject')->orderBy('id', 'DESC')->paginate(25);
        }

        $subjects = Subject::all();

        return view('all-quizzes', compact('quizzes', 'subjects'));
    }


    public function printAnswers(Quiz $quiz)
    {
        return view('answers', compact('quiz'));
    }

    public function postUserScore(Request $request) {   

        $quiz_score = new QuizScore;
        $quiz_score->quiz_id = $request->quiz_id;
        $quiz_score->user_id = $request->user_id;
        $quiz_score->score = $request->user_score;
        $quiz_score->max_quiz_score = $request->max_quiz_score;

        // Find and update quiz attempts
        
        $quiz_attempts = QuizScore::select('attempts')->where('user_id', Auth::user()->id)
                                                      ->where('quiz_id', $request->quiz_id)
                                                      ->get();

        if(json_decode(json_encode($quiz_attempts)) == [])
        {
            $quiz_score->attempts = 1;
        } else {
        $att = max(json_decode(json_encode($quiz_attempts)));
            $quiz_score->attempts = $att->attempts + 1;
        }

        $quiz_score->save();

        return response()->json('success', 201);
    }

}
