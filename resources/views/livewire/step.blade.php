<div class="col-md-8 mt-3">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h4 class="pull-left mt-1">Add Steps</h4> 
            <span class="pull-left btn text-primary" wire:click="AddStep"><i class="fa fa-plus fa-lg"></i></span>
        </div>
    </div>
 
    <div class="row">
        @foreach($steps as $step) 
        <div class="col-md-12 mt-3" wire:key="{{$step}}">       
            <input type="text" name="step[]" class="form-control col-md-10 pull-left" placeholder="{{'Describe Step '.($step+1)}}"/>
            <span class="text-danger mx-2 mt-2" wire:click="remove({{$step}})"><i class="fa fa-times fa-lg"></i></span>    
        </div>
        @endforeach
    </div>
</div>

