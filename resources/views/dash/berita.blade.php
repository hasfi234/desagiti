@extends('layouts.dash')

@section('container')
<div class="col-12 col-md-12 border rounded-3 p-3">

    <!-- Form for Adding or Editing News -->
    <div class="mb-4">
        <h2>{{ isset($news) ? 'Edit' : 'Add' }} News</h2>
        <form action="{{ isset($news) ? route('dash.berita.update', $news->id) : route('dash.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($news))
        @method('PUT')
        @endif
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $news->title ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="content" rows="3" required>{{ $news->content ?? '' }}</textarea>
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Picture</label>
                <input type="file" name="picture" class="form-control" id="picture">
                @if (isset($news) && $news->picture)
                    <img src="{{ asset('Storage/' . $news->picture) }}" alt="Current Image" class="img-fluid mt-2" style="max-height: 150px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($news) ? 'Update' : 'Save' }}</button>
        </form>
    </div>

    <!-- News Table -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Picture</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
<tr>
    <td>{{ $post->title }}</td>
    <td>{{ $post->content }}</td>
    <td><img src="{{ $post->picture ? asset('storage/' . $post->picture) : 'https://via.placeholder.com/100' }}" alt="Image" class="img-fluid"></td>
    <td>
        <a href="{{ route('dash.berita.edit', $post->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('dash.berita.destroy', $post->id) }}" method="POST" style="display:inline;">
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
