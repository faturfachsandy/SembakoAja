<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAksiBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aksi_barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('barang_id')->unsigned();
            $table->date('tanggal');
            $table->integer('sum_stok');
            $table->enum('status',['masuk','keluar']);
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('barang_id')->references('id')->on('barangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aksi_barangs');
    }
}
