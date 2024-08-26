@extends('layouts/contentNavbarLayout')

@section('title', 'Selling - point')

@section('content')
    <div class="card">
        <div class="card-header-container" style="display: flex;align-items: center;justify-content: space-between;">
            <h5 class="card-header"style="margin: 0;">Selling point</h5>
            <form id="search-form" method="GET" style="margin-right: 5px;">
              <input type="text" name="search" id="search-input" class="form-control" placeholder="Search for selling point..." value="{{ request()->query('search') }}">
            </form>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>Name</th>
                        <th>description</th>
                        <th>location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($sellingPoints as $Point)
                      <tr>
                          <td><input type="checkbox" class="select-item"></td>
                          <td>{{ $Point->name }}</td>
                          <td>{{ $Point->description }}</td>
                          <td>{{ $Point->location }}</td>
                          <td>
                              <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                      data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                  <div class="dropdown-menu">
                                      <a class="dropdown-item" href="{{ route('selling-point.edit', $Point->id) }}"><i
                                              class="bx bx-edit-alt me-1"></i> Edit</a>
                                      <a href="#" class="dropdown-item text-danger" data-id="{{ $Point->id }}"
                                      onclick="event.preventDefault(); confirmDelete('{{ $Point->id }}');">
                                      <i class="bx bx-trash me-1"></i> Delete
                                    </a>

                                    <form id="delete-form-{{ $Point->id }}" action="{{ route('selling-point.destroy', $Point->id) }}" method="POST" style="display:none;">
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
        if (confirm('Are you sure you want to delete this selling point?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
  </script>
  @yield('scripts')

@endsection
