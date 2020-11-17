<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('masyarakat.Home');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'aduan' => 'required|min:30',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg,jfif'
        ]);

        DB::beginTransaction();
        try{
            $pengaduan = auth()->user()->masyarakat->pengaduan()->create([
                'isi_laporan' => $request->aduan,
                'status' => 'proses'
            ]);
            $save_item_foto = null;
            if(!empty($foto = $request->file('foto'))){
                $nama_foto = Str::random(5) . date('dmYhis');
                $extension = $foto->getClientOriginalExtension();
                $save_item_foto = $foto->storeAs('public/pengaduan',$nama_foto . '.' . $extension);
                $pengaduan->update([
                    'foto' => $nama_foto . '.' . $extension,
                ]);
            }
            DB::commit();
            return redirect()->route('masyarakat.home');
        }catch(Exception $e){
            if(!empty($save_item_foto)){
                Storage::delete('public/pengaduan/'.$nama_foto . '.' . $extension);
            }
            DB::rollBack();
            return abort(403,$e->getMessage());
        }
    }
}
