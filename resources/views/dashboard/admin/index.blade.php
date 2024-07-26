@extends('dashboard.layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Total Santri Card -->
        <div class="col-12 col-md-6 col-xl-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Santri
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahSantri }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Santri Aktif Card -->
        <div class="col-12 col-md-6 col-xl-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Santri Aktif
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahSantriAktif }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Santri Tidak Aktif Card -->
        <div class="col-12 col-md-6 col-xl-3 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Santri Boyong
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahSantriTidakAktif }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-times fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Guru -->
        <div class="col-12 col-md-6 col-xl-3 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Guru
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahGuru }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Santri Izin Pulang Card -->
        <div class="col-12 col-md-6 col-xl-3 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Santri Izin Pulang
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahSantriIzin }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Santri Sakit Card -->
        <div class="col-12 col-md-6 col-xl-3 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Santri Sakit
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahSantriSakit }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-injured fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Santri Telat Kembali Card -->
        <div class="col-12 col-md-6 col-xl-3 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Santri Telat Kembali
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahSantriTelat }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Santri Belum Kembali Card -->
        <div class="col-12 col-md-6 col-xl-3 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Total Santri Belum Kembali
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahSantriBelumKembali }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row">
        <!-- Chart Section 1 (Kamar Santri Chart) -->
        <div class="col-12 col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kamar Santri</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        {!! $chart1->container() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Chart Section 1 -->

        <!-- Chart Section 2 (Jenjang Santri Chart) -->
        <div class="col-12 col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Jenjang Santri</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        {!! $chart2->container() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Chart Section 2 -->
    </div>
    <!-- End Charts Section -->


@endsection

@section('scripts')
<script src="{{ $chart1->cdn() }}"></script>
{{ $chart1->script() }}

<script src="{{ $chart2->cdn() }}"></script>
{{ $chart2->script() }}
@endsection
