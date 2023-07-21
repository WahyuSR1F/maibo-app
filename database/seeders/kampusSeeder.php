<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('kampuses')->insert([
            'nama_kampus' => 'Politeknik Negeri Banyuwangi'
        ]);
    }
}
