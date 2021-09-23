<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioLoja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_loja', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('loja_id');

            $table->foreign('loja_id')
                ->references('id')
                ->on('lojas');
            $table->foreign('usuario_id')
                ->references('id')
                ->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', fn(Blueprint $table) => $table->dropForeing('loja_id'));
        Schema::table('produtos', fn(Blueprint $table) => $table->dropForeing('ususario_id'));
        Schema::dropIfExists('usuario_loja');
    }
}
