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
        Schema::create('detail_transaction', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->decimal('purcharse_price', 10, 2)->nullable();
            $table->integer('profit')->nullable();

            $table->foreignId('transaction_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->foreignId('inventory_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->unique(['transaction_id', 'inventory_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaction');
    }
};
