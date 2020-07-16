<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Loggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('Loggers', function (Blueprint $table) {
      $table->increments('id'); // Номер в базе
      $table->string('Name'); // Имя файла
      $table->string('TypeImage'); // Тип файла
      $table->string('Date'); // Дата добовления на ссайт
      $table->json('DirNameOrigin'); // её путь оригинала
      $table->json('DirNameHandel'); // её путь оригинала
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
        Schema::drop('Logger');
    }
}
