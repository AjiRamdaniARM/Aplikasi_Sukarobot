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
        'alamat',
        'created_at',
        'status',

    ];

    public function program()
    {
        return $this->belongsTo(DataProgram::class, 'id_program');
    }


}
