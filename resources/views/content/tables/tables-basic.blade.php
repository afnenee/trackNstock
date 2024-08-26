@extends('layouts/contentNavbarLayout')

@section('title', 'Inventory - Table product')

@section('content')

    <div class="card">
        <div class="card-header-container" style="display: flex; align-items: center; justify-content: space-between;">
            <h5 class="card-header" style="margin: 0;">Products</h5>
            <form id="search-form" method="GET"style="margin-left: 580px;">
                <input type="text" name="search" id="search-input" class="form-control" placeholder="Search for product..."
                    value="{{ request()->query('search') }}">
            </form>
            <a class="btn btn-danger" href="#" id="print-btn" style="margin-right:5px;"> ✢ Print</a>

        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Barcode</th>
                        <th>Category</th>
                        <th>etats</th>
                        <th>placement</th>
                        <th>agent</th>
                        <th>created at</th>
                        <th>updated at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($products as $product)
                        <tr>
                            <td><input type="checkbox" class="select-item" value="{{ $product->id }}"></td>
                            <td>
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    style="width: 50px; height: 50px;">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->barcode }}</td>
                            <td><span class="badge bg-label-primary me-1">{{ $product->category }}</span></td>
                            <td>{{ $product->etats }}</td>
                            <td>{{ $product->placement }}</td>
                            <td>{{ $product->agent }}</td>
                            <td>{{ $product->created_at->format('Y-m-d') }}</td>
                            <td>{{ $product->updated_at->format('Y-m-d H:i:s') }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('products.edit', $product->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="{{ route('products.history', $product->id) }}"><i
                                                class="bx bx-history me-1"></i> History</a>
                                        <a href="#" class="dropdown-item text-danger" data-id="{{ $product->id }}"
                                            onclick="event.preventDefault(); confirmDelete('{{ $product->id }}');">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </a>

                                        <form id="delete-form-{{ $product->id }}"
                                            action="{{ route('products.destroy', $product->id) }}" method="POST"
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
    <!-- Script for checkbox selection and print button -->
    @yield('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('select-all');
            const itemCheckboxes = document.querySelectorAll('.select-item');
            const printButton = document.getElementById('print-btn');

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

            printButton.addEventListener('click', function(event) {
                event.preventDefault();
                const selectedItems = Array.from(itemCheckboxes)
                    .filter(cb => cb.checked)
                    .map(cb => cb.value);
                if (selectedItems.length > 0) {
                    const url = `{{ route('product.imprime') }}?ids=${selectedItems.join(',')}`;
                    window.location.href = url;
                } else {
                    alert('Please select at least one product to print.');
                }
            });
        });

        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
    @yield('scripts')
@endsection
