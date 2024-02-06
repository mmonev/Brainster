<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;

class TeamController extends Controller
{

    public function index()
    {
        $teams = Team::all();

        return view('teams.index', compact('teams'));
    } 


    public function create()
    {
        return view('teams.create');
    }

    public function store(StoreTeamRequest $request)
    {
        $team = new Team();
        $team->name = $request->name;
        $team->founding_year = $request->founding_year;

        if ($team->save()) {
            return to_route('teams.index')->with('msg', 'Team added!')->with('stat', 'green');
        };

        return to_route('teams.index')->with('msg', 'Something went wrong!')->with('stat', 'red');
    }

 
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }


    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->name = $request->name;
        $team->founding_year = $request->founding_year;

        if ($team->save()) {
            return to_route('teams.index')->with('msg', 'Team updated!')->with('stat', 'green');
        };

        return to_route('teams.index')->with('msg', 'Something went wrong!')->with('stat', 'red');
    }

    public function destroy(Team $team)
    {

        $team->delete();

        return to_route('teams.index')->with('msg', 'Team deleted!')->with('stat', 'green');
    }
}
