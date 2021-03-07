<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Role;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->id();
        $user = User::findOrFail($user)->load('petugas','roles');

        return view('Profile.index',[
            'user' => $user
        ]);
    }

    public function show()
    {
        $user = auth()->id();
        $user = User::findOrFail($user)->load('petugas','roles');
        $role = Role::get()->whereNotIn('role','masyarakat');

        return view('Profile.show',[
            'user' => $user,
            'roles' => $role
        ]);
    }

    public function edit(Request $request)
    {
        $petugas = Petugas::where('user_id', auth()->id())->firstOrFail();
        $this->validate($request,[
            'username' => 'required|unique:users,username,' . $petugas->user_id,
            'password' => 'nullable',
            'nama' => 'required|min:1|max:35',
            'role' => 'required|exists:roles,id',
            'telp' => 'required|digits_between:1,13|min:0',
        ]);
        $role = Role::findOrFail($request->role);
        if($role === 'masyarakat'){
            abort(404,'not found');
        }
        DB::beginTransaction();
        try{
            $petugas->user->update([
                'username' => $request->username,
                'role_id' => $request->role,
            ]);

            if(!empty($request->password)){
                $petugas->user->update([
                    'password' => $request->password
                ]);
            }

            $petugas->update([
                'nama' => $request->nama,
                'telp' => $request->telp
            ]);
            auth()->logout();
            DB::commit();
            return redirect()->route('login');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('adminOrPetugas.profile.show')->with('failed', $e->getMessage());
        }
    }
}
