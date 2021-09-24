<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('codigo');
            $table->decimal('valor');
            $table->unsignedBigInteger('loja_id')->nullable();

            $table->foreign('loja_id')
                ->references('id')
                ->on('lojas')->onDelete('set null');
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
        Schema::dropIfExists('produtos');
    }
}
