@extends('layouts/contentNavbarLayout')

@section('title', 'Product History')

@section('content')
    <div class="card">
        <div class="card-header-container" style="display: flex; align-items: center; justify-content: space-between;">
          <h5 class="card-header" style="margin: 0;">Product History - {{ $product->name }}</h5>
          <a class="btn btn-danger" href="{{ route('product.imprime_his', $product->id) }}" id="print-btn" style="margin-right: 10px;">✢ Print</a>

        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>name</th>
                        <th>Changes</th>
                        <th>etats</th>
                        <th>placement</th>
                        <th>Updated At</th>

                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($histories as $history)
                        <tr>
                            <td>{{ $history->product_id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                <ul>
                                    @foreach (explode(', ', $history->changes) as $change)
                                        <li>{{ $change }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ $history->etats }}</td>
                            <td>{{ $history->placement }}</td>
                            <td>{{ $history->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
