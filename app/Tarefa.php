<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefa extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'descricao',
        'data_inicio',
        'data_fim',
        'categoria_id'
    ];

    protected $dates = ['deleted_at'];

    public function categoria() {
        return $this->belongsTo('App\Categoria', 'categoria_id');
    }

}
