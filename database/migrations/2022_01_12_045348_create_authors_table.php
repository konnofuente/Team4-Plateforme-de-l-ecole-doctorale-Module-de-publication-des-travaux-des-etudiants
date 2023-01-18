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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('auth1');
            $table->string('auth2')->nullable();
            $table->string('auth3')->nullable();
            $table->string('sup1');
            $table->string('sup2')->nullable();
            $table->string('mat1');
            $table->string('mat2')->nullable();
            $table->string('mat3')->nullable();
            $table->foreignId('file_id')->constrained('files')->onDelete('cascade');
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
        Schema::dropIfExists('authors');
    }
};
