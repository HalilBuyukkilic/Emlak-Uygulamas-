<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMesajTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_mesaj', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('mesaj_id');
            $table->text('mesaj')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');
            $table->foreign('mesaj_id')
                ->references('id')
                ->on('mesaj')
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
        Schema::dropIfExists('user_mesaj');
    }
}
