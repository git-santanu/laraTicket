@extends('layout')
@section('content')
<div>
  <div class="float-start">
    <!-- <h3 class="pb-3">My Tickets</h3> -->
  </div>
  <div class="float-end">
    <a href="{{route('ticket.index')}}" class="btn btn-info">
      All Tickets
    </a>
  </div>
</div>

<h4 class="pb-3">Edit Ticket</h4>
<div class="card card-body bg-light p-4">
  <form action="{{route('ticket.update', $ticket->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{$ticket->title}}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea type="text" class="form-control" 
      id="description" name="description" rows="5">{{$ticket->description}}</textarea>
    </div>
    <div class="form-group">
      <label for="description">Status</label>
      <select name="status" id="status" class="form-control">
        @foreach($statuses as $status)
         <option value="{{$status['value']}}" {{$ticket->status ===$status['value'] ? 'selected' : ''}}>{{$status['label']}}</option>
        @endforeach
      </select>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>
@endsection