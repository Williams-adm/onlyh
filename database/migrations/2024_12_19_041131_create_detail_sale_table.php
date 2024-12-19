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
        Schema::create('detail_sale', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->decimal('unit_price', 7, 2);
            $table->decimal('discount', 7, 2);
            $table->decimal('amount', 10, 2);

            $table->foreignId('sale_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();
            
            $table->foreignId('inventory_id')->constrained(table: 'inventory')
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->unique(['sale_id', 'inventory_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_sale');
    }
};
