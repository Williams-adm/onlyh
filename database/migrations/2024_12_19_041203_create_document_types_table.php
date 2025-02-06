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
        Schema::create('document_types', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['dni', 'pasaporte', 'carnet de extrangeria', 'ruc']);
            $table->string('number', 15)->unique();
            $table->unique(['type', 'number', 'documentable_id', 'documentable_type'], 'doc_type_num_unique');
            $table->morphs('documentable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_types');
    }
};
