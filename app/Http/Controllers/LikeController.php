<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Quiz;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $like = new Like;
        $like->user_id = $request->user_id;
        $like->quiz_id = $request->quiz_id;

        $like->save();
        
        // Update quizzes table's likes field
        $id = $request->quiz_id;
        
        $quiz = Quiz::find($id);

        if($quiz)
        {
            $quiz->number_of_likes += 1;
            $quiz->save();
        }

        return response()->json([
            'success' => 'Quiz liked']);
    }

    public function unlike(Request $request)
    {
        if($request->user_id == auth()->user()->id)
        {
            $like = Like::where('user_id', $request->user_id)->where('quiz_id', $request->quiz_id)->first();
            $like->delete();

            $id = $request->quiz_id;
            $quiz = Quiz::find($id);
            $quiz->number_of_likes -= 1;
            $quiz->save();
        }

        return response()->json([
            'success' => 'Quiz disliked'
        ]);
        
    }
}
