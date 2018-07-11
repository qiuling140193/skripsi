<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTerima extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //   Schema::create('terima', function(Blueprint $table){
      //    $table->increments('id_terima');        
      //    $table->bigInteger('kode_member')->unsigned();            
      //    $table->integer('nota_bayar')->unsigned();         
      //    $table->bigInteger('total_bayar')->unsigned();    
      //    $table->integer('id_user')->unsigned();     
      //    $table->timestamps();         
      // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('terima');
    }
}
