<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->text('description');
            $table->string('image');
            $table->decimal('prix',9,3);
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade'); 
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
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
        $table->dropForeign('restaurant_id');
        $table->dropForeign('categorie_id');
        Schema::dropIfExists('produits');
    }
}
