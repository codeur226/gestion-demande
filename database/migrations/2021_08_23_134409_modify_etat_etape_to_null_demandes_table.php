<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyEtatEtapeToNullDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demandes', function (Blueprint $table) {
            $table->integer('etape')->nullable()->change();
            $table->integer('etat')->nullable()->change();
            $table->float('note_globale')->nullable()->change();
            $table->date('date_evaluation')->nullable()->change();
            $table->string('commentaires')->nullable()->change();
            $table->string('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demandes', function (Blueprint $table) {
        });
    }
}
