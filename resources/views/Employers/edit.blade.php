
@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Employer info')
@section('content')
<div class="container">
    <h1>Edit Employer info</h1>

    <form action="{{ route('employers.update', $employers->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $employers->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $employers->email) }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
          <label for="phone_number" class="form-label">phone number</label>
          <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $employers->phone_number) }}">
          @error('phone_number')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="company" class="form-label">company</label>
            <input type="text" class="form-control" id="company" name="company" value="{{ old('company', $employers->company) }}">
            @error('company')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

          <div class="mb-3">
            <label for="address" class="form-label">address</label>
            <select name="address" class="form-control">
              @foreach($sellingPoints as $point)
                  <option value="{{ $point->location }}">
                      {{ $point->location }}
                  </option>
              @endforeach
          </select>@error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="position" class="form-label">position</label>
            <select name="position" class="form-control">
              <option value="admin">admin</option>
              <option value="employer">employer</option>
              <option value="manager">manager</option>
            </select>

          </div>

        <div class="mb-3">
          <label for="hired_at" class="form-label">hired at</label>
          <input type="date" class="form-control" id="hired_at" name="hired_at" value="{{ old('hired_at', $employers->hired_at) }}">
          @error('hired_at')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
