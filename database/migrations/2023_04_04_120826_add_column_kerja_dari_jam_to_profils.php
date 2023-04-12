<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKerjaDariJamToProfils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profils', function (Blueprint $table) {
            $table->time('kerja_dari_jam')->nullable();
            $table->time('kerja_sampai_jam')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profils', function (Blueprint $table) {
            //
        });
    }
}
