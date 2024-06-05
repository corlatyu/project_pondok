@extends('dashboard.layouts.master')
@section('content')
<div class="container">
    <h3>Cetak Surat Izin/Sakit</h3>
    <div class="row">
        <div class="col-md-6">
            <form id="printForm" method="POST" action="{{ route('dispensasi.store') }}">
                @csrf
                <div class="form-group">
                    <label for="id_santri">Nama Santri</label>
                    <select name="id_santri" id="id_santri" class="form-control">
                        @foreach($santris as $santri)
                        <option value="{{ $santri->id }}">{{ $santri->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="pulang_tanggal">Pulang Tanggal</label>
                    <input type="date" name="pulang_tanggal" id="pulang_tanggal" class="form-control">
                </div>
                <div class="form-group">
                    <label for="kembali_tanggal">Kembali Tanggal</label>
                    <input type="date" name="kembali_tanggal" id="kembali_tanggal" class="form-control">
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
                    <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="text" name="no_telp" id="no_telp" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Tambah</button>
                <button type="button" class="btn btn-primary" id="printButton">Cetak Surat</button>
            </form>
        </div>
        <div class="col-md-6">
            <!-- Bagian untuk cetak surat izin/sakit -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Surat Izin/Sakit</h5>
                    <p class="card-text">Silakan pilih santri dan isilah formulir di sebelah kiri untuk mencetak surat izin atau surat sakit.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('printForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah form dari pengiriman default

        // Logika untuk membuat konten surat
        const santriNama = document.getElementById('id_santri').options[document.getElementById('id_santri').selectedIndex].text;
        const pulangTanggal = document.getElementById('pulang_tanggal').value;
        const kembaliTanggal = document.getElementById('kembali_tanggal').value;
        const status = document.getElementById('status').value;
        const keterangan = document.getElementById('keterangan').value;
        const noTelp = document.getElementById('no_telp').value;

        const suratContent = `
            <h2>Surat ${status === 'izin' ? 'Izin' : 'Sakit'}</h2>
            <p>Nama Santri: ${santriNama}</p>
            <p>Pulang Tanggal: ${pulangTanggal}</p>
            <p>Kembali Tanggal: ${kembaliTanggal}</p>
            <p>Keterangan: ${keterangan}</p>
            <p>Nomor Telepon: ${noTelp}</p>
        `;

        const printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write(`
            <html>
                <head>
                    <title>Cetak Surat</title>
                </head>
                <body>
                    ${suratContent}
                    <script>
                        window.print();
                        window.close();
                    </script>
                </body>
            </html>
        `);
    });
</script>
@endpush