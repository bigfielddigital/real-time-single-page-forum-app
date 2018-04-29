<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected static function boot(){
        parent::boot();

        static::creating(function($reply){
            $reply->user_id = auth()->id();
        });
    }

    protected $guarded = [];

    public function question(){
        return $this->belongsTo(\App\Model\Question::class);
    }

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function like(){
        return $this->hasMany(\App\Model\Like::class);
    }
}
