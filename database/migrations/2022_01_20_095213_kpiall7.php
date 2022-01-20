<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kpiall7 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kpi_all', function (Blueprint $table) {
            $table->dropColumn('weightage_kecekapan');
            $table->dropColumn('total_score_kecekapan');
            $table->dropColumn('weightage_nilai');
            $table->dropColumn('total_score_nilai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kpi_all', function (Blueprint $table)
        {
            $table->string('weightage_kecekapan')->nullable();
            $table->string('total_score_kecekapan')->nullable();
            $table->string('weightage_nilai')->nullable();
            $table->string('total_score_nilai')->nullable();
        });
    }
}
