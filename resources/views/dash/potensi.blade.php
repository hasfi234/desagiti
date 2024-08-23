@extends('layouts.dash')

@section('container')
<div class="col-12 col-md-12 border rounded-3 p-3">

    <div class="mb-4">
        <h2>Edit Potensi Desa</h2>
        <form action="{{ route('dash.potensi.update', $potensi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $potensi->title }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="content" rows="3" required>{{ $potensi->content }}</textarea>
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Picture</label>
                <input type="file" name="picture" class="form-control" id="picture">
                @if ($potensi->picture)
                    <img src="{{ asset('storage/' . $potensi->picture) }}" alt="Current Image" class="img-fluid mt-2" style="max-height: 150px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</div>
@endsection
