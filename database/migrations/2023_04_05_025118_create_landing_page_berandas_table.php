<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingPageBerandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_page_berandas', function (Blueprint $table) {
            $table->id();
            $table->json('section_1')->nullable();
            $table->json('section_2')->nullable();
            $table->json('section_3')->nullable();
            $table->json('section_4')->nullable();
            $table->json('section_5')->nullable();
            $table->json('section_6')->nullable();
            $table->json('section_7')->nullable();
            $table->json('section_8')->nullable();
            $table->json('section_9')->nullable();
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
        Schema::dropIfExists('landing_page_berandas');
    }
}
