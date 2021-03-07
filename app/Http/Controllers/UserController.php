<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Petugas;
use App\Models\Role;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $masyarakats = Masyarakat::with('user')->get();
        $petugass = Petugas::with('user.roles')->get();
        return view('user.index',[
            'masyarakats' => $masyarakats,
            'petugass' => $petugass
        ]);
    }

    public function create()
    {
        return view('user.masyarakat.index');
    }

    public function masyarakat(Request $request)
    {
        $this->validate($request,[
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'nama' => 'required|min:1|max:35',
            'nik' => 'required|digits_between:1,16|min:0',
            'telp' => 'required|digits_between:1,13|min:0',
        ]);
        DB::beginTransaction();
        try{
            $masyarakat = User::create([
                'role_id' => Role::where('role','masyarakat')->first()->id,
                'username' => $request->username,
                'password' => bcrypt($request->password),
            ]);

            // dd($masyarakat);
            $masyarakat->masyarakat()->create([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'telp' => $request->telp
            ]);
            DB::commit();
            return redirect()->route('user.index')->with('success','user masyarakat berhasil di tambahkan');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('user.index')->with('failed',$e->getMessage());
        }
    }

    public function petugasCreate()
    {
        $roles = Role::get()->whereNotIn('role',['masyarakat']);

        return view('user.petugas.index',[
            'roles' => $roles
        ]);
    }

    public function petugas(Request $request)
    {
        $role = Role::findOrFail($request->role);
        if($role->role === 'masyarakat'){
            return redirect()->route('user.index')->with('failed', 'tidak boleh create data masyarakat');
        }
        $this->validate($request,[
            'role' => 'required|exists:roles,id',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'nama' => 'required|min:1|max:35',
            'telp' => 'required|digits_between:1,13|min:0',
        ]);
        DB::beginTransaction();
        try{
            $masyarakat = User::create([
                'role_id' => $request->role,
                'username' => $request->username,
                'password' => bcrypt($request->password),
            ]);

            // dd($masyarakat);
            $masyarakat->petugas()->create([
                'nama' => $request->nama,
                'telp' => $request->telp
            ]);
            DB::commit();
            return redirect()->route('user.index')->with('success', 'user petugas berhasil di tambahkan');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('user.index')->with('failed', $e->getMessage());
        }
    }

    public function showMasyarakat($id)
    {
        $masyarakat = Masyarakat::findOrFail($id);
        return view('user.masyarakat.show',[
            'masyarakat' => $masyarakat
        ]);
    }

    public function editMasyarakat(Request $request,$id)
    {
        $masyarakat = Masyarakat::findOrFail($id);
        $this->validate($request,[
            'username' => 'required|unique:users,username,' . $masyarakat->user->id,
            'password' => 'nullable',
            'nama' => 'required|min:1|max:35',
            'nik' => 'required|digits_between:1,16|min:0',
            'telp' => 'required|digits_between:1,13|min:0',
        ]);

        DB::beginTransaction();
        try{
            $masyarakat->user->update([
                'username' => $request->username,
            ]);

            if(!empty($request->password)){
                $masyarakat->user->update([
                    'password' => bcrypt($request->password),
                ]);
            }

            $masyarakat->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'telp' => $request->telp
            ]);
            DB::commit();
            return redirect()->route('user.index')->with('success','user masyarakat berhasil di perbarui');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('user.index')->with('failed',$e->getMessage());
        }
    }

    public function showPetugas($id)
    {
        $roles = Role::get()->whereNotIn('role',['masyarakat']);
        $petugas = Petugas::findOrFail($id);
        return view('user.petugas.show',[
            'petugas' => $petugas,
            'roles' => $roles
        ]);
    }

    public function editPetugas(Request $request,$id)
    {
        $role = Role::findOrFail($request->role);
        $petugas = Petugas::findOrFail($id);
        if($role->role === 'masyarakat'){
            return redirect()->route('user.index')->with('failed', 'tidak boleh edit ke data masyarakat');
        }
        $this->validate($request,[
            'role' => 'required|exists:roles,id',
            'username' => 'required|unique:users,username,' . $petugas->user->id,
            'password' => 'nullable',
            'nama' => 'required|min:1|max:35',
            'telp' => 'required|digits_between:1,13|min:0',
        ]);
        DB::beginTransaction();
        try{
            $petugas->user->update([
                'role_id' => $request->role,
                'username' => $request->username,
            ]);

            if(!empty($request->password)){
                $petugas->user->update([
                    'password' => bcrypt($request->password),
                ]);
            }

            // dd($masyarakat);
            $petugas->update([
                'nama' => $request->nama,
                'telp' => $request->telp
            ]);
            DB::commit();
            return redirect()->route('user.index')->with('success', 'user petugas berhasil di perbarui');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('user.index')->with('failed',$e->getMessage());
        }
    }

    public function destroyMasyarakat($id)
    {
        $masyarakat = Masyarakat::findOrFail($id);
        DB::beginTransaction();
        try{
            $masyarakat->user->delete();
            DB::commit();
            return redirect()->route('user.index')->with('success', 'user masyarakat berhasil di hapus');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('user.index')->with('failed', $e->getMessage());
        }
    }

    public function destroyPetugas($id)
    {
        $petugas = Petugas::findOrFail($id);
        DB::beginTransaction();
        try{
            $petugas->user->delete();
            DB::commit();
            return redirect()->route('user.index')->with('success', 'user petugas berhasil di hapus');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('user.index')->with('failed', $e->getMessage());
        }
    }
}
