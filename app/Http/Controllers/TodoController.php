<?php
namespace TodoList\Http\Controllers;

class TodoController extends Controller {
    
        public function lista(){
            return view('listagem');
        }
}