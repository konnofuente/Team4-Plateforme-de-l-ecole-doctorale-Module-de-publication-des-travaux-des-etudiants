<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();

            $table->timestamps();

            $table->string('theme');

            $table->longText('abstract');

            $table->longText('members');

            $table->string('chef_telephone');

            $table->string('domaine');

            $table->string('chef_matricule');

            $table->string('memoire_path');

            $table->string('attestation_path');

            $table->string('chef_email');

            $table->string('encadreur_email');

            $table->string('encadreur_matricule');

            $table->integer('is_valid')->default(0); // 0 for unchecked, 1 for valid and code has been sent, 2 for invalid

            $table->string('checked_by')->nullable(); //

            $table->string('verification_code')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projets');
    }
}
