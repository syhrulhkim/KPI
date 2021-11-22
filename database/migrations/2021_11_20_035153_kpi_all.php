<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KpiAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_all', function (Blueprint $table) {
            $table->id();
            $table->string('grade_master')->nullable();
            $table->string('weightage_master')->nullable();
            $table->string('total_score_master')->nullable();
            $table->string('grade_all')->nullable();
            $table->string('weightage_all')->nullable();
            $table->string('total_score_all')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('kpi_all');
    }
}
