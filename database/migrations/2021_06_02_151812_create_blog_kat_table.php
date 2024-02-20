<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogKatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_kat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_kategori_id')->nullable();
            $table->unsignedBigInteger('blog_id')->nullable();

            //foreign key tanımladık. Hangi kolon için tanımlayacağımızı aldık.s
            $table->foreign('blog_kategori_id')
                ->references('id')
                ->on('blog_kategori')
                ->onDelete('cascade');

            $table->foreign('blog_id')
                ->references('id')
                ->on('blog')
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
        Schema::dropIfExists('blog_kat');
    }
}
