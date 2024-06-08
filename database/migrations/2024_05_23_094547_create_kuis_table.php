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
        Schema::create('kuis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kelas_id')->references('id')->on('kelas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('type', ['TANGO','BUNPOU','CHOKAI','DOKKAI']);
            $table->string('judulkuis');
            $table->string('jumlahsoal');
            $table->enum('status',['belum mulai','siap mulai','sedang mulai','telah selesai']);
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
        Schema::dropIfExists('kuis');
    }
};
