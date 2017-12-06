<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'done', 'start', 'end'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
