<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id()->comment('メモid');
            $table->foreignId('user_id')->constrained('users')->comment('ユーザーid');
            $table->integer('volume')->comment('巻数');
            $table->string('impression',600)->comment('感想');
            $table->integer('point')->comment('本の点数');
            $table->string('image',100)->comment('画像URL');
            $table->string('link_rakuten',100)->comment('商品ページURL');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
