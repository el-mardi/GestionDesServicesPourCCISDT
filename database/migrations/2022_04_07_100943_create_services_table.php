<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('service_id');
            $table->string('code_service')->unique();
            $table->string('service');
            $table->string('description');
            // $table->string('periodicite');
            $table->string('cible');
            $table->string('lieu_prestation');
            $table->float('tarif');
            $table->string('ressource_service');
            $table->boolean('etat_service');
            $table->string('motif_etat_service');
            $table->string('documentation')->nullable();
            $table->string('action_communication')->nullable();
            $table->string('remarque');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('resp_id')->nullable();

            $table->foreign('type_id')->references('type_id')->on('types_interventions');
            $table->foreign('resp_id')->references('fonc_id')->on('fonctionnaires');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
