@extends('layout.default')
@section('content')
    @include('layout.errors')
@include('layout.session')
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
  @foreach($teams as $team)
    <tr>
      <th scope="row">{{$team->id}}</th>
      <td>{{$team->name}}</td>
      <td>{{$team->email}}</td>
      <td>{{$team->address}}</td>
      <td>{{$team->city}}</td>
      <td><a href="/teams/{{$team->id}}">This team</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection