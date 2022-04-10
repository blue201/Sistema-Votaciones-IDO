<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planillas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('lema');
            $table->string('foto');
           $table->string('propuesta');
           $table->integer('votos')->default(0);
            $table->unsignedBigInteger('modalidad');
            $table->foreign('modalidad')->references('id')->on('modalidads');
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
        Schema::dropIfExists('planillas');
    }
}
