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
        Schema::create('cash_counts', function (Blueprint $table) {
            $table->id();
            $table->string('code', 15)->unique();
            $table->decimal('total_sale', 10, 2);
            $table->decimal('total_income', 10, 2);
            $table->decimal('total_outflow', 10, 2);
            $table->decimal('total_cash', 15, 2);
            $table->string('path');

            $table->foreignId('branch_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_counts');
    }
};
