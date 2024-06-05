<!-- Modal Edit -->
<div class="modal fade" id="editSantriModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $data->id }}">Edit Santri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Edit -->
                <form action="{{ route('santri.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id_santri_{{ $data->id }}">ID Santri</label>
                        <input type="text" class="form-control" id="id_santri_{{ $data->id }}" name="id_santri" value="{{ $data->id_santri }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_{{ $data->id }}">Nama</label>
                        <input type="text" class="form-control" id="nama_{{ $data->id }}" name="nama" value="{{ $data->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nik_{{ $data->id }}">NIK</label>
                        <input type="text" class="form-control" id="nik_{{ $data->id }}" name="nik" value="{{ $data->nik }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin_{{ $data->id }}">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin_{{ $data->id }}" name="jenis_kelamin" required>
                            <option value="L" {{ $data->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $data->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kamar_{{ $data->id }}">Kamar</label>
                        <select class="form-control" id="kamar_{{ $data->id }}" name="kamar" required>
                            <option value="DF01" {{ $data->kamar == 'DF01' ? 'selected' : '' }}>DF01</option>
                            <option value="DF02" {{ $data->kamar == 'DF02' ? 'selected' : '' }}>DF02</option>
                            <option value="DF03" {{ $data->kamar == 'DF03' ? 'selected' : '' }}>DF03</option>
                            <option value="DF04" {{ $data->kamar == 'DF04' ? 'selected' : '' }}>DF04</option>
                            <option value="DF05" {{ $data->kamar == 'DF05' ? 'selected' : '' }}>DF05</option>
                            <option value="DF06" {{ $data->kamar == 'DF06' ? 'selected' : '' }}>DF06</option>
                            <option value="DS24" {{ $data->kamar == 'DS24' ? 'selected' : '' }}>DS24</option>
                            <option value="DS25" {{ $data->kamar == 'DS25' ? 'selected' : '' }}>DS25</option>
                            <option value="DS26" {{ $data->kamar == 'DS26' ? 'selected' : '' }}>DS26</option>
                            <option value="DS27" {{ $data->kamar == 'DS27' ? 'selected' : '' }}>DS27</option>
                            <option value="DS28" {{ $data->kamar == 'DS28' ? 'selected' : '' }}>DS28</option>
                            <option value="DS29" {{ $data->kamar == 'DS29' ? 'selected' : '' }}>DS29</option>
                            <option value="DT01" {{ $data->kamar == 'DT01' ? 'selected' : '' }}>DT01</option>
                            <option value="DT02" {{ $data->kamar == 'DT02' ? 'selected' : '' }}>DT02</option>
                            <option value="DT03" {{ $data->kamar == 'DT03' ? 'selected' : '' }}>DT03</option>
                            <option value="DT04" {{ $data->kamar == 'DT04' ? 'selected' : '' }}>DT04</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenjang_{{ $data->id }}">Jenjang</label>
                        <input type="text" class="form-control" id="jenjang_{{ $data->id }}" name="jenjang" value="{{ $data->jenjang }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir_{{ $data->id }}">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir_{{ $data->id }}" name="tempat_lahir" value="{{ $data->tempat_lahir }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir_{{ $data->id }}">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir_{{ $data->id }}" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_{{ $data->id }}">Alamat</label>
                        <input type="text" class="form-control" id="alamat_{{ $data->id }}" name="alamat" value="{{ $data->alamat }}" required>
                    </div>
                    <div class="form-group">
                        <label for="provinsi_{{ $data->id }}">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi_{{ $data->id }}" name="provinsi" value="{{ $data->provinsi }}" required>
                    </div>
                    <div class="form-group">
                        <label for="kabupaten_{{ $data->id }}">Kabupaten</label>
                        <input type="text" class="form-control" id="kabupaten_{{ $data->id }}" name="kabupaten" value="{{ $data->kabupaten }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_ayah_{{ $data->id }}">Nama Ayah</label>
                        <input type="text" class="form-control" id="nama_ayah_{{ $data->id }}" name="nama_ayah" value="{{ $data->nama_ayah }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_ibu_{{ $data->id }}">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu_{{ $data->id }}" name="nama_ibu" value="{{ $data->nama_ibu }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nomer_telp_orangtua_{{ $data->id }}">Nomer Telepon Orang Tua</label>
                        <input type="text" class="form-control" id="nomer_telp_orangtua_{{ $data->id }}" name="nomer_telp_orangtua" value="{{ $data->nomer_telp_orangtua }}" required>
                    </div>
                    <div class="form-group">
                        <label for="no_kk_{{ $data->id }}">Nomor KK</label>
                        <input type="text" class="form-control" id="no_kk_{{ $data->id }}" name="no_kk" value="{{ $data->no_kk }}" required>
                    </div>
                    <div class="form-group">
                        <label for="status_{{ $data->id }}">Status</label>
                        <select class="form-control" id="status_{{ $data->id }}" name="status" required>
                            <option value="aktif" {{ $data->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="tidak aktif" {{ $data->status == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image_{{ $data->id }}">Foto:</label>
                        <input type="file" class="form-control-file" id="image_{{ $data->id }}" name="image" accept="image/*">
                        @if($data->image)
                            <img src="{{ asset('storage/foto_santri/'.$data->image) }}" alt="Foto Santri" class="img-fluid mt-2" style="max-width: 200px;">
                        @else
                            <span class="text-muted">Foto belum tersedia</span>
                        @endif
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
