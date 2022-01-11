<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Message2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('date', function (Blueprint $table)
        {
            $table->string('manager_id')->nullable();
            $table->string('hr_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('date', function (Blueprint $table)
        {
            $table->dropColumn('manager_id');
            $table->dropColumn('hr_id');
        });
    }
}
