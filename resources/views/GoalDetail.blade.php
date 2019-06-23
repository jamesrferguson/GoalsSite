@extends('layouts.app')

@section('title', 'Goal Name')
    
@section('content')

    {{ Form::open(['method' => 'DELETE', 'url' => "/deletegoal/{$goal->goalid}"]) }}
        <div class="form-group">
            {!! Form::label('goalName', 'Goal Name') !!}
            {!! Form::text('goalName', $goal->goalname, ['class' => 'form-control', 'readonly' => 'true']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('goalDate', 'Goal Date') !!}
            {!! Form::date('goalDate', $goal->goaldate, ['class' => 'form-control', 'readonly' => 'true']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('goalReason', 'Goal Reason') !!}
            {!! Form::textarea('goalReason', $goal->goalreason, ['class' => 'form-control', 'readonly' => 'true']) !!}
        </div>
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    {{ Form::close() }}

@endsection