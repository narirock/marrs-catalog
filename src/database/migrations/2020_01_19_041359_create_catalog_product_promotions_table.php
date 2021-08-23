<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogProductPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_product_promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_type_id')->nullable();
            $table->decimal('price')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->integer('catalog_product_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('catalog_product_promotions');
    }
}
