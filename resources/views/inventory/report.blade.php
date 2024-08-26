@extends('layouts/contentNavbarLayout')

@section('title', 'Inventory - Inventory Report')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Inventory Report</h1>

    <form action="{{ route('inventory.report.generate') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date:</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required>
            <div class="invalid-feedback">
                Please select a start date.
            </div>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date:</label>
            <input type="date" id="end_date" name="end_date" class="form-control" required>
            <div class="invalid-feedback">
                Please select an end date.
            </div>
        </div>
        <div class="mb-3">
          <label for="agent"> Agent</label>
          <select name="agent" class="form-control">
            <option value="all">all</option>
            @foreach($employers as $employer)
                <option value="{{ $employer->name }}">
                    {{ $employer->name }}
                </option>
            @endforeach
        </select>
        <div class="invalid-feedback">
          Please select an agent.
      </div>
      </div>

        <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>
</div>

@section('scripts')
<script>
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endsection
@endsection
