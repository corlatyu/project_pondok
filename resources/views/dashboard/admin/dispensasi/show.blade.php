@extends('dashboard.layouts.master')

@section('content')
<div class="container">
    <h3>Detail Dispensasi</h3>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $dispensasi->santri->nama }}</h5>
            <p class="card-text">Jenjang: {{ $dispensasi->santri->jenjang }}</p>
            <p class="card-text">Kamar: {{ $dispensasi->santri->kamar }}</p>
            <p class="card-text">Pulang Tanggal: {{ $dispensasi->pulang_tanggal }}</p>
            <p class="card-text">Kembali Tanggal: {{ $dispensasi->kembali_tanggal }}</p>
            <p class="card-text">Status: {{ $dispensasi->status }}</p>
            <p class="card-text">Keterangan: {{ $dispensasi->keterangan }}</p>
            <p class="card-text">No Telp: {{ $dispensasi->no_telp }}</p>
        </div>
    </div>
    <a href="{{ route('dispensasi.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection