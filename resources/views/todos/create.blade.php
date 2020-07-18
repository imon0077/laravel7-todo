@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create To Do') }}</div>

                <div class="card-body">
                    <x-alert/>                              
                    <form action="{{route('createtodo')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" name="title" class="form-control"/>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" Value="Create" class="btn btn-success"/>
                                <a href="{{route('todolist')}}" class="btn btn-primary">Back</a>
                            </div>
                        </div>                        
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
