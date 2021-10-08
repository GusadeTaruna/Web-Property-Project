<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nama_role' => 'Super User',
        ]);

        DB::table('roles')->insert([
            'nama_role' => 'Admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Super User 1',
            'username' => 'superuser',
            'email' => 'work.gusade@gmail.com',
            'password' => Hash::make('gusadetaruna09'),
            'tanggal_lahir'=> '1999-08-02',
            'jenis_kelamin' => 'Pria',
            'no_telepon' => '085857279746',
            'role' => '1',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
