<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceQualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_qualities', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->string('after_img')->nullable();
            $table->string('before_img')->nullable();
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
        Schema::dropIfExists('service_qualities');
    }
}
