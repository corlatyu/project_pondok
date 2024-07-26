<!-- resources/views/dashboard/admin/santri/profile.blade.php -->

@extends('dashboard.layouts.master')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Santri Profile</h1>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-body text-center">
                @if($santri)
                    <img class="img-profile rounded-circle" src="{{ asset('foto_santri/' . $santri->image) }}" alt="Santri Photo" style="width: 150px; height: 150px; object-fit: cover;">
                    <h4>{{ $santri->nama }}</h4>
                    <p>{{ $santri->id_santri }}</p>
                @else
                    <img class="img-profile rounded-circle mb-4" src="{{ asset('adminsb/img/undraw_profile.svg') }}" alt="Santri Photo" style="width: 150px;">
                    <h4>Profile Picture</h4>
                    <p>ID Santri</p>
                @endif
                <form method="POST" action="{{ route('santri.profile.search') }}" id="searchForm">
                    @csrf
                    <input type="text" class="form-control mb-2" name="id_santri" id="id_santri" placeholder="Enter ID Santri" value="{{ old('id_santri') }}" oninput="validateInput()">
                    <button type="submit" class="btn btn-primary btn-block" id="getDataBtn" disabled>Get Data</button>
                    <button type="button" class="btn btn-secondary btn-block mt-2" onclick="resetForm()">Reset</button>
                </form>
                {{-- <button class="btn btn-tertiary btn-block mt-2">Print</button> --}}
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama">Full Name</label>
                            <input type="text" class="form-control" id="nama" value="{{ $santri ? $santri->nama : '' }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" value="{{ $santri ? $santri->nik : '' }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jenis_kelamin">Gender</label>
                            <input type="text" class="form-control" id="jenis_kelamin" value="{{ $santri ? $santri->jenis_kelamin : '' }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kamar">Kamar</label>
                            <input type="text" class="form-control" id="kamar" value="{{ $santri ? $santri->kamar : '' }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jenjang">Jenjang</label>
                            <input type="text" class="form-control" id="jenjang" value="{{ $santri ? $santri->jenjang : '' }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" value="{{ $santri ? $santri->tempat_lahir : '' }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tanggal_lahir" value="{{ $santri ? $santri->tanggal_lahir : '' }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" value="{{ $santri ? $santri->alamat : '' }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" class="form-control" id="provinsi" value="{{ $santri ? $santri->provinsi : '' }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kabupaten">Kabupaten</label>
                            <input type="text" class="form-control" id="kabupaten" value="{{ $santri ? $santri->kabupaten : '' }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control" id="nama_ayah" value="{{ $santri ? $santri->nama_ayah : '' }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama_ibu" value="{{ $santri ? $santri->nama_ibu : '' }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nomer_telp_orangtua">Nomor Telp Orangtua</label>
                            <input type="text" class="form-control" id="nomer_telp_orangtua" value="{{ $santri ? $santri->nomer_telp_orangtua : '' }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no_kk">Nomor KK</label>
                            <input type="text" class="form-control" id="no_kk" value="{{ $santri ? $santri->no_kk : '' }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" value="{{ $santri ? $santri->status : '' }}" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function validateInput() {
    const idSantriInput = document.getElementById('id_santri');
    const getDataBtn = document.getElementById('getDataBtn');
    getDataBtn.disabled = !idSantriInput.value.trim();
}

function resetForm() {
    document.getElementById("searchForm").reset();
    window.location.href = '{{ route('santri.profile', ['id' => 1]) }}';
    validateInput(); // Ensure the button is disabled after reset
}

// Initial validation to set button state on page load
document.addEventListener('DOMContentLoaded', (event) => {
    validateInput();
});
</script>
@endsection