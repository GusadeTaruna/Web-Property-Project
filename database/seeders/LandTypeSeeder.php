<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LandTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('land_zoning_types')->insert([
            'nama_tipe' => 'Housing',
        ]);

        DB::table('land_zoning_types')->insert([
            'nama_tipe' => 'Tourism',
        ]);

        DB::table('land_zoning_types')->insert([
            'nama_tipe' => 'Commercial',
        ]);

        DB::table('land_zoning_types')->insert([
            'nama_tipe' => 'Green Belt',
        ]);
    }
}
