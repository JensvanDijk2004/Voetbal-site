<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team');
    }

    public function refereeName(): BelongsTo
    {
        return $this->belongsTo(User::class, 'referee');
    }

    public function goals()
    {
        return $this->hasMany(Score::class);
    }
}
