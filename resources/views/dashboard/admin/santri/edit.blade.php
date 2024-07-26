@extends('dashboard.layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Santri</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('santri.update', $santri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_santri_{{ $santri->id }}">ID Santri</label>
                <input type="text" class="form-control" id="id_santri_{{ $santri->id }}" name="id_santri" value="{{ $santri->id_santri }}" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $santri->nama }}" required>
                </div>
               
                <div class="form-group col-md-6">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ $santri->nik }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="L" {{ $santri->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $santri->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="jenjang">Jenjang</label>
                    <input type="text" class="form-control" id="jenjang" name="jenjang" value="{{ $santri->jenjang }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $santri->tempat_lahir }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $santri->tanggal_lahir }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $santri->alamat }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $santri->provinsi }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="kabupaten">Kabupaten</label>
                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="{{ $santri->kabupaten }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="nama_ayah">Nama Ayah</label>
                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ $santri->nama_ayah }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama_ibu">Nama Ibu</label>
                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ $santri->nama_ibu }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="nomer_telp_orangtua">Nomer Telepon Orang Tua</label>
                    <input type="text" class="form-control" id="nomer_telp_orangtua" name="nomer_telp_orangtua" value="{{ $santri->nomer_telp_orangtua }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="no_kk">Nomor KK</label>
                    <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ $santri->no_kk }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="aktif" {{ $santri->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak aktif" {{ $santri->status == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="kamar_{{ $santri->id }}">Kamar</label>
                <select class="form-control" id="kamar_{{ $santri->id }}" name="kamar" required>
                    <option value="DF01" {{ $santri->kamar == 'DF01' ? 'selected' : '' }}>DF01</option>
                    <option value="DF02" {{ $santri->kamar == 'DF02' ? 'selected' : '' }}>DF02</option>
                    <option value="DF03" {{ $santri->kamar == 'DF03' ? 'selected' : '' }}>DF03</option>
                    <option value="DF04" {{ $santri->kamar == 'DF04' ? 'selected' : '' }}>DF04</option>
                    <option value="DF05" {{ $santri->kamar == 'DF05' ? 'selected' : '' }}>DF05</option>
                    <option value="DF06" {{ $santri->kamar == 'DF06' ? 'selected' : '' }}>DF06</option>
                    <option value="DS24" {{ $santri->kamar == 'DS24' ? 'selected' : '' }}>DS24</option>
                    <option value="DS25" {{ $santri->kamar == 'DS25' ? 'selected' : '' }}>DS25</option>
                    <option value="DS26" {{ $santri->kamar == 'DS26' ? 'selected' : '' }}>DS26</option>
                    <option value="DS27" {{ $santri->kamar == 'DS27' ? 'selected' : '' }}>DS27</option>
                    <option value="DS28" {{ $santri->kamar == 'DS28' ? 'selected' : '' }}>DS28</option>
                    <option value="DS29" {{ $santri->kamar == 'DS29' ? 'selected' : '' }}>DS29</option>
                    <option value="DT01" {{ $santri->kamar == 'DT01' ? 'selected' : '' }}>DT01</option>
                    <option value="DT02" {{ $santri->kamar == 'DT02' ? 'selected' : '' }}>DT02</option>
                    <option value="DT03" {{ $santri->kamar == 'DT03' ? 'selected' : '' }}>DT03</option>
                    <option value="DT04" {{ $santri->kamar == 'DT04' ? 'selected' : '' }}>DT04</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Foto:</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                @if($santri->image)
                    <img src="{{ url('foto_santri/' . $santri->image) }}" alt="Foto Santri" class="img-fluid mt-2" style="max-width: 200px;">
                @else
                    <span class="text-muted">Foto belum tersedia</span>
                @endif
            </div>

            <div class="text-right">
                <a href="{{ route('santri.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
