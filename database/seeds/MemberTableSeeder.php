<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member')->insert(array(
        [
         'id_member' => '1', 
         'nama' => 'Toko Tanjung',
         'alamat' => 'Jalan. Sutomo',
         'telepon' => '0623 51323'
        ],
        [
         'id_member' => '2', 
         'nama' => 'Berkat',
         'alamat' => 'Pajak Kawat',
         'telepon' => '0623 31236'
        ],
        [
         'id_member' => '3', 
         'nama' => 'SKK',
         'alamat' => 'Stasiun Kreta Api',
         'telepon' => '082365231522'
        ],
        [
         'id_member' => '4', 
         'nama' => 'Fujira',
         'alamat' => 'Jalan Sudirman',
         'telepon' => '081366218586'
        ],
        [
         'id_member' => '5', 
         'nama' => 'Akiet',
         'alamat' => 'Jalan Sudirman',
         'telepon' => '0623 55232'
        ],
        [
         'id_member' => '6', 
         'nama' => 'Pai Yin',
         'alamat' => 'Jalan Sudirman',
         'telepon' => '0623 92282'
        ],
        [
         'id_member' => '7', 
         'nama' => 'Horas',
         'alamat' => 'Pajak Bengawan',
         'telepon' => '0623 93162'
        ],
        [
         'id_member' => '8', 
         'nama' => 'Jasa',
         'alamat' => 'Jalan Panglima Polem',
         'telepon' => '0623 93238'
        ],
        [
         'id_member' => '9', 
         'nama' => 'Bunchiak',
         'alamat' => 'Jalan Sudirman',
         'telepon' => '0623 92862'
        ],
        [
         'id_member' => '10', 
         'nama' => 'Bahagia',
         'alamat' => 'Jalan Bahagia',
         'telepon' => '085362369896'
        ],
        [
         'id_member' => '11', 
         'nama' => 'Toko Jadi',
         'alamat' => 'Jalan Bahagia',
         'telepon' => '081362356632'
        ],
        [
         'id_member' => '12', 
         'nama' => 'Kurnia',
         'alamat' => 'Stasiun Kreta Api',
         'telepon' => '08526231541'
        ],
        [
         'id_member' => '13', 
         'nama' => 'Alvin',
         'alamat' => 'Jalan Gereja',
         'telepon' => '08536251351'
        ],
        [
         'id_member' => '14', 
         'nama' => 'Inti Jaya',
         'alamat' => 'Jalan Letjend Suprapto',
         'telepon' => '0623 96361'
        ],
        [
         'id_member' => '15', 
         'nama' => 'Jaya Utama',
         'alamat' => 'Jalan Letjend Suprapto',
         'telepon' => '081376512235'
        ],
        [
         'id_member' => '16', 
         'nama' => 'Zulainar',
         'alamat' => 'Jalan Veteran',
         'telepon' => '0623 98623'
        ],
        [
         'id_member' => '17', 
         'nama' => 'Wijaya',
         'alamat' => 'Jalan A.Yani',
         'telepon' => '0623 98323'
        ],
        [
         'id_member' => '18', 
         'nama' => 'Horas',
         'alamat' => 'Jalan Imam Bonjol',
         'telepon' => '0623 98623'
        ],
        [
         'id_member' => '19', 
         'nama' => 'Kang Le',
         'alamat' => 'Jalan Mesjid',
         'telepon' => '0623 92398'
        ],
        [
         'id_member' => '20', 
         'nama' => 'Juli',
         'alamat' => 'Jalan T.Umar',
         'telepon' => '085371636555'
        ],
    ));
    }
}
