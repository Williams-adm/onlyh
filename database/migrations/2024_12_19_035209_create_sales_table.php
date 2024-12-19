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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('code', 15)->unique();
            $table->enum('type', ['boleta', 'factura']);
            $table->decimal('sub_total', 10, 2);
            $table->decimal('igv', 10, 2);
            $table->decimal('total', 15, 2);
            $table->string('path');

            $table->foreignId('customer_id')->nullable()->constrained()
            ->cascadeOnUpdate()->nullOnDelete();
            
            $table->foreignId('employee_id')->nullable()->constrained()
            ->cascadeOnUpdate()->nullOnDelete();
            
            $table->foreignId('cash_count_id')->nullable()->constrained()
            ->cascadeOnUpdate()->nullOnDelete();
            
            $table->foreignId('branch_id')->nullable()->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
