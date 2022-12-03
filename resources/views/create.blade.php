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

<h4 class="pb-3">Create Ticket</h4>
<div class="card card-body bg-light p-4">
  <form action="{{route('ticket.store')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea type="text" class="form-control" id="description" name="description" rows="5"></textarea>
    </div>
    <div class="form-group">
      <label for="description">Status</label>
      <select name="status" id="status" class="form-control">
        @foreach($statuses as $status)
         <option value="{{$status['value']}}">{{$status['label']}}</option>
        @endforeach
      </select>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>
@endsection