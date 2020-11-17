<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class,'petugas_id','id');
    }
}
