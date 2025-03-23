@extends('layouts.master')
@section('title', $title ?? 'Dashboard')
@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            Dashboard
                        </h1>
                        <div class="page-header-subtitle"></div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="row">
                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                            <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                            <input class="form-control ps-0 pointer" id="litepickerRangePlugin" placeholder="Select date range..." />

                        </div>
                        <div style="width: 5.5rem;">
                            <a class="btn btn-warning" href="{{route('dashboard')}}">Clear</a>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-xxl-12 col-xl-12 mb-4">
                <!-- <div class="card h-100">
                    <div class="card-body h-100 p-5">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-xxl-8">
                                <div class="text-center text-xl-start text-xxl-start mb-4 mb-xl-0 mb-xxl-4">
                                    <h1 class="text-primary">Welcome to Visit AJ&K</h1>
                                    <p class="text-gray-700 mb-0">Azad Government of the State of Jammu & Kashmir.</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-xxl-4 text-center"><img class="img-fluid" src="{{asset('images/full_map.png')}}" style="max-width: 10rem" /></div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="container-xl px-4">
        <!-- Example Colored Cards for Dashboard Demo-->
        <div class="row">
            <div class="col-lg-6 col-xl-3 mb-4">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Tours</div>
                                <div class="text-lg fw-bold">123</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="activity"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="">View</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 mb-4">
                <div class="card bg-warning text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Tourist</div>
                                <div class="text-lg fw-bold"></div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="users"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="">View</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 mb-4">
                <div class="card bg-success text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Entry Points</div>
                                <div class="text-lg fw-bold"></div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="home"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="">View</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 mb-4">
                <div class="card bg-danger text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Vehicles</div>
                                <div class="text-lg fw-bold"></div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="truck"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="">View</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 1-->
                <div class="card border-start-lg border-start-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small fw-bold text-primary mb-1">Entry Point Officers</div>
                                <div class="h5"></div>
                                <div class="text-xs fw-bold text-success d-inline-flex align-items-center">

                                </div>
                            </div>
                            <div class="ms-2"><i class="fas fa-tag fa-2x text-gray-200"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 2-->
                <div class="card border-start-lg border-start-secondary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small fw-bold text-secondary mb-1">Transport Officers</div>
                                <div class="h5"></div>
                                <div class="text-xs fw-bold text-danger d-inline-flex align-items-center">
                                </div>
                            </div>
                            <div class="ms-2"><i class="fas fa-tag fa-2x text-gray-200"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 3-->
                <div class="card border-start-lg border-start-success h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small fw-bold text-success mb-1">Tour Operators</div>
                                <div class="h5">{{$operator}}</div>
                                <div class="text-xs fw-bold text-success d-inline-flex align-items-center">
                                </div>
                            </div>
                            <div class="ms-2"><i class="fas fa-tag fa-2x text-gray-200"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 4-->
                <div class="card border-start-lg border-start-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small fw-bold text-info mb-1">Users</div>
                                <div class="h5">{{$users->count()}}</div>
                                <div class="text-xs fw-bold text-danger d-inline-flex align-items-center">
                                </div>
                            </div>
                            <div class="ms-2"><i class="fas fa-users fa-2x text-gray-200"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xl px-4">
        <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
                @include('include.mapapp')
            </div>
        </div>
    </div>
</main>
@section('scripts')
<script>

</script>
@endsection
@endsection