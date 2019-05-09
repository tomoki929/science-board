<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Message;
use App\Count_comment;

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
        
        // コメント数の更新
        if(  Count_comment::where("message_id", $request->message_id)->exists() ) {
            $message = Message::find($request->message_id);
            $count_comments = $this->counts($message);
            $count_comment = Count_comment::where('message_id', $request->message_id)->first();
            $count_comment->message_id = $request->message_id;
            $count_comment->count_comments = $count_comments['count_comments'];
            $count_comment->save();
        }
        
        return back();
    }
}
