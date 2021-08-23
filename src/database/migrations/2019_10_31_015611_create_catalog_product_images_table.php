<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_product_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->nullable();
            $table->integer('position')->nullable();
            $table->integer('catalog_product_id')->nullable();
            $table->integer('author_id')->nullable();
            $table->integer('excluder_id')->nullable();
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
        Schema::dropIfExists('catalog_product_images');
    }
}
