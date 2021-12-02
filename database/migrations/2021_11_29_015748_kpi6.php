<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kpi6 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kpi', function (Blueprint $table) { 
            // $table->dropColumn('tahun');
            // $table->dropColumn('bulan');
            $table->dropColumn('grade');
            $table->dropColumn('total_score');
            $table->dropColumn('weightage');
            // $table->string('year')->nullable();
            // $table->string('month')->nullable();
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
            $table->dropColumn('year');
            $table->dropColumn('month');
        });
    }
}
