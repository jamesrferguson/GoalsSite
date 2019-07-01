@extends('layouts.app')

@section('title', $entry->entryname)
    
@section('content')
<div class="blog-post">
    <h2 class="blog-post-title">{{ $entry->entryname }}</h2>
    <p class="blog-post-meta">Created on: {{ $entry->entrydate }}</p>
    <p>{{ $entry->entrytext }}</p>
    
    <a href="/editentry/{{$entry->entryid}}" class='btn btn-primary'>Edit</a>    
</div>
<hr>    

<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteEntryModal">Delete</button>          
<a href="/goaldetail/{{$entry->goal_id}}" class='btn btn-secondary pull-right'>Back</a>

<div class="modal" id="deleteEntryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this entry?</p>
            </div>
            <div class="modal-footer">
                {{ Form::open(['method' => 'POST', 'url' => "/deleteentry/{$entry->entryid}", 'class' => 'pull-right']) }}
                    {{Form::hidden('_method', 'DELETE')}}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@endsection