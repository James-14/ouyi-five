<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTickerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticker', function (Blueprint $table) {
            //
            $table->string('up_down')->default("")->comment("涨跌幅度");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticker', function (Blueprint $table) {
            //
            $table->dropColumn('up_down');
        });
    }
}
