@extends('dashboard.layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Santri</h6>
                <!-- Button trigger modal -->
                <div>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahSantriModal">
                        <i class="fas fa-plus-circle mr-2"></i> Tambah Santri
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
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
                            <th style="white-space: nowrap;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($santri as $key => $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('storage/foto_santri/'.$data->image) }}" alt="Foto Santri" class="img-thumbnail" style="max-width: 50px; max-height: 50px;" data-toggle="modal" data-target="#modalFotoSantri{{ $data->id }}"></td>
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
                                <td>{{ $data->status}}</td>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editSantriModal{{ $data->id }}"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteSantriModal{{ $data->id }}"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @include('dashboard.modal.edit')
                            @include('dashboard.modal.delete')
                            @include('dashboard.modal.foto')
                        @empty
                            <tr>
                                <td colspan="21" class="text-center">
                                    <div class="alert alert-danger">
                                        Data Santri belum Tersedia.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    @include('dashboard.modal.create')
                </table>
            </div>
        </div>
    </div>
@endsection

{{-- <script>
    $(document).ready(function() {
      $('#modalFotoSantri{{ $data->id }}').on('show.bs.modal', function (e) {
        // Code to execute when modal is shown
      });
    });
  </script>
   --}}
