<?php

namespace App\Http\Controllers;
use App\Models\dataTrainer;
use App\Models\DataSekolah;
use App\Models\DataSiswa;
use App\Models\DataLaporan;
use App\Models\DataProgram;
use App\Models\DataLevel;
use App\Models\DataKelas;
use App\Models\DataAlat;
use App\Models\Schedules;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // === get data all active === //
        $getDataTrainerCount = dataTrainer::where('status_trainer', 'Aktif')->count();
        $getDataTrainerCountNonActive = dataTrainer::where('status_trainer', 'Tidak Aktif')->count();
        $getDataSekolahActive = dataSekolah::where('status', 'isactive')->count();
        $getDataSekolahNonActive = dataSekolah::where('status', 'nonactive')->count();
        $getDataSiswasActive = DataSiswa::where('status_siswa', 'Aktif')->count();
        $getDataSiswasNonActive = DataSiswa::where('status_siswa', 'Tidak Aktif')->count();
        $getDataLaporan = DataLaporan::count();
        // === non active count === //
        $getDataProgram = DataProgram::count();
        $getDataLevels = DataLevel::count();
        $getDataKelas = DataKelas::count();
        $getDataAlats = DataAlat::count();
        $getDataSchedules = Schedules::count();

        // === get data count for chart === //
        $getSiswaMonth = DataSiswa::selectRaw('MONTH(created_at) as `month`, COUNT(*) as count')
        ->whereYear('created_at', Carbon::now()->year)
        ->groupBy('month')
        ->pluck('count', 'month')->toArray();

        // === mengisi data bulan yang tidak menjadi 0 === //
        $moths = range(1,12);
        $siswaPerBulan =[];

        foreach($moths as $month) {
            $siswaPerBulan[] = $siswaPerBulan[$month] ?? 0;
        }

        return view('admin.build.index', compact('getDataTrainerCount','getDataSekolahActive','getDataSekolahNonActive','getDataSiswasActive','getDataLaporan','getDataProgram','getDataLevels','getDataKelas','getDataAlats','getDataSchedules','getDataTrainerCountNonActive','getDataSiswasNonActive','siswaPerBulan'));
    }
}
