<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsServicesIntervenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_services_intervenants', function (Blueprint $table) {
            $table->bigIncrements('service_intervenant_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('intervenant_id');
            $table->boolean('satut');
            $table->text('remarque');

            $table->foreign('service_id')->references('service_id')->on('services');
            $table->foreign('intervenant_id')->references('intervenant_id')->on('intervenants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details_services_intervenants');
    }
}
