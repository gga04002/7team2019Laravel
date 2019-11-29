<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToJapaneseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('japanese', function (Blueprint $table) {
            $table->boolean('admin')->default(false)->unique();

            $table->foreign('admin')->references('admin')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('japanese', function (Blueprint $table) {
            $table->dropForeign('japanese_admin_foreign');
        });
    }
}
