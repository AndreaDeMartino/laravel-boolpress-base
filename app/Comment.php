<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'author',
        'message',
        'vote'
    ];

    // Post (one to many)
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
