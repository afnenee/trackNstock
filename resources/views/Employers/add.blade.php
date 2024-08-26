@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <h3>Add Employer</h3>
    <form action="{{ route('employers.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name"> Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
      </div>
        <div class="form-group">
            <label for="email"> Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="company"> company</label>
          <input type="text" class="form-control" id="company" name="company" required>
      </div>
        <div class="form-group">
            <label for="phone_number"> Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
        </div>
        <div class="form-group">
            <label for="Address">Address</label>
            <select name="address" class="form-control">
                @foreach($sellingPoints as $point)
                    <option value="{{ $point->location }}">
                        {{ $point->location }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="Position">Position </label>
          <select name="position" class="form-control">
                <option value="admin">admin</option>
                <option value="employer">employer</option>
                <option value="manager">manager</option>
        </select>
      </div>
      <div class="form-group">
        <label for="hired_at">hired at</label>
        <input type="date" class="form-control" id="hired_at" name="hired_at" required>
    </div>
        <br>
        <button type="submit" class="btn btn-primary">Add Employer</button>
    </form>
</div>
@endsection
