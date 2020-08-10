<?php
/*
 * todo: чистату сделал,
Протестить всё на Опене,
выложить и задебажить
• документирование исходного кода (включая описание требований к среде исполнения, инструкции по развертыванию)

 */
namespace app\controllers;

use Yii;
use yii\web\Controller;

class CurrencyController extends Controller {
	public function actionGet() {
		$url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=02/03/2002';

		$ANSWER = file_get_contents($url);
		$ANSWER = simplexml_load_string($ANSWER);
		$ANSWER = json_encode($ANSWER);
		/*Получили JSON*/
		$ANSWER = json_decode($ANSWER, TRUE);
		/*Готовим к выбросу*/
		$ANSWER = $ANSWER["Valute"];
		/*После подготовки работаетм с ним*/

		foreach ($ANSWER as $value) {
			echo "</br>";
			var_dump($value);
			echo "</br>";
		};

		/////
		/*
		Yii::$app->db->createCommand()
		->insert('ValuteAUD', [
			'Date' => ,
			'Value' => ,
		])->execute();
		*/
		////
		return $this->render('answer');
	}
	public function actionParseryear() {
/*Автоматическое заполнение БД*/
/*Да да выборка по годам*/
/*Более сложную выборку вплоть до дня я не стал делать для простоты работы*/

		for ($i = 2000; $i <= date('Y'); $i++) {
			$url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=01/01/' . $i;
			/*Текущий год*/
			$ANSWER = file_get_contents($url);
			$ANSWER = simplexml_load_string($ANSWER);
			$ANSWER = json_encode($ANSWER);
			$ANSWER = json_decode($ANSWER, TRUE);
			$ANSWER = $ANSWER["Valute"];

			foreach ($ANSWER as $value) {
				$TABLEname = "Valute" . $value["CharCode"]; //Имя таблицы
				$Value = $value['Value']; //Текущее значение
				$Date = "1.1." . $i;
				/*Значения в текущем году*/

				echo "</br>Таблица : " . $TABLEname . "</br>";
				echo "</br>Значение : " . $Value . "</br>";
				echo "</br>Текущий год : " . $Date . "</br>";

				\Yii::$app->db->createCommand()
					->insert($TABLEname, [
						'Date' => '1.1.' . $i,
						'Value' => $Value,
					])->execute();
				$TABLEname = "";

			};
			echo "</br>++</br>";
		}

		return $this->render('answer');
	}
	public function actionParsermanual($Year, $Mounth, $Day) {
		// Доделать ручной парсер
		//parsermanual?Year=2010&Mounth=12&Day=12
		$url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . $Day . '/' . $Mounth . '/' . $Year . '';

		$ANSWER = file_get_contents($url);
		$ANSWER = simplexml_load_string($ANSWER);
		$ANSWER = json_encode($ANSWER);
		/*Получили JSON*/
		$ANSWER = json_decode($ANSWER, TRUE);
		/*Готовим к выбросу*/
		$ANSWER = $ANSWER["Valute"];
		echo '</br>' . count($ANSWER) . '</br>';
		var_dump($ANSWER);
		foreach ($ANSWER as $key => $value) {
			echo "</br>";
			var_dump($value);
			//TODO: Записывать и проверять есть ли запись

		}

		/*После подготовки работаетм с ним*/
		$Date = "1.1.3000";
		$Value = "19";
		$Count = (new \yii\db\Query())
			->select(['id', 'Date', 'Value'])
			->from('valuteats')
			->where(["Date" => $Date, "Value" => $Value])
			->limit(10)
			->all();
		if (empty($Count)) {
			echo "Not Varieble";
		}

		if ($ANSWER == NULL) {
			$ANSWER = "Ошибка команды";
		}

		return $this->render('answer', ["Count" => $Count]);
	}
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
	public function actionRendercharts() {

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

		return $this->render('rendertablecharts', ['ANSWER' => $ANSWER]);
	}
	public function actionGetlog() {
		$DIR = __DIR__ . '..\..\views\currency\LOG\LOG.json';
		//$DIR = scandir($DIR);
		return Yii::$app->response->sendFile($DIR, "LOG.json");

	}

};
