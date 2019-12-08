<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            // 2019-11-28 admin 관계설정 삭제
            // $table->boolean('admin')->default(false)->unique();
            $table->unsignedBigInteger('target_id')->index()->unique();

            // $table->foreign('admin')->references('admin')->on('users')->onDelete('cascade');
            $table->foreign('target_id')->references('id')->on('questions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            // $table->dropForeign('answers_admin_foreign');
            $table->dropForeign('answers_target_id_foreign');
        });
    }
}


