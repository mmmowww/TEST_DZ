<?php
     /**
     *@var $Record - Глобальная ключ переменная для записи 
     *@var RecordOldImage- Массив для проверки есть ли такая запись
     *@var $PathNewImage - Путь к папке с оригинальными картинками
     *@var $PathHandleImage - Путь к отработаными изоображениям
     *@var $type - Храниться тип изображения (BMP/JPEG(1,2))
     *@var $tmp_name - Место временогохранилища
     *@var $name - имя файла
     *@var Image (ImageMagik) для работы и изображениями
     *@var $img сама картинка только что загруженная
     *@var DB - используеться для логирования
     *@var $ar - Мелкая переменная для записи в бд

     

     */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Imagick;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
class Upload extends Controller
{
public function UP(){
   	$Record = TRUE; // Тру если есть запись
   	if(!empty($_FILES['userfile'])){
   		$RecordOldImage=DB::select("SELECT * FROM `logers` 
   			WHERE Name ="$_FILES['userfile']['name']" ");
   		if($RecordOldImage['Name'] == $_FILES['userfile']['name'];
   			$Record = FALSE;
   	}
   	
   	if($Record != TRUE){// Если  записи в БД нет
   	 $PathNewImage = __DIR__.'/../../../public/img'; // Путь к оригинальным картинкам
     $PathHandleImage = __DIR__.'/../../../public/imgHandle'; // Путь к обработанным картинкам
  		if(!empty($_FILES['userfile']['name'])){ // Если фаил загружен
            $type = $_FILES['userfile']['type']; // Узнаём тип файла
          		if($type == "image/jpeg"){ //JPEG
            	$type = 1; // JPEG это 1
               $tmp_name = $_FILES["userfile"]["tmp_name"];
           	   $name = $_FILES['userfile']['name']; // Имя файла
             	move_uploaded_file($_FILES['userfile']['tmp_name'], $PathNewImage."\img".$name); 
            $img = Image::make(__DIR__.'/../../../public/img/'."img".$name);
            $img->resize(125,125);
            $img->save(__DIR__.'/../../../public/imgHandle/'.$name);
            /*Изменили размер, нужно записать в БД*/

 

DB::insert("INSERT INTO `logers` 
	      (`id`, `Name`, `TypeImage`, `Date`, `DirNameOrigin`, `DirNameHandel`) 
	      VALUES 
	      (NULL, ".$name.", ".$type.", '".time()."', '1', '1');");
 
$ar = array({
	'handel'=>$PathHandleImage,
});
$ar = json_encode($ar);

DB::insert('INSERT INTO `pathimagehandel` 
	(`id`, `DirNameHandel`) 
	VALUES 
	(NULL, '.$ar.'));');
$ar = NULL; // Очистка переменной 
$ar = array({
	'original'=>$PathNewImage,
});
$ar = json_encode($ar);

DB::insert('INSERT INTO `pathimageorig` 
	(`id`, `DirNameOrigin`) 
	VALUES 
	(NULL, '.$ar.');');

                       
                    
                   
           
            if($type == "image/bmp"){  // BMP
               
               //Логирование
               /*
               $Log = new LoggerIMG();
                */
               $name = $_FILES["userfile"]["name"];
               $name =  str_replace(".png", ".jpeg", $name); // Изменяем имя
               $type = $_FILES['userfile']['type'];
               $type =  str_replace(".png", ".jpeg", $type); // Изменяем формат
               $_FILES['userfiles']['type'] = $type;

               $tmp_name = $_FILES["userfile"]["tmp_name"];
               $name = $_FILES["userfile"]["name"];
               $name = $_FILES['userfile']['name'];
               move_uploaded_file($_FILES['userfile']['tmp_name'], $PathNewImage."\img".$name);
                    
                    /*Логирование*/
DB::insert("INSERT INTO `logers` 
	(`id`, `Name`, `TypeImage`, `Date`, `DirNameOrigin`, `DirNameHandel`)
	 VALUES 
	 (NULL, ".$name.", ".$type.", '".time()."', '1', '1');");
DB::insert('INSERT INTO `pathimagehandel` 
	(`id`, `DirNameHandel`) 
	VALUES 
	(NULL, '.$ar.'));');
$ar = NULL; // Очистка переменной 
$ar = array({
	'original'=>$PathNewImage,
});
                 }

            }

        }
		
    }else{
    	echo "</br>Такой фаил есть на ссайте</br>";
          }
    return view('file');	
       }
    };

