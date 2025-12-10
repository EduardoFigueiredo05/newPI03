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
        Schema::create('countries', function (Blueprint $table) {
        $table->id();
        
        // Relacionamento: Um país pertence a um continente
        $table->foreignId('continent_id')->constrained()->onDelete('cascade');
        
        $table->string('name'); // Ex: "Brasil"
        $table->string('slug')->unique(); // Ex: "brasil"
        $table->string('image_cover')->nullable(); // Imagem de destaque do país
        $table->text('short_description')->nullable(); // "Praias, paisagens naturais..."
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
