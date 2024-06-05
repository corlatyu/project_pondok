@extends('dashboard.layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Izin Santri</h6>
                <!-- Button trigger modal -->
                <div>
                    <a href="{{ route('dispensasi.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus-circle mr-2"></i> Tambah Izin
                    </a>                    
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenjang</th>
                            <th>Kamar</th>
                            <th>Pulang Tanggal</th>
                            <th>Kembali Tanggal</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>No Telp</th>
                            <th>Aksi</th> <!-- Tambah kolom untuk aksi -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dispensasi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenjang }}</td>
                                <td>{{ $item->kamar }}</td>
                                <td>{{ $item->pulang_tanggal }}</td>
                                <td>{{ $item->kembali_tanggal }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td>
                                    <form action="{{ route('dispensasi.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt mr-2"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
