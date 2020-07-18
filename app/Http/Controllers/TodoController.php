<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        //$todos = Todo::all();
        $todos = Todo::orderBy('completed')->get();
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
        //return redirect()->back()->with('message', 'Updated!!');
        return redirect(route('todo.index'))->with('message', 'Updated!!');
    }

    public function complete(Todo $id)
    {
        $id->update(['completed'    => true]);
        return redirect()->back()->with('message', 'Task Marked as Completed');
    }


    public function incomplete(Todo $id)
    {
        $id->update(['completed'    => false]);
        return redirect()->back()->with('message', 'Task Marked as Incompleted');
    }

    public function delete(Todo $id)
    {
        $id->delete();
        return redirect()->back()->with('message', 'Task Marked as Deleted');
    }

}
