@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header text-white bg-success">{{ __('To Do List') }}</h5>

                <div class="card-body">
                    
                    <a href="{{route('todo.create')}}" class="btn btn-success btn-sm mb-3"><i class="fa fa-plus"></i> Add New Todo</a>
                    @include('layouts.flash')  

                    @if($todos->count() > 0)

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Status</th>
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

                                        <form style="display:none" id="{{'form-incomplete-'.$todo->id}}" method="post" action="{{route('todo.incomplete', ['todo' => $todo->id])}}">
                                            @csrf
                                            @method('put')
                                        </form>
                                    @else
                                        <span onclick="event.preventDefault();
                                                    document.getElementById('form-complete-{{$todo->id}}')
                                                    .submit()" 
                                                    class="badge badge-dark" style="cursor: pointer;"> pending </span>

                                        <form style="display:none" id="{{'form-complete-'.$todo->id}}" method="post" action="{{route('todo.complete', ['todo' => $todo->id])}}">
                                            @csrf
                                            @method('put')
                                        </form>
                                    @endif
                                </td>

                                <td>
                                @if($todo->completed)
                                    <s>{{$todo->title}}</s>
                                @else
                                    <a href="{{route('todo.show', ['todo' => $todo->id])}}" class="">{{$todo->title}}</a>
                                @endif
                                </td>

                                <td>
                                    <a href="{{route('todo.edit', ['todo' => $todo->id])}}" class="text-primary mx-2"><i class="fa fa-pencil fa-lg"></i></a>
                                    
                                    <span onclick="event.preventDefault();
                                                document.getElementById('form-delete-{{$todo->id}}')
                                                .submit()" 
                                                class="text-danger" style="cursor: pointer;"> <i class="fa fa-trash fa-lg"></i> </span>

                                    <form style="display:none" id="{{'form-delete-'.$todo->id}}" method="post" action="{{route('todo.destroy', ['todo' => $todo->id])}}">
                                        @csrf
                                        @method('delete')
                                    </form>

                                </td>

                                </tr>   
                            @endforeach                         
                        </tbody>
                        </table>
                        @else 
                        <br/>
                        <span>No Task Available!!</span>
                        @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
