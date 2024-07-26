@extends('dashboard.layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Santri Terlambat Kembali</h6>
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
                        <th>Tanggal Kembali</th>
                        <th>Terlambat (Hari)</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($terlambat as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->santri->nama }}</td>
                        <td>{{ $item->santri->jenjang }}</td>
                        <td>{{ $item->santri->kamar }}</td>
                        <td>{{ $item->kembali_tanggal }}</td>
                        <td>{{ now()->diffInDays($item->kembali_tanggal) }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('dispensasi.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Update
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection