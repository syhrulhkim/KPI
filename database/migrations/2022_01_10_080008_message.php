<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Message extends Migration
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
            $table->string('message_manager')->nullable();
            $table->string('message_hr')->nullable();
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
            $table->dropColumn('message_manager');
            $table->dropColumn('message_hr');
        });
    }
}
