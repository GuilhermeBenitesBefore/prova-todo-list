<?php

namespace TodoList;

use Illuminate\Database\Eloquent\Model;


class Todo extends Model
{
    protected $fillable = ['titulo','descricao','vencimento','category_id'];
    //

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public static function findToDosByCategoryId($categoryId){
        return self::where('category_id', $categoryId)->get();
    }

    public static function findToDosBetweenDates($inicialDate, $finalDate){
        return self::whereBetween('vencimento',array($inicialDate,$finalDate))->get();
    }

    

}
