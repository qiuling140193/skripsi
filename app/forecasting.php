<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forecasting extends Model
{
    protected $table = 'forecastings';
	protected $primaryKey = 'id_forecasting';

	public function kelas(){
      return $this->belongsTo('App\Produk');
   }
}
