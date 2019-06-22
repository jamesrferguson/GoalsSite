@extends('layouts.app')

@section('title', 'Create A New Goal')
    
@section('content')
    <form action="/addgoal" method="POST">
        @csrf
        <div class="form-group">
            <label for="goalName">Name</label>
            <input type="text" class="form-control" id="goalName"  name="goalName" placeholder="Goal Name">
        </div>
        <div class="form-group">
            <label for="goalDate">Due Date</label>
            <input type="date" class="form-control" name="goalDate" id="goalDate">
        </div>
        <div class="form-group">
            <label for="goalReason">Reason</label>
            <textarea type="text" class="form-control" id="goalReason" name="goalReason" rows="5"></textarea>
        </div>
        <input type="submit" value="Submit">        
    </form>
@endsection