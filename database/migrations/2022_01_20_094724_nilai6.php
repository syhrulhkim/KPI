<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nilai6 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nilai', function (Blueprint $table) {
            $table->dropColumn('weightage');
            $table->dropColumn('skor_sebenar');
            $table->dropColumn('skor_pekerja');
            $table->dropColumn('ukuran');
            $table->dropColumn('peratus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nilai', function (Blueprint $table)
        {
            $table->string('weightage')->nullable();
            $table->string('skor_sebenar')->nullable();
            $table->string('skor_pekerja')->nullable();
            $table->string('ukuran')->nullable();
            $table->string('peratus')->nullable();
        });
    }
}
