<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntervenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervenants', function (Blueprint $table) {
            $table->bigIncrements('intervenant_id');
            $table->string('intervenant');
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')->references('part_id')->on('partenaires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intervenants');
    }
}
