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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('cliente_id')
            ->references('id')
            ->on('clientes')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->foreignId('tienda_id')
            ->references('id')
            ->on('tiendas')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->foreignId('campaña_id')
            ->references('id')
            ->on('campañas')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->string("numero_factura", 20);
            $table->string("foto_factura", 255);
            $table->decimal('valor_factura', $precision = 20, $scale = 2);
            $table->decimal('saldo', $precision = 20, $scale = 2);

            $table->foreignId('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->boolean('redimido')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
