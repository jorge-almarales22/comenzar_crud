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
        Schema::create('factura_tickets', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('factura_id')
            ->references('id')
            ->on('facturas')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->foreignId('ticket_id')
            ->references('id')
            ->on('tickets')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->decimal('valor_redimido', $precision = 20, $scale = 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura_tickets');
    }
};
