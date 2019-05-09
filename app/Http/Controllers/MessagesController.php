<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;
use App\View;
use App\Count_comment;


class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        #キーワード受け取り
        $keyword = $request->input('keyword');

        #クエリ生成
        $query = Message::query();

        #もしキーワードがあったら
        if(!empty($keyword))
        {
          $query->where('content','like','%'.$keyword.'%');
        }

//        $messages = \DB::table('messages')
        $messages = $query
                        ->join('views', 'messages.id', '=', 'views.message_id')
                        ->join('count_comments', 'messages.id', '=', 'count_comments.message_id')
                        ->orderBy('count_comments', 'desc')
                        ->select('messages.id','content','image_name','count_views','count_comments','messages.created_at','messages.updated_at')
                        ->paginate(10);
        
//        var_dump($messages);
//        exit;

       ################################################################################        
//        $messages = $query->orderBy('created_at', 'DESC')->paginate(10);
        
//        $messages_array = [];
//        
//        foreach($messages as $message){
//            if(  View::where("message_id", $message->id)->exists() ){
//                $views = View::where('message_id', $message->id)->first()->toArray();
//                $count_views = [ 'count_views' => $views['count_views'] ]; 
//            } else {
//                $count_views = [ 'count_views' => 0 ];
//            }
//            $count_comments = $this->counts($message);
//            $message = $message->toArray();
//            $message += $count_comments;
//            $message += $count_views;
//            $messages_array[] = $message;         
//        }
        
        ###############################################################################
//        // 指定したキーに対応する値を基準に、配列をソートする
//        function sortByKey($key_name, $sort_order, $array) {
//            foreach ($array as $key => $value) {
//                $standard_key_array[$key] = $value[$key_name];
//            }
//
//            array_multisort($standard_key_array, $sort_order, $array);
//
//            return $array;
//        }
//
//        // 降順ソートする
//        $messages_array = sortByKey('count_comments', SORT_DESC, $messages_array);
        ###############################################################################

//        $data = [
//            'messages' => $messages,
//            'messages_array' => $messages_array,
//            'keyword' => $keyword
//        ];
        
        $data = [
            'messages' => $messages,
            'keyword' => $keyword
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
//            $view = new View();
//            $view->message_id = $id;
//            $view->count_views = 1;
//            $view->save();
        }
        
        $message = Message::find($id);
        $comments = $message->comments()->orderBy('created_at', 'asc')->get();
        
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
        $filename = $request->file->store('public/img');
        
        $message = new Message;
        $message->content = $request->content;
        $message->image_name = basename($filename);
        $message->save();
        $count_comments = new Count_comment();
        $count_comments->message_id = $message->id;
        $count_comments->count_comments = 0;
        $count_comments->save();
        $views = new View();
        $views->message_id = $message->id;
        $views->count_views = 0;
        $views->save();

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
