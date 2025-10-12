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
        Schema::create('tool_attributes', function (Blueprint $table) {
            $table->id();
            //relacion con la tabla tool_types
            $table->foreignId('toolType_id')->constrained('tool_types')->onDelete('cascade');
            $table->string('data');
            $table->enum('data_type', ['string', 'integer', 'boolean', 'date', 'time', 'text']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};
