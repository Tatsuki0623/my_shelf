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
        Schema::create('read_times', function (Blueprint $table) {
            $table->id()->comment('読書時間id');
            $table->foreignId('user_id')->constrained('users')->comment('ユーザーid');
            $table->integer('read_time')->comment('読書時間');
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
        Schema::dropIfExists('read_times');
    }
};
