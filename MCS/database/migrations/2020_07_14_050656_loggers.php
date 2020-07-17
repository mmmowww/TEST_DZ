<?php
      /**
     * 
     *
     *@var Loger - Main таблица
     *@var (Поле)id - Номер записи
     *@var (Поле)Name - поле для имени файла
     *@var (Поле)TypeImage - Поле для хранения типа иззображения
     *@var (Поле)Date - Поле для хранения времени добовления на ссайт
     *** Тут я использую формат JSON не уверен что оптимально хранить в JSON
     *** Просто искать альтернативу и экспериментрровать времени нет
     *@var (Поле)DirNameOrigin - Поле для хранения оригинального пути
     *@var (Поле)DirNameHandel - Поле для хранения на изменённое изображение
     ****Внешние ключи
     *@var (Поле)Dir_Name_Origin - Внешний ключ таблице 'PathImage'
     *@var (Поле)Dir_Name_Handel - Внешний ключ таблице 'PathImage'
     */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Loggers extends Migration
{
    
    public function up()
    {
    Schema::create('Loggers', function (Blueprint $table) {
      $table->increments('id'); // Номер в базе
      $table->string('Name'); // Имя файла
      $table->integer('TypeImage'); // Тип файла
      $table->string('Date'); // Дата добовления на ссайт
      $table->integer('DirNameOrigin'); // её путь оригинала
      $table->integer('DirNameHandel'); // её путь оригинала
      //$table->foreign('Dir_Name_Origin')->references('id')->on('PathImage')->onDelete('cascade');
      //$table->foreign('Dir_Name_Handel')->references('id')->on('PathImage')->onDelete('cascade');
      });
    }

    
    public function down()
    {
        Schema::drop('Logger');
        $table->dropForeign('Dir_Name_Origin');
        $table->dropForeign('Dir_Name_Handel');
    }
}
/*Чуть чуть сжулничал в phpMyAdmin так и непонял как миграцию для такой доп настройки подготовить
1)ALTER TABLE `loggers` ADD INDEX( `TypeImage`, `DirNameOrigin`, `DirNameHandel`);
2)ALTER TABLE `loggers` ADD  FOREIGN KEY (`DirNameHandel`) REFERENCES `pathimagehandel`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
3)ALTER TABLE `loggers` ADD  FOREIGN KEY (`DirNameOrigin`) REFERENCES `pathimageorig`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;