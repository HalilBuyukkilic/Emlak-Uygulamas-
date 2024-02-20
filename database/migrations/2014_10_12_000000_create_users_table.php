<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('sirket')->nullable();
            $table->string('adres')->nullable();
            $table->string('tcno')->nullable();
            $table->string('telefon')->nullable();
            $table->text('bio')->nullable();
            $table->text('acikadres')->nullable();
            $table->string('email')->unique();
            $table->string('dogumyili')->nullable();
            $table->string('pp')->default('nopp.jpg');
            $table->string('rating')->default(0);
            $table->string('ratingcount')->default(0);
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->integer('bakiye')->default(0);
            $table->string('aktivasyon_anahtari')->nullable();
            $table->boolean('aktif_mi')->default(0);
            $table->boolean('hizmetveren')->default('0');
            $table->boolean('yonetici_mi')->default('0');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
