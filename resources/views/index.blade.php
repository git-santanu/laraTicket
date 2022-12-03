@extends('layout')
@section('content')
<div>
  <div class="float-start">
    <!-- <h3 class="pb-3">My Tickets</h3> -->
  </div>
  <div class="float-end">
    <a href="{{route('ticket.create')}}" class="btn btn-info">
      Create Ticket
    </a>
  </div>
</div>

<h4 class="pb-3">My Ticket</h4>
@foreach($tickets as $ticket)
<div class="card">
  <div class="card-header">
    {{$ticket->title}}
    <span class="badge rounded-pill bg-warning text-dark">
      {{$ticket->created_at->diffForHumans()}}
    </span>
  </div>
  <div class="card-body">
    <div class="card-text">
      {{$ticket->description}}
      <br>
      <span class="badge rounded-pill bg-info text-white">
        {{$ticket->status}}
      </span>
      <small>Updated at {{$ticket->updated_at->diffForHumans()}}</small>
    </div>
    <div class="float-end">
      <a href="{{route('ticket.edit', $ticket->id)}}" class="btn btn-success">Edit</a>
      <form action="{{route('ticket.destroy', $ticket->id)}}" method="POST" style="display: inline">
      @csrf 
      @method('DELETE') 
      <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </div>
  </div>
</div>
@endforeach
@endsection