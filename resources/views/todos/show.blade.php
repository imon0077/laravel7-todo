@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <h5 class="card-header text-white bg-success">{{ __('To Do Details') }}</h5>
                <div class="card-body">
                    <h3 class="card-title">{{$todo->title}}</h3>
                    <h5 class="card-title">Description : {{$todo->description}}</h5>
                    <p class="card-text"></p>


                    @if($todo->steps->count() > 0)
                        <div>
                        <br/>
                        <h5 class="card-title">Steps for this task</h5>
                        @foreach($todo->steps as $step)
                            <p class="card-text">{{$step->name}}</p> 
                        @endforeach
                        </div>
                    @endif

                    <a href="{{route('todo.index')}}" class="btn btn-default"> <i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
