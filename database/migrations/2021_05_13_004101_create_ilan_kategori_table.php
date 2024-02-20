<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIlanKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ilan_kategori', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('master_id')->nullable();
            $table->string('name', 99)->nullable();
            $table->string('slug', 99)->nullable();
            $table->text('meta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ilan_kategori');
    }
}
