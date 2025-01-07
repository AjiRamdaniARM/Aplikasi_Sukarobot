<?php

namespace App\Http\Controllers\trainer\laporan;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class PdfController extends Controller
{
    public function exportPDF()
    {
        $data = ['title' => 'Contoh PDF', 'content' => 'Ini adalah konten PDF.'];
        $path = public_path('asset/logo.jpg');
        $imageBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($path));
        $data['image'] = $imageBase64;
        $pdf = Pdf::loadView('trainer/export/laporanT_ExportPDF', $data);
        return $pdf->stream('contoh.pdf');
    }

        public function exportPost(Request $request)
    {
            // Ambil input dari request
            $trainerId = Auth::guard('trainer')->id();
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $selectedFields = $request->input('fields', []); 
            
            // Query data dari database
            $querySchedules = DB::table('schedules')
            ->where('id_trainer', $trainerId)
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
                'data_trainers.id as id_trainer',
                'data_kelas.kelas as kelas_name',
                'data_kelas.id as id_kelas',
                'data_alats.alat as nama_alat',
                'data_alats.id as id_alat',
                'data_programs.*',
                'data_laporans.*',
                'data_programs.id as id_program',
                'data_levels.*',
                'data_materis.*',
                'data_levels.id as id_level',
            )
            ->whereBetween('schedules.tanggal_jd', [$startDate, $endDate]);

        // Filter berdasarkan trainer jika diperlukan
        if ($trainerId !== 'all' && !empty($trainerId)) {
            $querySchedules->where('schedules.id_trainer', $trainerId);
        }

        // Ambil data schedules
        $schedules = $querySchedules->orderBy('schedules.tanggal_jd')->get();

        // Ambil data siswa terkait
        $scheduleIds = $schedules->pluck('id_big_data');
        $dataSiswaw = DB::table('big_data')
            ->join('data_siswas', 'big_data.id_siswa', '=', 'data_siswas.id')
            ->whereIn('big_data.id_bigData', $scheduleIds)
            ->select('big_data.id_bigData', 'data_siswas.nama_lengkap', 'big_data.absensi_anak')
            ->get()
            ->groupBy('id_bigData');

        // Gabungkan hasil dalam struktur terpisah  
        $results = $schedules->map(function ($schedule) use ($dataSiswaw ) {
            return [
                'schedule' => $schedule,
                'students' => $dataSiswaw [$schedule->id_big_data] ?? [],
            ];
        });
            // Base64 encode untuk gambar logo
            $path = public_path('asset/logo.jpg');
            if (!file_exists($path)) {
                throw new Exception('File logo tidak ditemukan');
            }

            $imageBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($path));
            $data['image'] = $imageBase64;

            // Kirim data ke view untuk PDF
            $viewData = [
                'results' => $results,
                'logo' => $data['image'],
            ];

            // Load view untuk membuat PDF
            $pdf = Pdf::loadView('trainer.export.laporanT_ExportPDF', $viewData);

            // Return PDF ke browser
            return $pdf->stream('laporan.pdf');  
            // dd($results);

    }

    
}