@extends('dashboard.layouts.master')

@section('content')
<div class="container">
    <h3>Edit Dispensasi</h3>
    <form method="POST" action="{{ route('dispensasi.update', $dispensasi->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="izin" {{ $dispensasi->status == 'izin' ? 'selected' : '' }}>Izin</option>
                <option value="sakit" {{ $dispensasi->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="selesai" {{ $dispensasi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <div class="form-group">
            <label for="kembali_tanggal">Tanggal Kembali</label>
            <input type="date" class="form-control" id="kembali_tanggal" name="kembali_tanggal" value="{{ $dispensasi->kembali_tanggal }}" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" required>{{ $dispensasi->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection