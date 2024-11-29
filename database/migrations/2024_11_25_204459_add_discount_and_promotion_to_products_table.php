<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('en_promocion')->default(false)->after('on_sale'); // Indica si el producto está en promoción
            $table->decimal('porcentaje_descuento', 5, 2)->nullable()->after('en_promocion'); // Porcentaje de descuento
            $table->date('fecha_inicio_promocion')->nullable()->after('porcentaje_descuento'); // Fecha de inicio de la promoción
            $table->date('fecha_fin_promocion')->nullable()->after('fecha_inicio_promocion'); // Fecha de fin de la promoción
        });
    }

    /**
     * Reversa las migraciones.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'en_promocion',
                'porcentaje_descuento',
                'fecha_inicio_promocion',
                'fecha_fin_promocion',
            ]);
        });
    }
};