@extends('dashboard.layouts.master')

@section('content')


    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Form -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Dokumentasi</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('dokumentasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="type">Jenis</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="image">Gambar</option>
                                <option value="video">Video</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" class="form-control-file" id="file" name="file" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
