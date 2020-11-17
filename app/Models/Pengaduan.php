<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $guarded = [];
    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class);
    }

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class);
    }
}
