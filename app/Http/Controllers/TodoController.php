<?php
namespace TodoList\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ToDoController extends Controller {
    
        public function lista(){

            $todos = DB::select('select * from todo_laravel.todos');
            return view('listagem')->with('toDos',$todos);
        }


        public function index(){
            return view('cadastro');
        }
}