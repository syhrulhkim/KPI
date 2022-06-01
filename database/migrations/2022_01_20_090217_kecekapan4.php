<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kecekapan4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kecekapan', function (Blueprint $table) {
            $table->dropColumn('skor_penyelia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kecekapan', function (Blueprint $table)
        {
            $table->string('skor_penyelia')->nullable();
        });
    }
}
