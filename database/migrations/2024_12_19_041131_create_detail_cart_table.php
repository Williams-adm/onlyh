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
        Schema::create('detail_cart', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('discount', 10, 2);

            $table->foreignId('cart_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();
            
            $table->foreignId('inventory_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->unique(['cart_id', 'inventory_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_cart');
    }
};
