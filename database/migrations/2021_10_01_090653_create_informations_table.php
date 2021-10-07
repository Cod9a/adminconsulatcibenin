<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->string("pays_naissance");
            $table->string("profession");
            $table->string("diplome");
            $table->string("boite_postale");
            $table->string("numero")->unique();
            $table->string("numero_alt")->unique();
            $table->string("numero_alt2")->unique();
            $table->string("nom_pere");
            $table->string("nom_mere");
            $table->string("prenoms_pere");
            $table->string("prenoms_mere");
            $table->string("epse");
            $table->date("date_nais");
            $table->string("sexe");
            $table->string("ville_nais");
            $table->string("ethnie");
            $table->string("situation_matrimoniale");
            $table->string("lieu_residence");
            $table->date("date_arrivee");
            $table->unsignedInteger("nbr_enfants");
            $table->foreignId("user_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informations');
    }
}
