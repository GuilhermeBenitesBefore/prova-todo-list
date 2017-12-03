<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('end')->with('tags')->get();
        return response()->json($tasks, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 1,
                'message' => $validator->errors()->all()
            ], 400);
        }

        $task = Task::create($request->all());

        if (count($request->get('tags')) > 0) {
            $_tags = [];
            foreach ($request->get('tags') as $tag) {
                $_tags[]['title'] = $tag;
            }
            $tags = $task->tags()->createMany($_tags);
        }

        return response()->json([
            'error' => 0
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'start' => 'required',
            'end' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 1,
                'message' => $validator->errors()->all()
            ], 400);
        }

        $task->update($request->all());

        if (count($task->tags()->get()) > 0) {
            $task->tags()->delete();
        }

        if (count($request->get('tags')) > 0) {
            $_tags = [];
            foreach ($request->get('tags') as $tag) {
                $_tags[]['title'] = $tag;
            }
            $tags = $task->tags()->createMany($_tags);
        }

        return response()->json([
            'error' => 0
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if (count($task->tags()->get()) > 0) {
            $task->tags()->delete();
        }
        $task->delete();
        return response()->json(null, 204);
    }
}
