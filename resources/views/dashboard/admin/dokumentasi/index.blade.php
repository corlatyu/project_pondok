@extends('dashboard.layouts.master')

@section('content')
<!-- Main Content -->
<div id="content">
    <!-- Begin Page Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">Daftar Dokumentasi</h6>
            <a href="{{ route('dokumentasi.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus-circle mr-1"></i> Tambah Dokumentasi
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th class="d-none d-md-table-cell">Deskripsi</th>
                            <th class="d-none d-md-table-cell">Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dokumentasis as $dokumentasi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dokumentasi->title }}</td>
                            <td class="d-none d-md-table-cell">{{ $dokumentasi->description }}</td>
                            <td class="d-none d-md-table-cell">{{ $dokumentasi->type }}</td>
                            <td>
                                <!-- Dropdown untuk Mobile dan Desktop -->
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $loop->iteration }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $loop->iteration }}">
                                        <a class="dropdown-item" href="{{ route('dokumentasi.show', $dokumentasi->id) }}">
                                            <i class="fas fa-eye fa-sm"></i> Lihat
                                        </a>
                                        <a class="dropdown-item" href="{{ route('dokumentasi.edit', $dokumentasi->id) }}">
                                            <i class="fas fa-edit fa-sm"></i> Edit
                                        </a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal{{ $dokumentasi->id }}">
                                            <i class="fas fa-trash fa-sm"></i> Hapus
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Delete Dokumentasi -->
                        <div class="modal fade" id="deleteModal{{ $dokumentasi->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModal{{ $dokumentasi->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModal{{ $dokumentasi->id }}Label">Konfirmasi Penghapusan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus dokumentasi ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('dokumentasi.destroy', $dokumentasi->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
@endsection
