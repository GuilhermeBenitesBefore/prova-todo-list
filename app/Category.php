<?php

namespace TodoList;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function todo(){
        return $this->hasMany(Todo::class);
    }

}
