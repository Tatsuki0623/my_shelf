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
        Schema::create('memos', function (Blueprint $table){
            $table->id()->comment('メモid');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->Decomment('ユーザーid');
            $table->string('title',20)->comment('メモタイトル');
            $table->string('body',140)->comment('メモ本文');
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
        Schema::dropIfExists('memos');
    }
};
