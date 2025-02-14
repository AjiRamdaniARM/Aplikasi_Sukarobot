<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\GoogleDrive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class googleDriveController extends Controller
{
    public function index  () {
        $getDataDrive = GoogleDrive::get();
        return view('admin.build.components.googleDrive.index', compact('getDataDrive'));
    }

    public function post(Request $request) 
    {
        try {
            // Validasi input
            $validasiInput = $request->validate([
                'name_folder' => 'required|string|max:255|min:3',
                'link_folder' => 'required|string|max:255|min:3',
            ]);
    
            // Mulai transaksi database untuk mencegah data corrupt jika terjadi error
            DB::beginTransaction();
    
            // Ambil data dari model GoogleDrive
            $getDataDrive = GoogleDrive::get(); // Ambil data pertama jika ada
    
                // Jika data tidak ditemukan, buat baru
                GoogleDrive::create([
                    'name_folder' => $validasiInput['name_folder'],
                    'link_folder' => $validasiInput['link_folder'],
                ]);

            // Commit transaksi jika semua berhasil
            DB::commit();
    
            return redirect()->route('menu.googleDrive')->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada error
            DB::rollBack();
    
            // Logging error untuk debugging (Opsional)
            Log::error('Error saat menyimpan data GoogleDrive: ' . $e->getMessage());
    
            // Redirect kembali dengan pesan error
            return back()->with('error', 'Terjadi kesalahan, silakan coba lagi.');
        }
    }

    public function delete($id)
    {
        $drive = GoogleDrive::find($id);
        if (!$drive) {
            return response()->json(['success' => false, 'message' => 'File tidak ditemukan.']);
        }
    
        $drive->delete();
        return redirect()->route('menu.googleDrive');
    }

    public function edited ($id, Request $request) {
        $vData = $request->validate([
            'name_folder' => 'required|string|max:255|min:3',
            'link_folder' => 'required|string|max:255|min:3',
        ]);

        $getDDrive = GoogleDrive::findOrFail($id);
        $getDDrive->update([
            'name_folder' => $vData['name_folder'],
            'link_folder' => $vData['link_folder'],
        ]);

        return redirect()->route('menu.googleDrive');
    }
    
    
}
