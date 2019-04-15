<?php

use Illuminate\Database\Seeder;

class ProdukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk')->insert(array(
        [
         'id_produk' => '1', 
         'nama_produk' => 'Payung 5Kg',
         'harga_beli' => '53000',
         'harga_jual' => '55000',
         'stok' => '550'
        ],
        [
         'id_produk' => '2', 
         'nama_produk' => 'Payung 10Kg',
         'harga_beli' => '108000',
         'harga_jual' => '110000',
         'stok' => '398'
        ],
        [
         'id_produk' => '3', 
         'nama_produk' => 'Payung 15Kg',
         'harga_beli' => '162000',
         'harga_jual' => '164000',
         'stok' => '335'
        ],
        [
         'id_produk' => '4', 
         'nama_produk' => 'Payung 30Kg',
         'harga_beli' => '327000',
         'harga_jual' => '329000',
         'stok' => '425'
        ],
        [
         'id_produk' => '5', 
         'nama_produk' => 'Kuku Balam 5Kg',
         'harga_beli' => '58000',
         'harga_jual' => '60000',
         'stok' => '250'
        ],
        [
         'id_produk' => '6', 
         'nama_produk' => 'Kuku Balam 10Kg',
         'harga_beli' => '118000',
         'harga_jual' => '120000',
         'stok' => '635'
        ],
        [
         'id_produk' => '7', 
         'nama_produk' => 'Kuku Balam 15Kg',
         'harga_beli' => '177000',
         'harga_jual' => '180000',
         'stok' => '235'
        ],
        [
         'id_produk' => '8', 
         'nama_produk' => 'Kuku Balam 30Kg',
         'harga_beli' => '360000',
         'harga_jual' => '380000',
         'stok' => '219'
        ],
        [
         'id_produk' => '9', 
         'nama_produk' => 'Pandan Wangi 10Kg',
         'harga_beli' => '128000',
         'harga_jual' => '131000',
         'stok' => '387'
        ],
        [
         'id_produk' => '10', 
         'nama_produk' => 'Pandan Wangi 15Kg',
         'harga_beli' => '193000',
         'harga_jual' => '196000',
         'stok' => '365'
        ],
        [
         'id_produk' => '11', 
         'nama_produk' => 'Pandan Wangi 30Kg',
         'harga_beli' => '390000',
         'harga_jual' => '393000',
         'stok' => '261'
        ],
        [
         'id_produk' => '12', 
         'nama_produk' => 'Ramos 10Kg',
         'harga_beli' => '123000',
         'harga_jual' => '126000',
         'stok' => '795'
        ],
        [
         'id_produk' => '13', 
         'nama_produk' => 'Ramos 15Kg',
         'harga_beli' => '186000',
         'harga_jual' => '189000',
         'stok' => '356'
        ],
        [
         'id_produk' => '14', 
         'nama_produk' => 'Ramos 30Kg',
         'harga_beli' => '375000',
         'harga_jual' => '378000',
         'stok' => '256'
        ],
        [
         'id_produk' => '15', 
         'nama_produk' => 'Naga Hitam 10Kg',
         'harga_beli' => '96500',
         'harga_jual' => '98000',
         'stok' => '526'
        ],
        [
         'id_produk' => '16', 
         'nama_produk' => 'Naga Hitam 15Kg',
         'harga_beli' => '146000',
         'harga_jual' => '147000',
         'stok' => '446'
        ],
        [
         'id_produk' => '17', 
         'nama_produk' => 'Naga Hitam 30Kg',
         'harga_beli' => '292500',
         'harga_jual' => '294000',
         'stok' => '281'
        ],
      ));
    }
}
