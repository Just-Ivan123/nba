<h1>Player {{$player->first_name}}</h1>
<table class="table">
    <tr>
      <th scope="col">Name: {{$player->first_name}}</th>
      <th scope="col">Last Name : {{$player->last_name}}</th>
      <th scope="col">Email: {{$player->email}}</th>
      <th scope="col"><a href ="/teams/{{$player->team->id}}">Team : {{$player->team->name}}</a></th>
    </tr>
</table>