<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\User;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateDiscussionRequest;

class DiscussionController extends Controller
{
 
    public function index()
    {
        $discussions = Discussion::where('approved', '1')->get();

        return view('discussions.index', compact('discussions'));
    }

    public function adminView()
    {
        $discussions = Discussion::get();
        return view('discussions.adminView', compact('discussions'));
       
    }


    public function create()
    {
        $categories = Category::get();

        return view('discussions.create', compact('categories'));
    }


    public function store(CreateDiscussionRequest $request)
    {
        $discussion = new Discussion();

        $discussion->title = $request->title;
        $discussion->picture = $request->photo;
        $discussion->description = $request->description;
        $discussion->category_id = $request->category;
        $discussion->user_id = $request->userId;
        $discussion->created_at = Carbon::now();
        $discussion->approved = 0;
       
       if($discussion->save())
       {
        if (Auth::user()->role->name == 'admin')
        {
            return redirect()->route('admin.index')->with('success', 'Discussion successfuly created. It needs to be approved before you dig into it thought!');

        } else {

            return redirect()->route('discussions.index')->with('success', 'Discussion successfuly created. It needs to be approved before you dig into it thought!');
        }
       }
       return redirect()->route('discussions.index')->with('error', 'Something went wrong!');
       
    }


    public function show(string $id)
    {
        $discussion = Discussion::where('id', $id)->first();
        
        return view('discussions.show', compact('discussion'));
    }


    public function edit(string $id)
    {
        $users = User::get();
        $discussion = Discussion::where('id', $id)->first();
        $categories = Category::get();

        if($discussion->user_id !== Auth::user()->id && Auth::user()->role->name == 'user')
        {
            return redirect()->route('discussions.index')->with('error', 'Action not allowed!');
        }
      
        return view('discussions.edit', compact('discussion', 'categories'));
    }

    public function update(CreateDiscussionRequest $request, Discussion $discussion)
    {
        $discussion->title = $request->title;
        $discussion->picture = $request->photo;
        $discussion->description = $request->description;
        $discussion->category_id = $request->category;
        $discussion->updated_at = Carbon::now();
       
       if($discussion->save())
       {
        if (Auth::user()->role->name == 'admin')
        {
            return redirect()->route('admin.index')->with('success', 'Discussion updated successfuly.');
        } else {
            return redirect()->route('discussions.index')->with('success', 'Discussion updated successfuly.');
        }
       }
       return redirect()->route('discussions.index')->with('error', 'Something went wrong!');
    }

    public function approve(Request $request, Discussion $discussion)
    {
        $discussion->approved = $request->approve;
        $discussion->updated_at = Carbon::now();
       
       if($discussion->save())
       {
           return redirect()->route('admin.index')->with('success', 'Discussion approved!');
       }
       return redirect()->route('admin.index')->with('error', 'Something went wrong!');
    }

    public function destroy(Discussion $discussion)
    {

        if($discussion->delete())
        {
         if (Auth::user()->role->name == 'admin')
         {
             return redirect()->route('admin.index')->with('success', 'Discussion deleted successfuly.');
 
         } else {
 
             return redirect()->route('discussions.index')->with('success', 'Discussion deleted successfuly.');
         }
        }
        return redirect()->route('discussions.index')->with('error', 'Something went wrong!');
    }
}
