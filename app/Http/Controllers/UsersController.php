<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * 
     * @return type
     */
    public function index(Request $request) {
        
        $data = [];
        if (\Auth::check()) {        
            #キーワード受け取り
            $keyword = $request->input('keyword');

            #クエリ生成
            $user = \Auth::user();
            $query = $user->messages();

            #もしキーワードがあったら
            if(!empty($keyword))
            {
              $query->where('content','like','%'.$keyword.'%');
            }

            $messages = $query
                            ->join('views', 'messages.id', '=', 'views.message_id')
                            ->join('count_comments', 'messages.id', '=', 'count_comments.message_id')
                            ->orderBy('created_at', 'desc')
                            ->select('messages.id','content','image_name','count_views','count_comments','messages.created_at','messages.updated_at')
                            ->paginate(10);
            
            $data = [
                    'user' => $user,
                    'messages' => $messages,
                    'keyword' => $keyword
            ];
            return view('users.index', $data);
        } else {
            return view('messages.index');
        }
    }
}
