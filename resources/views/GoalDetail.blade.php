@extends('layouts.app')

@section('title', 'Goal Name')
    
@section('content')
    <form>
        <div class="form-group">
            <label for="goalName">Name</label>
            <input type="text" class="form-control" id="goalName" value="{{$goal->goalname}}" readonly>
        </div>
        <div class="form-group">
            <label for="goalDate">Due Date</label>
            <input type="date" class="form-control" id="goalDate" value="{{$goal->goaldate}}" readonly>
        </div>
        <div class="form-group">
            <label for="goalReason">Reason</label>
            <textarea type="text" class="form-control" id="goalReason" rows="5" readonly>{{$goal->goalreason}}</textarea>
        </div>        
    </form>
@endsection