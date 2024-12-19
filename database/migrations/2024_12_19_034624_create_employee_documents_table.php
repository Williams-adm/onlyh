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
        Schema::create('employee_documents', function (Blueprint $table) {
            $table->id();
            $table->enum('document_type', ['cv', 'copia de documento', 'otros']);
            $table->string('document_path');
            
            $table->foreignId('employee_id')->constrained()
            ->cascadeOnUpdate()->cascadeOnDelete();
            
            $table->unique(['employee_id', 'document_type']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_documents');
    }
};
