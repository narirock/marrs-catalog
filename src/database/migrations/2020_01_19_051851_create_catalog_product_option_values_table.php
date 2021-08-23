<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogProductOptionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_product_option_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('reduce')->nullable();
            $table->string('quantity')->nullable();
            $table->string('value')->nullable();
            $table->decimal('price')->nullable();
            $table->integer('points')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('catalog_product_option_id')->nullable();
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
        Schema::dropIfExists('catalog_product_option_values');
    }
}
