<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loggers extends Model
{
      public $id; // Номер в базе
      public $Name; // Имя файла
      public $TypeImage; // Тип файла
      public $Date; // Дата добовления на ссайт
      public $DirName; // её путь
      
}
