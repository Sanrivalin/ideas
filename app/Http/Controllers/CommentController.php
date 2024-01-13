<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea){

        $comment = new Comment();
        //Settingup our relationship
        $comment->idea_id = $idea->id;
        //Setting the user_id
        // Storing the id of the comment
        $comment->user_id = auth()->id();
        $comment->content = request()->get('content');
        $comment->save();

        //Redirecting the user
        return redirect()->route('ideas.show', $idea->id)->with('success','Comment was posted succesfuly!');
    }
}
