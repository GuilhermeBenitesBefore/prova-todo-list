<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todo';

    protected $fillable = array('title', 'description', 'deadline', 'category_id');

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
