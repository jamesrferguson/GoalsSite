@extends('layouts.app')

@section('title', 'Goals')
    
@section('content')
    <h2>Goals</h2>
    <h4>Current Goals:</h4>  

    <div class="list-group">
        @foreach ($goals as $goal)
            <a href="/goaldetail/{{$goal->goalid}}" class="list-group-item list-group-item-action">{{ $goal->goalname }}</a>
        @endforeach
    </div>
    
@endsection

    