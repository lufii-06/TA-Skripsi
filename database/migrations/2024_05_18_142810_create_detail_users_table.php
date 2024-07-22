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
        Schema::create('detail_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('user_nomor', 9)->nullable()->unique();
            $table->enum('jenkel',['Laki-laki','Perempuan'])->nullable();
            $table->string('alamat', 200)->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->integer('usia')->nullable();
            $table->string('pendidikanterakhir', 15)->nullable();
            $table->string('jurusan', 50)->nullable();
            $table->integer('tinggibadan')->nullable();
            $table->integer('beratbadan')->nullable();
            $table->string('nohp', 15)->nullable();
            $table->enum('budayaJepang', ['ya', 'tidak'])->nullable();
            $table->enum('pergiKeluarNegri', ['ya', 'tidak'])->nullable();
            $table->enum('tindikTato', ['ya', 'tidak'])->nullable();
            $table->enum('bekerjaTekanan', ['ya', 'tidak'])->nullable();
            $table->enum('orangTuaMasihAda', ['ya', 'tidak'])->nullable();
            $table->enum('orangTuaTahu', ['ya', 'tidak'])->nullable();
            $table->enum('kemauanSendiri', ['ya', 'tidak'])->nullable();
            $table->enum('cacatTubuh', ['ya', 'tidak'])->nullable();
            $table->enum('rabunButaWarna', ['ya', 'tidak'])->nullable();
            $table->enum('gigiPalsu', ['ya', 'tidak'])->nullable();
            $table->text('soal1')->nullable();
            $table->text('soal2')->nullable();
            $table->enum('levelkemampuan', ['N5','N4','N3','N2','N1'])->nullable();
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
        Schema::dropIfExists('detail_users');
    }
};
