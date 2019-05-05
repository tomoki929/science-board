<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|max:255',
        ]);
        
//        $request->message()->comments()->create([
//            'comment' => $request->comment,
//        ]);
        
        if($request->name == "") {
            $request->name = '匿名さん';
        }
        
        $comment = new Comment();
        $comment->message_id = $request->message_id;
        $comment->name = $request->name;
        $comment->comment    = $request->comment;
        $comment->save();
     
        return back();
    }
}
