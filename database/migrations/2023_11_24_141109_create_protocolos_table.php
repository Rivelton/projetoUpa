<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtocolosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocolos', function (Blueprint $table) {
            $table->id();
            $table->string('Protocolo', 191);
            $table->string('caminho_arquivo', 191);
            $table->boolean('ProtocoloFlag');
            $table->string('N_de_Identificacao', 60);
            $table->timestamps();


            $table->foreign('Protocolo')->references('Protocolo')->on('cadastros');
            $table->unique('Protocolo');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('protocolos');
    }
}
