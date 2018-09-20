<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filas', function (Blueprint $table) {
            $table->increments('id');
                       
            $table->unsignedInteger('numero');
            $table->unsignedInteger('quadra_numero');
            $table->foreign('quadra_numero')
                    ->references('numero')->on('quadras')
                    ->onDelete('cascade');
            
            $table->unique(['numero', 'quadra_numero']);

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
        Schema::dropIfExists('filas');
    }
}
