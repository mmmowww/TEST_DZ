<?php

/**
 *Данный класс нужен для работы с итогом
 *А именно выгрузить все данные в таблицу,
 *И создать отсчёт
 *@var $ANSWER - Переменная для рендора на шаблоне ВИД
 *@var $TableName - Имена таблиц
 *@var $ANSWER_RESPONSE - Переменная для полной отдачи в шаблон вид
 *@var $Answer - мини ответ для цикла который готовит выгрузку
 *@var $Array - Переменная формат для выгрузки

 */
namespace app\controllers;

use Yii;
use yii\web\Controller;

class TableController extends Controller {
	public function actionRender() {

		/*Знаю, опасный метод, но другой вориант прохода по всем таблицам я не знаю*/
		$TableName = \Yii::$app->db->createCommand("SHOW TABLES")->queryAll();
		/*Удаляю из выборки таблицу "Миграции"*/
		/*!!Тут кажеться проблема с хешированием*/
		/*!!Логика работает, но код её описывающий нет*/
		$TableName = array_slice($TableName, 1);
		$ANSWER_RESPONSE = array();
		$ANSWER = array();
		foreach ($TableName as $key => $value) {
			// каждому имени таблицы подготовить выгрузку
			$Answer = (new \yii\db\Query())
				->select(['id', 'Date', 'Value'])
				->from($value["Tables_in_yii2basic"])
				->limit(1000)
				->all();

			$Array = [
				'TableName' => $value["Tables_in_yii2basic"],
				'TableValue' => $Answer,
			];

			$ANSWER_RESPONSE = array_push($ANSWER, $Array);

		}

		//$ANSWER = $TableName;

		return $this->render('rendertable', ['ANSWER' => $ANSWER]);
	}

	public function actionGetlog() {
		$DIR = __DIR__ . '..\..\views\currency\LOG\LOG.json';
		//$DIR = scandir($DIR);
		return Yii::$app->response->sendFile($DIR, "LOG.json");

	}

}
