@extends('layouts.app')

@section('title', "Edit: {$goal->goalname}")
    
@section('content')

    {{ Form::open(['method' => 'POST', 'url' => "/updategoal/{$goal->goalid}"]) }}
        <div class="form-group">
            {!! Form::label('goalName', 'Goal Name') !!}
            {!! Form::text('goalName', $goal->goalname, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('goalDate', 'Goal Date') !!}
            {!! Form::date('goalDate', $goal->goaldate, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('goalReason', 'Goal Reason') !!}
            {!! Form::textarea('goalReason', $goal->goalreason, ['class' => 'form-control']) !!}
        </div>
        <a href="{{url()->previous()}}" class='btn btn-secondary pull-right'>Back</a>
        {{Form::hidden('_method', 'PUT')}}
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        
    {{ Form::close() }}

@endsection