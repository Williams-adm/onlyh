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
        Schema::create('payment_method_sale', function (Blueprint $table) {
            $table->id();
            $table->decimal('quantity', 15, 2);

            $table->foreignId('sale_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();
            
            $table->foreignId('payment_method_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->unique(['sale_id', 'payment_method_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_method_sale');
    }
};
