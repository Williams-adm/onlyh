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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->decimal('shipment_cost', 10, 2);
            $table->enum('status', ['pending','processing', 'shipped', 'delivered']);
            $table->string('tracking_number', 15)->nullable();
            $table->date('shipping_date');
            $table->date('desired_delivery_date');

            $table->foreignId('order_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->foreignId('shipping_method_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
