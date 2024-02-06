<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    public function players()
    { 
        return $this->hasMany(Player::class);
    }

    public function homeMatches()
    {
        return $this->hasMany(Game::class,'home_team');
    }

    public function awayMatches()
    {
        return $this->hasMany(Game::class,'away_team');
    }

}
