<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $teams = Team::all();

        return view('team.index', [
            'teams' => $teams,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:teams|min:2',
            'logo' => 'required|image',
        ]);

        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('logo', 'public');

            // Maak het team aan met de gebruikers-ID als creator_id
            Team::create([
                'name'       => $request->name,
                'logo'       => $imagePath,
                'creator_id' => Auth::id(), // Sla de creator_id op in de teams tabel
            ]);
        }

        return redirect('/team');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        $current_time = Carbon::now();
        $future_time  = $current_time->addHours(2);

        $games = Game::with('homeTeam', 'awayTeam')
                     ->where('time', '>', $future_time->toTimeString())
                     ->where('played', 0)
                     ->where('home_team', $team->id)
                     ->orWhere('away_team', $team->id)
                     ->orderBy('time', 'asc')
                     ->get();

        return view('team.show', [
            'team'  => $team,
            'games' => $games,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('team.edit', ['team' => $team]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'image',
        ]);

        $team->name = $request->name;

        if ($request->hasFile('logo')) {
            $imagePath  = $request->file('logo')->store('logo', 'public');
            $team->logo = $imagePath;
        }

        $team->save();

        return redirect('/team')->with('success', 'Team successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect('/team')->with('success', 'Team successfully deleted.');
    }

    public function joinTeam($teamId, $userId)
    {
        $user          = User::findOrFail($userId);
        $user->team_id = $teamId;
        $user->save();

        return redirect()->back();
    }

    public function deleteTeam($teamId, $userId)
    {
        $user          = User::findOrFail($userId);
        $user->team_id = null;
        $user->save();

        return redirect()->back();
    }

    public function resultShow(Team $team)
    {
        $current_time = Carbon::now();
        $future_time  = $current_time->addHours(2);

        $games = Game::with('homeTeam', 'awayTeam')
                     ->where('time', '<', $future_time->toTimeString())
                     ->where('played', 1)
                     ->where('home_team', $team->id)
                     ->orWhere('away_team', $team->id)
                     ->orderBy('time', 'asc')
                     ->get();

        return view('team.result', [
            'team'  => $team,
            'games' => $games,
        ]);
    }

    public function playerShow(Team $team)
    {
        $usersInTeam    = User::where('team_id', $team->id)->get(); // Gebruik get() in plaats van first()
        $usersInNotTeam = User::where('team_id', null)
                              ->where('admin', 0)->get();

        $images = [];

        foreach ($usersInTeam as $user) {
            $name = $user->name . $user->team->name . 'profielfoto'; // Je kunt de naam van de speler hier instellen

            $url = "https://www.google.com/search?q=" . urlencode($name) . "&tbm=isch";

            $response = Http::get($url);
            $html     = $response->body();

            preg_match_all('/<img[^>]+src="([^">]+)"/', $html, $matches);
            if (count($matches[1]) > 0) {
                // Controleren of de index 1 bestaat in $matches[1]
                if (isset($matches[1][1])) {
                    // Toevoegen aan de array $images
                    $images[] = $matches[1][1];
                } else {
                    // Als index 1 niet bestaat, voeg dan de eerste gevonden afbeeldings-URL toe
                    $images[] = $matches[1][0];
                }
            }
        }

        return view('team.player', [
            'images'      => $images, // Geef de lijst met afbeeldingen door aan de weergave
            'team'        => $team,
            'users'       => $usersInNotTeam,
            'usersInTeam' => $usersInTeam,
        ]);
    }
}
