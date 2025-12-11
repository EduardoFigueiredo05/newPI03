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
        Schema::create('packages', function (Blueprint $table) {
        $table->id();
        
        // CORREÇÃO: Liga o pacote ao PAÍS, não só ao continente
        $table->foreignId('country_id')->constrained()->onDelete('cascade');
        
        $table->string('title'); 
        $table->string('subtitle')->nullable(); 
        $table->string('slug')->unique(); 
        $table->decimal('price', 10, 2); 
        $table->integer('days'); 
        $table->integer('nights'); 
        $table->date('start_date')->nullable();
        $table->date('end_date')->nullable();
        
        // Detalhes (Abas)
        $table->text('details_itinerary')->nullable();
        $table->text('details_included')->nullable();
        $table->text('details_conditions')->nullable();
        
        // Infos Extras
        $table->text('info_general')->nullable();
        $table->text('info_gastronomy')->nullable();
        $table->text('info_nightlife')->nullable();

        $table->text('image_main'); 
        $table->boolean('is_active')->default(true);
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
