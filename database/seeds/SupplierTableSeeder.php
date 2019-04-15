<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplier')->insert(array(
        [
         'id_supplier' => '1', 
         'nama' => 'S.Sitohoang',
         'alamat' => 'Leidong',
         'telepon' => '085271685223'
        ],
        [
         'id_supplier' => '2', 
         'nama' => 'Anni',
         'alamat' => 'Desa Gajah',
         'telepon' => '081365435452'
        ],
        [
         'id_supplier' => '3', 
         'nama' => 'Amir',
         'alamat' => 'Rawang',
         'telepon' => '082363622212'
        ],
        [
         'id_supplier' => '4', 
         'nama' => 'Ijul',
         'alamat' => 'Dolok Marlawan',
         'telepon' => '081366216541'
        ],
        [
         'id_supplier' => '5', 
         'nama' => 'Sitanggang',
         'alamat' => 'L.Pakam',
         'telepon' => '081362325153'
        ],
      ));
    }
}
