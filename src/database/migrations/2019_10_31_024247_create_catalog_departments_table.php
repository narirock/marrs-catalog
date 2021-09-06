<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('enable')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('layout_id')->nullable();
            $table->text('author_id')->nullable();
            $table->text('excluder_id')->nullable();
            $table->boolean('listalls')->nullable()->default(false);
            $table->boolean('hasmenu')->nullable()->default(false);
            $table->boolean('card')->nullable()->default(false);
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
        Schema::dropIfExists('catalog_departments');
    }
}
