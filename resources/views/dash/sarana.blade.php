@extends('layouts.dash')

@section('container')
<div class="col-12 col-md-12 border rounded-3 p-3">

    <!-- Form for Adding or Editing Sarana -->
    <div class="mb-4">
        <h2>{{ isset($sarana) ? 'Edit' : 'Add' }} Sarana</h2>
        <form action="{{ isset($sarana) ? route('dash.sarana.update', $sarana->id) : route('dash.sarana.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($sarana))
            @method('PUT')
            @endif
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $sarana->title ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Picture</label>
                <input type="file" name="picture" class="form-control" id="picture">
                @if (isset($sarana) && $sarana->picture)
                    <img src="{{ asset('storage/' . $sarana->picture) }}" alt="Current Image" class="img-fluid mt-2" style="max-height: 150px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($sarana) ? 'Update' : 'Save' }}</button>
        </form>
    </div>

    <!-- Sarana Table -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Picture</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($saranas as $sarana)
                <tr>
                    <td>{{ $sarana->title }}</td>
                    <td><img src="{{ $sarana->picture ? asset('storage/' . $sarana->picture) : 'https://via.placeholder.com/100' }}" alt="Image" class="img-fluid"></td>
                    <td>
                        <a href="{{ route('dash.sarana.edit', $sarana->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('dash.sarana.destroy', $sarana->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
