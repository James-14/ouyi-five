<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title')->default("")->comment("标题");
            $table->string('imgurl')->default("")->comment("图片url");
            $table->tinyInteger('status')->default(1)->comment("状态 1无效 2有效");
            $table->integer("orderly")->default(100)->comment("排序，默认100");
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
        Schema::drop('activity');
    }
}
