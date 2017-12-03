<?php

namespace TodoList;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['titulo','descricao','vencimento'];
    //
}
