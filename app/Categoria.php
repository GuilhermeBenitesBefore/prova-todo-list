<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'descricao'
    ];

    protected $dates = ['deleted_at'];

    public function tarefas() {
        return $this->hasMany('App\Tarefa', 'categoria_id');
    }

}
