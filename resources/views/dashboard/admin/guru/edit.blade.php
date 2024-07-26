@extends('dashboard.layouts.master')

@section('content')
        <h1 class="h3 mb-4 text-gray-800">Edit Guru</h1>
        
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="text" name="nama" class="form-control" value="{{ $guru->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat:</label>
                        <textarea name="alamat" class="form-control" required>{{ $guru->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>No Tlp:</label>
                        <input type="text" name="no_tlp" class="form-control" value="{{ $guru->no_tlp }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
@endsection
