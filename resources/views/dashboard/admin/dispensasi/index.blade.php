@extends('dashboard.layouts.master')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex flex-column flex-md-row justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">Data Izin</h6>
                <div class="d-flex flex-column flex-md-row">
                    <a href="{{ route('dispensasi.create') }}" class="btn btn-primary btn-sm mb-2 mb-md-0 mr-md-2">
                        <i class="fas fa-plus-circle mr-1"></i> Tambah Izin
                    </a>
                    <a href="{{ route('dispensasi.terlambat') }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-clock mr-1"></i> Santri Terlambat
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <button class="btn btn-info btn-sm" type="button" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
                    <i class="fas fa-filter mr-1"></i> Filter dan Export
                </button>
            </div>

            <div class="collapse mb-4" id="collapseFilter">
                <div class="card card-body">
                    <form action="{{ route('dispensasi.export') }}" method="GET">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="filter_type">Filter</label>
                                <select name="filter_type" id="filter_type" class="form-control" required>
                                    <option value="day">Per Hari / Bulan</option>
                                    <option value="year">Per Tahun</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3" id="date_inputs">
                                <label for="start_date">Tanggal Awal</label>
                                <input type="date" name="start_date" id="start_date" class="form-control">
                            </div>
                            <div class="col-md-3 mb-3" id="end_date_input">
                                <label for="end_date">Tanggal Akhir</label>
                                <input type="date" name="end_date" id="end_date" class="form-control">
                            </div>
                            <div class="col-md-3 mb-3" id="month_input" style="display: none;">
                                <label for="month">Bulan</label>
                                <input type="month" name="month" id="month" class="form-control">
                            </div>
                            <div class="col-md-3 mb-3" id="year_input" style="display: none;">
                                <label for="year">Tahun</label>
                                <input type="number" name="year" id="year" class="form-control" min="2000" max="2099" value="{{ date('Y') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tipe Export</label>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-outline-secondary active">
                                    <input type="checkbox" id="semua" name="export_type[]" value="semua" checked> Semua
                                </label>
                                <label class="btn btn-outline-secondary">
                                    <input type="checkbox" id="sakit" name="export_type[]" value="sakit"> Sakit
                                </label>
                                <label class="btn btn-outline-secondary">
                                    <input type="checkbox" id="ijin" name="export_type[]" value="izin"> Izin
                                </label>
                                <label class="btn btn-outline-secondary">
                                    <input type="checkbox" id="selesai" name="export_type[]" value="selesai"> Selesai
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-file-export mr-1"></i> Export
                        </button>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenjang</th>
                            <th>Kamar</th>
                            <th>Pulang Tanggal</th>
                            <th>Kembali Tanggal</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>No Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dispensasi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->santri->nama }}</td>
                            <td>{{ $item->santri->jenjang }}</td>
                            <td>{{ $item->santri->kamar }}</td>
                            <td>{{ $item->pulang_tanggal }}</td>
                            <td>{{ $item->kembali_tanggal }}</td>
                            <td>
                                <span class="badge badge-{{ $item->status == 'izin' ? 'danger' : ($item->status == 'sakit' ? 'primary' : 'success') }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                                @if($item->kembali_tanggal < now() && $item->status != 'selesai')
                                <span class="badge badge-danger ml-1">Terlambat</span>
                                @endif
                            </td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->no_telp }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item print-button" href="{{ route('dispensasi.print', $item->id) }}" target="_blank" data-id="{{ $item->id }}">
                                            <i class="fas fa-print mr-2"></i> Cetak
                                        </a>
                                        <a class="dropdown-item" href="{{ route('dispensasi.download.pdf', $item->id) }}">
                                            <i class="fas fa-print mr-2"></i> PDF
                                        </a>
                                        @if($item->status != 'selesai')
                                        <form action="{{ route('dispensasi.kembali', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="fas fa-check mr-2"></i> Kembali
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Script untuk menyesuaikan tampilan input berdasarkan filter type
    document.addEventListener("DOMContentLoaded", function() {
        const filterTypeSelect = document.getElementById('filter_type');
        const dateInputsDiv = document.getElementById('date_inputs');
        const endDateInputDiv = document.getElementById('end_date_input');
        const monthInputDiv = document.getElementById('month_input');
        const yearInputDiv = document.getElementById('year_input');

        filterTypeSelect.addEventListener('change', function() {
            const selectedFilter = filterTypeSelect.value;
            if (selectedFilter === 'day') {
                dateInputsDiv.style.display = 'block';
                endDateInputDiv.style.display = 'block';
                monthInputDiv.style.display = 'none';
                yearInputDiv.style.display = 'none';
            } else if (selectedFilter === 'month') {
                dateInputsDiv.style.display = 'none';
                endDateInputDiv.style.display = 'none';
                monthInputDiv.style.display = 'block';
                yearInputDiv.style.display = 'none';
            } else if (selectedFilter === 'year') {
                dateInputsDiv.style.display = 'none';
                endDateInputDiv.style.display = 'none';
                monthInputDiv.style.display = 'none';
                yearInputDiv.style.display = 'block';
            }
        });

        // Inisialisasi tampilan input berdasarkan filter yang dipilih
        const initialFilter = filterTypeSelect.value;
        if (initialFilter === 'day') {
            dateInputsDiv.style.display = 'block';
            endDateInputDiv.style.display = 'block';
        } else if (initialFilter === 'month') {
            monthInputDiv.style.display = 'block';
        } else if (initialFilter === 'year') {
            yearInputDiv.style.display = 'block';
        }
    });
    
    // Tambahkan kode berikut untuk menangani fungsi cetak
    document.addEventListener("DOMContentLoaded", function() {
        const printButtons = document.querySelectorAll('.print-button');
        printButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('href');
                const newWindow = window.open(url, '_blank');
                newWindow.onload = function() {
                    newWindow.print();
                };
            });
        });
    });
</script>
@endsection