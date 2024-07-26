@extends('dashboard.layouts.master')

@section('content')
        <h1 class="h3 mb-4 text-gray-800">Guru Details</h1>
        
        <div class="card shadow mb-4">
            <div class="card-body">
                <p><strong>Nama:</strong> {{ $guru->nama }}</p>
                <p><strong>Alamat:</strong> {{ $guru->alamat }}</p>
                <p><strong>No Tlp:</strong> {{ $guru->no_tlp }}</p>
                <a href="{{ route('guru.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
@endsection
