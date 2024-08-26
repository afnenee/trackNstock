
@extends('layouts/contentNavbarLayout')

@section('title', 'Edit selling-point info')
@section('content')
<div class="container">
    <h1>Edit selling Point info</h1>

    <form action="{{ route('selling-point.update', $sellingPoints->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $sellingPoints->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="description" class="form-control" id="description" name="description" value="{{ old('description', $sellingPoints->description) }}" required>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
          <label for="location" class="form-label">location</label>
          <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $sellingPoints->location) }}">
          @error('location')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
