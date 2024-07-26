<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Dispensasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 21cm;
            margin: 0 auto;

        }

        .header {
            text-align: center;
            margin-bottom: 50px;
            padding: 10px 0; /* Menambahkan jarak dalam header */
            border-bottom: 1px solid #000;
            border-top: 1px solid #000;
        }

        .header img {
            width: 100px;
            margin-bottom: 10px;
        }

        .header p {
            margin: 2px 0;
            font-size: 12px;
        }

        h1 {
            text-align: center;
            color: #0056b3;
            font-size: 18px;
            margin-bottom: 40px;
            text-transform: uppercase;
        }

        .content {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px; /* Menambahkan jarak antar form-group */
        }

        .form-group label {
            width: 30%;
            font-weight: bold;
            display: inline-block;
            vertical-align: top;
        }

        .form-group .value {
            width: 65%;
            display: inline-block;
            padding: 5px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .signature {
            margin-top: 50px;
            text-align: right;
        }

        .signature .name {
            margin-top: 60px;
            font-weight: bold;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 10px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('img/logo.png') }}" alt="Logo">
            <p>Alamat: Jl. KH ISMAIL SHOLEH, Tambak Agung, Ba'engas, Kec. Labang,</p>
            <p>Kabupaten Bangkalan, Jawa Timur 69163</p>
            <p>Nomor Telepon: 0852-3333-6770 | Email: admin@alakhyar.com</p>
        </div>

        <h1>Surat {{ ucfirst($dispensasi->status) }}</h1>

        <div class="content">
            <div class="form-group">
                <label>Nama Santri:</label>
                <div class="value">{{ $dispensasi->santri->nama }}</div>
            </div>
            <div class="form-group">
                <label>Jenjang:</label>
                <div class="value">{{ $dispensasi->santri->jenjang }}</div>
            </div>
            <div class="form-group">
                <label>Kamar:</label>
                <div class="value">{{ $dispensasi->santri->kamar }}</div>
            </div>
            <div class="form-group">
                <label>Pulang Tanggal:</label>
                <div class="value">{{ $dispensasi->pulang_tanggal }}</div>
            </div>
            <div class="form-group">
                <label>Kembali Tanggal:</label>
                <div class="value">{{ $dispensasi->kembali_tanggal }}</div>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <div class="value">{{ ucfirst($dispensasi->status) }}</div>
            </div>
            <div class="form-group">
                <label>Keterangan:</label>
                <div class="value">{{ $dispensasi->keterangan }}</div>
            </div>
            <div class="form-group">
                <label>Nomor Telepon:</label>
                <div class="value">{{ $dispensasi->no_telp }}</div>
            </div>
        </div>

        <div class="signature">
            <p>Mengetahui,</p>
            <p class="name">(_____________________)</p>
            <p>Jabatan</p>
        </div>

        <div class="footer">
            <p>© 2024 Pondok Pesantren AL-AKHYAR. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
