<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ilan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //GENEL
            $table->string('slug')->nullable();
            $table->string('baslik')->nullable();
            $table->text('aciklama')->nullable();
            $table->integer('fiyat')->nullable();
            $table->integer('brut')->nullable();
            $table->integer('net')->nullable();
            $table->boolean('kredi')->nullable();
            $table->boolean('takas')->nullable();
            $table->string('il')->nullable();
            $table->string('ilce')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->boolean('onaylandi_mi')->nullable();
            $table->string('durum')->nullable();
            $table->text('text')->nullable();
            $table->unsignedBigInteger('ilan_kategori_id');
            $table->foreign('ilan_kategori_id')
                ->references('id')
                ->on('ilan_kategori')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');
            //REKLAM
            $table->boolean('acil_acil')->default(0);
            $table->boolean('one_cikanlar')->default(0);
            $table->boolean('kalin_baslik')->default(0);
            //KONUT
            $table->string('oda')->nullable();
            $table->string('yas')->nullable();
            $table->string('bulundugu_kat')->nullable();
            $table->string('kat_sayisi')->nullable();
            $table->string('banyo_sayisi')->nullable();
            $table->string('balkon')->nullable();
            $table->string('esyali')->nullable();
            $table->string('aidat')->nullable();
            $table->string('site')->nullable();
            //İŞYERİ-KONUT-ORTAK
            $table->string('isitma')->nullable();
            //İŞYERİ
            $table->string('acik_alan')->nullable();
            $table->string('isyeri_oda_sayisi')->nullable();
            $table->string('giris_yuksekligi')->nullable();
            //ARSA
            $table->integer('imar_durumu')->nullable();
            $table->string('ada_no')->nullable();
            $table->string('parsel_no')->nullable();
            $table->string('pafta_no')->nullable();
            $table->string('kaks')->nullable();
            $table->string('gabari')->nullable();
            $table->string('tapu_durumu')->nullable();
            $table->string('kat_karsiligi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ilan');
    }
}
