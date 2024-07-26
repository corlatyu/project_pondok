@extends('dashboard.layouts.master')

@section('content')
<!-- Main Content -->
<div id="content">
    <!-- Begin Page Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-column flex-md-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">Data Jadwal/Schedule</h6>
            <button class="btn btn-primary btn-sm" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#formModal">
                <i class="fas fa-plus-circle mr-1"></i> Tambah Pengumuman
            </button>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th class="d-none d-md-table-cell">Dibuka</th>
                            <th class="d-none d-md-table-cell">Ditutup</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->event }}</td>
                            <td class="d-none d-md-table-cell">{{ date('j F Y', strtotime($item->open)) }}</td>
                            <td class="d-none d-md-table-cell">{{ date('j F Y', strtotime($item->close)) }}</td>
                            <td>
                                <!-- Dropdown untuk Mobile dan Desktop -->
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $loop->iteration }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $loop->iteration }}">
                                        <button class="dropdown-item" data-toggle="modal" data-target="#editModal{{ $item->id }}"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="dropdown-item delete" data-toggle="modal" data-target="#deleteModal{{ $item->id }}"><i class="fa fa-trash"></i> Hapus</button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Jadwal/Schedule</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form Edit -->
                                        <form action="{{ route('schedules.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="event">Judul</label>
                                                <input type="text" class="form-control" id="event" name="event" value="{{ $item->event }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="open">Dibuka</label>
                                                <input type="date" class="form-control" id="open" name="open" value="{{ date('Y-m-d', strtotime($item->open)) }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="close">Ditutup</label>
                                                <input type="date" class="form-control" id="close" name="close" value="{{ date('Y-m-d', strtotime($item->close)) }}" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Delete item -->
                        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteitemModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteitemModalLabel">Hapus item</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus item ini?</p>
                                        <form action="{{ route('schedules.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
