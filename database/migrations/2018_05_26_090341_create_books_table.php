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
            $table->increments('id');
            $table->string('name',50);
            $table->string('author',50);
            $table->integer('genre');
            $table->foreign('genre')->references('id')->on('genres');
            $table->integer('year');
            $table->integer('owner');
            $table->foreign('owner')->references('id')->on('users');
            $table->string('description',1000);
            $table->decimal('price', 5, 2);
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
