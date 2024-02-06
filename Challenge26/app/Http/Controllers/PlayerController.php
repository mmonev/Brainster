<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;

class PlayerController extends Controller
{
    public function index()
    { 
        $players = Player::all();

        return view('players.index', compact('players'));

    }

    public function create()
    {
        $teams = Team::all();

        return view('players.create', compact('teams'));
    }

    public function store(StorePlayerRequest $request)
    {
        $player = new Player();
        $player->name = $request->name;
        $player->surname = $request->surname;
        $player->dob = $request->dob;
        $player->team_id = $request->team_id;

        if ($player->save()) {
            return to_route('players.index')->with('msg', 'Player added!')->with('stat', 'green');
        };

        return to_route('players.index')->with('msg', 'Something went wrong!')->with('stat', 'red');
    }

    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }

    public function edit(Player $player)
    {
        $teams = Team::all();

        return view('players.edit', compact('teams', 'player'));
    }


    public function update(UpdatePlayerRequest $request, Player $player)
    {
        $player->name = $request->name;
        $player->surname = $request->surname;
        $player->dob = $request->dob;
        $player->team_id = $request->team_id;

        if ($player->save()) {
            return to_route('players.index')->with('msg', 'Player updated!')->with('stat', 'green');
        };

        return to_route('players.index')->with('msg', 'Something went wrong!')->with('stat', 'red');
    }

    public function destroy(Player $player)
    {
        $player->delete();

        return to_route('players.index')->with('msg', 'Player deleted!')->with('stat', 'green');
    }
}
