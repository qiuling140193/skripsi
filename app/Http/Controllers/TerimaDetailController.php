<?php

namespace App\Http\Controllers;
use Redirect;
use App\Penjualan;
use App\Produk;
use App\Member;
use App\Setting;
use App\Terima;
use App\TerimaDetail;

use Illuminate\Http\Request;

class TerimaDetailController extends Controller
{
    public function index(){
      $penjualan = Penjualan::all();
      $member = Member::all();
      $setting = Setting::first();

     if(!empty(session('idterima'))){
       $idterima = session('idterima');
       return view('terima_detail.index', compact('penjualan', 'member', 'setting', 'idterima'));
     }else{
       return Redirect::route('home');  
     }
   }

   public function newSession()
   {
      $terima = new Penjualan; 
      $terima->kode_member = 0;    
      $terima->total_item = 0;    
      $terima->total_harga = 0;    
      $terima->id_user = Auth::user()->id;    
      $terima->save();
      
      session(['idpenjualan' => $penjualan->id_penjualan]);

      return Redirect::route('transaksi.index');    
   }
}
