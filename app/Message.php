<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Comment;

class Message extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    /**
     * ユーザーに関連する電話レコードを取得
     */
    public function count_comment()
    {
        return $this->hasOne('App\Count_comment');
    }
}
