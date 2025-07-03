<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Export Laporan</title>
    <style>
        .container {
            width: 100%;
            font-family: Arial, sans-serif;
        }

        .table-row {
            display: inline-block;
            gap: 20px; /* Jarak antar tabel */
            width: 100%;
        }

        .table-container {
            flex: 1; /* Membuat tabel memiliki lebar yang sama */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 8px;
            border: 1px solid #000;
        }

        .table-below {
            margin-top: 40px; /* Jarak dengan tabel sejajar di atas */
        }

        .ab {
            background-color: rgb(68, 255, 68);
        }

        .ab-r {
            background-color: rgb(255, 68, 68);
        }
        header {
            width: 100%;
            border-bottom: 2px solid #000; /* Garis bawah */
            padding-bottom: 20px; /* Jarak bawah */
            margin-bottom: 20px; /* Jarak bawah header */
        }

        .logo.header {
            display: inline-block;
            vertical-align: top;
            width: 120px; /* Lebar gambar logo */
        }

        .component-text-header {
            display: inline-block;
            vertical-align: top;
            margin-top: 17px;
            margin-left: 20px;
            font-family: Arial, sans-serif;
        }

        .component-text-header h1 {
            font-size: 24px;
            margin: 0;
            color: #333;
            font-weight: bold;
        }

        .component-text-header p {
            margin: 5px 0;
            color: #555;
            font-size: 14px;
        }

        /* Styling untuk alamat, telepon, dan email */
        .component-text-header p:first-child {
            font-weight: bold;
            color: #000;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo header">
            <img src="{{ $image }}" alt="Logo" style="width: 120px; height: auto;">
        </div>
        <div class="component-text-header">
            <h1>LAPORAN SISWA TRIAL</h1>
            <p>Alamat: Jl. A. Yani No.283, Kebonjati, Kec.Cikole, Kota Sukabumi, Jawa Barat 43111</p>
            <p>Telepon: +62 857-9589-9901</p>
            <p>Email: sukarobotacademy@gmail.com</p>
        </div>
    </header>
    <main>
        <div class="container">
            {{--== Tabel Jadwal Trainer == --}}
            <div class="table-container">
                @if($trial->isEmpty())
                    <div class="text-center mt-10">
                        <p class="text-gray-500 text-lg">Tidak ada data untuk bulan yang dipilih.</p>
                    </div>
                @else
                    <table border="1" style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th colspan="2" style="text-align: center;">Nama Siswa</th>
                                <th colspan="2" style="text-align: center;">Usia Siswa</th>                         
                                <th colspan="2" style="text-align: center;">Nomor Telepon</th>
                                <th colspan="2" style="text-align: center;">Pilihan Kelas</th>
                                <th colspan="2" style="text-align: center;">Status Siswa</th>
                                <th colspan="2" style="text-align: center;">Tanggal Trail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trial as $index => $data )
                                <tr>
                                    <td colspan="2" style="text-align: center;">{{ $data->nama_siswa}}</td>
                                    <td colspan="2" style="text-align: center;">{{ $data->usia_anak}} Tahun</td>
                                    <td colspan="2" style="text-align: center;">{{ $data->no_hp}}</td>
                                    <td colspan="2" style="text-align: center;">{{ $data->program}}</td>
                                    @if ($data->status == 'trial')
                                        <td colspan="2" style="text-align: center; background-color: rgb(255, 105, 105);">{{ $data->status}}</td>
                                    @else
                                        <td colspan="2" style="text-align: center;background-color: rgb(104, 254, 87);"">{{ $data->status}}</td>
                                    @endif
                                   
                                    <td colspan="2" style="text-align: center;">{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
               @endif
            </div>
        </div>
    </main>
</body>
</html>
