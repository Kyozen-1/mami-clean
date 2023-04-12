<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnSection10ToLandingPageBerandas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_page_berandas', function (Blueprint $table) {
            $table->dropColumn('section_10');
            $table->dropColumn('section_11');
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
