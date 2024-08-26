@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <h3>Add Selling point</h3>
    <form action="{{ route('selling-point.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name"> Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description"> Description</label>
            <input type="description" class="form-control" id="description" name="description" required>
        </div>
        <div class="form-group">
          <label for="location"> location</label>
          <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Add Selling point</button>
    </form>
</div>
@endsection
