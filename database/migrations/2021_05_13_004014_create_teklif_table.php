<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeklifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teklif', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('teklif')->nullable();
            $table->string('sure', 10)->nullable();
            $table->unsignedBigInteger('hizmet_id')->nullable();
            $table->foreign('hizmet_id')
                ->references('id')
                ->on('hizmet')
                ->onDelete('cascade');
            $table->unsignedBigInteger('hizmet_veren_id')->nullable();
            $table->foreign('hizmet_veren_id')
                ->references('id')
                ->on('user')
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
        Schema::dropIfExists('teklif');
    }
}
