<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
