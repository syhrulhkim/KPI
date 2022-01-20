<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bukti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukti', function (Blueprint $table) {
            $table->id();

            $table->string('objektif')->nullable();
            $table->string('fungsi')->nullable();
            // $table->string('link')->nullable();

            $table->string('bukti');
            $table->string('grade')->nullable();
            $table->string('weightage')->nullable();
            $table->string('total_score')->nullable();
            
            $table->string('ukuran')->nullable();
            $table->string('peratus')->nullable();
            $table->string('threshold')->nullable();
            $table->string('base')->nullable();
            $table->string('stretch')->nullable();
            $table->string('pencapaian')->nullable();
            $table->string('skor_sebenar')->nullable();
            $table->string('skor_KPI')->nullable();
            
            $table->string('user_id');
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
        Schema::dropIfExists('bukti');
    }
}
