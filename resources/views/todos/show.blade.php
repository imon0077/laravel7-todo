@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$todo->title}}
                <a href="{{route('todo.index')}}" class="btn btn-primary btn-sm"><< Back</a>
                </div>

                <div class="card-body">    
                    <div class="row">
                        <div class="col-md-8">
                            {{$todo->description}}
                        </div>
                    </div>                        
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
