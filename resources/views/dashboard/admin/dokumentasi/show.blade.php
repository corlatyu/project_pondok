@extends('dashboard.layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Dokumentasi</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Detail Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $dokumentasi->title }}</h6>
                </div>
                <div class="card-body">
                    <p>{{ $dokumentasi->description }}</p>
                    @if ($dokumentasi->type === 'image')
                        <img src="{{ asset($dokumentasi->path) }}" class="img-fluid mt-2" alt="Gambar Dokumentasi" style="max-width: 200px;">
                    @elseif ($dokumentasi->type === 'video')
                        <div class="embed-responsive embed-responsive-16by9">
                            <video class="embed-responsive-item" controls style="max-width: 200px;">
                                <source src="{{ asset($dokumentasi->path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="{{ route('dokumentasi.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
