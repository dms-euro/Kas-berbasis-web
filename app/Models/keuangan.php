<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class keuangan extends Model
{
    protected $fillable =[
        'keterangan',
        'tanggal',
        'username',
        'jenis',
    ];
}
