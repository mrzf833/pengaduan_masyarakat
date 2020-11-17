<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;
use App\Models\Role;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $aduans = Pengaduan::count();
        $masyarakats = Masyarakat::count();
        $petugas = Role::where('role','petugas')->first()->user->count();
        $admin = Role::where('role','admin')->first()->user->count();
        return view('dashboard',[
            'aduans' => $aduans,
            'masyarakat' => $masyarakats,
            'petugas' => $petugas,
            'admin' => $admin
        ]);
    }
}
