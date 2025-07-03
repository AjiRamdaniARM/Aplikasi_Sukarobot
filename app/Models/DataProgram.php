<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'program',
    ];

    public function levels()
    {
        return $this->belongsTo(DataLevel::class, 'id_programs');
    }

    public function dataTrials()
    {
        return $this->hasMany(DataTrial::class, 'id_program');
    }
}
