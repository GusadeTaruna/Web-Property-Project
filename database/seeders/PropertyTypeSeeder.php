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
        DB::table('zoning_type')->insert([
            'nama_tipe' => 'Housing Urban',
        ]);

        DB::table('zoning_type')->insert([
            'nama_tipe' => 'Tourism Hospitality',
        ]);

        DB::table('zoning_type')->insert([
            'nama_tipe' => 'Commercial',
        ]);

        DB::table('zoning_type')->insert([
            'nama_tipe' => 'Green Belt',
        ]);
    }
}
