<?php

namespace App\Http\Controllers\SistemTrialKids;

use App\Http\Controllers\Controller;
use App\Models\DataProgram;
use App\Models\DataSekolah;
use App\Models\DataTrial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class SistemTrialController extends Controller
{
    public function index (Request $request) {
        // === metode get data menggunakan relasi model === //
        $keyword = $request->input('keyword');

        // === metode get data menggunakan relasi model === //
        $getDataSiswaTrial = DB::table('data_trials')
        ->join('data_sekolahs', 'data_trials.id_sekolah', '=', 'data_sekolahs.id_sekolah')
        ->join('data_programs', 'data_trials.id_program', '=', 'data_programs.id')
        ->when($keyword, function ($query, $keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('data_trials.nama_siswa', 'like', "%$keyword%")
                  ->orWhere('data_sekolahs.sekolah', 'like', "%$keyword%")
                  ->orWhere('data_trials.status', 'like', "%$keyword%");
            });
        })
        ->select(
            'data_trials.*',
            'data_trials.id as id_trials',
            'data_trials.created_at as jadwal',
            'data_programs.*',
            'data_sekolahs.sekolah as nama_sekolah'
        )
        ->orderBy('data_trials.created_at', 'desc')
        ->get();
        $countDataSiswaTrial = DataTrial::count();
        $countDataSiswaTriall = DataTrial::where('status','trial')->count();
        $countDataSiswaTrialn = DataTrial::where('status','aktif')->count();
        return view('admin.build.pages.dataTrials',compact('getDataSiswaTrial','countDataSiswaTrial','countDataSiswaTriall','countDataSiswaTrialn'));
    }

    public function indexForm() {
        $getDataSekolah = DataSekolah::all();
        $getDataProgram = DataProgram::all();
        return view('p_trial.index',compact('getDataSekolah','getDataProgram'));
    }

    public function previewTrial() {
        return view('p_trial.preview');
    }

    public function lanjutTrialAll(Request $request) {
        try {
            $siswaIds = $request->input('siswa_id', []);
            
            // Log the received data for debugging
            \Log::info('Received request data:', [
                'siswa_id' => $siswaIds,
                'request_all' => $request->all()
            ]);
            
            if (empty($siswaIds)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Pilih minimal satu siswa',
                    'debug' => [
                        'received_data' => $request->all(),
                        'siswa_ids' => $siswaIds
                    ]
                ], 400);
            }

            $updatedCount = 0;
            $updatedData = [];
            foreach ($siswaIds as $siswaId) {
                $siswaTrial = DataTrial::where('id', $siswaId)->first();
                if ($siswaTrial && $siswaTrial->status !== 'aktif') {
                    $siswaTrial->status = 'aktif';
                    $siswaTrial->save();
                    $updatedCount++;
                    $updatedData[] = [
                        'id' => $siswaTrial->id,
                        'nama_siswa' => $siswaTrial->nama_siswa,
                        'status' => $siswaTrial->status
                    ];
                }
            }

            if ($updatedCount > 0) {
                return response()->json([
                    'status' => 'success',
                    'message' => $updatedCount . ' siswa berhasil diubah statusnya menjadi aktif',
                    'updated_count' => $updatedCount,
                    'updated_data' => $updatedData
                ], 200);
            } else {
                return response()->json([
                    'status' => 'info',
                    'message' => 'Tidak ada perubahan status siswa',
                    'updated_count' => 0,
                    'debug' => [
                        'siswa_ids' => $siswaIds,
                        'request_data' => $request->all()
                    ]
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengubah status siswa',
                'error' => $e->getMessage(),
                'debug' => [
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ]
            ], 500);
        }
    }

    public function confirmation() {
        return view('p_trial.confirmation');
    }

    // === controller prosses input form === //
    public function storeTrial(Request $request) {
        $request->validate([
            'nama_siswa' => 'required|string|min:3',
            'usia_anak' => 'required|numeric|min:1',
            'nama_ortu' => 'required|string|min:3',
            'no_hp' => 'required|string|min:12|max:13',
            'alamat' => 'required|string|min:3'
        ],
        [
            'nama_siswa.required' => 'Nama anak wajib diisi.',
            'nama_siswa.min' => 'Nama siswa minimal harus 3 karakter.',
            'usia_anak.required' => 'Usia anak wajib diisi.',
            'usia_anak.numeric' => 'Usia anak harus berupa angka.',
            'nama_ortu.required' => 'Nama Orang tua wajib diisi.',
            'nama_ortu.min' => 'Nama Orang tua minimal harus 3 karakter.',
            'no_hp.required' => 'No HP wajib diisi.',
            'no_hp.min' => 'No HP minimal harus 12 karakter.',
            'no_hp.max' => 'No HP minimal harus 13 karakter.',
            'alamat.min' => 'No HP minimal harus 13 karakter.',
            // tambahkan pesan custom lainnya di sini
        ]
    );

    $getDataTrial = new DataTrial();
    $getDataTrial -> insert([
        'nama_siswa' => $request->input('nama_siswa'),
        'usia_anak' => $request->input('usia_anak'),
        'nama_ortu' => $request->input('nama_ortu'),
        'no_hp' => $request->input('no_hp'),
        'id_sekolah' => $request->input('sekolah'),
        'id_program' => $request->input('id_program'),
        'alamat' => $request->input('alamat'),
    ]);   
        return redirect()->route('confirmationTrial');
    }

    // === proses menghapus data siswa === //
    public function delete($id)
    {
        $getDataSiswa = DataTrial::where('id', $id)->first(); 
        if (!$getDataSiswa) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
        $getDataSiswa->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    // === proses mengedit data siswa === //
    public function editedView($id_trials){
        $siswaTrial = DataTrial::where('id', $id_trials
        )->first();
        $sekolahList = DataSekolah::all();
        $programList = DataProgram::all();
        return view('admin.build.components.TrialKids.pageEdit', compact('siswaTrial', 'sekolahList', 'programList'));
    }

    public function updateTrial(Request $request, $id){
        try {
            $request->validate([
                'nama_siswa' => 'required|string|min:3',
                'usia_anak' => 'required|numeric|min:1',
                'nama_ortu' => 'required|string|min:3',
                'no_hp' => 'required|string|min:12|max:13',
                'alamat' => 'required|string|min:3',
                'id_sekolah' => 'required',
                'id_program' => 'required'
            ]);

            $siswaTrial = DataTrial::findOrFail($id);
            
            $siswaTrial->update([
                'nama_siswa' => $request->nama_siswa,
                'usia_anak' => $request->usia_anak,
                'nama_ortu' => $request->nama_ortu,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'id_sekolah' => $request->id_sekolah,
                'id_program' => $request->id_program
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data siswa berhasil diperbarui',
                'data' => $siswaTrial
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal memperbarui data: ' . $e->getMessage()
            ], 500);
        }
    }

    // === proses mengubah status siswa === //
    public function lanjutTrial($id_trials)
    {
        // === proses mengubah status siswa === //
        try {
            // === proses mengambil data siswa === //
            $siswaTrial = DataTrial::where('id', $id_trials)->first();
            if (!$siswaTrial) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data siswa tidak ditemukan'
                ], 404);
            }
            // === proses mengubah status siswa === //
            $siswaTrial->status = 'aktif';
            $siswaTrial->save();

            $getSiswaAktif = new DataSiswa();
            $getSiswaAktif -> insert([
                'nama_siswa' => $siswaTrial->nama_siswa,
                'usia_anak' => $siswaTrial->usia_anak,
                'nama_ortu' => $siswaTrial->nama_ortu,
                'no_hp' => $siswaTrial->no_hp,
                'alamat' => $siswaTrial->alamat,
            ]);
            // === proses mengembalikan pesan sukses === //
            return redirect()->back()->with('success', 'Status siswa berhasil diubah menjadi aktif');
        } catch (\Exception $e) {
            // === proses mengembalikan pesan error === //
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengubah status siswa',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function searchTrial(Request $request)
    {
        $query = $request->input('query');
        
        if (empty($query)) {
            return response()->json([]);
        }

        $results = DataTrial::where('nama_siswa', 'LIKE', "%{$query}%")
            ->orWhere('nama_ortu', 'LIKE', "%{$query}%")
            ->select('id', 'nama_siswa', 'usia_anak', 'nama_ortu', 'status')
            ->limit(10)
            ->get();

        return response()->json($results);
    }
}
