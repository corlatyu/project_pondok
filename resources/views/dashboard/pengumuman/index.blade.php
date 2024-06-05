@extends('dashboard.layouts.master')

@section('content')
<!-- Main Content -->
<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('errors'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">Data Jadwal/Schedule</h6>
                <button class="btn btn-success ml-auto text-xs" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#formModal">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Dibuka</th>
                                <th>Ditutup</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->event }}</td>
                                <td>{{ date('j F Y', strtotime($item->open)) }}</td>
                                <td>{{ date('j F Y', strtotime($item->close)) }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal{{ $item->id }}"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger delete" data-toggle="modal" data-target="#deleteModal{{ $item->id }}"><i class="fa fa-trash"></i></button>
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
        @include('dashboard.modal.schedules')
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
