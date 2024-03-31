<div class="table-responsive">

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">#</th>
                {{-- <th scope="col" class="text-center">Image</th> --}}
                <th scope="col" class="text-center">First Name</th>
                <th scope="col" class="text-center">Last Name</th>
                <th scope="col" class="text-center">Birth Date</th>
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
                    <td>{{ $person->birth_date }}</td>

                    @if ($person->country)
                        <td>{{ $person->country->name }}</td>
                    @else
                        <td>N/A</td>
                    @endif
                    <td>
                        @if ($person->bicycles)
                            <table class="table table-borderless">
                                @foreach ($person->bicycles as $bicycle)
                                    <tr>
                                        <td class="inline"><strong>{{ $bicycle->model }}</strong></td>
                                        <td class="inline">
                                            <div id="color-circle" class="col-md-3"
                                                style="border: 5px solid {{$bicycle->color}}; border-style: dashed;">
                                                <i class="bi bi-bicycle"></i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="btn-group" role="group" aria-label="Basic example">
                        <div class="row actions">
                            <a href="{{ url('person/' . $person->id) }}">
                                <button type="button" class="btn-actions">Show</button>
                            </a>
                            @auth
                                <a href="{{ url('person/' . $person->id . '/edit') }}">
                                    <button type="button" class="btn-actions">Edit</button>
                                </a>
                                <form method="POST" action="{{ url('person/' . $person->id) }}">
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
