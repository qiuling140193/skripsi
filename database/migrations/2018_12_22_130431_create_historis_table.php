<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historis', function (Blueprint $table) {
             $table->increments('id_historis');             
             $table->bigInteger('id_produk')->unsigned();         
             $table->bigInteger('harga_jual')->unsigned();         
             $table->integer('jumlah')->unsigned();                 
             $table->bigInteger('sub_total')->unsigned();     
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historis');
    }
}
