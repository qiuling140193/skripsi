<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Pembelian;
use App\Supplier;
use App\Produk;
use App\PembelianDetail;

class PembelianDetailController extends Controller
{
   public function  index(){
      $produk = Produk::all();
      $idpembelian = session('idpembelian');
      $supplier = Supplier::find(session('idsupplier'));
      return view('pembelian_detail.index', compact('produk', 'idpembelian', 'supplier'));
   }

    public function listData($id)
   {
   
     $detail = PembelianDetail::select('pembelian_detail.*', 'produk.id_produk', 'produk.nama_produk')->leftJoin('produk', 'produk.id_produk', '=', 'pembelian_detail.id_produk')
        ->where('id_pembelian', '=', $id)
        ->get();
     $no = 0;
     $data = array();
     $total = 0;
     $total_item = 0;
     foreach($detail as $list){
       $no ++;
       $row = array();
       $row[] = $no;
       $row[] = $list->id_produk;
       $row[] = $list->nama_produk;
       $row[] = "<input type='number' class='form-control' name='harga_$list->id_pembelian_detail' value='$list->harga_beli' onChange='changeCount($list->id_pembelian_detail)'>";
       $row[] = "<input type='number' class='form-control' name='jumlah_$list->id_pembelian_detail' value='$list->jumlah' onChange='changeCount($list->id_pembelian_detail)'>";
       $row[] = "Rp. ".format_uang($list->harga_beli * $list->jumlah);
       $row[] = '<a onclick="deleteItem('.$list->id_pembelian_detail.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
       $data[] = $row;

       $total += $list->harga_beli * $list->jumlah;
       $total_item += $list->jumlah;
     }

     $data[] = array("<span class='hide total'>$total</span><span class='hide totalitem'>$total_item</span>", "", "", "", "", "", "");
    
     $output = array("data" => $data);
     return response()->json($output);
   }

   public function store(Request $request)
   {
      $produk = Produk::where('id_produk', '=', $request['kode'])->first();
      $detail = new PembelianDetail;
      $detail->id_pembelian = $request['idpembelian'];
      $detail->id_produk = $request['kode'];
      $detail->harga_beli =1;
      $detail->jumlah = 1;
      $detail->sub_total = $produk->harga_beli;
      $detail->save();
   }

   public function update(Request $request, $id)
   {
      $jumlah_input = "jumlah_".$id;
      $harga_input = "harga_".$id;
      $detail = PembelianDetail::find($id);
      $detail->harga_beli = $request[$harga_input];
      $detail->jumlah = $request[$jumlah_input];
      $detail->sub_total = $detail->harga_beli * $request[$jumlah_input];
      $detail->update();
    return $detail;
   }

   public function destroy($id)
   {
      $detail = PembelianDetail::find($id);
      $detail->delete();
   }

   public function loadForm($diskon, $total){
     $bayar = $total;
     $data = array(
        "totalrp" => format_uang($total),
        "bayar" => $bayar,
        "bayarrp" => $bayar,
        "terbilang" => ucwords(terbilang($bayar))." Rupiah"
      );
     return response()->json($data);
   }
}
