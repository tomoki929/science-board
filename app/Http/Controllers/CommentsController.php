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
        
//        var_dump($request);
//        exit;
        
//        $request->message()->comments()->create([
//            'comment' => $request->comment,
//        ]);
        
        $comment = new Comment();
        $comment->message_id = $request->message_id;
        $comment->comment    = $request->comment;
        $comment->save();
     
        return back();
    }
}
