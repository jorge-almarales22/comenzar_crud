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

            $table->string("numero_factura");
            $table->string("foto_factura");
            $table->string("campaña");
            $table->decimal('valor', $precision = 20, $scale = 2);
            $table->timestamp('fecha_caducidad');
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
