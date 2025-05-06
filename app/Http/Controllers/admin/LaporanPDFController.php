<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Pastikan Carbon di-import

class LaporanPDFController extends Controller
{
    public function ExportPDFLaporan(Request $request)
    {
        // Ambil input bulan & trainer
        $trainerId = $request->input('trainerID');
        $inputMonth = Carbon::parse($request->input('month_year'));
        $bulan = $inputMonth->month;
        $tahun = $inputMonth->year;
    
        // Ambil data jadwal dan join tabel terkait
        $querySchedules = DB::table('schedules')
            ->leftJoin('data_trainers', 'schedules.id_trainer', '=', 'data_trainers.id')
            ->leftJoin('data_laporans', 'data_laporans.id_jadwal', '=', 'schedules.id')
            ->leftJoin('data_kelas', 'schedules.id_kelas', '=', 'data_kelas.id')
            ->leftJoin('data_programs', 'schedules.id_program', '=', 'data_programs.id')
            ->leftJoin('data_levels', 'schedules.id_level', '=', 'data_levels.id')
            ->leftJoin('data_materis', 'data_laporans.id_materi', '=', 'data_materis.id')
            ->leftJoin('data_alats', 'schedules.id_alat', '=', 'data_alats.id')
            ->select(
                'schedules.*',
                'schedules.id as id_schedules',
                'schedules.id_bigData as id_big_data',
                'schedules.created_at as created_at_jd',
                'data_trainers.nama as trainer_name',
                'data_kelas.kelas as kelas_name',
                'data_alats.alat as nama_alat',
                'data_programs.*',
                'data_laporans.*',
                'data_levels.*',
                'data_materis.*'
            )
            ->where('schedules.ab_trainer', 'Hadir')
            ->whereMonth('schedules.tanggal_jd', $bulan)
            ->whereYear('schedules.tanggal_jd', $tahun);
    
        // Filter berdasarkan trainer jika bukan "all"
        if ($trainerId !== 'all' && !empty($trainerId)) {
            $querySchedules->where('schedules.id_trainer', $trainerId);
        }
    
        $schedules = $querySchedules->orderBy('schedules.tanggal_jd')->get();
    
        // Ambil semua id_bigData
        $scheduleIds = $schedules->pluck('id_big_data')->filter()->unique();
    
        // Ambil data siswa berdasarkan id_bigData
        $dataSiswaw = DB::table('big_data')
            ->join('data_siswas', 'big_data.id_siswa', '=', 'data_siswas.id')
            ->whereIn('big_data.id_bigData', $scheduleIds)
            ->select('big_data.id_bigData', 'data_siswas.nama_lengkap', 'big_data.absensi_anak')
            ->get()
            ->groupBy('id_bigData');
    
        // Gabungkan data siswa ke jadwal
        $results = $schedules->map(function ($schedule) use ($dataSiswaw) {
            return [
                'schedule' => $schedule,
                'students' => $dataSiswaw[$schedule->id_big_data] ?? [],
            ];
        });
    
        // Cek dan ambil logo base64
        $path = public_path('asset/logo.jpg');
        if (!file_exists($path)) {
            throw new \Exception('File logo tidak ditemukan');
        }
        $imageBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($path));
    
        // Data yang dikirim ke PDF
        $viewData = [
            'results' => $results,
            'logo' => $imageBase64,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];
    
        // Generate PDF
        $pdf = Pdf::loadView('admin/build/components/laporan/viewPDF', $viewData);
    
        return $pdf->stream('laporan.pdf');
    }
    
}
