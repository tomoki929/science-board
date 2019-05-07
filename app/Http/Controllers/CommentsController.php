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
        
        if($request->name == "") {
            $request->name = '匿名さん';
        }
        
        if($request->file !== null){
            $filename = $request->file->store('public/img');
            $image_name = basename($filename);
        } else {
            $image_name = '';
        }
        
        $comment = new Comment();
        $comment->message_id = $request->message_id;
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->image_name = $image_name;
        $comment->save();
        
        return back();
    }
}
