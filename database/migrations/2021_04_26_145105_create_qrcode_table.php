<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQrcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrcode', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title')->default("")->comment("标题");
            $table->string('imgurl')->default("")->comment("二维码url");
            $table->tinyInteger('status')->default(1)->comment("状态 1无效 2有效");
            $table->integer("opertor_id")->default(0)->comment("操作人id");
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
        Schema::drop('qrcode');
    }
}
