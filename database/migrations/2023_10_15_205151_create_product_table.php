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
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id('product_id');
            $table->char('product_code', 4);
            $table->string('product_name');
            $table->string('product_unit');
            $table->decimal('product_price', 15, 4);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('tbl_category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
