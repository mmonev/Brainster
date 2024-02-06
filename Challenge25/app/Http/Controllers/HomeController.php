<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $discussions = Discussion::where('approved', '1')->get();

        return view('index', compact('discussions'));
    }
 

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $discussion = Discussion::where('id', $id)->first();
        
        return view('show', compact('discussion'));
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
