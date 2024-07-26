@extends('dashboard.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $event->title }}</div>

                <div class="card-body">
                    <p><strong>Deskripsi:</strong> {{ $event->description }}</p>
                    <p><strong>Tanggal Mulai:</strong> {{ $event->start_date }}</p>
                    <p><strong>Tanggal Selesai:</strong> {{ $event->end_date }}</p>
                    <a href="{{ route('events.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
