@extends('dashboard.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kalender Akademik</div>

                <div class="container">
                    <h1>Kalender Akademik</h1>
                    <div id="calendar"></div>
                </div>

                <div class="card-body">
                    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Tambah Acara</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->start_date }}</td>
                                <td>{{ $event->end_date }}</td>
                                <td>
                                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
