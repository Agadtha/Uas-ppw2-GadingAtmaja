<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pekerjaan extends Model
{
    use SoftDeletes;

    protected $table = 'pekerjaan';

    protected $fillable = [
        'nama_pekerjaan',
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }

    public function pekerjaan()
    {
        return $this->belongsTo(\App\Models\Pekerjaan::class);
    }
}


