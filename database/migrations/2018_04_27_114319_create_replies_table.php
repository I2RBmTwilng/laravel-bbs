<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id')->comment('主键自增Id');
            $table->integer('topic_id')->unsigned()->default(0)->index()->comment('回复的话题Id');
            $table->integer('user_id')->unsigned()->default(0)->index()->comment('发起该话题的用户');
            $table->text('body')->comment('回复的内容');
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
        Schema::dropIfExists('replies');
    }
}
