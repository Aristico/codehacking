<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'post_id',
        'body',
        'is_active',
        'author',
        'email',
        'photo'
    ];

    public function replies () {

        return $this->hasMany('App\CommentReply');

    }

    public function post () {

        return $this->belongsTo('App\Post');

    }

}

