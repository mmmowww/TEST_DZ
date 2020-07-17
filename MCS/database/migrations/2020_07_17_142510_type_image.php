<?php
   /**
     * 
     *
     *@var TypeImage - Таблица с типами изоображений
     *@var (Поле)id - Номер записи
     *@var (Поле)Type - Храниться тип изоображения
     
     */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TypeImage extends Migration
{
    
    public function up()
    {
      Schema::create('TypeImage', function (Blueprint $table) {
      $table->index('id'); 
      $table->text('Type'); 
       
      
      
    });
    }

    
    public function down()
    {
       Schema::drop('TypeImage'); 
    }
}
