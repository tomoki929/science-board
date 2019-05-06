<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        
        foreach($messages as $message){
            $count_comments = $this->counts($message);
            $message = $message->toArray();
            $message += $count_comments;
            $messages_array[] = $message;
        }

        $data = [
            'messages' => $messages_array,
        ];

        return view('messages.index', $data);
    }
    
    public function show($id)
    {
        $message = Message::find($id);
        $comments = $message->comments()->orderBy('created_at', 'desc')->get();
        
        $data = [
            'message' => $message,
            'comments' => $comments,
        ];

        return view('messages.show', $data);
    }
    
    public function create()
    {
        $message = new Message;

        return view('messages.create', [
            'message' => $message,
        ]);
    }
    
    public function store(Request $request)
    {
        $message = new Message;
        $message->content = $request->content;
        $message->save();

        return redirect('/');
    }
    
    public function edit($id)
    {
        $message = Message::find($id);

        return view('messages.edit', [
            'message' => $message,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $message = Message::find($id);
        $message->content = $request->content;
        $message->save();

        return redirect('/');
    }
    
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();

        return redirect('/');
    }
}
