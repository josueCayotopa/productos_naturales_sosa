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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();//usuario
            $table->decimal('grand_total',10,2)->nullable();// total pedido
            $table->string('payment_method')->nullable();// metodo de pago 
            $table->string('payment_status')->nullable();// stado de pago 
            $table->enum('status',['new','processing', 'shipped', 'delivered','canceled'])->default('new');
            $table->string('currency')->nullable();
            $table->decimal('shipping_amount',10,2)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
