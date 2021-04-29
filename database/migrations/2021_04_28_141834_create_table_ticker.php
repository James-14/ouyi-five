<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTableTicker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticker', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('instrument_id')->default("")->comment("币对名称");
            $table->string('last')->default("")->comment("最新成交价");
            $table->string('last_qty')->default("")->comment("最新成交的数量");
            $table->string('best_ask')->default("")->comment("卖一价");
            $table->string('best_ask_size')->default("")->comment("卖一价对应的量");
            $table->string('best_bid')->default("")->comment("买一价");
            $table->string('best_bid_size')->default("")->comment("买一价对应的数量");
            $table->string('open_24h')->default("")->comment("24小时开盘价");
            $table->string('high_24h')->default("")->comment("24小时最高价");
            $table->string('low_24h')->default("")->comment("24小时最低价");
            $table->string('base_volume_24h')->default("")->comment("24小时成交量，按交易货币统计");
            $table->string('quote_volume_24h')->default("")->comment("24小时成交量，按计价货币统计");
            $table->string('timestamp')->default("")->comment("系统时间戳");
            $table->string('open_utc0')->default("")->comment("UTC 0 时开盘价");
            $table->string('open_utc8')->default("")->comment("UTC+8 时开盘价");
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ticker');
    }
}
