@extends('layouts.app')

@section('title', 'Goal Name')
    
@section('content')
    <h1>{{ $goal->goalname }}</h1>
    <h3>Date: {{ $goal->goaldate }}</h3>
    <h4>Reason:</h4>
    <p>{{ $goal->goalreason }}</p>
    
    <a href="/editgoal/{{$goal->goalid}}" class='btn btn-primary'>Edit</a>

    <hr>    

    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteGoalModal">Delete</button>          
    <a href="/" class='btn btn-secondary pull-right'>Back</a>

    <div class="modal" id="deleteGoalModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Goal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this goal?</p>
                </div>
                <div class="modal-footer">
                    {{ Form::open(['method' => 'POST', 'url' => "/deletegoal/{$goal->goalid}", 'class' => 'pull-right']) }}
                        {{Form::hidden('_method', 'DELETE')}}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    

@endsection