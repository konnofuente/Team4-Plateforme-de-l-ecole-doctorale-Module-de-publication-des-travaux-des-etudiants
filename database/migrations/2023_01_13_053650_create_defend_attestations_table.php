<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('defend_attestations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('theme_id'); //The theme the attestation belongs to!
            $table->string('doc_path'); //The path of the document
            $table->longText('contents'); //The scanned contents
        });
    }

    public function down()
    {
        Schema::dropIfExists('defend_attestations');
    }
};
