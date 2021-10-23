<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('property_type')->insert([
            'nama_tipe' => 'Property Building',
        ]);

        DB::table('property_type')->insert([
            'nama_tipe' => 'Land',
        ]);
    }
}
