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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->integer('stock_min');
            $table->integer('stock_max');
            $table->integer('current_stock');
            $table->decimal('selling_price', 10, 2);

            $table->foreignId('product_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->unique(['product_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
