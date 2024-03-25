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
        @foreach ($players as $player)
            <tr>
                <th scope="row">{{ $player->id }}</th>
                <td>{{ $player->name }}</td>
                <td>{{ $player->address }}</td>
                <td>{{ $player->description }}</td>

                @if ($player->retired != true)
                    <td><i class="bi bi-emoji-frown-fill " style="color: gray;"></i></td>
                @else
                    <td><i class="bi bi-emoji-smile-fill" style="color: darkblue;"></i></td>
                @endif
                <td class="btn-group vertical-center" role="group" aria-label="Basic example">

                    <a href="{{ url('players/'.$player->id) }}"><button type="button"
                            class="btn-pl btn-success">Show</button></a>
                    <a href="{{ url("players/".$player->id.'/edit') }}"><button type="button"
                            class="btn-pl btn-warning">Edit</button></a>
                    <form method="POST" action="{{ url('players/'.$player->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mt-2 mb-5 btn-pl btn-danger"
                            onclick="return confirm('Tem certeza que deseja excluir este jogador?')">Deletar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="btn-form btn-primary">
    {{ $players->links() }}
    {{-- <button type="button" class="btn-pl btn-primary"><a href="{{ url('players/save') }}">Export</a></button> --}}
    {{-- <form  type="file" name="path" action="{{ url('players.load') }}">
    @csrf
        <button type="submit" class="btn-pl btn-primary">Import data</button>
    </form> --}}
</div>
