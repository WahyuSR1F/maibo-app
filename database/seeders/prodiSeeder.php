<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class prodiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prodis')->insert([
            'nama_prodi' => 'Teknologi Rekayasa Perangkat Lunak',
            'jurusan_id' => 1
            
        ]);

        DB::table('prodis')->insert([
            'nama_prodi' => 'Bisnis Digital',
            'jurusan_id' => 1
            
        ]);

        
        DB::table('prodis')->insert([
            'nama_prodi' => 'Hardware',
            'jurusan_id' => 1
            
        ]);
    }
}
