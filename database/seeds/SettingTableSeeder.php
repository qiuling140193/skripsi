<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert(array(
        [
         'nama_perusahaan' => 'Kilang Padi DT.AA', 
         'alamat' => 'KM.9 Tanjung Balai',
         'telepon' => '085823423232',
         'logo' => 'logo.png',
         'kartu_member' => 'card.png',
         'tipe_nota' => '0'
        ]
       ));
    }
}
