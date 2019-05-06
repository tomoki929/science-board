<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;
use App\View;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::orderBy('created_at', 'DESC')->paginate(10);
        
        foreach($messages as $message){
            if(  View::where("message_id", $message->id)->exists() ){
                $views = View::where('message_id', $message->id)->first()->toArray();
                $count_views = [ 'count_views' => $views['count_views'] ]; 
            } else {
                $count_views = [ 'count_views' => 0 ];
            }
            $count_comments = $this->counts($message);
            $message = $message->toArray();
            $message += $count_comments;
            $message += $count_views;
            $messages_array[] = $message;         
        }

        $data = [
            'messages' => $messages,
            'messages_array' => $messages_array,
        ];

        return view('messages.index', $data);
    }
    
    public function show($id)
    {
        // 閲覧数の更新
        if(  View::where("message_id", $id)->exists() ) {
            $view = View::where('message_id', $id)->first();
            $view->count_views = $view->count_views + 1;
            $view->save();
        } else {
            $view = new View();
            $view->message_id = $id;
            $view->count_views = 1;
            $view->save();
        }

        
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
