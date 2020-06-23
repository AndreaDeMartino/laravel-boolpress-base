<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id','title','body'];

    /****************************************************
    * Relazioni Db
    ****************************************************/

    // User (one to many)
    public function user(){
        return $this->belongsTo('App\User');
    }

    //  Comment (one to many)
    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
