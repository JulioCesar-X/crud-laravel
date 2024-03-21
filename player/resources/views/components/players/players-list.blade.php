<table class="table">
  <thead class="thead-dark">
    <tr>
        <th scope="col" class="text-center">#ID</th>
        <th scope="col" class="text-center">Name</th>
        <th scope="col" class="text-center">Address</th>
        <th scope="col" class="text-center">Description</th>
        <th scope="col" class="text-center">Retired</th>
        <th scope="col" class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ( $players as $player)
            <tr>
                <th scope="row">{{ $player->id }}</th>
                <td>{{ $player->name}}</td>
                <td>{{ $player->address }}</td>
                <td>{{ $player->description }}</td>

                @if ($player->retired != true)
                    <td><i class="bi bi-emoji-frown-fill " style="color: gray;"></i></td>
                @else
                    <td><i class="bi bi-emoji-smile-fill" style="color: darkblue;"></i></td>
                @endif
                <td class="btn-group vertical-center" role="group" aria-label="Basic example">

                    <a href="{{ route('players.show',['player' => $player->id]) }}"><button type="button" class="btn-pl btn-success">Show</button></a>
                    <a href="{{ route('players.edit',['player' => $player->id]) }}"><button type="button" class="btn-pl btn-warning">Edit</button></a>
                    <a href="{{route('players.destroy',['player' => $player->id])}}"><button type="button" class="btn-pl btn-danger">Delete</button></a>

                </td>
            </tr>
    @endforeach
  </tbody>
</table>
<div class="btn-form">
    {{ $players->links() }}
</div>



