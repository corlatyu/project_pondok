<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Santri Pondok Pesantren Al-Akhyar</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap');

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            width: 338px;
            height: 214px;
            background-color: rgba(248, 248, 248, 0.733);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
            background-image: 
                radial-gradient(circle at 1px 1px, #e0e0e0 1px, transparent 0),
                radial-gradient(circle at 1px 1px, #e0e0e0 1px, transparent 0);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
        }

        .header {
            color: rgb(192, 158, 66);
            padding: 5px 5px 5px 70px;
            height: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .header h1 {
            font-family: 'Amiri', serif;
            margin: 0;
            font-size: 16px;
            letter-spacing: 0.5px;
        }
        .header p {
            color: #666;
            margin: 0 0 0;
            font-size: 8px;
            letter-spacing: 0.2px;
            line-height: 1.2;
        }
        .logo {
            padding: 5px 5px 5px 10px;
            position: absolute;
            top: 5px;
            left: 5px;
            width: 45px;
            height: 45px;
        }
        .content {
            padding: 12px;
            font-size: 9px;
            display: flex;
        }
        .photo {
            width: 65px;
            height: 90px;
            background-color: #f0f0f0;
            margin-right: 12px;
            overflow: hidden;
            border: 0.1px solid #000000; /* Warna frame sesuai dengan warna header */
            border-radius: 8px; /* Menambahkan rounded corners */
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
            flex-grow: 1;
            word-wrap: break-word;
            overflow-wrap: break-word;
            letter-spacing: 0.1px;
            line-height: 1.2;
            display: flex;
        }
        .address-field .separator {
            margin-right: 2px; /* Spasi setelah tanda titik dua untuk alamat */
        }
        .address-field .value {
            display: flex;
            align-items: flex-start;
        }
        .address-text {
            display: inline-block;
            width: calc(100% - 20px); /* 10px untuk lebar tanda titik dua */
            white-space: normal;
            word-break: break-word;
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
        #download-link {
            display: none;
        }
    </style>
</head>
<body onload="autoClick();">
    <div id="htmlContent">
        <div class="card">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
            <div class="header">
                <h1>Pondok Pesantren Al-Akhyar</h1>
                <p>Jl. KH ISMAIL SHOLEH, Tambak Agung, Ba'engas, Kec. Labang, Kabupaten Bangkalan, Jawa Timur 69163</p>
            </div>
            <div class="content">
                <div class="photo">
                    <img src="{{ asset('storage/foto_santri/'.$santri->image) }}" alt="Foto Santri" class="img-thumbnail" style="max-width: 80px; max-height: 90px;" data-toggle="modal" data-target="#modalFotoSantri{{ $santri->id }}">
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
                <div class="signature">
                    Tambak Agung, 17 syaban 1445<br>
                    Pengurus PP Al-Akhyar<br>
                    ttd
                </div>
                <div class="footer">KH. Fudholi Amin</div>
            </div>
        </div>
    </div>

    <a id="download-link">Download</a>

    <script type="text/javascript">
        function autoClick(){
            $("#download-link").click();
        }

        $(document).ready(function(){
            var element = $("#htmlContent");

            $("#download-link").on('click', function(){
                html2canvas(element[0], {
                    scale: 4, // Increase the scale for HD quality
                    useCORS: true, // Allow cross-origin images
                    onrendered: function(canvas) {
                        var imageData = canvas.toDataURL("image/jpeg", 1.0);
                        var link = document.createElement('a');
                        link.download = "kartu_santri.jpg";
                        link.href = imageData;
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    }
                });
            });
        });
    </script>
</body>
</html>