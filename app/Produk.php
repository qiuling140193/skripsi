<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
   protected $table = 'produk';
   protected $primaryKey = 'id_produk';
   
   public function forecasting(){
      return $this->hasMany('App\forecasting');
    }

   public $timestamps = false;
}
