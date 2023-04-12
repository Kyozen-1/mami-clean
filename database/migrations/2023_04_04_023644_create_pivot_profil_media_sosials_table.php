<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotProfilMediaSosialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_profil_media_sosials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_media_sosial_id')->nullable();
            $table->foreignId('profil_id')->nullable();
            $table->string('tautan')->nullable();
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
        Schema::dropIfExists('pivot_profil_media_sosials');
    }
}
