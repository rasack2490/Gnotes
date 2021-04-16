<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('image')->default('assets/img_profile/user.svg');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('matricule');
            $table->string('password');
            $table->string('nationalite');
            $table->date('naissance');
            $table->boolean('sexe');
            $table->string('ville');
            $table->bigInteger('telephone');
            $table->string('adresse');
            $table->bigInteger('phone_besoin');
            $table->string('nom_pere');
            $table->string('nom_mere');
            $table->string('classe_id');
            
            /*$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP onupdate CURRENT_TIMESTAMP'));*/
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable()->onUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eleves');
    }
}
