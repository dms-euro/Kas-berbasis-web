<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kas extends Model
{
    protected $fillable =[
        'nama_anggota',
        'tanggal',
        'status_bayar',
        'petugas',
    ];
}
