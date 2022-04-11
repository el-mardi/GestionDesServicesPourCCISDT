<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRessortissantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ressortissants', function (Blueprint $table) {
            $table->bigIncrements('res_id');
            $table->string('num_fiche');
            $table->string('nom');
            $table->string('prenom');
            $table->string('cin');
            $table->string('nationalite');
            $table->string('residence');
            $table->date('date_naissance');
            $table->string('sexe');
            $table->integer('tel');
            $table->string('mail');
            $table->string('adresse');
            $table->string('formation');
            $table->string('experience');
            $table->string('img');
            $table->string('raison_social');
            $table->string('ice');
            $table->string('rc');
            $table->string('patente');
            // $table->date('annee_dernier_adh');
            $table->boolean('accompagnement')->default(false);
            $table->string('secteur');

            $table->unsignedBigInteger('act_id');
            $table->unsignedBigInteger('qualite_id');
            $table->unsignedBigInteger('formeJur_id');
            $table->foreign('formeJur_id')->references('formeJur_id')->on('Juridique_formes');
            $table->foreign('act_id')->references('act_id')->on('activites');
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
        Schema::dropIfExists('ressortissants');
    }
}
