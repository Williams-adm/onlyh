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
        Schema::create('detail_value', function (Blueprint $table) {
            $table->id();

            $table->foreignId('detail_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();
            
            $table->foreignId('product_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->unique(['detail_id', 'product_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_value');
    }
};
