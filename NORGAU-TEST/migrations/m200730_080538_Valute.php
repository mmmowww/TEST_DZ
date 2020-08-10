<?php
/****/
/*
Я понимаю что далжно быть +- так.
Я понимаю что мой подход 1 таблица = 1 валюта не рацыонален и опасен для стресс тестов
Я не ставил за сабою прохождение стресс тестов. Посему и позволил себе такую вольность
CREATE TABLE `yii2basic`.`valuregold` ( `id` INT NOT NULL AUTO_INCREMENT , `Date` INT NOT NULL , `Value` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
 ****
CREATE TABLE `yii2basic`.`valuregolddate` ( `id` INT NOT NULL AUTO_INCREMENT , `Date` INT NOT NULL , INDEX (`id`)) ENGINE = InnoDB;
 ****
CREATE TABLE `yii2basic`.`valuregoldvalue` ( `id` INT NOT NULL AUTO_INCREMENT , `VALUE` INT NOT NULL , INDEX (`id`)) ENGINE = InnoDB;

 *****Примы

CREATE TABLE `yii2basic`.`valuregolddate` ( `id` INT NOT NULL AUTO_INCREMENT , `Date` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `yii2basic`.`valuregoldvalue` ( `id` INT NOT NULL AUTO_INCREMENT , `VALUE` INT NOT NULL , INDEX (`id`)) ENGINE = InnoDB;

 */
use yii\db\Migration;

class m200730_080538_Valute extends Migration {

	public function safeUp() {
		$this->createTable('ValuteAUD', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('valuteBGN', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteAZN', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteAMD', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteGBP', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteBYR', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteDKK', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteUSD', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteEUR', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteISK', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteKZT', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteCAD', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteNOK', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteXDR', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteSGD', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteTRL', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteUAH', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteSEK', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteCHF', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteJPY', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteATS', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteBEF', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteIEP', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteESP', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteITL', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteDEM', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteNLG', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValutePTE', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteFIM', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteFRF', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
		$this->createTable('ValuteGRD', [

			'id' => $this->primaryKey(),
			'Date' => $this->string(), // Дата
			'Value' => $this->integer(), //Значение на текущий день

		]);
	}

	public function safeDown() {

		$this->dropTable('ValuteAUD');
		$this->dropTable('ValuteATS');
		$this->dropTable('ValuteGBP');
		$this->dropTable('ValuteBYR');
		$this->dropTable('ValuteBEF');
		$this->dropTable('ValuteGRD');
		$this->dropTable('ValuteDKK');
		$this->dropTable('ValuteUSD');
		$this->dropTable('ValuteEUR');
		$this->dropTable('ValuteIEP');
		$this->dropTable('ValuteISK');
		$this->dropTable('ValuteESP');
		$this->dropTable('ValuteITL');
		$this->dropTable('ValuteKZT');
		$this->dropTable('ValuteCAD');
		$this->dropTable('ValuteDEM');
		$this->dropTable('ValuteNLG');
		$this->dropTable('ValuteNOK');
		$this->dropTable('ValutePTE');
		$this->dropTable('ValuteXDR');
		$this->dropTable('ValuteSGD');
		$this->dropTable('ValuteTRL');
		$this->dropTable('ValuteUAH');
		$this->dropTable('ValuteFIM');
		$this->dropTable('ValuteFRF');
		$this->dropTable('ValuteSEK');
		$this->dropTable('ValuteCHF');
		$this->dropTable('ValuteJPY');

	}

}
