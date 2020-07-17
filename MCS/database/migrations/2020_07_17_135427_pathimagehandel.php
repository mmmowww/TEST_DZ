<?php
     /**
     * 
     *
     *@var PathImage - Таблица с путями
     *@var (Поле)id - Номер записи
     *@var (Поле)DirNameOrigin - Оригинальный путь
     *@var (Поле)DirNameHandel - Изменённый путь
     *@var (Поле)Dir_Name_Origin - Внешний ключ таблице 'PathImage'
     *@var (Поле)Dir_Name_Handel - Внешний ключ таблице 'PathImage'
     */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PathImage extends Migration
{
    public function up()
    {
    Schema::create('pathimagehandel', function (Blueprint $table) {
      $table->index('id'); 
      $table->json('DirNameHandel'); 
      
      
    });
    }

    
    public function down()
    {
        Schema::drop('pathimagehandel');
        
    }
    }

