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
        Schema::create('nagumos', function (Blueprint $table) {
            $table->integer('cod');
            $table->integer('coditem');
            $table->string('nome', 50);
            $table->string('grupo', 20);
            $table->string('descricao', 200);
            $table->string('imagem', 300);
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nagumos');
    }
};
