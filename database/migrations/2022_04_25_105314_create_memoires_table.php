<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memoires', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->date('date_soutenance');
            $table->string('couverture');
            $table->integer('count_views')->nullable();
            $table->integer('count_download')->nullable();
            $table->text('resume');
            $table->string('encadreur');
            $table->text('key_word');
            $table->foreignId('departement_id')->constrained('departements');
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
        Schema::dropIfExists('memoires');
    }
}
