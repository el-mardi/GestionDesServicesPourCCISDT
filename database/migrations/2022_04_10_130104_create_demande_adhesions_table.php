<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeAdhesionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_adhesions', function (Blueprint $table) {
            $table->bigIncrements('adh_id');
            $table->string('num_contrat_adh');
            $table->string('num_recu');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('periodicite');
            $table->unsignedBigInteger('res_id');
            $table->unsignedBigInteger('pack_id');
            $table->unsignedBigInteger('fonc_id');
            $table->unsignedBigInteger('rep_id');

            $table->foreign('res_id')->references('res_id')->on('ressortissants');
            $table->foreign('pack_id')->references('pack_id')->on('packs');
            $table->foreign('fonc_id')->references('fonc_id')->on('fonctionnaires');
            $table->foreign('rep_id')->references('rep_id')->on('representants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demande_adhesions');
    }
}
