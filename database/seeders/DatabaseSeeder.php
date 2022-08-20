<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Petugas;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // seed permission

        // siswa
        Permission::create([
            'name' => 'create-siswa',
        ]);

        Permission::create([
            'name' => 'read-siswa',
        ]);

        Permission::create([
            'name' => 'update-siswa',
        ]);

        Permission::create([
            'name' => 'delete-siswa',
        ]);

        // users
        Permission::create([
            'name' => 'create-users',
        ]);

        Permission::create([
            'name' => 'read-users',
        ]);

        Permission::create([
            'name' => 'update-users',
        ]);

        Permission::create([
            'name' => 'delete-users',
        ]);

        // spp
        Permission::create([
            'name' => 'create-spp',
        ]);

        Permission::create([
            'name' => 'read-spp',
        ]);

        Permission::create([
            'name' => 'update-spp',
        ]);

        Permission::create([
            'name' => 'delete-spp',
        ]);

        // kelas
        Permission::create([
            'name' => 'create-kelas',
        ]);

        Permission::create([
            'name' => 'read-kelas',
        ]);

        Permission::create([
            'name' => 'update-kelas',
        ]);

        Permission::create([
            'name' => 'delete-kelas',
        ]);

        // roles
        Permission::create([
            'name' => 'create-roles',
        ]);

        Permission::create([
            'name' => 'read-roles',
        ]);

        Permission::create([
            'name' => 'update-roles',
        ]);

        Permission::create([
            'name' => 'delete-roles',
        ]);

        // permissions
        Permission::create([
            'name' => 'create-permissions',
        ]);

        Permission::create([
            'name' => 'read-permissions',
        ]);

        Permission::create([
            'name' => 'update-permissions',
        ]);

        Permission::create([
            'name' => 'delete-permissions',
        ]);

        // pembayaran
        Permission::create([
            'name' => 'create-pembayaran',
        ]);

        Permission::create([
            'name' => 'read-pembayaran',
        ]);

        Permission::create([
            'name' => 'update-pembayaran',
        ]);

        Permission::create([
            'name' => 'delete-pembayaran',
        ]);

        // seed spp
        Spp::create([
            'tahun' => '2020',
            'nominal' => 165000,
        ]);

        Spp::create([
            'tahun' => '2021',
            'nominal' => 170000,
        ]);

        Spp::create([
            'tahun' => '2022',
            'nominal' => 175000,
        ]);

        // seed role
        $role1 = Role::create([
            'name' => 'admin'
        ]);

        $role1->syncPermissions([
            'create-siswa', 'read-siswa', 'update-siswa', 'delete-siswa',
            'create-kelas', 'read-kelas', 'update-kelas', 'delete-kelas',
            'create-spp', 'read-spp', 'update-spp', 'delete-spp',
            'create-users', 'read-users', 'update-users', 'delete-users',
            'create-roles', 'read-roles', 'update-roles', 'delete-roles',
            'create-pembayaran', 'read-pembayaran', 'update-pembayaran', 'delete-pembayaran',
            'create-permissions', 'read-permissions', 'update-permissions', 'delete-permissions',
        ]);

        $role2 = Role::create([
            'name' => 'petugas'
        ]);

        $role2->syncPermissions([
            'create-siswa', 'read-siswa', 'update-siswa', 'delete-siswa',
            'create-kelas', 'read-kelas', 'update-kelas', 'delete-kelas',
            'create-spp', 'read-spp', 'update-spp', 'delete-spp',
            'create-pembayaran', 'read-pembayaran', 'update-pembayaran', 'delete-pembayaran',
        ]);

        $role3 = Role::create([
            'name' => 'siswa'
        ]);

        // seed kelas
        $kelas1 = Kelas::create([
            'nama_kelas' => 'Kelas X IIS 1',
            'jurusan' => 'IPS',
        ]);

        $kelas2 = Kelas::create([
            'nama_kelas' => 'X MIA 1',
            'jurusan' => 'IPA',
        ]);

        $kelas3 = Kelas::create([
            'nama_kelas' => 'Kelas X MIA 2',
            'jurusan' => 'IPA',
        ]);

    	$user1 = User::create([
    		'username' => 'admin',
    		'email' => 'admin@gmail.com',
    		'password' => Hash::make('admin'),
    	]);

        $user1->assignRole('admin');

        $petugas1 = Petugas::create([
            'user_id' => $user1->id,
            'kode_petugas' => 'PTG'.Str::upper(Str::random(5)),
            'nama_petugas' => 'Administrator',
            'jenis_kelamin' => 'Laki-laki',
        ]);


    	$user4 = User::create([
    		'username' => 'dayat',
    		'email' => 'dayat@gmail.com',
    		'password' => Hash::make('dayat'),
    	]);

        $user4->assignRole('siswa');

        Siswa::create([
            'user_id' => $user4->id,
            'kode_siswa' => 'SSW'.Str::upper(Str::random(5)),
            'nisn' => '08909096',
            'nis' => '08909842',
            'nama_siswa' => 'Dayat',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Ubung',
            'no_telepon' => '08599865056',
            'kelas_id' => $kelas2->id,
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
