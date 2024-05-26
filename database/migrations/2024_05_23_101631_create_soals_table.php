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
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuid_id')->references('id')->on('kuis')->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('soal');
            $table->string('jawabanbenar');
            $table->string('jawabansatu');
            $table->string('jawabandua');
            $table->string('jawabantiga');
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
        Schema::dropIfExists('soals');
    }
};
