@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit To Do') }}</div>
                    
                <div class="card-body">                  
                    @include('layouts.flash')                              
                    <form action="{{route('todo.update', ['todo' => $todo->id])}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" name="title" value="{{$todo->title}}" class="form-control"/>
                            </div>
                            
                            <div class="col-md-8 mt-3">
                                <textarea name="description" rows="3" class="form-control" placeholder="Descrpition">{{$todo->description}}</textarea>
                            </div>

                            <div class="col-md-4 mt-3">
                                <input type="submit" Value="Update" class="btn btn-success"/>
                                <a href="{{route('todo.index')}}" class="btn btn-primary">Back</a>
                            </div>
                        </div>                        
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
