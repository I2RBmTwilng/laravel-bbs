<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 话题表
 *
 * Class CreateTopicsTable
 */
class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id')->comment('主键自增Id');
            $table->string('title')->index()->comment('标题');
            $table->text('body')->comment('话题内容');
            $table->integer('user_id')->unsigned()->index()->comment('发起该话题的用户');
            $table->integer('category_id')->unsigned()->index()->comment('话题类别');
            $table->integer('reply_count')->unsigned()->default(0)->comment('回复的数量');
            $table->integer('view_count')->unsigned()->default(0)->comment('点击的数量');
            $table->integer('last_reply_user_id')->unsigned()->default(0)->comment('上一次回复用户的Id');
            $table->integer('order')->unsigned()->default(0)->comment('排序');
            $table->text('excerpt')->comment('摘要');
            $table->string('slug')->nullable()->comment('标题的翻译');
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
        Schema::dropIfExists('topics');
    }
}
