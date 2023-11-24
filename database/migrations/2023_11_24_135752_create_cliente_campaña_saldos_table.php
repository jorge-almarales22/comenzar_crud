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
        Schema::create('cliente_campaña_saldos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cliente_id')
            ->references('id')
            ->on('clientes')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->foreignId('campaña_id')
            ->references('id')
            ->on('campañas')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->decimal('saldo', $precision = 20, $scale = 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente_campaña_saldos');
    }
};
