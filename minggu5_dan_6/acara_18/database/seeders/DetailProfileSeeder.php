<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert data ke table pegawai
        DB::table('detail_profile')->insert([
            'alamat' => 'Lumajang',
            'nomor_tlp' => '082333992023',
            'ttl' => '2002-03-16',
            'foto' => 'picture.png'
        ]);
    }
}
