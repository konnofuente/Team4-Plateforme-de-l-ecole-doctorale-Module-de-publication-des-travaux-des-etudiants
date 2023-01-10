<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorMemoiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_memoire', function (Blueprint $table) {
            $table->foreignId('author_id')->constrained('authors')->onDelete('cascade');
            $table->foreignId('memoire_id')->constrained('memoires')->onDelete('cascade');
            Schema::enableForeignKeyConstraints();
            $table->timestamps();
        });

        // Schema::table('author_memoires', function($table) {
        //     $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        //     $table->foreign('memoire_id')->references('id')->on('memoires')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_memoires');
    }
}
