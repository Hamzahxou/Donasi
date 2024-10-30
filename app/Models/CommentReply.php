<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [
        'comment',
        'parent_reply_id',
        'user_id',
        'comment_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }

    public function parentReply()
    {
        return $this->belongsTo(CommentReply::class, 'parent_reply_id', 'id');
    }
}
