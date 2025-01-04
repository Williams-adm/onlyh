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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            /* $table->string('num_transaction', 15)->unique(); */
            $table->enum('type', ['entrada', 'salida']);
            $table->string('operation', 55);
            $table->text('reazon')->nullable();
            $table->enum('type_voucher', ['boleta', 'factura', 'otro'])->nullable();
            $table->string('num_voucher', 15)->unique()->nullable();
            $table->string('path_voucher')->nullable();
            $table->decimal('total', 15, 2)->nullable();

            $table->foreignId('supplier_id')->nullable()->constrained()
            ->cascadeOnUpdate()->nullOnDelete();
            
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
        Schema::dropIfExists('transactions');
    }
};
