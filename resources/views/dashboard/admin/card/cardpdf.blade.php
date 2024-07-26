<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Santri Pondok Pesantren Al-Akhyar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #fff;
        }

        .card {
            width: 338px;
            height: 214px;
            background-color: #f8f8f8;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #ddd;
            padding: 10px;
            box-sizing: border-box;
            position: relative;
        }

        .header {
            color: rgb(192, 158, 66);
            padding: 5px 5px 5px 60px;
            height: 50px;
            display: block;
            justify-content: center;
        }

        .header h1 {
            font-family: Arial, serif;
            margin: 0;
            font-size: 16px;
            letter-spacing: 0.5px;
        }

        .header p {
            color: #666;
            margin: 0;
            font-size: 8px;
            letter-spacing: 0.2px;
            line-height: 1.2;
        }

        .logo {
            position: absolute;
            top: 5px;
            left: 5px;
            width: 45px;
            height: 45px;
        }

        .content {
            padding: 12px;
            font-size: 9px;
            display: block;
            overflow: hidden;
        }

        .photo-info-container {
            display: flex;
            align-items: flex-start;
        }

        .photo {
            width: 65px;
            height: 90px;
            background-color: #f0f0f0;
            margin-right: 12px;
            overflow: hidden;
            border: 1px solid #000;
            border-radius: 8px;
            flex-shrink: 0;
        }

        .photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .info {
            flex-grow: 1;
        }

        .field {
            margin-bottom: 3px;
            display: flex;
            align-items: flex-start;
        }

        .label {
            font-weight: bold;
            width: 75px;
            flex-shrink: 0;
            letter-spacing: 0.1px;
        }

        .value {
            word-wrap: break-word;
            overflow-wrap: break-word;
            letter-spacing: 0.1px;
            line-height: 1.2;
            flex-grow: 1;
        }

        .address-field .separator {
            margin-right: 2px;
        }

        .address-field .value {
            display: inline;
        }

        .signature {
            position: absolute;
            bottom: 20px;
            right: 8px;
            font-size: 7px;
            text-align: right;
            line-height: 1.2;
        }

        .footer {
            position: absolute;
            bottom: 5px;
            right: 8px;
            font-size: 8px;
            color: #666;
            letter-spacing: 0.1px;
        }
    </style>
</head>
<body>
    <div class="card">
        <img src="{{ public_path('img/logo.png') }}" alt="Logo" class="logo">
        <div class="header">
            <h1>Pondok Pesantren Al-Akhyar</h1>
            <p>Jl. KH ISMAIL SHOLEH, Tambak Agung, Ba'engas, Kec. Labang, Kabupaten Bangkalan, Jawa Timur 69163</p>
        </div>
        <div class="content">
            <div class="photo-info-container">
                <div class="photo">
                    <img src="{{ public_path('storage/foto_santri/'.$santri->image) }}" alt="Foto Santri">
                </div>
                <div class="info">
                    <div class="field"><span class="label">ID Santri</span><span class="value">: {{$santri->id_santri}}</span></div>
                    <div class="field"><span class="label">Nama</span><span class="value">: {{ $santri->nama }}</span></div>
                    <div class="field"><span class="label">Kamar</span><span class="value">: {{ $santri->kamar }}</span></div>
                    <div class="field"><span class="label">Tempat tgl lahir</span><span class="value">: {{ $santri->tempat_lahir }}, {{ $santri->tanggal_lahir }}</span></div>
                    <div class="field"><span class="label">Wali santri</span><span class="value">: {{ $santri->nama_ayah }}</span></div>
                    <div class="field address-field">
                        <span class="label">Alamat</span>
                        <span class="value"><span class="separator">:</span> {{ $santri->alamat }}</span>
                    </div>
                </div>
            </div>
            <div class="signature">
                Tambak Agung, 17 syaban 1445<br>
                Pengurus PP Al-Akhyar<br>
                ttd
            </div>
            <div class="footer">KH. Fudholi Amin</div>
        </div>
    </div>
</body>
</html>