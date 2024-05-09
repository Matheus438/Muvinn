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
        Schema::create('muvinns', function (Blueprint $table) {
            $table->id();
            $table->string('estado', 2)->nullable(false);
            $table->string('cidade', 100)->nullable(false);
            $table->string('endereco', 100)->nullable(false);
            $table->string('tipos_imoveis', 100)->nullable(false);
            $table->decimal('preco')->nullable(false);
            $table->string('banheiros')->nullable(false);
            $table->string('quartos')->nullable(false);
            $table->string('vagas')->nullable(false);
            $table->string('area_do_imovel', 100)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muvinns');
    }
};
