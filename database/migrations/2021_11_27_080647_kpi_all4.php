<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KpiAll4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kpi_all', function (Blueprint $table) { 
            $table->dropColumn('tahun');
            $table->dropColumn('bulan');
            $table->string('year')->nullable();
            $table->string('month')->nullable();
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
            $table->dropColumn('year');
            $table->dropColumn('month');
        });
    }
}
