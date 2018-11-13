<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{

    protected $fillable = [
        'comment_id',
        'body',
        'is_active',
        'photo',
        'author',
        'email'
    ];


    public function comment () {

        return $this->belongsTo('App\Comment');

    }
}
