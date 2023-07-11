<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Team;
use App\Models\User;
use App\Models\TeamInvitation;
use Auth;

class TeamController extends Controller
{
    public function getTeams()
    {
        $invitations = TeamInvitation::where('email', Auth::user()->email)->get();
        return view('my-teams', compact('invitations'));
    }

    public function getTeamDetail($id)
    {
        $team = Team::find($id);
       
        return view('team_detail', compact('team'));
    }
}
