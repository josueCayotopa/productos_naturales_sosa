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
            $table->string('ubicacion')->nullable(); // Dirección de la tienda
            $table->string('imagen')->nullable(); // URL o ruta de la imagen
            $table->string('hora_atencion', 100)->nullable(); // Horario de atención
            $table->string('dias_atencion', 100)->nullable(); // Días de atención
            $table->string('telefono', 20)->nullable(); // Teléfono de contacto
            $table->string('nombre_vendedor')->nullable(); // Nombre del vendedor
            $table->text('detalle_vendedor')->nullable(); // Detalle o descripción del vendedor
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
