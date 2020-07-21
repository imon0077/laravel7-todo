@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <h5 class="card-header text-white bg-success">{{ __('To Do Details') }}</h5>
                <div class="card-body">
                    <h5 class="card-title">{{$todo->title}}</h5>
                    <p class="card-text">{{$todo->description}}</p>
                    <a href="{{route('todo.index')}}" class="btn btn-default"> <i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
