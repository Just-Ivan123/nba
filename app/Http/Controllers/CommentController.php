<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use App\Models\User;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if(!Auth::check()) {
            return redirect('/' . $request->team_id)->withErrors('Only authenticated user can post comments');
        }

        $request->validate([
            'content' => 'required|min:10|max:1000|string',
            'team_id' => 'required|exists:teams,id'
        ]);

        $team = Team::find($request->team_id);

        $user = User::find(Auth::user()->id);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->team()->associate($team);
        $comment->user()->associate($user);
        $comment->save();

        return redirect('/teams/' . $request->team_id)->with('status', 'Comment successfully created!');
    }
}
