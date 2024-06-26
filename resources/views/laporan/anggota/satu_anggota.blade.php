<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SIGPIB | {{ $anggota->kode_anggota }}</title>
    <style type="text/css">
        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }
        .upper { text-transform: uppercase; }

        h4 {
            font-family: Arial, Helvetica, sans-serif;
        }

        #table {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #595cf5;
            color: white;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td><img src="{{ public_path('images/gpib/Logo-GPIB.png') }}" alt=""
                    style="width: 100px; height: 100px;"></td>
            <td class="center">
                <font size="4">GEREJA PROTESTAN di INDONESIA bagian BARAT <br> (G P I B) <br> JEMAAT "MARANATHA"
                    TANJUNG SELOR</font> <br>
                <font size="2">Alamat: Jalan D.I. Panjaitan, No. 25 Tanjung Selor Kode Pos 77211 Kabupaten
                    Bulungan-KALTARA <br>
                    Email: gpib.maranatha.tjs@gmail.com</font>
            </td>
        </tr>
    </table>

    <hr width="100%" align="center">
    <h4>
        <center class="upper">BIODATA ANGGOTA JEMAAT</center>
    </h4>
    <table align="center">
        <tr>
            <td>
                @if ($anggota->gambar == null)
                    <img id="preview" class="product" style="border-radius: 25px; padding: 20px;" src="{{ public_path('images/pengguna/default.png') }}" width="150"
                        height="150">
                @else
                    <img id="preview" class="product" style="border-radius: 25px; padding: 20px;" width="150" height="150"
                        src="{{ public_path('storage/images/anggota/' . $anggota->gambar) }}" />
                @endif
            </td>
        </tr>
    </table>

    {{-- Data diri --}}
    <table id="table">

        <thead>
            <th colspan="3">DATA PRIBADI</th>
        </thead>

        <tbody>
            <tr>
                <td style="width: 25%" class="bold">Kode Anggota</td>
                <td>:</td>
                <td style="width: 70%">{{ $anggota->kode_anggota }}</td>
            </tr>
            <tr>
                <td class="bold">Nama Lengkap</td>
                <td>:</td>
                <td>{{ $anggota->nama }}</td>
            </tr>
            <tr>
                <td class="bold">Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $anggota->jk }}</td>
            </tr>
            <tr>
                <td class="bold">Tempat Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $anggota->tempat_lahir }} / {{ Carbon\Carbon::parse($anggota->tgl_lahir)->isoFormat('D MMMM Y') }}
                </td>
            </tr>
            <tr>
                <td class="bold">Pekerjaan</td>
                <td>:</td>
                <td>{{ $anggota->pekerjaan }}</td>
            </tr>
            <tr>
                <td class="bold">No HP</td>
                <td>:</td>
                <td>{{ $anggota->no_hp }}</td>
            </tr>
            <tr>
                <td class="bold">Alamat</td>
                <td>:</td>
                <td>{{ $anggota->alamat }}</td>
            </tr>
            <tr>
                <td class="bold">Provinsi</td>
                <td>:</td>
                <td>{{ $anggota->provinsi }}</td>
            </tr>
            <tr>
                <td class="bold">Kota/Kabupaten</td>
                <td>:</td>
                <td>{{ $anggota->kabupaten }}</td>
            </tr>
            <tr>
                <td class="bold">Kecamatan</td>
                <td>:</td>
                <td>{{ $anggota->kecamatan }}</td>
            </tr>
            <tr>
                <td class="bold">Kelurahan/Desa</td>
                <td>:</td>
                <td>{{ $anggota->kelurahan }}</td>
            </tr>
            <tr>
                <td class="bold">Golongan Darah</td>
                <td>:</td>
                <td>{{ $anggota->goldar }}</td>
            </tr>
            <tr>
                <td class="bold">Kepala Keluarga</td>
                <td>:</td>
                <td>{{ $anggota->sts_keluarga }}</td>
            </tr>
            <tr>
                <td class="bold">Masuk Sebagai Jemaat</td>
                <td>:</td>
                <td>{{ Carbon\Carbon::parse($anggota->created_at)->isoFormat('D MMMM Y') }}</td>
            </tr>
        </tbody>

    </table>
    {{-- Data diri --}}

    <br><br><br><br><br><br><br><br>

    {{-- Data berkas --}}
    <table id="table">

        <thead>
            <th colspan="3">DATA BERKAS</th>
        </thead>

        <tbody>
            <tr>
                <td style="width: 25%" class="bold">Akte Kelahiran</td>
                <td>:</td>
                @if ($anggota->akte_lahir == null)
                    <td style="width: 70%">-</td>
                @else
                    <td style="width: 70%">Diterima</td>
                @endif
            </tr>

            <tr>
                <td style="width: 25%" class="bold">Surat Baptis</td>
                <td>:</td>
                @if ($anggota->srt_baptis == null)
                    <td style="width: 70%">-</td>
                @else
                    <td style="width: 70%">Diterima</td>
                @endif
            </tr>

            <tr>
                <td class="bold">Surat Sidi</td>
                <td>:</td>
                @if ($anggota->srt_sidi == null)
                    <td>-</td>
                @else
                    <td>Diterima</td>
                @endif
            </tr>

            <tr>
                <td class="bold">Surat Atestasi</td>
                <td>:</td>
                @if ($anggota->srt_atestasi == null)
                    <td>-</td>
                @else
                    <td>Diterima</td>
                @endif
            </tr>
        </tbody>

    </table>
    {{-- Data berkas --}}


</body>

</html>
