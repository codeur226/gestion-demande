<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->integer('theme_id');
            $table->integer('type_demande');
            $table->integer('profil');
            $table->string('domaine');
            $table->integer('type');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('etape');
            $table->integer('etat');
            $table->float('note_globale');
            $table->date('date_evaluation');
            $table->string('commentaires');
            $table->string('description');
            $table->integer('supprimer')->default(0);
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
        Schema::dropIfExists('demandes');
    }
}
