<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFonctionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fonctionnaires', function (Blueprint $table) {
            $table->bigIncrements('fonc_id');
            $table->string('username')->unique();
            $table->string('cin')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('mot_de_passe');
            $table->string('sexe');
            $table->boolean('admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fonctionnaires');
    }
}
