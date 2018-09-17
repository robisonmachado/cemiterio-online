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
            $table->string('falecido');
            $table->date('data_falecimento');
            $table->date('data_sepultamento')->nullable();

            $table->unsignedInteger('cova_id');
            $table->foreign('cova_id')
                    ->references('id')->on('covas')
                    ->onDelete('cascade');
            
            $table->integer('numero_sepultamento');

            $table->unique(['numero_sepultamento', 'cova_id']);
            
            $table->string('certidao_obito')->nullable();

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
