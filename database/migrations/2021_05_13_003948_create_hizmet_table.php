<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHizmetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hizmet', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->string('il')->nullable();
            $table->string('ilce')->nullable();
            $table->decimal('price', 16,2)->nullable();
            $table->text('text')->nullable();
            $table->boolean('reklam')->default(0);
            $table->boolean('alindi')->default(0);
            $table->boolean('onaylandi_mi')->default(0);
            $table->text('sorular')->nullable();
            $table->unsignedBigInteger('hizmet_veren_id')->nullable();
            $table->foreign('hizmet_veren_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');

            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')
                ->references('id')
                ->on('kategori')
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
        Schema::dropIfExists('hizmet');
    }
}
