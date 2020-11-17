<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TanggapanController extends Controller
{
    public function index()
    {
        $aduans = Pengaduan::where('status', 'proses')->get();
        return view('Tanggapan.index',[
            'aduans' => $aduans
        ]);
    }

    public function store(Request $request,$id)
    {
        $aduan = Pengaduan::findOrFail($id);
        if($aduan->status !== 'proses'){
            abort(404,'not found');
        }

        $this->validate($request,[
            'tanggapan' => 'required'
        ]);

        DB::beginTransaction();
        try{
            $aduan->tanggapan()->create([
                'tanggapan' => $request->tanggapan,
                'petugas_id' => auth()->user()->petugas->id
            ]);

            $aduan->update([
                'status' => 'selesai'
            ]);
            DB::commit();
            return redirect()->route('adminOrPetugas.tanggapan.index');
        }catch(Exception $e){
            DB::rollBack();
            return abort(500,$e->getMessage());
        }
    }

    public function tolak(Request $request,$id)
    {
        $aduan = Pengaduan::findOrFail($id);
        if($aduan->status !== 'proses'){
            abort(404,'not found');
        }

        DB::beginTransaction();
        try{
            $aduan->update([
                'status' => '0'
            ]);
            DB::commit();
            return redirect()->route('adminOrPetugas.tanggapan.index');
        }catch(Exception $e){
            DB::rollBack();
            return abort(500,$e->getMessage());
        }
    }
}
