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
        Schema::create('tbl_pinjam', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->date('tgl_pinjam');
            $table->date('tgl_batas');
            $table->date('tgl_kembali');
            $table->enum('status', [0, 1]);
            $table->string('nis', 10);
            $table->string('id_buku', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pinjam');
    }
};
