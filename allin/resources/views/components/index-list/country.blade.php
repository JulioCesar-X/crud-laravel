<div class="table-responsive">

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Flag</th>
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($countries as $country)
                <tr>
                    <th scope="row">{{ $country->id }}</th>
                    <td>
                    @if ($country->image)
                    <div>
                        <img class="w-100 img-responsive" src="{{ asset('storage/'.$country->image) }}" alt="" title="">
                    </div>
                    @else
                    <p>
                        No Image
                    </p>
                    @endif
                    <td>{{ $country->name }}</td>
                    <td class="btn-group" role="group" aria-label="Basic example">
                        <div class="row actions">
                            @auth
                                <a href="{{ url('country/' . $country->id . '/edit') }}">
                                    <button type="button" class="btn-actions">Edit</button>
                                </a>
                                <form method="POST" action="{{ url('country/' . $country->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-actions"
                                        onclick="return confirm('Tem certeza que deseja excluir este jogador?')">Delete
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
