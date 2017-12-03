<?php

namespace TodoList;

use Illuminate\Database\Eloquent\Model;


class Todo extends Model
{
    protected $fillable = ['titulo','descricao','vencimento','categoria_id'];
    //

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function findToDoByCategoryId(){


    }
}
