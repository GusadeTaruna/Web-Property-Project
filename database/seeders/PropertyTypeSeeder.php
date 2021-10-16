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
        DB::table('property_zoning_types')->insert([
            'nama_tipe' => 'Housing Urban',
        ]);

        DB::table('property_zoning_types')->insert([
            'nama_tipe' => 'Tourism Hospitality',
        ]);

        DB::table('property_zoning_types')->insert([
            'nama_tipe' => 'Commercial',
        ]);

        DB::table('property_zoning_types')->insert([
            'nama_tipe' => 'Green Belt',
        ]);
    }
}
