@extends('layouts/contentNavbarLayout')
@section('title', 'Add inventory')
@section('content')

    <div class="container mt-5">
        <h1>Create Inventory</h1>
        <form action="{{ route('inventory.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Inventory Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="agent"> Agent</label>
              <select name="agent" class="form-control">
                @foreach($Employers as $employer)
                    <option value="{{ $employer->name }}">
                        {{ $employer->name }}
                    </option>
                @endforeach
            </select>
          </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" readonly>
            </div>
            <div class="form-group">
                <label for="product_id">Product</label>
                <select class="form-control" id="product_id" name="product_id" required>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
<script>
  document.addEventListener('DOMContentLoaded', function() {
      var today = new Date().toISOString().split('T')[0];
      document.getElementById('date').value = today;
  });
</script>
