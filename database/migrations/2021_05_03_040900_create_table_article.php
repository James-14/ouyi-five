<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title')->default("")->comment("标题");
            $table->string('slug')->default("")->comment("简述");
            $table->string('release_time')->default("")->comment("发布时间");
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
        Schema::drop('article');
    }
}
