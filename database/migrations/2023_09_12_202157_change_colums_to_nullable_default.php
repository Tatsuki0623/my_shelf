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
     *
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->integer('volume')->default(1)->change();
            $table->string('impression',600)->nullable(true)->change();
            $table->integer('point')->default(0)->change();
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
        //
    }
};
