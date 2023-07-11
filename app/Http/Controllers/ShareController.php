<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Share;
use Auth;
use App\Models\Team;
use App\Models\Quiz;

class ShareController extends Controller
{
    public function share(Request $request, Quiz $quiz)
    {
        $receipients_id = $request->receipient_id;
        $groups = $request->group_id;
        if($groups)
        {
            foreach($groups as $group_id)
            {
                $team = Team::find($group_id);
                $users = $team->users;
            }
            
            foreach ($users as $key=>$user)
            {
                $share = new Share;
                $share->user_id = Auth::user()->id;
                $share->quiz_id = $quiz->id;
                $share->receipient_id = $user->id;
                $share->save();
            }
            return back()->with('success', "shared");
        } elseif($receipients_id) {

            foreach ($receipients_id as $receipient_id)
            {
                $share = new Share;
                $share->user_id = Auth::user()->id;
                $share->quiz_id = $quiz->id;
                $share->receipient_id = $receipient_id;
                $share->save();
            }

            return back()->with('success', "shared");
        }
    }
}
