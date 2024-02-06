<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Comment;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index()
    {
        // 
    }


    public function create()
    {
        return view('comments.create');
    }

    public function create2(string $id)
    {
        $discussion = Discussion::where('id', $id)->get();
        return view('comments.create', compact('discussion'));
    }

    public function store(Request $request)
    {
        $comment = new Comment();

        $comment->comment = $request->comment;
        $comment->user_id = $request->userId;
        $comment->discussion_id = $request->discussionId;
        $comment->created_at = Carbon::now();

        if($comment->save())
        {
            return redirect()->route('discussions.show', $request->discussionId)->with('success', 'Comment posted!');
        }
        return redirect()->route('discussions.show', $request->discussionId)->with('error', 'Something went wrong!');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        // $discussion = Discussion::where('id', $id)->get();
        $comment = Comment::where('id', $id)->first();

        if($comment->user_id !== Auth::user()->id && Auth::user()->role->name == 'user')
        {
            return redirect()->route('discussions.index')->with('error', 'Action not allowed!');
        }
      
        return view('comments.edit', compact('comment'));
    }


    public function update(Request $request, Comment $comment)
    {
        $comment->comment = $request->comment;
        $comment->updated_at = Carbon::now();

        if($comment->save())
        {
            return redirect()->route('discussions.show', $comment->discussion_id)->with('success', 'Comment updated successfuly.');
        }
        return redirect()->route('discussions.index')->with('error', 'Something went wrong!');
    }


    public function destroy(Comment $comment)
    {
        if($comment->delete())
        {
            return redirect()->route('discussions.show', $comment->discussion_id)->with('success', 'Comment deleted successfuly.');
        }
        return redirect()->route('discussions.index')->with('error', 'Something went wrong!');
    }
}
