<?php namespace App\Http\Controllers;

use App\Todo;
use App\Category;
use Request;

class TodoController extends Controller {
    public function all() {
        $todos = Todo::all();

        return view('todo')->with('todos', $todos);
    }

    public function create() {
        return view('create-todo');
    }

    public function add() {
        $params = Request::all();

        Todo::create($params);

        return redirect('/');
    }
}