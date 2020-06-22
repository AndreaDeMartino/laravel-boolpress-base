<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoUser extends Model
{
    protected $fillable = ['user_id','phone','address','avatar'];

    // Rimuovere Timestamps predefinito di Laravel
    public $timestamps = false;

}
