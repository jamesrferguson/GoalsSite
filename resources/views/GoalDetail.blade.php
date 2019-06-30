@extends('layouts.app')

@section('title', 'Goal Name')
    
@section('content')
    <h1>{{ $goal->goalname }}</h1>
    <h3>Date: {{ $goal->goaldate }}</h3>
    <h4>Reason:</h4>
    <p>{{ $goal->goalreason }}</p>
    
    <a href="/editgoal/{{$goal->goalid}}" class='btn btn-primary'>Edit</a>

    <hr>

    

    {{ Form::open(['method' => 'POST', 'url' => "/deletegoal/{$goal->goalid}", 'class' => 'pull-right']) }}
        {{Form::hidden('_method', 'DELETE')}}
        <a href="/" class='btn btn-secondary pull-right'>Back</a>
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    {{ Form::close() }}

@endsection