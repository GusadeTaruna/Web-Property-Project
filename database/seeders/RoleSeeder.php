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
            'email' => 'work.gusade@gmail.com',
            'password' => Hash::make('gusadetaruna09'),
            'no_telepon' => '085857279746',
            'role' => '1',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Super User 2',
            'email' => 'testing@email.com',
            'password' => Hash::make('testing'),
            'no_telepon' => '081234432543',
            'role' => '1',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
