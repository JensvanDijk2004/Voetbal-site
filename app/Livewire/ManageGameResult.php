<?php

namespace App\Livewire;

use App\Models\Game;
use App\Models\Score;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;

class ManageGameResult extends Component
{
    public $homeScore;
    public $homeTeam;
    public $homeTeamPlayers;
    public $awayScore;
    public $awayTeam;
    public $awayTeamPlayers;
    public $selectedGame;
    public $goalsHome = [];
    public $goalsAway = [];

    public function mount(Game $game)
    {
        $this->game = $game;
    }

    public function scoreGame()
    {
        if (($this->goalsHome === [] && $this->homeScore > 0) ||
            ($this->goalsAway === [] && $this->awayScore > 0)){
            return redirect('/game/played')
                ->with('error', 'Vul de doelpunten in.');
        }

        foreach ($this->goalsHome as $goalHome) {
            if (! array_key_exists('player_id', $goalHome) && $this->homeScore > 0){
                return redirect('/game/played')
                    ->with('error', 'Vul een speler in.');
            }

            if (! array_key_exists('minute', $goalHome) && $this->homeScore > 0){
                return redirect('/game/played')
                    ->with('error', 'Vul een minuut in.');
            }

            Score::create([
                'player_id' => $goalHome['player_id'],
                'minute'    => $goalHome['minute'],
                'game_id'   => $this->selectedGame->id,

            ]);
        }

        foreach ($this->goalsAway as $goalAway) {
            if (! array_key_exists('player_id', $goalAway) && $this->awayScore > 0){
                return redirect('/game/played')
                    ->with('error', 'Vul een speler in.');
            }

            if (! array_key_exists('minute', $goalAway) && $this->awayScore > 0){
                if ($goalAway['minute'] === '' || $goalAway['minute'] === null){
                    return redirect('/game/played')
                        ->with('error', 'Vul een minuut in.');
                }
            }

            Score::create([
                'player_id' => $goalAway['player_id'],
                'minute'    => $goalAway['minute'],
                'game_id'   => $this->selectedGame->id,
            ]);
        }

        $this->validate([
            'homeScore' => 'required|integer',
            'awayScore' => 'required|integer',
        ]);
        $homeTeam = Team::where('id', $this->selectedGame->home_team)->first();
        $awayTeam = Team::where('id', $this->selectedGame->away_team)->first();

        if ($this->homeScore > $this->awayScore) {
            $homeTeam->points += 3;
            $homeTeam->save();
        } elseif ($this->homeScore < $this->awayScore) {
            $awayTeam->points += 3;
            $awayTeam->save();
        } else {
            ++$homeTeam->points;
            ++$awayTeam->points;
            $awayTeam->save();
            $homeTeam->save();
        }

        $this->selectedGame->update([
            'home_score' => $this->homeScore,
            'away_score' => $this->awayScore,
            'played'     => 1,
        ]);

        $this->reset();

        return redirect('/game/played')
            ->with('message', 'De uitslag is succesvol opgeslagen.');
    }

    public function editGameResult($gameId)
    {
        $this->selectedGame    = Game::find($gameId);
        $this->homeScore       = $this->selectedGame->home_score;
        $this->awayScore       = $this->selectedGame->away_score;
        $this->awayTeam        = $this->selectedGame->awayTeam->name;
        $this->homeTeam        = $this->selectedGame->homeTeam->name;
        $this->homeTeamPlayers = User::where('team_id', $this->selectedGame->homeTeam->id)->get();
        $this->awayTeamPlayers = User::where('team_id', $this->selectedGame->awayTeam->id)->get();
    }

    public function render()
    {
        $current_time = Carbon::now();
        $future_time  = $current_time->addHours(2);

        $games = Game::with('homeTeam', 'awayTeam')
                     ->where('time', '<', $future_time->toTimeString())
                     ->where('played', 0)
                     ->orderBy('time', 'asc')
                     ->get();

        return view('livewire.manage-game-result', [
            'games' => $games,
        ]);
    }
}
