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
        Schema::create('correction_attestations', function (Blueprint $table) {
            $table->id();
            $table->string('code_correction');
            $table->string('filename');
            $table->string('filepath');
            $table->string('filetype');
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
        Schema::dropIfExists('correction_attestations');
    }
};
