<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kas extends Model
{
    protected $fillable =[
        'nama',
        'tanggal',
        'status_bayar',
        'petugas',  
    ];
}
