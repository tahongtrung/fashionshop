<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lohang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lohang_ky_hieu',200);
            $table->decimal('lohang_gia_mua_vao',10,2);
            // $table->decimal('lohang_gia_ban_ra',10,2);
            $table->integer('lohang_so_luong_nhap');
            $table->integer('lohang_so_luong_da_ban');
            $table->integer('lohang_so_luong_hien_tai');
            $table->integer('lohang_so_luong_doi_tra');
            $table->integer('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('sanpham')->onUpdate('cascade');
            $table->integer('size_id')->unsigned();
            $table->foreign('size_id')->references('id')->on('size')->onUpdate('cascade');
            $table->integer('nhacungcap_id')->unsigned();
            $table->foreign('nhacungcap_id')->references('id')->on('nhacungcap')->onUpdate('cascade');
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
        Schema::drop('lohang');
    }
}

