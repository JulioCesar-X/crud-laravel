<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col" class="text-center">Address</th>
            <th scope="col" class="text-center">City</th>
            <th scope="col" class="text-center">Country</th>
            <th scope="col" class="text-center">Player</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($addresses as $address)
            <tr>
                <th scope="row">{{ $address->address }}</th>
                <td>{{ $address->city }}</td>
                @if ($address->player)
                    <td>{{ $address->player->name }}</td>
                @else
                    <td>No player</td>
                @endif
                <td class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-success">Show</button>
                    <button type="button" class="btn btn-warning">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
