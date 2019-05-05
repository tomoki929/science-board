<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Message;

class Comment extends Model
{
    protected $fillable = ['comment', 'message_id'];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
