@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Create To Do') }}</div> -->
                <h5 class="card-header text-white bg-success">{{ __('Create To Do') }}</h5>

                <div class="card-body">                     
                    @include('layouts.flash')                              
                    <form action="{{route('todo.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" name="title" class="form-control" placeholder="Title"/>
                            </div>

                            <div class="col-md-8 mt-3">
                                <textarea name="description" rows="3" class="form-control" placeholder="Descrpition"></textarea>
                            </div>

                            
                            @livewire('step')

                            <div class="col-md-8 mt-3">
                                <input type="submit" Value="Create" class="btn btn-success"/>
                                <a href="{{route('todo.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                        </div>                        
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
