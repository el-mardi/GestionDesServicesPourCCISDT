<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representants', function (Blueprint $table) {
            $table->bigIncrements('rep_id');
            $table->string('cin');
            $table->string('nom');
            $table->string('prenom');
            $table->string('nationalite');
            $table->string('sexe');
            $table->integer('tel');
            $table->string('mail');
            $table->string('adresse');
            $table->unsignedBigInteger('qualite_id');
            $table->foreign('qualite_id')->references('qualite_id')->on('qualites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('representants');
    }
}
