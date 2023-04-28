@extends('layout.default')
@section('content')
<h1>Team  {{$team->name}}</h1>
<table class="table">
    <tr>
      <th scope="col">Name: {{$team->name}}</th>
      <th scope="col">Email : {{$team->email}}</th>
      <th scope="col">Address: {{$team->address}}</th>
      <th scope="col">City : {{$team->city}}</th>
    </tr>
</table>
  <hr>
  <h1>Players</h1>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
    @foreach($team->players as $player)
    <tr>
      <th scope="row">{{$player->id}}</th>
      <td>{{$player->first_name}}</td>
      <td>{{$player->last_name}}</td>
      <td>{{$player->email}}</td>
      <td><a href="/players/{{$player->id}}">This Player</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<hr>
<h1>Comments</h1>
<form action="/createcomment" method="POST" class="mt-5">
        @csrf
        <div class="mb-3">
            <label class="form-label">Enter your comment</label>
            <textarea type="text" class="form-control" name="content" required></textarea>
            <input type="hidden" name="team_id" value="{{ $team->id }}">
        </div>
        <button type="submit" class="btn btn-primary">Post Comment</button>
    </form>
    @include('layout.errors')
@include('layout.session')
@include('comment')
@endsection