<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('books_id');
            $table->int('views');
            $table->string('source_litres');
            $table->string('source_labirint');
            $table->string('source_chitai');
            $table->string('image');
            $table->string('name');
            $table->string('src');
            $table->string('annotation');
            $table->string('category');
            $table->string('publishing');
            $table->integer('year');
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
        Schema::dropIfExists('books');
    }
}
