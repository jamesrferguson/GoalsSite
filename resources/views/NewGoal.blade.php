@extends('layouts.app')

@section('title', 'Create A New Goal')
    
@section('content')
    {{ Form::open(array('url' => '/addgoal')) }}
        <div class="form-group">
            {!! Form::label('goalName', 'Goal Name') !!}
            {!! Form::text('goalName', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('goalDate', 'Goal Date') !!}
            {!! Form::date('goalDate', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('goalReason', 'Goal Reason') !!}
            {!! Form::textarea('goalReason', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {{ Form::close() }}
@endsection