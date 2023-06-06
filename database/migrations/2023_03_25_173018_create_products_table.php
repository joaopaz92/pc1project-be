<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('trademark_id');
            $table->foreign('trademark_id')->references('id')->on('trademarks')->onDelete('cascade');
            $table->unsignedBigInteger('trademarkmodel_id');
            $table->foreign('trademarkmodel_id')->references('id')->on('trademark_models')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('product_pict_path')->nullable();
            $table->string('product_pict_url')->nullable();
            $table->float('price', 8, 2);
            $table->integer('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
