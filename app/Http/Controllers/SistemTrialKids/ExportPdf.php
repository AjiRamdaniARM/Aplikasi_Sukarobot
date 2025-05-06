<?php

namespace App\Http\Controllers\SistemTrialKids;

use App\Http\Controllers\Controller;
use App\Models\DataTrial;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExportPdf extends Controller
{
    public function ExportPDFTrial(Request $request)
    {
        if($request->has('filter')) {
            [$year, $month] = explode('-', $request->filter); 
            $trials = DB::table('data_trials')
            ->join('data_programs', 'data_trials.id_program', '=', 'data_programs.id')
            ->select('data_programs.*','data_trials.*')
            ->orderBy('nama_siswa' ,'ASC')
            ->whereYear('data_trials.created_at', $year)
            ->whereMonth('data_trials.created_at', $month)
            ->get();
        } else {
            $trials = DB::table('data_trials')
            ->join('data_programs', 'data_trials.id_program', '=', 'data_programs.id')
            ->select('data_programs.*','data_trials.*')
            ->orderBy('nama_siswa' ,'ASC')
            ->get();
        }
        
        $path = public_path('asset/logo.jpg');
        if(!file_exists($path)) {
            abort(404,  ' Logo Tidak Ditemukan');
        }
        $imageBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($path));
        $data = [
            'trial' => $trials,
            'image' => $imageBase64,
        ];
        $pdf = Pdf::loadView('admin/build/components/TrialKids/export/view', $data);
        return $pdf->stream('contoh.pdf');
    }
}
