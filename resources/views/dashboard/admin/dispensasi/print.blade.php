<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Dispensasi</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');

        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            width: 21cm;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #0056b3;
            padding-bottom: 20px;
        }

        .header img {
            width: 150px;
            margin-bottom: 10px;
        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        h1 {
            text-align: center;
            color: #0056b3;
            font-size: 24px;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .content {
            margin-top: 20px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .form-group label {
            width: 30%;
            font-weight: bold;
            color: #000000;
        }

        .form-group .value {
            width: 70%;
            padding: 8px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .stamp, .signature {
            margin-top: 50px;
            text-align: right;
        }

        .stamp img {
            width: 100px;
            opacity: 0.8;
        }

        .signature .name {
            margin-top: 60px;
            font-weight: bold;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }

        @media print {
            body {
                background-color: #fff;
            }
            .container {
                width: 100%;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width: 70px; height: auto;">
            <p>Alamat: Jl. KH ISMAIL SHOLEH, Tambak Agung, Ba'engas, Kec. Labang, </p>
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

        {{-- <div class="stamp">
            <img src="path/to/your/stamp.png" alt="Stempel">
        </div> --}}

        <div class="signature">
            <p>Mengetahui,</p>
            <p class="name">(_____________________)</p>
            <p>Jabatan</p>
        </div>

        <div class="footer">
            <p>© 2024 Pondok Pesantren AL-AKHYAR. All rights reserved.</p>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>


