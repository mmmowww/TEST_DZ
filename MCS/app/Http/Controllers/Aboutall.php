<?php
 /**  
     *Выгрузка всех записей из БД 
     *@var $Answer массив который преобразуеться в JSON при отображении
     

     */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Aboutall extends Controller
{	

public function ALL(){
	
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
    	 `typeimage`');
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
