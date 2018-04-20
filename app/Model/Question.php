<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function getRouteKeyName(){
        return 'slug';
    }

    // protected $fillable = ['title','slug','body','category_id','user_id'];

    protected $guarded = [];

    public function user(){
       return $this->belongsTo(\App\User::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute()
    {
        return asset("api/question/$this->slug");
    }
}
