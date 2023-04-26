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