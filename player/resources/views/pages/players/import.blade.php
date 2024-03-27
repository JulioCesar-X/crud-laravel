@extends('master.main')

@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Import this file</h5>
                <form method="POST" action="{{ url('players/store-import') }}" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="form-label"><strong>file</strong></label>
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" accept="csv, xls, xlsx" value="{{ old('file') }}" >
                        @if ($errors->has('file'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('file') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-outline btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
