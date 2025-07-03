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
    </style>
</head>
@forelse ($results as $tanggal => $scheduleGroup)
<body>
    {{-- Header Component --}}
    @include('trainer.export.template.header')

    <main>
        <div class="container">
            {{-- Tabel Jadwal Trainer --}}
            <div class="table-container">
                <table border="1" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th colspan="2" style="text-align: center;">Jadwal Trainer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>{{ $scheduleGroup['schedule']->trainer_name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Hari</td>
                            <td>{{ $scheduleGroup['schedule']->hari ?? '-' }}</td> {{-- Pastikan kolom hari tersedia --}}
                        </tr>
                        <tr>
                            <td>Jam</td>
                            <td>{{ \Carbon\Carbon::parse($scheduleGroup['schedule']->jm_awal ?? null)->format('H:i') ?? '0'}} - {{ \Carbon\Carbon::parse($scheduleGroup['schedule']->jm_akhir ?? null)->format('H:i') ?? '0'}}
                            </td> {{-- Pastikan kolom jam tersedia --}}
                        </tr>
                        <tr>
                            <td>Sekolah</td>
                            <td>{{ $scheduleGroup['schedule']->kelas_name ?? '-' }}</td> {{-- Pastikan kolom sekolah tersedia --}}
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Tabel Nama Siswa dan Kehadiran --}}
            <div class="table-container">
                <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Kehadiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($scheduleGroup['students'] as $trainer)
                            <tr>
                                <td>{{ $trainer->nama_lengkap }}</td>
                                <td class="" style="background-color: {{ $trainer->absensi_anak == 'Hadir' ? '#5EFF28FF' : '#FF2828FF' }};">
                                    {{ $trainer->absensi_anak }}
                                </td>                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" style="text-align: center;">Tidak ada data siswa</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Tabel Tambahan di Bawah --}}
            <div class="table-below">
                <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jam Datang</th>
                            <th>Materi</th>
                            <th>Catatan Trainer</th>
                            <th>TTD</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Contoh data statis, sesuaikan dengan data dinamis jika ada --}}
                        
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($scheduleGroup['schedule']->tanggal_lp ?? null)->translatedFormat('d F Y') ?? '0' }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($scheduleGroup['schedule']->jam_lp ?? null)->format('H:i') ?? '0'}}</td>
                            <td>{{ $scheduleGroup['schedule']->materi ?? '-' }}</td>
                            <td>{{ $scheduleGroup['schedule']->catatan ?? '-' }}</td>
                            <td>
                                <img width="100" src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('assets/trainer_data/ttd/Ttd_Aji Ramdani.jpg'))) }}" alt="">
                            </td>
                            

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
@empty
    <p class="text-center text-gray-500">Tidak ada data untuk rentang tanggal yang dipilih.</p>
@endforelse

</html>
