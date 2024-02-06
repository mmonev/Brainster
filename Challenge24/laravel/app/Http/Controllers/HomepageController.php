<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {

        $projects = Project::all();
        return view('homepage' , compact('projects'));
    }
}
