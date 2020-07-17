<?php
 /**  
     *Выгрузка всех записей из БД 
     *@var $Answer массив который преобразуеться в JSON при отображении
     *@var $url получаю значение из перемнной
     *@var $str обрезанный массив
     *@var $NAME переменная с значением
     

     */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Aboutone extends Controller
{
    public function ONE(){
      $url=$request->url();
      $str = explode('/', $url);
      $NAME=$str[4];
	$ANSWER = NULL;
	try{ // Ну не доверяю я этому
    $ANSWER=DB::select('SELECT 
    	loggers.id,
    	loggers.Name,
    	loggers.TypeImage,
    	loggers.Date,
    	loggers.DirNameOrigin,
    	loggers.DirNameHandel,
    	pathimagehandel.id,
    	pathimagehandel.DirNameHandel,
    	pathimageorig.id,
    	pathimageorig.DirNameOrigin,
    	typeimage.id,
    	typeimage.Type, 
    	FROM
    	 `loggers`,
    	 `pathimagehandel`,
    	 `pathimageorig`,
    	 `typeimage`
    	 WHERE 
    	 loggers.Name='.$NAME.'');
    catch(Exception $e){
    	$ANSWER = $e;
    }finally{
    	if($ANSWER != NULL){
    		/*Можно записать жалобу на программиста в лог*/
    	}
    }
    return response()->json($ANSWER);
    }
}
