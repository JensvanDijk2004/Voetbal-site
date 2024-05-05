<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use function Symfony\Component\Translation\t;

final class GameController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('games')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $request->validate([
            'start_time'   => 'required',
            'end_time'     => 'required',
            'field'        => 'required|int',
            'time'         => 'required|int',
            'time_between' => 'required|int',
            'time_break'   => 'required|int',
        ]);

        $teams     = Team::all();
        $numTeams  = count($teams);
        $numFields = $request->field;

        $startTime        = strtotime($request->start_time);
        $endTime          = strtotime($request->end_time);
        $timeBetweenGames = ($request->time + $request->time_break) * 60;
        $breakTime        = $request->time_between * 60;
        $timeslots        = [];

        $currentTime = $startTime;
        while ($currentTime + $timeBetweenGames <= $endTime) {
            for ($f = 1; $f <= $numFields; $f++) {
                $timeslots[] = [
                    'time'  => date("H:i", $currentTime),
                    'field' => $f,
                ];
            }
            $currentTime += $timeBetweenGames + $breakTime;
        }

        for ($i = 0; $i < $numTeams - 1; $i++) {
            for ($j = $i + 1; $j < $numTeams; $j++) {
                foreach ($timeslots as $timeslot) {
                    $existingMatch = Game::where('time', $timeslot['time'])
                                         ->where(function ($query) use ($i, $j) {
                                             $query->where('home_team', $i + 1)
                                                   ->orWhere('away_team', $i + 1)
                                                   ->orWhere('home_team', $j + 1)
                                                   ->orWhere('away_team', $j + 1);
                                         })
                                         ->exists();

                    $fieldAvailable = ! Game::where('field', $timeslot['field'])
                                            ->where('time', $timeslot['time'])
                                            ->exists();

                    if (! $existingMatch && $fieldAvailable) {
                        Game::create([
                            'home_team'  => $i + 1,
                            'away_team'  => $j + 1,
                            'home_score' => 0,
                            'away_score' => 0,
                            'referee'    => 1,
                            'field'      => $timeslot['field'],
                            'time'       => $timeslot['time'],
                        ]);

                        break;
                    }
                }
            }
        }

        return redirect()->back()
            ->with('message', 'Succesvol aangemaakt!!');
    }

    public function playedGames(): View
    {
        $current_time = Carbon::now();
        $future_time  = $current_time->addHours(2);

        $games = Game::with('homeTeam', 'awayTeam')
                     ->where('time', '<', $future_time->toTimeString())
                     ->where('played', 1)
                     ->orderBy('time', 'asc')
                     ->get();

        return view('game.played', [
            'games' => $games,
        ]);
    }

    public function programShow(Game $game)
    {
        return view('game.program',[
            'game' => $game,
        ]);
    }

    public function resultShow(Game $game)
    {
        return view('game.result',[
            'game' => $game,
        ]);
    }
}
