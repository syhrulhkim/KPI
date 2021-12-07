<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kpi5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kpi', function (Blueprint $table) {
       
            $table->dropColumn('objektif');
            $table->dropColumn('bukti_id');
            $table->dropColumn('link');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kpi', function (Blueprint $table) {
       
            $table->integer('objektif');
            $table->integer('bukti_id');
            $table->integer('link');
       
        });
    }
}
