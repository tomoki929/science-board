<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Comment;

class Message extends Model
{
    protected $fillable = ['image_name','content', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
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
