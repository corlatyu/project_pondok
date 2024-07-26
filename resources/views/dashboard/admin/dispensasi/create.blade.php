@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Dispensasi</h6>
                </div>
                <div class="card-body">
                    <form id="dispensasiForm" method="POST" action="{{ route('dispensasi.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="id_santri">Nama Santri</label>
                            <select name="id_santri" id="id_santri" class="form-control" required>
                                @foreach($santris as $santri)
                                <option value="{{ $santri->id }}">{{ $santri->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pulang_tanggal">Pulang Tanggal</label>
                            <input type="date" name="pulang_tanggal" id="pulang_tanggal" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kembali_tanggal">Kembali Tanggal</label>
                            <input type="date" name="kembali_tanggal" id="kembali_tanggal" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Nomor Telepon</label>
                            <input type="text" name="no_telp" id="no_telp" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.getElementById('dispensasiForm').addEventListener('submit', function(event) {
        const pulangTanggal = new Date(document.getElementById('pulang_tanggal').value);
        const kembaliTanggal = new Date(document.getElementById('kembali_tanggal').value);

        if (kembaliTanggal <= pulangTanggal) {
            event.preventDefault();
            alert('Tanggal kembali harus setelah tanggal pulang.');
        }
    });
</script>
@endpush
