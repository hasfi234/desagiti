@extends('layouts.dash')

@section('container')
<div class="col-12 col-md-12 border rounded-3 p-3">
    <h2>Edit Contact Information</h2>
    
    <form action="{{ route('dash.kontak.update', $kontak->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="lokasi" class="form-label">Location</label>
            <input type="text" name="lokasi" class="form-control" id="lokasi" value="{{ $kontak->lokasi }}" required>
        </div>

        <div class="mb-3">
            <label for="pos" class="form-label">Postal Code</label>
            <input type="text" name="pos" class="form-control" id="pos" value="{{ $kontak->pos }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $kontak->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{ $kontak->phone }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
