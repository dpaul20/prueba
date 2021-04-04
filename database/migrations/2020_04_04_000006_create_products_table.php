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
            $table->bigIncrements('id');
            $table->string('code')->comment('Product code');
            $table->string('name')->comment('Product name');
            $table->integer('min_sale')->comment('Minimum sale');
            $table->integer('stock')->comment('Product stock');
            $table->string('description')->nullable();
            $table->text('long_description')->nullable();
            $table->float('price')->comment('Product stock');
            /**
             * Eliminacion logica con softDelete
             */
            $table->softDeletes();
            /**
             * Foreign key Category
             */
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            /**
             * Foreign key Brand
             */
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');
            /**
             * Foreign key Packaging
             */
            $table->unsignedBigInteger('packaging_id')->nullable();
            $table->foreign('packaging_id')->references('id')->on('packagings');
            
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
        Schema::dropIfExists('products');
    }
}
