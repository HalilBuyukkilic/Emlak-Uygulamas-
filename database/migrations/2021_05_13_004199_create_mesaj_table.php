<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesajTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesaj', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('hizmet_veren_okundu')->default(0);
            $table->boolean('hizmet_alan_okundu')->default(0);
            $table->unsignedBigInteger('hizmet_veren_id')->nullable();
            $table->foreign('hizmet_veren_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');

            $table->unsignedBigInteger('hizmet_alan_id')->nullable();
            $table->foreign('hizmet_alan_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');

            $table->unsignedBigInteger('hizmet_id')->nullable();
            $table->foreign('hizmet_id')
                ->references('id')
                ->on('hizmet')
                ->onDelete('cascade');

            $table->unsignedBigInteger('ilan_id')->nullable();
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
        Schema::dropIfExists('mesaj');
    }
}
