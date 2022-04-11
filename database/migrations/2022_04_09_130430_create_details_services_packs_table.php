<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsServicesPacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_services_packs', function (Blueprint $table) {
            $table->bigIncrements('service_pack_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('pack_id');
            $table->foreign('service_id')->references('service_id')->on('services');
            $table->foreign('pack_id')->references('pack_id')->on('packs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details_services_packs');
    }
}
