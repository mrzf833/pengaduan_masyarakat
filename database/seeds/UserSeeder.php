<?php

use App\Models\Masyarakat;
use App\Models\Petugas;
use App\Models\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::updateOrCreate(
            ['username' => 'admin'],
            [
                'role_id' => Role::where('role','admin')->first()->id,
                'password' => bcrypt('admin')
            ]
        );

        Petugas::updateOrCreate(
            ['user_id' => $admin->id],
            [
                'nama' => 'admin',
                'telp' => '089978657654',
            ]
        );

        $petugas = User::updateOrCreate(
            ['username' => 'petugas'],
            [
                'role_id' => Role::where('role','petugas')->first()->id,
                'password' => bcrypt('petugas')
            ]
        );

        Petugas::updateOrCreate(
            ['user_id' => $petugas->id],
            [
                'nama' => 'petugas',
                'telp' => '089978657654',
            ]
        );

        $masyarakat = User::updateOrCreate(
            ['username' => 'masyarakat'],
            [
                'role_id' => Role::where('role','masyarakat')->first()->id,
                'password' => bcrypt('masyarakat')
            ]
        );

        Masyarakat::updateOrCreate(
            ['user_id' => $masyarakat->id],
            [
                'nama' => 'masyarakat',
                'nik' => '8726347364738',
                'telp' => '089978657654',
            ]
        );
    }
}
