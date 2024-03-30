<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col" class="text-center">#</th>
            {{-- <th scope="col" class="text-center">Image</th> --}}
            <th scope="col" class="text-center">First Name</th>
            <th scope="col" class="text-center">Last Name</th>
            <th scope="col" class="text-center">Country</th>
            <th scope="col" class="text-center">Bicycles</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($people as $person)
            <tr>
                <th scope="row">{{ $person->id }}</th>
                {{-- <td>
                    @if ($person->image)
                        <img class="w-100 img-responsive" src="{{ asset('storage/'.$person->image) }}" alt="" title="">
                    @else
                        <p>
                             No Image
                        </p>
                    @endif
                </td> --}}
                <td>{{ $person->first_name }}</td>
                <td>{{ $person->last_name }}</td>

                @if ($person->country)
                    <td>{{ $person->country->name }}</td>
                @else
                    <td>N/A</td>
                @endif

                <td>
                    @if ($person->bicycles)
                        <ul>
                            @foreach ($person->bicycles as $bicycle)
                                <li style="background-color:{{ $bicycle->color }}">{{ $bicycle->brand }}</li>
                            @endforeach
                        </ul>
                    @else
                        N/A
                    @endif
                </td>
                <td class="btn-group vertical-center" role="group" aria-label="Basic example">
                    <a href="{{ url('person/' . $person->id) }}">
                        <button type="button" class="btn-pl btn-success">Show</button>
                    </a>
                    @auth
                        <a href="{{ url('person/' . $person->id . '/edit') }}">
                            <button type="button" class="btn-pl btn-warning">Edit</button>
                        </a>
                        <form method="POST" action="{{ url('person/' . $person->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mt-2 mb-5 btn-pl btn-danger"
                                onclick="return confirm('Tem certeza que deseja excluir este jogador?')">Delete
                            </button>
                        </form>
                    @endauth
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
