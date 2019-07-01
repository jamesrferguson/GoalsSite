@extends('layouts.app')

@section('title', $goal->goalname)
    
@section('content')
<div class="blog-post">
    <h2 class="blog-post-title">{{ $goal->goalname }}</h1>
    <p class="blog-post-meta">Target date: {{ $goal->goaldate }}</p>
    <p>{{ $goal->goalreason }}</p>
</div>   
    <a href="/editgoal/{{$goal->goalid}}" class='btn btn-primary'>Edit</a>    

@if (count($entries) > 0)
    <hr>
    <h4>Entries</h4>
    <div class="list-group">
        @foreach ($entries as $entry)
            <a href="/entrydetail/{{$entry->entryid}}" class="list-group-item list-group-item-action">{{ $entry->entryname }}</a>
        @endforeach
    </div>
    {{ $entries->links() }}
@endif

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

<a href="/createentry/{{$goal->goalid}}" class='btn btn-success pull-right'>Add Entry</a>

@endsection