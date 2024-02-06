<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function awayMatches()
    { 
        return $this->hasManyThrough(Game::class, Team::class, 'id', 'away_team', 'team_id', 'id');
    }
    public function homeMatches()
    {
        return $this->hasManyThrough(Game::class, Team::class, 'id', 'home_team', 'team_id', 'id');
    }
}
