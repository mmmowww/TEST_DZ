<?php

use yii\db\Migration;

/**
 * Class m200707_063657_product
 */
class m200707_063657_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        /*
        //// Да понимаю что нарушаю логику работы БД
        Но задача нормализации БД особо не стояла а стояла задача сделать верстку
        Я и посчитал что Можно и для простоты необхадимо сделать 1 таблицу
        И её дедосить запросами
        */
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            /////хорактеристики для торговли
            'NameProduct' => $this->string()->notNull(),
            'Price' => $this->float(32),
            'CountBox' => $this->integer(32), // Количество в коробке
            'CountPackage' => $this->integer(32), // Количество в покете
            ////// Хорактиристики канкретизации
            'charge' => $this->integer(), // Заряды
            'Distance' => $this->float(), // Растояние пролёта снаряда
            'time' => $this->float(), // Время горения
            'Caliber' => $this->integer(), // ЭМ, Колибор? Дюймы
            ///////////
            'InStock' => $this->integer(), /// В наличии
            'Discount' => $this->integer(32), 
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200707_063657_product cannot be reverted.\n";

        return false;
    }
    */
}
