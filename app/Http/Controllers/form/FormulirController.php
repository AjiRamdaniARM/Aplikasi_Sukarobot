<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use App\Models\DataKelas;
use App\Models\DataSekolah;
use App\Models\DataSiswa;
use App\Models\dataTrainer;
use Google\Service\SecurityCommandCenter\Requests;
use Illuminate\Http\Request;

class FormulirController extends Controller
{
    public function index()
    {
        $getData = DataSekolah::orderBy('created_at', 'DESC')->get();
        $getDataKelas = DataKelas::orderBy('created_at', 'DESC')->get();
        return view('FormulirPendaftaran', compact('getData', 'getDataKelas'));
    }


    public function store(Request $request) {
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
        }

        // jikah sudah masuk lempar ke halaman selanjutnya
        return redirect()
            ->route('formulir.done')
            ->with('success', 'ujicoba');

    }

    public function done()
    {
        return view('FormulirDone');
    }

    // === formulir trainer === //
    public function trainer()
    {
        return view('trainerCreate');
    }
    public function postTrainerData(Request $request)
    { 

        // validasi file ke public
        if ($request->hasFile('ktpFileInput')) {
            $ktpFile = $request->file('ktpFileInput');
            $ktpFileName = 'ktp_'.$request->nama.'.'.$ktpFile->getClientOriginalExtension();
            $ktpFile->move(public_path('/assets/trainer_data/ktp'), $ktpFileName);
        }

        if ($request->hasFile('pasPotoInput2')) {
            $profileFile = $request->file('pasPotoInput2');
            $profileFileName = 'Profile_'.$request->nama.'.'.$profileFile->getClientOriginalExtension();
            $profileFile->move(public_path('/assets/trainer_data/profile'), $profileFileName);
        }
        if ($request->hasFile('pasPotoInput3')) {
            $ttdFile = $request->file('pasPotoInput3');
            $ttdFileName = 'Ttd_'.$request->nama.'.'.$ttdFile->getClientOriginalExtension();
            $ttdFile->move(public_path('/assets/trainer_data/ttd'), $ttdFileName);
        }

        $request -> validate([
            'nama' => 'required|string|max:255|unique:data_trainers,nama',

        ],[
            'nama.unique' => 'Nama sudah ada di database, tidak bisa diinput lagi.',
        ]);

        dataTrainer::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'ktp_file' => $ktpFileName,
            'alamat' => $request->alamat,
            'lulusan' => $request->lulusan,
            'telephone' => $request->telephone,
            'profile' => $profileFileName,
            'ttd' => $ttdFileName,
            'password' => $request->password,
        ]);

        return redirect()->route('done.form');
    }

    public function trainerDone()
    {
        $getTrainer = dataTrainer::orderBy('created_at', 'desc')->get();
        return view('trainerDone',compact('getTrainer'));
    }
}
