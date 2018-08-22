<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSepultamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sepultamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');

            $table->unsignedInteger('cova_id');
            $table->foreign('cova_id')
                    ->references('id')->on('covas')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('sepultamentos');
    }
}
