@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('vendor-style')
    @vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
@endsection

@section('vendor-script')
    @vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@endsection

@section('page-script')
    @vite('resources/assets/js/dashboards-analytics.js')
@endsection

@section('content')
    <div class="row">
        <div class="col-xxl-8 mb-6 order-0">
            <div class="card">
                <div class="d-flex align-items-start row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-3">Welcome to <mark>TrackNstock</mark> - Your Ultimate Online Inventory
                                Management Solution!</h5>
                            <p class="mb-6">In today’s business world, efficient inventory management is essential. TrackNstock offers an easy-to-use platform to help you streamline your inventory, cut costs, and boost productivity.
                              Whether you run a small store or a large warehouse, our website gives you all the tools you need to track stock, manage orders, and monitor sales—all online. With real-time tracking, automated order management, detailed reports, and seamless integration with other systems, TrackNstock keeps you in control of your inventory.
                              Join us today and simplify your inventory management!</p>
                            <a href="{{ route('product.inventory') }}" class="btn btn-sm btn-outline-primary">Create
                                Inventorys</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-6">
                            <img src="{{ asset('assets/img/illustrations/inv.png') }}" height="175" class="scaleX-n1-rtl">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
