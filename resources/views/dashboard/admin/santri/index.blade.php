@extends('dashboard.layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">Data Santri</h6>
                <div class="mt-3 mt-md-0">
                    <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#tambahSantriModal">
                        <i class="fas fa-plus-circle mr-2"></i> Tambah
                    </button>
                    <button id="editButton" class="btn btn-warning btn-sm mb-2" disabled>
                        Edit
                    </button>
                    <button id="deleteButton" class="btn btn-danger btn-sm mb-2" disabled>
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                    <a href="{{ route('santri.export.excel') }}" class="btn btn-success btn-sm mb-2"><i class="fas fa-file-excel"></i> Export to Excel</a>
                    <a href="{{ route('santri.export.csv') }}" class="btn btn-info btn-sm mb-2"><i class="fas fa-file-csv"></i> Export to CSV</a>
                    <button type="button" class="btn btn-secondary btn-sm mb-2" data-toggle="modal" data-target="#importCSVModal">
                        <i class="fas fa-file-import"></i> Import Data
                    </button>
                </div>
            </div>
        </div>
        

        <div class="card-body">
            @if ($santri->isEmpty())
                <p>Tidak ada data santri.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 5%"><input type="checkbox" id="selectAll"></th>
                                <th>No</th>
                                <th>Foto</th>
                                <th style="white-space: nowrap;">ID Santri</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th style="white-space: nowrap;">L/P</th>
                                <th>Kamar</th>
                                <th>Jenjang</th>
                                <th style="white-space: nowrap;">Tempat Lahir</th>
                                <th>Alamat</th>
                                <th>Provinsi</th>
                                <th>Kabupaten</th>
                                <th style="white-space: nowrap;">Nama Ayah</th>
                                <th style="white-space: nowrap;">Nama Ibu</th>
                                <th style="white-space: nowrap;">Nomor Tlp Ortu</th>
                                <th style="white-space: nowrap;">No KK</th>
                                <th style="white-space: nowrap;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($santri as $data)
                                <tr>
                                    <td><input type="checkbox" class="selectSantri" data-id="{{ $data->id }}"></td>
                                    <td>{{ $loop->iteration }}</td>
<td>
    <img src="{{ url('foto_santri/' . $data->image) }}" alt="Foto Santri"
         class="img-thumbnail" style="max-width: 50px; max-height: 50px;"
         data-toggle="modal" data-target="#modalFotoSantri{{ $data->id }}">
</td>
                                    <td>{{ $data->id_santri }}</td>
                                    <td style="white-space: nowrap;">{{ $data->nama }}</td>
                                    <td>{{ $data->nik }}</td>
                                    <td>{{ $data->jenis_kelamin }}</td>
                                    <td>{{ $data->kamar }}</td>
                                    <td>{{ $data->jenjang }}</td>
                                    <td>{{ $data->tempat_lahir }}</td>
                                    <td style="white-space: nowrap;">{{ $data->alamat }}</td>
                                    <td style="white-space: nowrap;">{{ $data->provinsi }}</td>
                                    <td>{{ $data->kabupaten }}</td>
                                    <td>{{ $data->nama_ayah }}</td>
                                    <td>{{ $data->nama_ibu }}</td>
                                    <td>{{ $data->nomer_telp_orangtua }}</td>
                                    <td>{{ $data->no_kk }}</td>
                                    <td>{{ $data->status }}</td>
                                </tr>
                                @include('dashboard.modal.foto')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal Tambah Santri -->
    @include('dashboard.modal.create')

    <!-- Modal Konfirmasi Hapus Santri -->
    <div class="modal fade" id="deleteSantriModal" tabindex="-1" role="dialog" aria-labelledby="deleteSantriModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSantriModalLabel">Konfirmasi Hapus Santri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus santri ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" id="deleteSantriConfirmButton" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>

      <!-- Modal Import CSV -->
      <div class="modal fade" id="importCSVModal" tabindex="-1" role="dialog" aria-labelledby="importCSVModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('santri.import.csv') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importCSVModalLabel">Import Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file">Pilih file CSV, XLSX</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.selectSantri');
            const editButton = document.getElementById('editButton');
            const deleteButton = document.getElementById('deleteButton');
            const selectAllCheckbox = document.getElementById('selectAll');
            const deleteSantriConfirmButton = document.getElementById('deleteSantriConfirmButton');
            let selectedIds = [];

            function updateButtons() {
                const anyChecked = Array.from(checkboxes).some(box => box.checked);
                editButton.disabled = !anyChecked;
                deleteButton.disabled = !anyChecked;
            }

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateButtons);
            });

            editButton.addEventListener('click', function() {
                const selectedId = Array.from(checkboxes).find(box => box.checked)?.getAttribute('data-id');
                if (selectedId) {
                    window.location.href = `/santri/${selectedId}/edit`;
                } else {
                    alert('Pilih satu santri untuk diedit.');
                }
            });

            deleteButton.addEventListener('click', function() {
                selectedIds = Array.from(checkboxes)
                    .filter(box => box.checked)
                    .map(box => box.getAttribute('data-id'));

                if (selectedIds.length > 0) {
                    $('#deleteSantriModal').modal('show');
                } else {
                    alert('Pilih setidaknya satu santri untuk dihapus.');
                }
            });

            deleteSantriConfirmButton.addEventListener('click', function() {
                // Menyembunyikan modal konfirmasi penghapusan setelah tombol diklik
                $('#deleteSantriModal').modal('hide');

                // Menggunakan Promise.all untuk menjalankan semua permintaan penghapusan secara paralel
                Promise.all(selectedIds.map(id =>
                    // Mengirim permintaan DELETE ke endpoint /santri/{id}
                    fetch(`/santri/${id}`, {
                        method: 'DELETE',
                        headers: {
                            // Menambahkan header untuk mengirim token CSRF (untuk keamanan)
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            // Menentukan tipe konten yang diterima
                            'Accept': 'application/json',
                            // Menandakan bahwa permintaan ini dilakukan dengan AJAX
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                )).then(responses =>
                    // Mengonversi semua respons menjadi format JSON
                    Promise.all(responses.map(r => r.json()))
                ).then(results => {
                    // Memeriksa apakah semua operasi penghapusan berhasil
                    if (results.every(result => result.success)) {
                        // Jika berhasil, muat ulang halaman
                        location.reload();
                    } else {
                        // Jika ada yang gagal, tampilkan pesan kesalahan
                        alert('Gagal menghapus beberapa santri.');
                    }
                }).catch(() => {
                    // Menangani kesalahan yang mungkin terjadi selama penghapusan
                    alert('Terjadi kesalahan saat menghapus santri.');
                });
            });


            selectAllCheckbox.addEventListener('change', function() {
                checkboxes.forEach(box => {
                    box.checked = this.checked;
                });
                updateButtons();
            });
        });
    </script>
@endsection
