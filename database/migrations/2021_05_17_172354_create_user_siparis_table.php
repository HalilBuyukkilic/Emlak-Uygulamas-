<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSiparisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_siparis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tutar');
            $table->string('net_tutar');
            $table->string('odeme_tipi');
            $table->string('son_dort_hane');
            $table->string('banka');
            $table->string('siparis_no');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');
//İLAN DURUMLARI
            $table->boolean('ilan_mi')->default(0);
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
        Schema::dropIfExists('user_siparis');
    }
}
