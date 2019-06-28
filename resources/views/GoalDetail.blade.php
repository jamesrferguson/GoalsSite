@extends('layouts.app')

@section('title', 'Goal Name')
    
@section('content')
    <h1>{{ $goal->goalname }}</h1>
    <h3>Date: {{ $goal->goaldate }}</h3>
    <h4>Reason:</h4>
    <p>{{ $goal->goalreason }}</p>
    
    <a href="/editgoal/{{$goal->goalid}}" class='btn btn-primary'>Edit</a>

    <hr>    
    <a href="/" class='btn btn-secondary'>Back</a>
    <button type="submit" class="btn btn-danger" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#deleteGoalModal">Delete</button>

    {{-- Data delete Modal Dialog --}}
    <div class="modal fade" id="deleteGoalModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Do you want to delete this goal?</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(['method' => 'POST', 'url' => "/deletegoal/{$goal->goalid}", 'class' => 'pull-right']) }}
                        {{Form::hidden('_method', 'DELETE')}}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection