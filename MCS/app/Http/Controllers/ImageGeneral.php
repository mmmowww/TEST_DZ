<?php
///TODO: После нашинковать абстракцию
// https://github.com/alexrepin/php-test-assignment-1/blob/master/README.md
namespace App\Http\Controllers;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Loggers;
use Imagick;
use Intervention\Image\ImageManagerStatic as Image;


class ImageGeneral extends Controller
{
    public function scan_dir(){
        /*Этот метод был тестовым палигоном*/
    	/*Пашет метод*/
      /*тут я подумал установить MagicImage как кансоль  */
      /*но потом передумал                        */
    	/*										                       */
    	/*Мой костыль из-за проблем с кодировкой \|/*/
    	$output = shell_exec('ipconfig');
    	$output2= iconv('CP866','utf-8',  $output);
    
		Image::configure(array('driver' => 'imagick'));
		/*
		Сколько же Мата было пока заставил это исправно работать
		1)То класс не определялся
		2)То композер работать не хотел
		3)То эту программу внести в ларовель нельзя
		*/
        $Log = new Loggers();
		// $img = Image::make(__DIR__.'\foo.jpg')->resize(200, 200)->save(__DIR__.'foo1.bmp');
         
         
         /*

         */

        
		 return "123";  //$img->response('jpg');

    	


    	
    	
    }
    public function upload(Request $request){
    	/*
		Маршрут типа POST: /api/v1/images/upload
		Принимает на вход изображения формата .jpg или .png
    	*/
		/*Шпаргалка работает Путь определяеться*/
		
        var_dump(scandir(__DIR__.'/../../../public/imgHandle')); // Путь к готовым картинкам
        var_dump(scandir(__DIR__.'/../../../public/img')); // Путь к оригинальным картинкам
       
        
        ///////Сколько же нервов это отняло даже imagemagik так сильно меня не трёс image/jpeg
        $PathNewImage = __DIR__.'/../../../public/img';
        $PathHandleImage = __DIR__.'/../../../public/imgHandle';
        if(!empty($_FILES['userfile']['name'])){ // Если фаил загружен
            echo "Загружен((</br>";
             var_dump($_FILES);
             echo "))</br>";
            $type = $_FILES['userfile']['type'];

            if($type == "image/jpeg"){ //JPEG
            echo "</br>Формат JPEG!</br>";
               //DB::insert("Comand");
        
                // Готовим выгрузку

            $tmp_name = $_FILES["userfile"]["tmp_name"];
            $name = $_FILES["userfile"]["name"];
            echo "</br> Куда загружен: ".$tmp_name."</br> Что загружино: ".$name."</br>";
            $dirUpload =  __DIR__.'/../../../public/img'; //Куда залить
            $name = $_FILES['userfile']['name']; // Имя файла
            /* Загрузили */
            move_uploaded_file($_FILES['userfile']['tmp_name'], $dirUpload."\img".$name); 
            /*Работа с изменением Widh + height*/
            

            $img = Image::make(__DIR__.'/../../../public/img/'."img".$name);
            $img->resize(125,125);
            $img->save(__DIR__.'/../../../public/imgHandle/'.$name);
            /*Изменили размер, нужно записать в БД*/
/*
 DB::insert("INSERT INTO `loggers` (`id`, `Name`, `TypeImage`, `Date`, `DirNameOrigin`, `DirNameHandel`, `created_at`, `updated_at`) VALUES (NULL, '12.jpg', 'image/jpeg', '21312312332423', '\"{\"handle\":\"D://Ospanel/DDS\"}\"', '\"{\"handle\":\"D://Ospanel/DDSf\"}\"', NULL, NULL);");
*/
                       
                    
                    /*
                    Если изображение имеет формат .jpg - кадрируем до размера в 125x125 пикселей
                    Если изображение имеет формат .png - сохраняем в формате .jpg
                    */
            $type = $_FILES['userfile']['type'];
            if($type == "image/bmp"){  // BMP
               echo "</br>Формат BMP!</br>";
               //Логирование
               /*
               $Log = new LoggerIMG();
                */
               $name = $_FILES["userfile"]["name"];
               $name =  str_replace(".png", ".jpeg", $name); // Изменяем имя
               $type = $_FILES['userfile']['type'];
               $type =  str_replace(".png", ".jpeg", $type); // Изменяем формат
               $_FILES['userfiles']['type'] = $type;
                        /*
                        */
               $tmp_name = $_FILES["userfile"]["tmp_name"];
               $name = $_FILES["userfile"]["name"];
               echo "</br> Куда загружен: ".$tmp_name."</br> Что загружино: ".$name."</br>";
               $dirUpload =  __DIR__.'/../../../public/img'; //Куда залить
               $name = $_FILES['userfile']['name'];
               move_uploaded_file($_FILES['userfile']['tmp_name'], $dirUpload."\img".$name);
                    
                    }
                    
                   // 
                    // 
          echo '('.$type.")";
          $Answer=md5(rand().time()); // Генерация имени 
          echo '</br> Числецо : '.$Answer."</br>";

                    echo '</br> Unix времечко : '.$name."</br>";
                    //
                
            }

        }
		return view('file');
    }
    
    public function aboutall(){
    /*Выгружаем все, как мне и кажеться это опасно для БД ведьзаписей может быть и несколько трилиардов. Но пока так*/	
    $ANSWER=DB::select('SELECT id,Name,TypeImage,Date,DirNameOrigin,DirNameHandel FROM `loggers`');
      /*

    Маршрут типа GET: /api/v1/images/
Отдает список всех изображений в указанном формате:
[
    {
        origin: <ссылка на изображение>
        handled: <ссылка на изображение>
        date: <timestamp файла на сервере>
    }
]





        */
return response()->json($ANSWER);
    }
    public function aboutone(Request $request){

      $url=$request->url();
      $str = explode('/', $url);
      $Name=$str[4];
      
      

    $ANSWER=DB::select('SELECT id,Name,TypeImage,Date,DirNameOrigin,DirNameHandel 
      FROM 
      `loggers`
      WHERE  id = "'.$Name.'"');

    /* 
    TODO:Неработает добить
 $ANSWER=DB::select('SELECT id,Name,TypeImage,Date,DirNameOrigin,DirNameHandel 
      FROM 
      `loggers`
      WHERE  Name = "'.$Name.'"');


    */
        /*Маршрут типа GET: /api/v1/images/
Отдает список всех изображений в указанном формате:
[
    {
        origin: <ссылка на изображение>
        handled: <ссылка на изображение>
        date: <timestamp файла на сервере>
    }
]*/
return response()->json($ANSWER);
    }
}
