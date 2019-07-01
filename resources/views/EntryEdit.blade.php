@extends('layouts.app')

@section('title', 'Edit: $entry->entryname')
    
@section('content')

    {{ Form::open(['method' => 'POST', 'url' => "/updateentry/{$entry->entryid}"]) }}
        <div class="form-group">
            {!! Form::label('entryName', 'Name') !!}
            {!! Form::text('entryName', $entry->entryname, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('entryDate', 'Date') !!}
            {!! Form::date('entryDate', $entry->entrydate, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('entryDetail', 'Detail') !!}
            {!! Form::textarea('entryDetail', $entry->entrytext, ['class' => 'form-control']) !!}
        </div>
        <a href="{{url()->previous()}}" class='btn btn-secondary pull-right'>Back</a>
        {{Form::hidden('_method', 'PUT')}}
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        
    {{ Form::close() }}

@endsection