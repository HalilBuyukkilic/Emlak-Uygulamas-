<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIlanResimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ilan_resim', function (Blueprint $table) {
            $table->id();
            $table->string('resim')->nullable();
            $table->string('meta')->nullable();
            $table->unsignedBigInteger('ilan_id');
            $table->foreign('ilan_id')
                ->references('id')
                ->on('ilan')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ilan_resim');
    }
}
