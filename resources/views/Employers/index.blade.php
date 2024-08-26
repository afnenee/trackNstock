@extends('layouts/contentNavbarLayout')

@section('title', 'Employer - Table Employers')

@section('content')
    <div class="card">
        <div class="card-header-container" style="display: flex;align-items: center;justify-content: space-between;">
            <h5 class="card-header"style="margin: 0;">Employers</h5>
            <form style="margin-right:5px;" action="{{ route('Employers.index') }}" method="GET" style="margin: 0;">
                <input type="text" name="search" class="form-control" placeholder="Search for employer..."
                    value="{{ request()->query('search') }}">
            </form>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>Name</th>
                        <th>email</th>
                        <th>phone number</th>
                        <th>company</th>
                        <th>adress</th>
                        <th>position</th>
                        <th>hired_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($employers as $employer)
                        <tr>
                            <td><input type="checkbox" class="select-item"></td>
                            <td>{{ $employer->name }}</td>
                            <td>{{ $employer->email }}</td>
                            <td>{{ $employer->phone_number }}</td>
                            <td>{{ $employer->company }}</td>
                            <td>{{ $employer->address }}</td>
                            <td>{{ $employer->position }}</td>
                            <td>{{ $employer->hired_at }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('employers.edit', $employer->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a href="#" class="dropdown-item text-danger" data-id="{{ $employer->id }}"
                                            onclick="event.preventDefault(); confirmDelete('{{ $employer->id }}');">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </a>

                                        <form id="delete-form-{{ $employer->id }}"
                                            action="{{ route('employers.destroy', $employer->id) }}" method="POST"
                                            style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>

                                </div>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @yield('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('select-all');
            const itemCheckboxes = document.querySelectorAll('.select-item');

            selectAllCheckbox.addEventListener('change', function() {
                itemCheckboxes.forEach(checkbox => {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });

            itemCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    if (!checkbox.checked) {
                        selectAllCheckbox.checked = false;
                    } else if (Array.from(itemCheckboxes).every(cb => cb.checked)) {
                        selectAllCheckbox.checked = true;
                    }
                });
            });
        });

        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this employer?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
    @yield('scripts')

@endsection
