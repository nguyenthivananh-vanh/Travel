<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monan', function (Blueprint $table) {
            $table->id();
            $table->String('TenMonAn');
            $table->String('MoTa');
            $table->String('HinhAnh');
            $table->integer('TrangThai');
            $table->integer('idDiaDiem')->unsigned();
            $table->String('tacgia');
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
        Schema::dropIfExists('monan');
    }
}
