<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Game;
use App\Models\Team;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;

class GameController extends Controller
{

    public function index()
    { 
        $matches = Game::all();

        return view('matches.index', compact('matches'));
    }


    public function create()
    {
        $teams = Team::all();

        return view('matches.create', compact('teams'));
    }


    public function store(StoreGameRequest $request)
    {
        // Log::info($request->all());  // Log the incoming request data to ensure it’s as expected
    
        // Create the match using the validated data from the request
        $match = Game::create($request->validated());
    
        if ($match) {
            return redirect()->route('matches.index')
                ->with('msg', 'Match added!')
                ->with('stat', 'green');
        }
    
        return redirect()->route('matches.index')
            ->with('msg', 'Something went wrong!')
            ->with('stat', 'red');
    }


    public function show(Game $game)
    {
        //
    }


    public function edit(Game $match)
    {
        $teams = Team::all();

        return view('matches.edit', compact('teams', 'match'));
    }


    public function update(UpdateGameRequest $request, Game $game)
    {
        $game->home_team = $request->home_team;
        $game->away_team = $request->away_team;
        $game->game_date = $request->game_date;

        if ($game->save()) {
            return to_route('matches.index')->with('msg', 'Match updated!')->with('stat', 'green');
        };

        return to_route('matches.index')->with('msg', 'Something went wrong!')->with('stat', 'red');
    }


    public function destroy(Game $match)
    {
        if ($match->delete()) {
            return to_route('matches.index')->with('msg', 'Match deleted!')->with('stat', 'green');
        };

        return to_route('matches.index')->with('msg', 'Something went wrong!')->with('stat', 'red');
    }
}
