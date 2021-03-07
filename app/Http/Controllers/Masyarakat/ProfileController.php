<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Masyarakat::where('user_id', auth()->id())->firstOrFail();
        $user = $user->load('user');
        return view('masyarakat.Profile',[
            'user' => $user
        ]);
    }

    public function show()
    {
        $user = Masyarakat::where('user_id', auth()->id())->firstOrFail();
        $user = $user->load('user');
        return view('masyarakat.ProfileEdit',[
            'user' => $user
        ]);
    }

    public function edit(Request $request)
    {
        $masyarakat = Masyarakat::where('user_id', auth()->id())->firstOrFail();
        $this->validate($request,[
            'username' => 'required|unique:users,username,' . $masyarakat->user_id,
            'password' => 'nullable',
            'nama' => 'required|min:1|max:35',
            'nik' => 'required|digits_between:1,16|min:0',
            'telp' => 'required|digits_between:1,13|min:0',
        ]);
        DB::beginTransaction();
        try{
            $masyarakat->user->update([
                'username' => $request->username
            ]);

            $masyarakat->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'telp' => $request->telp
            ]);

            if(!empty($request->password)){
                $masyarakat->user->update([
                    'password' => $request->password
                ]);
                auth()->logout();
            }
            DB::commit();
            return redirect()->route('masyarakat.profile.index')->with('success','profile berhasil di perbarui');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('masyarakat.profile.index')->with('faield',$e->getMessage());
        }
    }
}
