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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            /* aqui llamar a la tabal documentos para registrar el tipo de documento y su numero asociado al proveedor
            tambien su dirección y telefono */
            $table->string('business_name')->unique();
            $table->enum('type', ['juridica', 'persona natural', 'otro']);
            $table->string('contac', 80)->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
