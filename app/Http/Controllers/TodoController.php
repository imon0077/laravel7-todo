<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\step;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth')->except('index');
    }

    public function index()
    {
        //$todos = Todo::all();
        //$todos = Todo::orderBy('completed')->get();

        //ORM Relationship
        //$todos = auth()->user()->todos()->orderBy('completed')->get();
        $todos = auth()->user()->todos->sortBy('completed');
        return view("todos.index", compact('todos'));
    }

    public function create()
    {
        return view("todos.create");
    }

    public function show(Todo $todo)
    {
        //return $todo->steps;
        return view("todos.show", compact('todo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:300'
        ]);

        // $userId = auth()->id();
        // $request['user_id'] = $userId;
        //Todo::create($request->all());

        $todo = auth()->user()->todos()->create($request->all());
        if($request->step){
            foreach ($request->step as $step) {
                $todo->steps()->create(['name'   =>  $step]);
            }
        }
        
        return redirect()->back()->with('message', 'To do created successfully');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view("todos.edit", compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|max:300'
        ]);

        $todo->update(['title'    => $request->title]);

        if($request->stepName){
            foreach ($request->stepName as $key => $value) {
                $id = $request->stepId[$key];

                if(!$id){
                    $todo->steps()->create(['name'   =>  $value]);
                }
                else{
                    $step = step::find($id);
                    $step->update(['name'   =>  $value]);
                }
            }
        }

        //return redirect()->back()->with('message', 'Updated!!');
        return redirect(route('todo.index'))->with('message', 'Updated!!');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed'    => true]);
        return redirect()->back()->with('message', 'Task Marked as Completed');
    }


    public function incomplete(Todo $todo)
    {
        $todo->update(['completed'    => false]);
        return redirect()->back()->with('message', 'Task Marked as Incompleted');
    }

    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message', 'Task Marked as Deleted');
    }

}
