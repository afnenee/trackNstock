@extends('layouts/contentNavbarLayout')

@section('title', 'Inventory - Inventory Report')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Inventory Report</h1>

        <p class="mb-4">Showing products added from <strong>{{ $startDate }}</strong> to
            <strong>{{ $endDate }}</strong>:
        </p>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Etats</th>
                    <th>Placement</th>
                    <th>Add by</th>
                    <th>Added On</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->etats }}</td>
                        <td>{{ $product->placement }}</td>
                        <td>{{ $product->agent }}</td>
                        <td>{{ $product->created_at->format('Y-m-d') }}</td>
                        <td>{{ $product->updated_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No products found for the selected date range.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a class="btn btn-dark" href="{{ route('inventory.printReport', ['start_date' => $startDate, 'end_date' => $endDate]) }}" target="_blank">Print Report</a>

    </div>

@endsection
