<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use App\Models\Game;
use App\Models\Score;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function mainIndex()
    {
        return view('api.mainIndex');
    }

    public function plannedGames(Request $request)
    {
        $apiKey = $request->apiKeyInput;

        if (! $apiKey || ! ApiKey::where('key', $apiKey)->exists()) {
            return response()->json(['error' => 'Unauthorized. Invalid API key.'], 401);
        }

        $current_time = Carbon::now();
        $future_time  = $current_time->addHours(2);

        $games = Game::with([
            'homeTeam' => function ($query) {
                $query->select('id', 'name')
                      ->with([
                          'users' => function ($query) {
                              $query->select('id', 'name','birthday', 'height',  'team_id');
                          },
                      ]);
            },
            'awayTeam' => function ($query) {
                $query->select('id', 'name')
                      ->with([
                          'users' => function ($query) {
                              $query->select('id', 'name','birthday', 'height',  'team_id');
                          },
                      ]);
            },
        ])
                     ->select('id', 'home_team', 'away_team', 'time', 'played')
                     ->where('time', '>', $future_time->toTimeString())
                     ->where('played', 0)
                     ->orderBy('time', 'asc')
                     ->get();

        return response()->json($games, 200, [], JSON_PRETTY_PRINT);
    }

    public function playedGames(Request $request)
    {
        $apiKey = $request->apiKeyInput;

        if (! $apiKey || ! ApiKey::where('key', $apiKey)->exists()) {
            return response()->json(['error' => 'Unauthorized. Invalid API key.'], 401);
        }

        $current_time = Carbon::now();
        $future_time  = $current_time->addHours(2);

        $games = Game::with([
            'homeTeam' => function ($query) {
                $query->select('id', 'name');
            },
            'awayTeam' => function ($query) {
                $query->select('id', 'name');
            },
        ])
                     ->select('id', 'home_team', 'home_score', 'away_team', 'away_score', 'time', 'played')
                     ->where('time', '<', $future_time->toTimeString())
                     ->where('played', 1)
                     ->orderBy('time', 'asc')
                     ->get();

        return response()->json($games, 200, [], JSON_PRETTY_PRINT);
    }

    public function generateApiKey()
    {
        $apiKey      = new ApiKey();
        $apiKey->key = Str::random(40);
        $apiKey->save();

        return response()->json(['api_key' => $apiKey->key], 201);
    }

    public function overview(Request $request)
    {
        $apiKey = $request->apiKeyInput;

        if (! $apiKey || ! ApiKey::where('key', $apiKey)->exists()) {
            return response()->json(['error' => 'Unauthorized. Invalid API key.'], 401);
        }

        $games = Game::where('played', 1)->get();

        return view('api.overview', compact('games'));
    }

    public function showPlayedGame($id)
    {
        $scores = Score::where('game_id', $id)
                       ->with([
                           'user' => function ($query) {
                               $query->select('id', 'name');
                           },
                       ])
                       ->select('id', 'minute', 'player_id', 'game_id')
                       ->get();

        return response()->json($scores, 200, [], JSON_PRETTY_PRINT);
    }
}
