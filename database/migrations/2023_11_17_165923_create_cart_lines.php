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
        Schema::create('cart_lines', function (Blueprint $table) {
            $table->id();
            $table->text('uuid')->unique();
            $table->foreignId('cart_id')->constrained('carts')->nullOnDelete();
            $table->foreignId('product_id')->constrained('products')->nullOnDelete();
            $table->integer('units');
            $table->float('total_price');
            $table->float('total_price_per_unit');
            $table->float('total_base_price');
            $table->float('total_base_price_per_unir');
            $table->float('total_tax');
            $table->float('total_tax_per_unit');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_lines');
    }
};
