<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Produtos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
          Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('nome',200);
            $table->float('qtde');
            $table->float('preco');
            $table->float('qtde_vendida');
            $table->float('custo');
            $table->string('liberado',1);
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
        //
    }
}

