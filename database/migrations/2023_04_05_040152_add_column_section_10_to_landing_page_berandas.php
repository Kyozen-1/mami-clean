<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSection10ToLandingPageBerandas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_page_berandas', function (Blueprint $table) {
            $table->json('section_10')->nullable();
            $table->json('section_11')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landing_page_berandas', function (Blueprint $table) {
            //
        });
    }
}
