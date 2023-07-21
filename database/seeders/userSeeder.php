<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'foto_profile' => 'https://wallpapercave.com/dwp1x/wp6367177.jpg',
            'role_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'wahyu@gmail.com',
            'password' => Hash::make('wahyu123'),
            'foto_profile' => 'https://wallpapercave.com/dwp1x/wp6409332.png',
            'role_id' => 1,
            'mahasiswa_id' =>1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'robotika@gmail.com',
            'password' => Hash::make('robotika'),
            'foto_profile' => 'https://wallpapercave.com/dwp1x/wp6409332.png',
            'role_id' => 2,
            'organisasi_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
