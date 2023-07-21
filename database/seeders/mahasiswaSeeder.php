<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->insert([
            'nim' => '12345678910',
            'nama' => 'Rudi Bin Abdullah',
            'contact' => '0812233344',
            'prodi_id'=> 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mahasiswas')->insert([
            'nim' => '1234567811',
            'nama' => 'Rushead bin Ubudiyah',
            'contact' => '0833344455',
            'prodi_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mahasiswas')->insert([
            'nim' => '1234567813',
            'nama' => 'Muhammad Al-Manam',
            'contact' => '0844555666',
            'prodi_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('mahasiswas')->insert([
            'nim' => '1234567814',
            'nama' => 'Muhammad Zafir Ardiyansyah',
            'contact' => '0811133355',
            'prodi_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
