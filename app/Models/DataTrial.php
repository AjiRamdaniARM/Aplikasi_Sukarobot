<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTrial extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_program',
        'nama_siswa',
        'id_sekolah',
        'nama_ortu',
        'no_hp',
        'alaamat',
    ];
}
