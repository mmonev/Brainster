<?php

namespace App\Http\Controllers;

use App\Events\ActivateUserEvent;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\CreatedUserEvent;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;
 
class AdminController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd($users);
        return view('adminDashboard');
    }
    public function users()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request, User $user)
    {
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->is_active = 0;
        $user->type = "regular";
        $user->setRememberToken(Str::random(30));
        if ($user->save()) {
            event(new CreatedUserEvent($user));
            return response("user Saved");
        }

        return response('failed', 501);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->delete())
            return response('user Deleted');

        return response('fail', 501);
    }

    public function validation($email, $hash, Request $request)
    {
        $user = User::where('email', $email)->firstOrFail();

        if (!$request->hasValidSignature()) {
            return view('linkexpired', compact('email'));
        }

        if ($email == $user->email && $hash == $user->remember_token) {
            event(new ActivateUserEvent($user));
            Auth::login($user);
            return redirect()->route('userDashboard');
        }


        return abort(401, "Email Code combination is invalid");
    }
    public function resend(string $email)
    {
        $user = User::where('email', $email)->firstOrFail();
        if (!$user->is_active) {
            event(new CreatedUserEvent($user));
            return redirect()->back()->with('success', 'You have Been Sent a new Email.');
        }
        return redirect('/');
    }
    public function deactivate(User $user)
    {
        if($user->is_active){
            $user->is_active = 0;
            $user->save();
            return response('User Deactivated');
        }
        return response('User is alredy inactive' , 500);
    }
}
