<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Categorie;

class SearchController extends Controller
{
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

        $messages = $query
                    ->join('views', 'messages.id', '=', 'views.message_id')
                    ->join('count_comments', 'messages.id', '=', 'count_comments.message_id')
                    // 新着順 ↓ここを変数にして新着順・閲覧順・コメント順にしたい　
                    ->orderBy('created_at', 'desc')
                    ->select('messages.id','content','image_name','count_views','count_comments','messages.created_at','messages.updated_at')
                    ->paginate(10);
        
        $data = [
            'messages' => $messages,
            'keyword' => $keyword
        ];

        return view('messages.search', $data);
    }
    
    public function search()
    {
        
        $categories = Categorie::all();
        
        $data = [
            'categories' => $categories
        ];
      
        return view('categories.search', $data);
    }
    
    public function result($id)
    {        
        $category = Categorie::where('id', $id)->first();
        
        $messages = Message::where('category_id', $id)
                        ->join('views', 'messages.id', '=', 'views.message_id')
                        ->join('count_comments', 'messages.id', '=', 'count_comments.message_id')
                        ->orderBy('count_comments', 'desc')
                        ->select('messages.id','content','image_name','count_views','count_comments','messages.created_at','messages.updated_at')
                        ->paginate(10);
        
        $data = [
            'messages' => $messages,
            'category' => $category
        ];
      
        return view('categories.result', $data);
    }
}
