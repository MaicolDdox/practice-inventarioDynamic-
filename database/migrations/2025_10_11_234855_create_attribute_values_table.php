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
        Schema::create('attribute_values', function (Blueprint $table) {
            $table->id();
            //Relacion con la tabla tools (herramientas)
            $table->foreignId('tool_id')->constrained('tools')->onDelete('cascade');

            //Relacion con la tabla attributes (atributos)
            $table->foreignId('toolAttribute_id')->constrained('tool_attributes')->onDelete('cascade');

            //Campo donde guardaremos los valores de los atributos
            $table->text('value')->comment('valor del atributo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_values');
    }
};
