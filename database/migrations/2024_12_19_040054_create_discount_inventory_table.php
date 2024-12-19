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
        Schema::create('discount_inventory', function (Blueprint $table) {
            $table->id();

            $table->foreignId('inventory_id')->constrained(table: 'inventory')
            ->cascadeOnUpdate()->cascadeOnDelete();
            
            $table->foreignId('discount_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();
            
            $table->unique(['inventory_id', 'discount_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_inventory');
    }
};
