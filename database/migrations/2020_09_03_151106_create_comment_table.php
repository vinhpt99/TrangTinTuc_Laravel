<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('idNguoiDung')->unsigned();
                $table->foreign('idNguoiDung')->references('id')->on('users')->onDelete('cascade');
                $table->integer('idTinTuc')->unsigned();
                $table->foreign('idTinTuc')->references('id')->on('tintuc')->onDelete('cascade');
                $table->string('NoiDung');
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
        Schema::dropIfExists('comment');
    }
}
