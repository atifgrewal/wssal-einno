@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
{{-- {{dd($data)}} --}}
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- You are logged in! --}}
                    <main class="py-6 bg-surface-secondary">
                        <div class="container-fluid">
                            <!-- Card stats -->
                            <div class="row g-6 mb-6">
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <div class="row">

                                                @foreach ($data as $item)
                                                <div class="col">
                                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total User</span>
                                                    <span class="h3 font-bold mb-0">{{$item->id}}</span>
                                                </div>

                                                @endforeach
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                                        <i class="bi bi-credit-card"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-0 text-sm">
                                                <span class="badge badge-pill bg-soft-success text-success me-2">
                                                    <i class="bi bi-arrow-up me-1"></i>
                                                </span>
                                                <span class="text-nowrap text-xs text-muted"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                {{-- @foreach ($data2 as $item ) --}}
                                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Driver</span>
                                                    <span class="h3 font-bold mb-0">{{$data2->COUNT()}}</span>

                                                    {{-- @endforeach --}}
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                        <i class="bi bi-people"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-0 text-sm">
                                                <span class="badge badge-pill bg-soft-success text-success me-2">
                                                    <i class="bi bi-arrow-up me-1"></i>
                                                </span>
                                                <span class="text-nowrap text-xs text-muted"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                {{-- @foreach($data3 as $item) --}}
                                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Products</span>
                                                    <span class="h3 font-bold mb-0">{{$data3->count()}}</span>
                                                    {{-- @endforeach --}}
                                                </div>

                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                                        <i class="bi bi-clock-history"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-0 text-sm">
                                                <span class="badge badge-pill bg-soft-danger text-danger me-2">
                                                    <i class="bi bi-arrow-down me-1"></i>                                                </span>
                                                <span class="text-nowrap text-xs text-muted"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                {{-- @foreach ($data1 as $item1 ) --}}
                                                <div class="col">
                                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Categories</span>
                                                    <span class="h3 font-bold mb-0">{{$data1->count()}}</span>
                                                </div>

                                                {{-- @endforeach --}}
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                                        <i class="bi bi-minecart-loaded"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-0 text-sm">
                                                <span class="badge badge-pill bg-soft-success text-success me-2">
                                                    <i class="bi bi-arrow-up me-1"></i>                                              </span>
                                                <span class="text-nowrap text-xs text-muted"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                </div>


                {{-- <div class="card-body"> --}}
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- You are logged in! --}}
                    <main class="py-6 bg-surface-secondary">
                        <div class="container-fluid">
                            <!-- Card stats -->
                            <div class="row g-6 mb-6">
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col">
                                                {{-- @foreach ($data as $item) --}}
                                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Order</span>
                                                    <span class="h3 font-bold mb-0">{{$data7->count()}}</span>
                                                </div>
                                                {{-- @endforeach --}}

                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                                        <i class="bi bi-credit-card"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-0 text-sm">
                                                <span class="badge badge-pill bg-soft-success text-success me-2">
                                                    <i class="bi bi-arrow-up me-1"></i>
                                                </span>
                                                <span class="text-nowrap text-xs text-muted"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                {{-- @foreach ($data2 as $item ) --}}
                                                <div class="col">
                                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Sub Category</span>
                                                    <span class="h3 font-bold mb-0">{{$data5->count()}}</span>
                                                </div>

                                                {{-- @endforeach --}}
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                        <i class="bi bi-people"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-0 text-sm">
                                                <span class="badge badge-pill bg-soft-success text-success me-2">
                                                    <i class="bi bi-arrow-up me-1"></i>
                                                </span>
                                                <span class="text-nowrap text-xs text-muted"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                {{-- @foreach($data3 as $item) --}}
                                                <div class="col">
                                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total unit</span>
                                                    <span class="h3 font-bold mb-0">{{$data6->count()}}</span>
                                                </div>
                                                {{-- @endforeach --}}

                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                                        <i class="bi bi-clock-history"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-0 text-sm">
                                                <span class="badge badge-pill bg-soft-danger text-danger me-2">
                                                    <i class="bi bi-arrow-down me-1"></i>
                                                </span>
                                                <span class="text-nowrap text-xs text-muted"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                {{-- @foreach ($data1 as $item1 ) --}}
                                                <div class="col">
                                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Vendors</span>
                                                    <span class="h3 font-bold mb-0">{{$data4->count()}}</span>
                                                </div>

                                                {{-- @endforeach --}}
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                                        <i class="bi bi-minecart-loaded"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-0 text-sm">
                                                <span class="badge badge-pill bg-soft-success text-success me-2">
                                                    <i class="bi bi-arrow-up me-1"></i>
                                                </span>
                                                <span class="text-nowrap text-xs text-muted"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                {{-- </div> --}}






            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
<style>

@import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

/* Bootstrap Icons */
@import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");
</style>
