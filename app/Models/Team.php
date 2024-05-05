<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function gamesHomeTeam()
    {
        return $this->hasMany(Game::class, 'home_team');
    }

    public function gamesAwayTeam()
    {
        return $this->hasMany(Game::class, 'away_team');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'team_id');
    }
}
