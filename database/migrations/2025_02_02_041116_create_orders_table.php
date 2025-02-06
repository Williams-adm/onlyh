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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('sub_total', 15, 2);
            $table->decimal('shipment_cost', 10, 2);
            $table->decimal('total', 16, 2);
            $table->enum('status', ['pending', 'paid', 'cancelled']);
            $table->date('order_date');

            $table->foreignId('customer_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
