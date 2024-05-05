<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $index      = 1;
        $allPlayers = [];
        $team       = Team::where('id', Auth::user()->team_id)->first();

        if ($team !== null) {
            $allPlayers = User::where('team_id', $team->id)->get();
        }

        $teams = Team::take(5)
                     ->orderBy('points', 'DESC')
                     ->get();

        return view('dashboard', [
            'index'       => $index,
            'teams'       => $teams,
            'usersInTeam' => $allPlayers,
        ]);
    }
}
