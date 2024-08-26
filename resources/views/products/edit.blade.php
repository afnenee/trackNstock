
@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Product')
@section('content')
<div class="container">
    <h1>Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="barcode" class="form-label">Barcode</label>
            <input type="text" class="form-control" id="barcode" name="barcode" value="{{ old('barcode', $product->barcode) }}" required>
            @error('barcode')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
          <label for="etats">etats</label>
          <select name="etats" class="form-control">
              <option value="broken-down" {{ old('etats', $product->etats) === 'broken-down' ? 'selected' : '' }}>
                  broken-down
              </option>
              <option value="functional" {{ old('etats', $product->etats) === 'functional' ? 'selected' : '' }}>
                  functional
              </option>
          </select>
      </div>

      <div class="form-group">
        <label for="placement">placement</label>
        <select name="placement" class="form-control">
            @foreach($sellingPoints as $point)
                <option value="{{ $point->location }}"
                    {{ old('placement', $product->placement) === $point->location ? 'selected' : '' }}>
                    {{ $point->location }}
                </option>
            @endforeach
        </select>
    </div>
<br>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
