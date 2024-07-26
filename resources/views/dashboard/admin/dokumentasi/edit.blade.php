@extends('dashboard.layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Dokumentasi</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('dokumentasi.update', $dokumentasi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $dokumentasi->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description">{{ $dokumentasi->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="type">Jenis</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="image" {{ $dokumentasi->type == 'image' ? 'selected' : '' }}>Gambar</option>
                                <option value="video" {{ $dokumentasi->type == 'video' ? 'selected' : '' }}>Video</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                        </div>
                        
                        <!-- Tampilkan gambar atau video jika sudah ada -->
                        <div class="form-group">
                            @if ($dokumentasi->type === 'image')
                                <img src="{{ Storage::url($dokumentasi->path) }}" class="img-fluid mt-2" alt="Gambar Dokumentasi" style="max-width: 200px;">
                            @elseif ($dokumentasi->type === 'video')
                                <div class="embed-responsive embed-responsive-16by9">
                                    <video class="embed-responsive-item" controls>
                                        <source src="{{ Storage::url($dokumentasi->path) }}" type="video/mp4" style="max-width: 200px;">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
