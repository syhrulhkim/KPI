<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sop3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sop', function (Blueprint $table) {
            $table->string('sop_path')->nullable()->change();
            $table->string('link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sop', function (Blueprint $table)
        {
            $table->string('sop_path')->nullable(false)->change();
            $table->dropColumn('link');
        });
    }
}
