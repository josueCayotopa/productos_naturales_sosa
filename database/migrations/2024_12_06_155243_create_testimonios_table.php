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
        Schema::create('testimonios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('contenido')->nullable();
            $table->string('imagen')->nullable();
            $table->string('categoria');
            $table->integer('vistas')->default(0);
            $table->integer('comentarios_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonios');
    }
};
