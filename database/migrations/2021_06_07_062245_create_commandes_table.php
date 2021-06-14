<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->integer('quantité');
            $table->unsignedBigInteger('produit_id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade'); 
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade'); 
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade'); 
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
        $table->dropForeign('client_id');
        $table->dropForeign('order_id');
        $table->dropForeign('produit_id');
        Schema::dropIfExists('commandes');
    }
}
