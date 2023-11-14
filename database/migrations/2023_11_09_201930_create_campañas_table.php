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
        Schema::create('campañas', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('restrict')
            ->onDelete('restrict');
            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_caducidad')->nullable();
            $table->string('nombre', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campañas');
    }
};
