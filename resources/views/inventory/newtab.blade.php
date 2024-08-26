@extends('layouts/contentNavbarLayout')

@section('title', 'Inventory - New Table')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-header">{{ $inventory->name }} - New Table Created</h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>etats</th>
                        <th>placement</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tableData as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->etats }}</td>
                            <td>{{ $row->placement }}</td>
                            <td>{{ $row->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const clickableRows = document.querySelectorAll('.clickable-row');
    clickableRows.forEach(row => {
        row.addEventListener('click', function() {
            window.location.href = this.dataset.href;
        });
    });
});
</script>
@endsection
