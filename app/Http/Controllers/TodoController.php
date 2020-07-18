<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view("todos.index", compact('todos'));
    }

    public function create()
    {
        return view("todos.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:300'
        ]);

        Todo::create($request->all());

        return redirect()->back()->with('message', 'To do created successfully');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view("todos.edit", compact('todo'));
    }

    public function update(Request $request, Todo $id)
    {
        $request->validate([
            'title' => 'required|max:300'
        ]);

        $id->update(['title'    => $request->title]);
        return redirect()->back()->with('message', 'Updated!!');
    }
}
