<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCovasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('numero');     
            
            $table->unsignedInteger('fila_id');
            $table->foreign('fila_id')
                    ->references('id')->on('filas')
                    ->onDelete('cascade');
            
            $table->unique(['numero', 'fila_id']);
            
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
        Schema::dropIfExists('covas');
    }
}
