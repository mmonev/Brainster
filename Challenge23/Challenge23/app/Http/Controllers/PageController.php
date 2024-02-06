<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $background = "/img/home-bg.jpg";
        $title = "Clean Blog";
        $small = "A BLog Theme By Start Bootstrap";
        return view('index', compact('background', 'title', 'small'));
    }
    public function aboutMe()
    {
        $background = "/img/about-bg.jpg";
        $title = "About Me";
        $small = "This is what i do.";

        return view('aboutme', compact('background', 'title', 'small'));
    }
    public function sample()
    {
        $background = "/img/post-sample-image.jpg";
        $title = "Man must explore, and this is exploration at it's greatest";
        $subtitle = "Problems look mighty small from 150 miles up";
        $small = "Posted by Start Bootstrap on August 24, 2018";
        return view('sample', compact('background', 'title', 'small', 'subtitle'));
    }
    public function contact()
    {
        $background = "/img/contact-bg.jpg";
        $title = "Contact Me";
        $small = "Have questions? I have answers!";
     

        return view('contact', compact('background', 'title', 'small'));
    }
}