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
        Schema::table('books', function (Blueprint $table) {
            $table->integer('volume')->nullable(true)->change();
            $table->string('impression',600)->nullable(true)->change();
            $table->integer('point')->nullable(true)->change();
            $table->string('image',100)->nullable(true)->change();
            $table->string('link_rakuten',100)->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->integer('volume')->nullable(false)->change();
            $table->string('impression',600)->nullable(false)->change();
            $table->integer('point')->nullable(false)->change();
            $table->string('image',100)->nullable(false)->change();
            $table->string('link_rakuten',100)->nullable(false)->change();
        });
    }
};
