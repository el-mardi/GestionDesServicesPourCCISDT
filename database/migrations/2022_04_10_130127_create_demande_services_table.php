<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_services', function (Blueprint $table) {
            $table->bigIncrements('dem_serv_id');
            $table->string('num_contrat_accom');
            $table->string('type_demande');
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->integer('duree')->nullable();
            $table->string('province');
            $table->text('remarque')->nullable();
            
            $table->unsignedBigInteger('res_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('fonc_id');
            $table->unsignedBigInteger('rep_id')->nullable();

            $table->foreign('res_id')->references('res_id')->on('ressortissants');
            $table->foreign('service_id')->references('service_id')->on('services');
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
        Schema::dropIfExists('demande_services');
    }
}
