<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropifExists('tipo');
        Schema::create("tipo", function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
        Schema::dropifExists('cantidad');
        Schema::create("cantidad", function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::dropifExists('pedidos');
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('imagen');
            $table->string('precio');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('tipo_id')->references('id')->on('tipo');
            $table->foreignId('cantidad_id')->references('id')->on('cantidad');
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
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('tipo');
        Schema::dropIfExists('cantidad');
    }
}
