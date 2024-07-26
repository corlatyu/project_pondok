@extends('dashboard.layouts.master')

@section('title', 'Cetak Kartu Santri')

@section('content')
<!-- Main Content -->
<div id="content">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Santri</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Santri</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($santris as $santri)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $santri->id_santri }}</td>
                            <td>{{ $santri->nama }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $santri->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $santri->id }}">
                                        <a class="dropdown-item" href="{{ route('santri.print.card', $santri->id) }}" target="_blank">
                                            <i class="fas fa-file-image mr-2"></i> Download Image
                                        </a>
                                        <a class="dropdown-item" href="{{ route('santri.download.pdf', $santri->id) }}" target="_blank">
                                            <i class="fas fa-file-pdf mr-2"></i> Download PDF
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
@endsection