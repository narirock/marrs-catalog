<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();

            $table->string('ano')->nullable();
            $table->string('brand_id')->nullable();

            $table->string('slug')->nullable();
            $table->string('model')->nullable();
            $table->text('tags')->nullable();
            $table->integer('minimum')->nullable();
            $table->integer('quantity')->nullable();
            $table->boolean('shipping')->nullable();
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->integer('length_class_id')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('weight_class_id')->nullable();
            $table->boolean('status')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('author_id')->nullable();
            $table->string('excluder_id')->nullable();
            $table->integer('catalog_department_id')->nullable();
            $table->integer('enabled')->nullable();
            $table->integer('makeupdays')->nullable();
            $table->longText('full_description')->nullable();
            $table->text('key_words')->nullable();
            $table->text('show_if_out')->nullable();

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
        Schema::dropIfExists('catalog_products');
    }
}
