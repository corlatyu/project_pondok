@extends('dashboard.layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-column flex-md-row justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">Data Guru</h6>
        <a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle mr-1"></i> Tambah Guru
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th class="d-none d-md-table-cell">Alamat</th>
                        <th class="d-none d-md-table-cell">No Tlp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gurus as $guru)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $guru->nama }}</td>
                            <td class="d-none d-md-table-cell">{{ $guru->alamat }}</td>
                            <td class="d-none d-md-table-cell">{{ $guru->no_tlp }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Aksi">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $loop->iteration }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $loop->iteration }}">
                                            <a class="dropdown-item" href="{{ route('guru.show', $guru->id) }}">
                                                <i class="fas fa-eye"></i> Lihat
                                            </a>
                                            <a class="dropdown-item" href="{{ route('guru.edit', $guru->id) }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <button class="dropdown-item btn-delete" data-toggle="modal" data-target="#deleteModal" data-id="{{ $guru->id }}">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </div>
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

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data guru ini?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    $('.btn-delete').on('click', function () {
        var id = $(this).data('id');
        var action = '{{ route('guru.destroy', '') }}/' + id;
        $('#deleteForm').attr('action', action);
    });
});
</script>
@endpush
