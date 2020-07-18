@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('To Do List') }}</div>

                <div class="card-body">
                    <a href="{{route('createtodo')}}" class="btn btn-success mb-3">Create Todo</a>

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($todos as $todo)
                                <tr>
                                <th scope="row">{{$todo->id}}</th>
                                <td>{{$todo->title}}</td>
                                <td>
                                    <a href="{{route('todo.edit', ['id' => $todo->id])}}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                                </tr>   
                            @endforeach                         
                        </tbody>
                        </table>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
