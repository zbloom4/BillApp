<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    protected $fillable = ['painLevel','isSeen', 'waitTime'];
    public function user(){

        return $this->belongsTo('App\User');

    }

}
