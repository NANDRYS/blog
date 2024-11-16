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
    // public function up()
    // {
    //     Schema::table('posts', function (Blueprint $table) {
    //         $table->bigInteger('category_id')->unsigned();
    //         $table->foreign('category_id')->references('id')->on('catigories');
    //     });
    // }
    // use Illuminate\Support\Facades\Schema;

    public function up()
    {
        if (!Schema::hasColumn('posts', 'category_id')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->unsignedBigInteger('category_id')->nullable();
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
        Schema::table('posts', callback: function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->dropForeign('category_id');
        });
    }
};
