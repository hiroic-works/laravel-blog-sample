<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // テーブルがなければ作成
        if(!Schema::hasTable('blogs')) {
            Schema::create('blogs', function (Blueprint $table) {
                $table->bigIncrements('id'); // 自動増分のIDにする
                $table->string('title', 100); // 100文字制限
                $table->text('content'); // 文字制限なし
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
