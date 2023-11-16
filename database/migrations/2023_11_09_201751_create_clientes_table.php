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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('profesion_id')
            ->references('id')
            ->on('profesiones')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->foreignId('tipo_documento_id')
            ->references('id')
            ->on('tipo_documentos')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->string('nombre', 30);
            $table->string('apellidos', 30);
            $table->string('email', 50);
            $table->integer('telefono')->length(10);
            $table->string('direccion', 30);
            $table->timestamp('fecha_nacimiento');
            $table->integer('hijos')->default(0)->length(4);
            
            $table->string('numero_documento', 20);
            $table->integer('mascotas')->default(0)->length(4);

            $table->foreignId('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
