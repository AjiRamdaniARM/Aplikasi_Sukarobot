<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleDrive extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_folder',
        'link_folder',
    ];
}
