<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use Auth;

class QuestionsController extends Controller
{
    public function showQuestions()
    {
        $subjects = Subject::all();
        
        return view('subjects', compact('subjects'));
    }

    public function subjectQuestions($subject_id, Request $request) 
    {
        $questions = Question::where('subject_id', $subject_id)->orderBy('subject_id')->paginate(25);
        $user_quizzes = Quiz::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        $subject = Subject::find($subject_id);
        
        // $topics = Question::select('topic')->where('subject', $subject)->distinct()->paginate(25);
         
        return view('quiz-questions', compact('questions', 'subject_id', 'user_quizzes', 'subject'));
    }

    public function getQuestion($subject, $id) 
    {
        $question = Question::find($id);
        $next_qid = Question::where('id', '>', $id)->where('subject_id', $subject)->min('id');
        $previous_qid = Question::where('id', '<', $id)->where('subject_id', $subject)->max('id');
        // check for the existence of next id

        if ($next_qid > $id)
        {
            $next_question = Question::find($next_qid);
            $previous_question = Question::find($previous_qid);

            return view('question-item', compact('question', 'subject', 'id', 'next_qid', 'next_question', 'previous_question'));
        }
        else {
            return redirect()->back();
        }
        
    }

    public function sortQuestions($subject, Request $request)
    {
        $query = $request->input('topic');

        $questions = Question::where('subject', $subject)->Andwhere('topic', $query)->paginate(25);
        dd($questions);

        return view('questions-by-subject', compact('questions'));
    }

    /**
     * store quiz tile
     * @param $request Request
     * return: Response
     */
    
    public function storeQuizTitle(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|min:3|unique:quizzes',
            'duration' => 'nullable',
            'slug' => 'nullable'
            ],
            [
                'title.required'=> 'Quiz title cannot be empty',
                'title.unique' => 'This name is already taken',
                'title.min' => 'Quiz title too short'
            ]);
       
        $quiz = new Quiz;
        $quiz->title = $request->title;
        $quiz->slug = Str::slug($request->title, '-');
        $quiz->user_id = $request->user_id;

        $quiz->save();

        if ($quiz)
        {
            $quizzes = Quiz::where('user_id', auth()->user()->id)->orderBy('id', 'asc')->get();
            return response()->json([
                'success' => 'Quiz successfully created',
                'quizzes' => $quizzes,
            ]);
        } else {
            return response()->json([
                'error' => $validator->errors()->all() //'Oups something went wrong'
            ]);
        }

        
    }

    public function questions()
    {
        $questions = Question::where('user_id', Auth::user()->id)->Paginate(50);
        $subjects = Subject::all();
        return view('question-bank', compact('questions', 'subjects'));
    }

    public function quizQuestions(Request $request) 
    {
        
        $validator = Validator::make($request->all(), [
            'quiz_title' => 'required|unique:quizzes,title',
            'subject_id' => 'required',
            'question' => 'required'
        ],
        [
            'quiz_title.required' => 'Quiz title is required',
            'subject_id.required' => 'Subject is required',
            'question.required' => 'You must select atleast one question'
        ]);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            return back()->withErrors($errors);
    
        } else {

            $quiz = new Quiz;
            $quiz->title = $request->quiz_title;
            $quiz->slug = Str::slug($request->title, '-');
            $quiz->subject_id = $request->input('subject_id');
            $quiz->user_id = Auth::user()->id;
            $quiz->team_id = Auth::user()->current_team_id;

            $quiz->save();

            for($i = 0; $i < count($request->question); $i++)
            {
                //save quiz questions
                $quiz_question = new QuizQuestion;
                $quiz_question->quiz_id = $quiz->id;
                $quiz_question->question_id = $request->question[$i];

                $quiz_question->save();
            }
            
            return back()->with('success', 'Quiz created successfully');
        }

    }

}
