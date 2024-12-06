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
        Schema::create('tiendas', function (Blueprint $table) {
            $table->id(); // ID de la tienda
            $table->string('nombre')->nullable(); // Nombre de la tienda
            $table->string('ubicacion')->nullable(); // Ubicación de la tienda
            $table->string('imagen')->nullable(); // Imagen de la tienda
            $table->string('nombre_vendedor'); // Nombre del vendedor
            $table->string('detalle_vendedor');
            $table->timestamps(); // Fechas de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiendas');
    }
};
