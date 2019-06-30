@extends('layouts.app')

@section('title', 'Goals')
    
@section('content')
    <h2>Goals</h2>
    

    @if(sizeof($goals) > 0)
    <div class="list-group">
        <h4>Current Goals:</h4>  
        @foreach ($goals as $goal)
            <a href="/goaldetail/{{$goal->goalid}}" class="list-group-item list-group-item-action">{{ $goal->goalname }}</a>
        @endforeach
    </div>
    @else
        <p>You haven't created any goals yet! Get started <a href="{!! url('/create') !!}">here</a>.</p>
    @endif
@endsection

    