<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jenisEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_events')->insert([
            'nama' => 'webinar',
            'deskripsi' => 'webinar adalah event pertemuan secara kondusif untuk membahasa  masalah tertentu'
        ]);

        DB::table('jenis_events')->insert([
            'nama' => 'Lomba',
            'deskripsi' => 'Lomba adalah konpentesi yang dilakukan mahasiswa untuk berlomba dalam menghasilakna karya terbaik'
        ]);

        DB::table('jenis_events')->insert([
            'nama' => 'Expo',
            'deskripsi' => 'Event yang digunakan untuk memberikan pameran karya karya terbaik sebagi refrensi mahasiswa'
        ]);

        DB::table('jenis_events')->insert([
            'nama' => 'Pelatihan',
            'deskripsi' => 'Pelatihan yang disediakan untuk para antusias dalam mempelajari suatu skill'
        ]);

    }
}
