<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AduanController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $aduans = $user->masyarakat->pengaduan;
        return view('masyarakat.Aduan',[
            'aduans' => $aduans
        ]);
    }
}
