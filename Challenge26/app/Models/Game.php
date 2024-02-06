<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_team',
        'away_team',
        'game_date',
    ];
 
    public function homeTeam()
    {
        return $this->belongsTo(Team::class,'home_team');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class,'away_team');
    }
}
