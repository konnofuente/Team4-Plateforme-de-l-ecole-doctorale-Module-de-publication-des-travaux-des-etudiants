<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->Date('date');
            $table->string('language');
            $table->string('filepath');
            $table->string('filetype');
            $table->foreignId('departement_id')->contrained('departenents')->onDelete('cascade');
            $table->foreignId('domain_id')->contrained('domaines')->onDelete('cascade');
            $table->foreignId('author_id')->contrained('authors')->onDelete('cascade');
            $table->foreignId('user_id')->contrained('users')->onDelete('cascade');
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
};
