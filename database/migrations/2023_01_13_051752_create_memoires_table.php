<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('memoires', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('theme_id'); //The theme the memoire belongs to!
            $table->string('doc_path');
            $table->string('theme_name');
            $table->longText('contents');
            $table->boolean("isValid")->default(false);
            $table->string("verified_by")->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('memoires');
    }
};

?>
