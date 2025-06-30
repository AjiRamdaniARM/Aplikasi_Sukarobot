<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas',
    ];

    // Satu kelas memiliki banyak siswa
    public function siswa()
    {
        return $this->hasMany(DataSiswa::class, 'id_kelas');
    }

    // Hitung jumlah siswa di kelas ini
    public function jumlahSiswa()
    {
        return $this->siswa()->count();
    }
}
