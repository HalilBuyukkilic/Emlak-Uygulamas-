<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyarlarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayarlar', function (Blueprint $table) {
            $table->id();
            $table->string('baslik')->nullable();
            $table->text('meta')->nullable();
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedn')->nullable();
            $table->text('pinterest')->nullable();
            $table->text('telefon')->nullable();
            $table->text('adres')->nullable();
            $table->string('email')->nullable();
            $table->double('lat')->nullable();
            $table->double('long')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ayarlar');
    }
}
