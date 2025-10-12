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
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            //relacion con la tabla tool_types
            $table->foreignId('toolType_id')->constrained('tool_types')->onDelete('cascade');
            $table->string('name');
            $table->string('img')->nullable();
            $table->text('description')->nullable();
            $table->enum('state', ['disponible', 'prestado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tools');
    }
};
