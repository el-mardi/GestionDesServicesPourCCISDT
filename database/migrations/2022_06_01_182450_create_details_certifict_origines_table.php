<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsCertifictOriginesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_certifict_origines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_num_contrat');
            $table->string('exportateur');
            $table->string('remarque')->nullable();
            $table->string('num_facture');
            $table->date('date_facture');
            $table->string('destinataire');
            $table->string('pays_or');
            $table->string('transport');
            $table->string('nomenclature');
            $table->string('details');
            $table->string('quantite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details_certifict_origines');
    }
}
