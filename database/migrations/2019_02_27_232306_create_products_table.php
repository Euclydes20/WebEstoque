<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('descricao', 100);
	        $table->integer('qtd');
	        $table->float('prc_venda', 8, 2);
	        $table->float('prc_compra', 8, 2);
	        $table->integer('providers_id')->unsigned();
	        $table->integer('classifications_id')->unsigned();
            $table->timestamps();

	        $table->foreign('providers_id')->references('id')->on('providers');
	        $table->foreign('classifications_id')->references('id')->on('classifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
