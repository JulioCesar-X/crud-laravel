<div class="table-responsive">

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Image</th>
                <th scope="col" class="text-center">Brand</th>
                <th scope="col" class="text-center">Model</th>
                <th scope="col" class="text-center">Color</th>
                <th scope="col" class="text-center">Price</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bicycles as $bicycle)
                <tr>
                    <th scope="row">{{ $bicycle->id }}</th>
                    <td class="image">
                        @if ($bicycle->image)
                        <div>
                            <img class="w-100 img-responsive" src="{{ asset('storage/'.$bicycle->image) }}" alt="" title="">
                        </div>
                        @else
                        <p>
                            No Image
                        </p>
                        @endif
                    </td>
                    <td>{{ $bicycle->brand }}</td>
                    <td>{{ $bicycle->model }}</td>
                    <td style="background-color: {{ $bicycle->color }}"></td>
                    <td>{{ $bicycle->price}} €</td>
                    <td class="btn-group" role="group" aria-label="Basic example">
                        <div class="row actions">
                            <a href="{{ url('bicycle/' . $bicycle->id) }}">
                                <button type="button" class="btn-actions">Show</button>
                            </a>
                            @auth
                                <a href="{{ url('bicycle/' . $bicycle->id . '/edit') }}">
                                    <button type="button" class="btn-actions">Edit</button>
                                </a>
                                <form method="POST" action="{{ url('bicycle/' . $bicycle->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-actions"
                                        onclick="return confirm('Are you sure you want to delete this bike?')">Delete
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
