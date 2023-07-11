<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Level;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Support\Facades\Validator;
use Auth;

class QuestController extends Controller
{
    public function __construct()
    {
        $this->middleware(['alter.question'])->only(['edit', 'destroy']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_questions = Question::where('user_id', Auth::user()->id)->orderBy('subject_id', 'DESC')->Paginate(50);
        return view('quest.index', compact('user_questions'));
    }

    public function getAll()
    {
        $user_questions = Question::orderBy('subject_id', 'DESC')->Paginate(50);
        return view('quest.all-questions', compact('user_questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        $subjects = Subject::all();
        $topics = Topic::all();

        return view('quest.create', compact('levels', 'subjects', 'topics'));
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
            'A' => 'required',
            'B' => 'required',
            'C' => 'required',
            'D' => 'required',
            'answer' => 'required',
            'points' => 'nullable',
            'duration' => 'nullable',
            'level' => 'required',
            'subject' => 'required',
            'topic' => 'required'
        ],
        [
            'content.required' => 'Please enter the question',
            // 'content.unique' => 'This question already exist',
            'A.required' => 'Enter option A',
            'B.required' => 'Enter option B',
            'C.required' => 'Enter option C',
            'D.required' => 'Enter option D',
            'level.required' => 'Level is required',
            'subject.required' => 'Subject is required',
            'topic.required' => 'Topic is required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
    
        } else {
            // save questions
            $question = new Question;
            $question->content = $request->content;
            $question->A = $request->input('A');
            $question->B = $request->input('B');
            $question->C = $request->input('C');
            $question->D = $request->input('D');
            $question->answer = $request->input('answer');
            $question->points = $request->input('points');
            $question->duration = $request->input('duration');
            $question->user_id = Auth::user()->id;
            $question->subject_id = $request->input('subject');
            $question->topic_id = $request->input('topic');
            $question->level_id = $request->input('level');

            $question->save();

            return redirect()->back()->with('success', 'Question created successfully');
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
        $question = Question::find($id);
        return view('quest.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $levels = Level::all();
        $subjects = Subject::all();
        $topics = Topic::all();

        return view('quest.edit', compact('question', 'levels', 'subjects', 'topics'));
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
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'A' => 'required',
            'B' => 'required',
            'C' => 'required',
            'D' => 'required',
            'answer' => 'required',
            'points' => 'nullable',
            'duration' => 'nullable',
            'level' => 'required',
            'subject' => 'required',
            'topic' => 'required'
        ],
        [
            'content.required' => 'Please enter the question',
            // 'content.unique' => 'This question already exist',
            'A.required' => 'Enter option A',
            'B.required' => 'Enter option B',
            'C.required' => 'Enter option C',
            'D.required' => 'Enter option D',
            'level.required' => 'Level is required',
            'subject.required' => 'Subject is required',
            'topic.required' => 'Topic is required'
        ]);

        if ($validator->fails())
        {
            return back()->with('error', 'Something went wrong, check the form');
    
        } else {
            // save questions
            $question = Question::find($id);
            $question->content = $request->content;
            $question->A = $request->input('A');
            $question->B = $request->input('B');
            $question->C = $request->input('C');
            $question->D = $request->input('D');
            $question->answer = $request->input('answer');
            $question->points = $request->input('points');
            $question->duration = $request->input('duration');
            $question->user_id = Auth::user()->id;
            $question->subject_id = $request->input('subject');
            $question->topic_id = $request->input('topic');
            $question->level_id = $request->input('level');

            if ($question->user_id == Auth::user()->id) {

                $question->update();
                return back()->with('success', 'Question updated successfully');
            } else {
                return back()->with('error', 'You do not have permission to update this question');
            }

            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();

        return back()->with('success', 'Question deleted');
    }


    public function topics(Topic $topic) {
        $topic_id = $topic->id;
        $questions = Question::where('topic_id', $topic_id)->paginate(50);
        return view('quest.topical', compact('questions', 'topic'));
    }
}
