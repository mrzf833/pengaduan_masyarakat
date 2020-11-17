<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\User;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
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
            return redirect()->route('login');
        }catch(Exception $e){
            DB::rollBack();
            return abort(403,$e->getMessage());
        }
    }
}
