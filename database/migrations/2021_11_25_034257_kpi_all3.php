<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KpiAll3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kpi_all', function (Blueprint $table) { 
            $table->dropColumn('weightage_all');
            $table->string('tahun')->nullable();
            $table->string('bulan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kpi_all', function (Blueprint $table) {
            $table->dropColumn('tahun');
            $table->dropColumn('bulan');
        });
    }
}
