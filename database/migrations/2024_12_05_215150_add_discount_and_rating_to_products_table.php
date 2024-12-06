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
           
            $table->decimal('discount_price', 10, 2)->nullable(); // Precio con descuento
            $table->integer('discount_percentage')->nullable(); // Porcentaje de descuento
            $table->float('rating', 2, 1)->default(0); // Rating promedio del producto
            $table->integer('rating_count')->default(0); // Número de calificaciones
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropColumn(['discount_price', 'discount_percentage', 'rating', 'rating_count']);
        });
    }
};
