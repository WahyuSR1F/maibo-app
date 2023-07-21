<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class organisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organisasis')->insert([
           'nama' => ' UKM Robotika Poliwangi',
           'nickname' => '@Robotika',
           'deskripsi' => 'UKM Robotika adalah Unit Kegiatan Mahasiswa yang berfokus pada pengembangan dan eksplorasi teknologi robotika di kalangan mahasiswa. Robotika adalah cabang ilmu yang melibatkan desain, pembuatan, pengoperasian, dan aplikasi robot serta sistem terkait',
           'kampus_id' => 1
        ]);

        DB::table('organisasis')->insert([
            'nama' => 'UKM Pramuka Poliwangi',
            'nickname' => '@Rancana',
            'deskripsi' => 'UKM Pramuka adalah Unit Kegiatan Mahasiswa yang berfokus pada kegiatan kepramukaan di kalangan mahasiswa. Pramuka merupakan gerakan pendidikan nonformal yang bertujuan untuk membentuk karakter dan kepribadian yang tangguh, mandiri, bertanggung jawab, dan memiliki rasa kepedulian terhadap sesama serta lingkungan sekitar.',
            'kampus_id' => 1
         ]);

         DB::table('organisasis')->insert([
            'nama' => 'HMJTI Polwangi',
            'nickname' => '@HMJTI',
            'deskripsi' => 'HJMTI adalah singkatan dari Himpunan Mahasiswa Teknik Informatika, yaitu organisasi mahasiswa yang mewadahi dan mewakili mahasiswa Program Studi atau Departemen Teknik Informatika dalam lingkungan kampus. HJMTI biasanya ada di perguruan tinggi atau universitas yang memiliki jurusan atau program studi Teknik Informatika.',
            'kampus_id' => 1
         ]);

         DB::table('organisasis')->insert([
            'nama' => 'UKM IMAM Poliwangi',
            'nickname' => '@IMAM',
            'deskripsi' => 'organisasi mahasiswa yang berfokus pada kegiatan dan pengembangan keislaman di kalangan mahasiswa di perguruan tinggi atau universitas. PMI bertujuan untuk memperkuat dan memperkukuh pemahaman serta pengamalan nilai-nilai Islam',
            'kampus_id' => 1
         ]);
    }
}
