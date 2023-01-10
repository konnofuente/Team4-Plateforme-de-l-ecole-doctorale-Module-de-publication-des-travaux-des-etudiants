<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('departements', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('description');
            $table->foreignId('school_id')->constrained('schools');
            $table->foreignId('domaine_id')->constrained('domaines');
            $table->foreignId('user_id')->constrained('users');
            Schema::enableForeignKeyConstraints();
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
        Schema::dropIfExists('departements');
        Schema::disableForeignKeyConstraints();
    }
}
