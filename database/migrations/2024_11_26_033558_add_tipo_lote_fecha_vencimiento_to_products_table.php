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
        Schema::table('products', function (Blueprint $table) {
            $table->string('tipo')->nullable(); // Tipo del producto
            $table->string('lote')->nullable(); // Lote del producto
            $table->date('fecha_vencimiento')->nullable(); // Fecha de vencimiento
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['tipo', 'lote', 'fecha_vencimiento']);
        });
    }
};
