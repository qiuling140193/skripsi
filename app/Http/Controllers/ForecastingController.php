<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\forecasting;
use App\Produk;
use App\PenjualanDetail;
use DateTime;
use DatePeriod;
use DateInterval;

class ForecastingController extends Controller
{
   public function index()
   {  
      $produk = Produk::all();
      return view('forecasting.index', compact('produk')); 
   }

   public function listData()
   {
   
     $forecasting = forecasting::leftJoin('produk', 'produk.id_produk', '=', 'forecastings.id_produk')
     ->orderBy('forecastings.id_forecasting', 'desc')->get();
     $no = 0;
     $data = array();
     foreach($forecasting as $list){
      
       $no ++;
       $row = array();
       $row[] = $no;
       $row[] = $list->nama_produk;
       $row[] = $list->stok;
       $row[] = $list->hasil_prediksi;
       $row[] = $list->stok-$list->hasil_prediksi;
       $row[] = $list->created_at->format('d F Y H:i:s');
       $row[] = '<div class="btn-group">
               <a onclick="editForm('.$list->id_forecasting.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
               <a onclick="deleteData('.$list->id_forecasting.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
       $data[] = $row;
     }

     $output = array("data" => $data);
     return response()->json($output);
   }

   public function getForecast(Request $request)
   {
      $start = new DateTime($request->from);
      $end = new DateTime($request->to);
      $end->modify('+1 day');
      $details = PenjualanDetail::select('id_produk', DB::raw('SUM(jumlah) as total'))->whereBetween('created_at', [$start, $end])->groupBy('id_produk')->get();

      $interval = $end->diff($start);
      // total days
      $days = $interval->days;
      // create an iterateable period of date (P1D equates to 1 day)
      $period = new DatePeriod($start, new DateInterval('P1D'), $end);

      foreach($period as $dt) {
          $curr = $dt->format('D');
          // substract if Saturday or Sunday
          if ($curr == 'Sun') {
              $days--;
          }
      }

      foreach ($details as $detail) {
        $forecasting = new forecasting();
        $forecasting->id_produk = $detail->id_produk;
        $forecasting->hasil_prediksi = $detail->total / $days;
        $forecasting->save();
      }

      return $details;
   }

  

   public function destroy($id)
   {
      $forecasting = forecasting::find($id);
      $forecasting->delete();
   }
}
