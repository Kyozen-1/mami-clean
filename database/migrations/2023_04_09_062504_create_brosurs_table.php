<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrosursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brosurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->nullable();
            $table->enum('status_brosur', ['layanan', 'perusahaan'])->nullable();
            $table->string('nama')->nullable();
            $table->string('berkas')->nullable();
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
        Schema::dropIfExists('brosurs');
    }
}
