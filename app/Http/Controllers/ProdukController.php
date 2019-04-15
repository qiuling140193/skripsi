<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use Datatables;
use Redirect;
use PDF;

class ProdukController extends Controller
{
    public function index()
    {
       $kategori = Kategori::all();      
       return view('produk.index', compact('kategori'));
    }

    public function listData()
    {
    
      $produk = Produk::orderBy('id_produk', 'desc')->get();
        $no = 0;
        $data = array();
        foreach($produk as $list){
          $no ++;
          $row = array();
          $row[] = $no;
          $row[] = $list->id_produk;
          $row[] = $list->nama_produk;
          $row[] = "Goni";
          $row[] = "Rp. ".format_uang($list->harga_beli);
          $row[] = "Rp. ".format_uang($list->harga_jual);
          $row[] = $list->stok;
          $row[] = "<div class='btn-group'>
                   <a onclick='editForm(".$list->id_produk.")' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>
                  <a onclick='deleteData(".$list->id_produk.")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a></div>";
          $data[] = $row;
        }
        
        $output = array("data" => $data);
     return response()->json($output);
    }

    public function store(Request $request)
    {
            $produk = new Produk;
            $produk->id_produk     = $request['kode'];
            $produk->nama_produk    = $request['nama'];
            $produk->harga_beli      = $request['harga_beli'];
            $produk->harga_jual      = $request['harga_jual'];
            $produk->stok          = $request['stok'];
            $produk->save();
            echo json_encode(array('msg'=>'success'));
            return Redirect::route('produk.index'); 
       
    }

    public function edit($id)
    {
      $produk = Produk::find($id);
      echo json_encode($produk);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $produk->nama_produk    = $request['nama'];
        $produk->harga_beli      = $request['harga_beli'];
        $produk->harga_jual     = $request['harga_jual'];
        $produk->stok          = $request['stok'];
        $produk->update();
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
    }

    public function deleteSelected(Request $request)
    {
        foreach($request['id'] as $id){
            $produk = Produk::find($id);
            $produk->delete();
        }
    }

    public function printBarcode(Request $request)
    {
        $dataproduk = array();
        foreach($request['id'] as $id){
            $produk = Produk::find($id);
            $dataproduk[] = $produk;
        }
        $no = 1;
        $pdf = PDF::loadView('produk.barcode', compact('dataproduk', 'no'));
        $pdf->setPaper('a4', 'potrait');      
        return $pdf->stream();
    }
}
