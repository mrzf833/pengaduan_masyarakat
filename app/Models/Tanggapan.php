<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $guarded = [];
    public function petugas()
    {
        return $this->belongsTo(Petugas::class,'petugas_id','id');
    }

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
