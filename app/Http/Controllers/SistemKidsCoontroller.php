<?php

namespace App\Http\Controllers;

use App\Exports\DataSiswaExport;
use App\Models\DataKelas;
use App\Models\DataSekolah;
use App\Models\DataSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SistemKidsCoontroller extends Controller
{
    public function index(Request $request)
    {
        $getDataSchool = DataSekolah::orderBy('created_at', 'DESC')->paginate(10);
        $getSelect = DataSekolah::orderBy('created_at', 'DESC')->get();
        $getDataClass = DataKelas::all();
        $getClassProgram = DataKelas::withCount('siswa')->get();
        // get data and konversi ke count
        $getDataCountAll = DataSiswa::count();
        // Ambil data pencarian dari input
        $getResponseSiswa = $request->input('keyword');

        // Query dengan where sebelum orWhere
        $getDataKids = DB::table('data_siswas')
            ->join('data_sekolahs', 'data_siswas.id_sekolah', '=', 'data_sekolahs.id_sekolah')
            ->join('data_kelas', 'data_siswas.id_kelas', '=', 'data_kelas.id')
            ->where(function ($query) use ($getResponseSiswa) {
                $query->where('data_siswas.nama_lengkap', 'LIKE', "%{$getResponseSiswa}%")
                    ->orWhere('data_siswas.status_siswa', 'LIKE', "%{$getResponseSiswa}%")
                    ->orWhere('data_sekolahs.sekolah', 'LIKE', "%{$getResponseSiswa}%")
                    ->orWhere('data_siswas.id_kelas', 'LIKE', "%{$getResponseSiswa}%");
            })
            ->select('data_siswas.*','data_siswas.id as id_siswa', 'data_siswas.id_sekolah as sekolah_id','data_sekolahs.*', 'data_siswas.alamat as alamat_anak','data_kelas.kelas as nama_kelas')
            ->orderBy('data_siswas.nama_lengkap', 'asc')
            ->get();

        return view('admin.build.pages.dataKids', compact(
            'getDataKids', 
            'getSelect', 
            'getDataSchool', 
            'getDataClass', 
            'getDataCountAll',
            'getClassProgram'
        ));
    }

    // validasi data anak dari form pendaftaran ( Hosting ) 19 / 07 / 2024
    // public function store(Request $request)
    // {
    //     // validasi hasil input dan berikan meesage
    //     $request->validate([
    //         'nama_lengkap' => 'required|max:255|min:3',
    //         'tl' => 'required|max:255|min:3',
    //         // 'tanggal_lahir' => 'required',
    //         'sekolah' => 'required',
    //         'kelas' => 'required|max:255|min:1',
    //         'nama_ortu' => 'required|max:255|min:3',
    //         'telephone' => 'required|max:255|min:3',
    //         'work_ortu' => 'required|max:255|min:3',
    //         'alamat' => 'required|max:255|min:3',
    //         // 'file' => 'required|mimes:jpeg,png,pdf|max:5120',
    //     ], [
    //         'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
    //         'nama_lengkap.max' => 'Nama lengkap maksimal 255 karakter.',
    //         'nama_lengkap.min' => 'Nama lengkap minimal 3 karakter.',

    //         'ttl.required' => 'Tanggal lahir wajib diisi.',
    //         'ttl.max' => 'Tanggal lahir maksimal 255 karakter.',
    //         'ttl.min' => 'Tanggal lahir minimal 3 karakter.',

    //         'sekolah.required' => 'Nama sekolah wajib diisi.',
    //         'sekolah.max' => 'Nama sekolah maksimal 255 karakter.',
    //         'sekolah.min' => 'Nama sekolah minimal 3 karakter.',

    //         'kelas.required' => 'Kelas wajib diisi.',
    //         'kelas.max' => 'Kelas maksimal 255 karakter.',
    //         'kelas.min' => 'Kelas minimal 3 karakter.',

    //         'nama_ortu.required' => 'Nama orang tua wajib diisi.',
    //         'nama_ortu.max' => 'Nama orang tua maksimal 255 karakter.',
    //         'nama_ortu.min' => 'Nama orang tua minimal 3 karakter.',

    //         'telephone.required' => 'Nomor telepon wajib diisi.',
    //         'telephone.max' => 'Nomor telepon maksimal 255 karakter.',
    //         'telephone.min' => 'Nomor telepon minimal 3 karakter.',

    //         'work_ortu.required' => 'Pekerjaan orang tua wajib diisi.',
    //         'work_ortu.max' => 'Pekerjaan orang tua maksimal 255 karakter.',
    //         'work_ortu.min' => 'Pekerjaan orang tua minimal 3 karakter.',

    //         'alamat.required' => 'Alamat wajib diisi.',
    //         'alamat.max' => 'Alamat maksimal 255 karakter.',
    //         'alamat.min' => 'Alamat minimal 3 karakter.',

    //         'file.required' => 'Silakan pilih file untuk diunggah.',
    //         'file.mimes' => 'Tipe file harus berupa JPEG, PNG, atau PDF.',
    //         'file.max' => 'Ukuran file terlalu besar. Maksimum 5MB.',
    //     ]

    //     );

    //     $getSiswa = DataSiswa::where('nama_lengkap', $request->nama_lengkap)->first();
    //     if ($getSiswa) {
    //         // Lakukan penanganan jika data sudah ada, misalnya tampilkan pesan error atau lakukan tindakan lain
    //         return redirect()->back()->with('error', 'Data siswa dengan nama lengkap tersebut sudah ada.');
    //     } else {
    //         // validasi file ke public
       
    //             $dataFile = $request->file('file');
    //             $fileName = 'pasFoto_'.$request->nama_lengkap.'.'.$dataFile->getClientOriginalExtension();
    //             $dataFile->move(public_path('/assets/data/dataAnak/img'), $fileName);

    //             $validateDataKids = new DataSiswa();
    //             $validateDataKids->id_kelas = $request->id_kelas;
    //             $validateDataKids->nama_lengkap = $request->nama_lengkap;
    //             $validateDataKids->tl = $request->tl;
    //             $validateDataKids->tanggal_lahir = $request->tanggal_lahir;
    //             $validateDataKids->id_sekolah = $request->sekolah;
    //             $validateDataKids->kelas = $request->kelas;
    //             $validateDataKids->nama_ortu = $request->nama_ortu;
    //             $validateDataKids->work_ortu = $request->work_ortu;
    //             $validateDataKids->alamat = $request->alamat;
    //             $validateDataKids->telephone = $request->telephone;
    //             $validateDataKids->file = $fileName;
    //             $validateDataKids->save();

           
    //     }

    //     // jikah sudah masuk lempar ke halaman selanjutnya
    //     return redirect()
    //         ->route('formulir.done')
    //         ->with('success', 'ujicoba');

    // }

    public function addSchool(Request $request)
    {
        $sekolahExists = DataSekolah::where('sekolah', $request->sekolah)->exists();

        if ($sekolahExists) {
            return redirect()->back()->with('success', 'Data sekolah sudah ada');
        } else {
            // Generate ID unik
            $uniqueId = $this->generateUniqueId($request->sekolah);
            // Simpan data sekolah baru ke database
            $inputSekolah = new DataSekolah();
            $inputSekolah->id_sekolah = $uniqueId;
            $inputSekolah->sekolah = $request->sekolah;
            $inputSekolah->save();
            return redirect()->back()->with('success', 'Sekolah berhasil didaftarkan');
        }
    }

    public function storeAdmin(Request $request)
    {
        // validasi hasil input dan berikan meesage
        $request->validate([
            'nama_lengkap' => 'required|max:255|min:3',
            'tl' => 'required|max:255|min:3',
            // 'tanggal_lahir' => 'required',
            'sekolah' => 'required',
            'kelas' => 'required|max:255|min:1',
            'nama_ortu' => 'required|max:255|min:3',
            'telephone' => 'required|max:255|min:3',
            'work_ortu' => 'required|max:255|min:3',
            'alamat' => 'required|max:255|min:3',
            // 'file' => 'required|mimes:jpeg,png,pdf|max:5120',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'nama_lengkap.max' => 'Nama lengkap maksimal 255 karakter.',
            'nama_lengkap.min' => 'Nama lengkap minimal 3 karakter.',

            'ttl.required' => 'Tanggal lahir wajib diisi.',
            'ttl.max' => 'Tanggal lahir maksimal 255 karakter.',
            'ttl.min' => 'Tanggal lahir minimal 3 karakter.',

            'sekolah.required' => 'Nama sekolah wajib diisi.',
            'sekolah.max' => 'Nama sekolah maksimal 255 karakter.',
            'sekolah.min' => 'Nama sekolah minimal 3 karakter.',

            'kelas.required' => 'Kelas wajib diisi.',
            'kelas.max' => 'Kelas maksimal 255 karakter.',
            'kelas.min' => 'Kelas minimal 3 karakter.',

            'nama_ortu.required' => 'Nama orang tua wajib diisi.',
            'nama_ortu.max' => 'Nama orang tua maksimal 255 karakter.',
            'nama_ortu.min' => 'Nama orang tua minimal 3 karakter.',

            'telephone.required' => 'Nomor telepon wajib diisi.',
            'telephone.max' => 'Nomor telepon maksimal 255 karakter.',
            'telephone.min' => 'Nomor telepon minimal 3 karakter.',

            'work_ortu.required' => 'Pekerjaan orang tua wajib diisi.',
            'work_ortu.max' => 'Pekerjaan orang tua maksimal 255 karakter.',
            'work_ortu.min' => 'Pekerjaan orang tua minimal 3 karakter.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
            'alamat.min' => 'Alamat minimal 3 karakter.',

            'file.required' => 'Silakan pilih file untuk diunggah.',
            'file.mimes' => 'Tipe file harus berupa JPEG, PNG, atau PDF.',
            'file.max' => 'Ukuran file terlalu besar. Maksimum 5MB.',
        ]

        );

        $getSiswa = DataSiswa::where('nama_lengkap', $request->nama_lengkap)->first();
        if ($getSiswa) {
            // Lakukan penanganan jika data sudah ada, misalnya tampilkan pesan error atau lakukan tindakan lain
            return redirect()->back()->with('error', 'Data siswa dengan nama lengkap tersebut sudah ada.');
        } else {
            // validasi file ke public
            if ($request->hasFile('file')) {
                $dataFile = $request->file('file');
                $fileName = 'pasFoto_'.$request->nama_lengkap.'.'.$dataFile->getClientOriginalExtension();
                $dataFile->move(public_path('/assets/data/dataAnak/img'), $fileName);
                $validateDataKids = new DataSiswa();
                $validateDataKids->id_kelas = $request->id_kelas;
                $validateDataKids->nama_lengkap = $request->nama_lengkap;
                $validateDataKids->tl = $request->tl;
                $validateDataKids->tanggal_lahir = $request->tanggal_lahir;
                $validateDataKids->id_sekolah = $request->sekolah;
                $validateDataKids->kelas = $request->kelas;
                $validateDataKids->nama_ortu = $request->nama_ortu;
                $validateDataKids->work_ortu = $request->work_ortu;
                $validateDataKids->alamat = $request->alamat; 
                $validateDataKids->telephone = $request->telephone;
                $validateDataKids->file = $fileName;
                $validateDataKids->save();
            } else {
                return response()->json(['error' => 'Tidak ada data pas foto']);
            }
        }

        // jika sudah masuk lempar ke halaman selanjutnya
        return redirect()
            ->back()
            ->with('success', 'child data has been registered');

    }

   public function edit(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'tl' => 'required|string|max:100',
        'tanggal_lahir' => 'required|date',
        'nama_ortu' => 'required|string|max:255',
        'work_ortu' => 'nullable|string|max:255',
        'alamat' => 'nullable|string',
        'telephone' => 'nullable|string|max:20',
        'file' => 'nullable|image|max:2048', // Maks 2MB
    ]);

    // Ambil data siswa berdasarkan ID
    $siswa = DataSiswa::findOrFail($id);

    // Update data dasar
    $siswa->update([
        'nama_lengkap' => $request->nama_lengkap,
        'tl' => $request->tl,
        'tanggal_lahir' => $request->tanggal_lahir,
        'id_sekolah' => $request->id_sekolah,
        'kelas' => $request->kelas,
        'nama_ortu' => $request->nama_ortu,
        'work_ortu' => $request->work_ortu,
        'alamat' => $request->alamat,
        'telephone' => $request->telephone,
    ]);

    // Proses file jika ada
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = 'pasFoto_' . preg_replace('/\s+/', '_', strtolower($request->nama_lengkap)) . '.' . $file->getClientOriginalExtension();

        $destinationPath = public_path('/assets/data/dataAnak/img');

        // Hapus file lama jika ada
        if (!empty($siswa->file)) {
            $oldPath = $destinationPath . '/' . $siswa->file;
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        // Simpan file baru
        $file->move($destinationPath, $fileName);
        $siswa->file = $fileName;
        $siswa->save(); // simpan perubahan file
    }

    return redirect()->back()->with('success', 'Data siswa berhasil diperbarui.');
}



    private function generateUniqueId($sekolah)
    {
        // Ambil inisial dari nama (misal 3 karakter pertama)
        $initials = strtoupper(substr($sekolah, 0, 3));

        // Buat ID unik
        $uniqueId = $initials.'-'.uniqid();

        // Pastikan ID unik
        while (DataSekolah::where('id_sekolah', $uniqueId)->exists()) {
            $uniqueId = $initials.'-'.uniqid();
        }

        return $uniqueId;
    }

    public function delete($nama_lengkap)
    {
        $getRequest = DataSiswa::where('nama_lengkap', $nama_lengkap)->firstOrFail();
        $PasFoto = public_path('/assets/data/dataAnak/img');
        $PasFotos = $PasFoto.'/'.$getRequest->file;
        if (file_exists($PasFotos) && ! is_dir($PasFotos)) {
            unlink($PasFotos);
        }
        $getRequest->delete();
        return redirect()->back()->with('success', 'Data Kids data has been deleted');
    }

    // private Halaman kids
    public function privateData($nama_lengkap)
    {
        // $getSiswa = DataSiswa::where('nama_lengkap', $nama_lengkap)->first();
        $getSiswa = DB::table('data_siswas')
            ->join('data_sekolahs', 'data_siswas.id_sekolah', '=', 'data_sekolahs.id_sekolah')
            ->join('data_kelas', 'data_siswas.id_kelas', '=', 'data_kelas.id')
            ->where('data_siswas.nama_lengkap', '=', $nama_lengkap)
            ->select('data_siswas.*', 'data_sekolahs.*', 'data_siswas.alamat as alamat_anak','data_kelas.kelas as nama_kelas')
            ->first();

        return view('admin.build.pages.privateKids', compact('getSiswa'));
    }

    public function exportDataKids()
    {
        return Excel::download(new DataSiswaExport(), 'DataSiswa_'.'.xlsx');
    }

    
}
