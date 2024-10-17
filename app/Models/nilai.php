<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    protected $fillable = [
        'name',
        'nis',
        'jurusan',
        'nilai',
    ];
    use HasFactory;
}
