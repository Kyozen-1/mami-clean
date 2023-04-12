<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKerjaDariHariToProfils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profils', function (Blueprint $table) {
            $table->string('kerja_dari_hari')->nullable();
            $table->string('kerja_sampai_hari')->nullable();
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
