<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $fullName = "YOU";
        if ($request->session()->has('user')) {
            $userInfo = $request->session()->get('user');
            $fullName = $userInfo['name'] . " " . $userInfo['lastname'];
        }

        return view('home', compact('fullName'));
    }

  
    public function create()
    {
      return view('login');
    }

    public function login(UserRequest $request)
    {
        $userInfo = ['name' => $request->get('name'), 'lastname' => $request->get('lastname')];
        if ($request->has('email')) { 
            $userInfo['email'] = $request->get('email');
        }
        $request->session()->put('user', $userInfo);
        return redirect('info');
    }

    public function logout(Request $request)
    {
        if ($request->session()->has('user')) {
            $request->session()->flush();
        }

        return  redirect("/");
    }

    public function show(Request $request)
    {
        
        $userInfo = $request->session()->get('user');
        return view('info', compact("userInfo"));
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}