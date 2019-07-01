@extends('layouts.app')

@section('title', 'Create A New Entry')
    
@section('content')
    <h4>Goal Name: {{$goal->goalname}}</h4>
    <p>What did you do?</p>
    
    {{ Form::open(['method' => 'POST', 'url' => "/newentry/{$goal->goalid}"]) }}
        <div class="form-group">
            {!! Form::label('entryDate', 'Date') !!}
            {!! Form::date('entryDate', date('Y-m-d'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('entryName', 'What did you do today?') !!}
            {!! Form::text('entryName', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('entryDetail', 'Detail') !!}
            {!! Form::textarea('entryDetail', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}
        <a href="/goaldetail/{{$goal->goalid }}" class='btn btn-secondary pull-right'>Back</a>
    {{ Form::close() }}    
    
@endsection