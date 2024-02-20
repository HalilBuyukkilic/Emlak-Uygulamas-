<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIlanKategoriSorularTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_sorular', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->foreign('kategori_id')
                ->references('id')
                ->on('kategori')
                ->onDelete('cascade');
            $table->text('json');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_sorular');
    }
}
