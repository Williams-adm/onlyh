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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->integer('stock_min');
            $table->integer('stock_max');
            $table->integer('current_stock');
            $table->decimal('selling_price', 8, 2);
            $table->boolean('status')->default(true);

            $table->foreignId('product_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->foreignId('branch_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->unique(['product_id', 'branch_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
