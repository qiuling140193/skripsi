<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use PDF;

class PelangganController extends Controller
{
   public function index()
   {
      return view('pelanggan.index'); 
   }

   public function listData()
   {
   
     $pelanggan = Pelanggan::orderBy('id_cust', 'desc')->get();
     $no = 0;
     $data = array();
     foreach($pelanggan as $list){
       $no ++;
       $row = array();
       $row[] = "<input type='checkbox' name='id[]'' value='".$list->id_cust."'>";
       $row[] = $no;
       $row[] = $list->kode_pelanggan;
       $row[] = $list->nama;
       $row[] = $list->alamat;
       $row[] = $list->telpon;
       $row[] = '<div class="btn-group">
               <a onclick="editForm('.$list->id_cust.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
               <a onclick="deleteData('.$list->id_cust.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
       $data[] = $row;
     }

     $output = array("data" => $data);
     return response()->json($output);
   }

   public function store(Request $request)
   {
     $jml = Pelanggan::where('kode_pelanggan', '=', $request['kode'])->count();
     if($jml < 1){
      $pelanggan = new Pelanggan;
      $pelanggan->kode_pelanggan = $request['kode'];
      $pelanggan->nama   = $request['nama'];
      $pelanggan->alamat = $request['alamat'];
      $pelanggan->telpon = $request['telpon'];
      $pelanggan->save();
      echo json_encode(array('msg'=>'success'));
     }else{
      echo json_encode(array('msg'=>'error'));
     }
   }

   public function edit($id)
   {
     $pelanggan = Pelanggan::find($id);
     echo json_encode($pelanggan);
   }

   public function update(Request $request, $id)
   {
      $pelanggan = Pelanggan::find($id);
      $pelanggan->nama = $request['nama'];
      $pelanggan->alamat = $request['alamat'];
      $pelanggan->telpon = $request['telpon'];
      $pelanggan->update();
      echo json_encode(array('msg'=>'success'));
   }

   public function destroy($id)
   {
      $pelanggan = Pelanggan::find($id);
      $pelanggan->delete();
   }

    public function printCard(Request $request)
   {
      $datamember = array();
      foreach($request['id'] as $id){
         $pelanggan = Pelanggan::find($id);
         $datamember[] = $pelanggan;
      }
      
      $pdf = PDF::loadView('pelanggan.card', compact('datamember'));
      $pdf->setPaper(array(0, 0, 566.93, 850.39), 'potrait');     
      return $pdf->stream();
   }
}
