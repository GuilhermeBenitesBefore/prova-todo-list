<?php namespace App\Http\Controllers;

use App\Todo;
use App\Category;
use App\Http\Requests\TodoRequest;
use Request;

class TodoController extends Controller {
    public function all() {
        $todos = Todo::all();

        return view('todo')->with('todos', $todos);
    }

    public function add(TodoRequest $request) {
        $params = $request->all();

        Todo::create($params);

        return redirect('/');
    }
}