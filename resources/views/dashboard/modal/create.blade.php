<!-- Modal Tambah Santri -->
<div class="modal fade" id="tambahSantriModal" tabindex="-1" role="dialog" aria-labelledby="tambahSantriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSantriModalLabel">Tambah Santri Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('santri.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    @csrf
                    <div class="form-group">
                        <label for="id_santri">ID Santri</label>
                        <input type="text" class="form-control" id="id_santri" name="id_santri" required oninput="limitInputLength(this, 6)">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required oninput="limitInputLength(this, 16)">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kamar">Kamar</label>
                        <select class="form-control" id="kamar" name="kamar" required>
                            <option value="DF01">DF01</option>
                            <option value="DF02">DF02</option>
                            <option value="DF03">DF03</option>
                            <option value="DF04">DF04</option>
                            <option value="DF05">DF05</option>
                            <option value="DF06">DF06</option>
                            <option value="DS24">DS24</option>
                            <option value="DS25">DS25</option>
                            <option value="DS26">DS26</option>
                            <option value="DS27">DS27</option>
                            <option value="DS28">DS28</option>
                            <option value="DS29">DS29</option>
                            <option value="DT01">DT01</option>
                            <option value="DT02">DT02</option>
                            <option value="DT03">DT03</option>
                            <option value="DT04">DT04</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenjang">Jenjang</label>
                        <select class="form-control" id="jenjang" name="jenjang" required>
                            <option value="Aliyah">Aliyah</option>
                            <option value="Tsanawiyah">Tsanawiyah</option>
                            <option value="Ibtidaiyah">Ibtidaiyah</option>
                            <option value="StaffPengajar">StaffPengajar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi" required>
                    </div>
                    <div class="form-group">
                        <label for="kabupaten">Kabupaten</label>
                        <input type="text" class="form-control" id="kabupaten" name="kabupaten" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                    </div>
                    <div class="form-group">
                        <label for="nomer_telp_orangtua">Nomor Telepon Orang Tua</label>
                        <input type="text" class="form-control" id="nomer_telp_orangtua" name="nomer_telp_orangtua" required>
                    </div>
                    <div class="form-group">
                        <label for="no_kk">No KK</label>
                        <input type="text" class="form-control" id="no_kk" name="no_kk" required oninput="limitInputLength(this, 16)">
                    </div>
                    <div class="form-group">
                        <label for="image">Foto</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
   <!-- Form Group for Active Status -->
<div class="form-group">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="status" name="status" value="aktif" checked>
        <label class="form-check-label" for="status">
            Aktif
        </label>
    </div>
</div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-warning">RESET</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function limitInputLength(input, maxLength) {
        if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
        }
    }
</script>
