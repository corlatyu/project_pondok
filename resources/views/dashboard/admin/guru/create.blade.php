@extends('dashboard.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Create Data Baru</h6>
        </div>        
        <div class="card-body">
            <form action="{{ route('guru.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea id="alamat" name="alamat" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="no_tlp">No Tlp:</label>
                    <input type="text" id="no_tlp" name="no_tlp" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('guru.index') }}" class="btn btn-dark">Back</a>
            </form>
        </div>
    </div>
@endsection
