<?php

namespace Database\Seeders;



use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusans')->insert([
            'nama_jurusan' => 'Bisnis dan Informatika',
            'kampus_id' => 1
        ]);

        DB::table('jurusans')->insert([
            'nama_jurusan' => 'Teknik Mesin',
            'kampus_id' => 1
        ]);

        DB::table('jurusans')->insert([
            'nama_jurusan' => 'Teknik Sipil',
            'kampus_id' => 1
        ]);

        DB::table('jurusans')->insert([
            'nama_jurusan' => 'Agribisnis',
            'kampus_id' => 1
        ]);

        DB::table('jurusans')->insert([
            'nama_jurusan' => 'Teknik Pengolahan Hasil Ternak',
            'kampus_id' => 1
        ]);
    }
}
