<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Candidatos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('foto');
            $table->string('identidad')->unique();
            $table->unsignedBigInteger('id_cargo');
            $table->foreign("id_cargo")->references("id")->on("cargos");
            $table->unsignedBigInteger('id_planilla');
            $table->foreign("id_planilla")->references("id")->on("planillas");

            $table->rememberToken();
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
        Schema::dropIfExists('Candidatos');
    }
}
