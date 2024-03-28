<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Image</th>
            <th scope="col" class="text-center">Name</th>
            <th scope="col" class="text-center">Address</th>
            <th scope="col" class="text-center">Description</th>
            <th scope="col" class="text-center">Retired</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($players as $player)
             <tr>
                <th scope="row">{{ $player->id }}</th>
                <td>
                    @if ($player->image)
                        <img class="w-100 img-responsive" src="{{ asset('storage/'.$player->image) }}" alt="" title="">
                    @else
                        <p>
                             No Image
                        </p>
                    @endif
                </td>
                <td>{{ $player->name }}</td>
                <td>{{ $player->address->address }}</td>
                <td>{{ $player->description }}</td>

                @if ($player->retired != true)
                    <td><i class="bi bi-emoji-frown-fill " style="color: gray;"></i></td>
                @else
                    <td><i class="bi bi-emoji-smile-fill" style="color: darkblue;"></i></td>
                @endif

                <td class="btn-group vertical-center" role="group" aria-label="Basic example">

                    <a href="{{ url('players/'.$player->id) }}">
                        <button type="button" class="btn-pl btn-success">Show</button>
                    </a>

                    @auth
                        <a href="{{ url("players/".$player->id.'/edit') }}">
                            <button type="button" class="btn-pl btn-warning">Edit</button>
                        </a>
                        <form method="POST" action="{{ url('players/'.$player->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mt-2 mb-5 btn-pl btn-danger" onclick="return confirm('Tem certeza que deseja excluir este jogador?')">Deletar
                            </button>
                        </form>
                    @endauth
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>

