<?php

/**
 *Данный класс нужен для работы с итогом
 *А именно выгрузить все данные в таблицу,
 *И создать отсчёт
 *@var $StartDate - переменная для начало отсчёта лет до 3000
 *@var $ANSWER - Переменная для рендора на шаблоне ВИД
 *@var $value - перемнная для цикла и записи в БД
 *@var $ANSWER_RESPONSE - Переменная для полной отдачи в шаблон вид
 *@var $Answer - мини ответ для цикла который готовит выгрузку
 *@var $Array - Переменная формат для выгрузки

 */
namespace app\controllers;

use yii\web\Controller;

class ParserController extends Controller {
	public function actionAvtoparser($StartDate) {
		/*Автоматическое заполнение БД*/
/*Да да выборка по годам*/
/*Более сложную выборку вплоть до дня я не стал делать для простоты работы*/
		try {
			for ($i = $StartDate; $i <= date('Y'); $i++) {
				$url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=01/01/' . $i;
				/*Текущий год*/
				$ANSWER = file_get_contents($url);
				$ANSWER = simplexml_load_string($ANSWER);
				$ANSWER = json_encode($ANSWER);
				$ANSWER = json_decode($ANSWER, true);
				$ANSWER = $ANSWER["Valute"];

				foreach ($ANSWER as $value) {
					$TABLEname = "Valute" . $value["CharCode"]; //Имя таблицы
					$Value = $value['Value']; //Текущее значение
					$Date = "1.1." . $i;
					/*Значения в текущем году*/

					\Yii::$app->db->createCommand()
						->insert($TABLEname, [
							'Date' => '1.1.' . $i,
							'Value' => $Value,
						])->execute();
					$TABLEname = "";

				};

			}
		} catch (Exception $e) {
			var_dump($e);
			die();
		};
		return $this->render('answer');
	}

	public function actionParsermanual($Year, $Mounth, $Day) {
		// Доделать ручной парсер
		//parsermanual?Year=2010&Mounth=12&Day=12
		try {
			$url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . $Day . '/' . $Mounth . '/' . $Year . '';

			$ANSWER = file_get_contents($url);
			$ANSWER = simplexml_load_string($ANSWER);
			$ANSWER = json_encode($ANSWER);
			/*Получили JSON*/
			$ANSWER = json_decode($ANSWER, true);
			/*Готовим к выбросу*/
			$ANSWER = $ANSWER["Valute"];

			foreach ($ANSWER as $key => $value) {

				//TODO: Записывать и проверять есть ли запись

				/*После подготовки работаетм с ним*/

				$Date = $Day . "." . $Mounth . "." . $Year;
				$NameTable = mb_strtolower('valute' . $value["CharCode"]);
				$IntValue = (int) $value["Value"];
				\Yii::$app->db->createCommand("INSERT INTO `" . $NameTable . "` (`id`, `Date`, `Value`) VALUES (NULL, '" . $Date . "', '" . $IntValue . "') ")->execute();
			}
			if (empty($Count)) {
				echo "Not Varieble";
			};

			if ($ANSWER == null) {
				$ANSWER = "Ошибка команды";
			};
		} catch (Exception $e) {

		}
		return $this->render('answer', ["Count" => $Count]);
	}
}
