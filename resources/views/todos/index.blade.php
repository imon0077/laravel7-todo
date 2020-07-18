@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('To Do List') }}</div>

                <div class="card-body">
                    <a href="{{route('todo.create')}}" class="btn btn-success mb-3">Create Todo</a>
                    @include('layouts.flash')  
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col"></th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($todos as $todo)
                                <tr>
                                <th scope="row">{{$todo->id}}</th>
                                <td>
                                    @if($todo->completed)
                                        <span onclick="event.preventDefault();
                                                    document.getElementById('form-incomplete-{{$todo->id}}')
                                                    .submit()" 
                                                    class="badge badge-success" style="cursor: pointer;"> Done </span>

                                        <form style="display:none" id="{{'form-incomplete-'.$todo->id}}" method="post" action="{{route('todo.incomplete', ['id' => $todo->id])}}">
                                            @csrf
                                            @method('put')
                                        </form>
                                    @else
                                        <span onclick="event.preventDefault();
                                                    document.getElementById('form-complete-{{$todo->id}}')
                                                    .submit()" 
                                                    class="badge badge-dark" style="cursor: pointer;"> Mark as Completed </span>

                                        <form style="display:none" id="{{'form-complete-'.$todo->id}}" method="post" action="{{route('todo.complete', ['id' => $todo->id])}}">
                                            @csrf
                                            @method('put')
                                        </form>
                                    @endif
                                </td>

                                <td>
                                @if($todo->completed)
                                    <s>{{$todo->title}}</s>
                                @else
                                    {{$todo->title}}
                                @endif
                                </td>

                                <td>
                                    <a href="{{route('todo.edit', ['id' => $todo->id])}}" class="btn btn-sm btn-primary">Edit</a>
                                    
                                    <span onclick="event.preventDefault();
                                                document.getElementById('form-delete-{{$todo->id}}')
                                                .submit()" 
                                                class="btn btn-sm btn-danger" style="cursor: pointer;"> Del </span>

                                    <form style="display:none" id="{{'form-delete-'.$todo->id}}" method="post" action="{{route('todo.delete', ['id' => $todo->id])}}">
                                        @csrf
                                        @method('delete')
                                    </form>

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
