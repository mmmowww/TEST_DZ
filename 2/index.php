<?php
/*
Задание 1
Создать калькулятор плюс и минус 
calc(2).plus(2).minus(3).res() // 1

Задание 2
Создать библиотеку книг, в которой можно найти книгу 
по названию и автору. Книги могут быть написаны в соавторстве.
В базе не должно быть дубляжа имён авторов. (Нормализованная БД)

Задание 3
Создать кастомный чекбокс средствами HTML+CSS без JS !
*/
trait TwoNumero{
public function Sum2Numero(){
		if($this->Num1 != NULL OR $this->Num2 != NULL){
			$this->Resault = $this->Num1 + $this->Num2;
		}
		return $this;
	}
	public function Division2Numero(){
		if($this->Num1 != NULL OR $this->Num2 != NULL){
			$this->Resault = $this->Num1 / $this->Num2;
		}
		return $this;
	}
	public function Subtraction2Numero(){
		if($this->Num1 != NULL OR $this->Num2 != NULL){
			$this->Resault = $this->Num1 - $this->Num2;
		}
		return $this;
	}
	public function Multiplication2Numero(){
		if($this->Num1 != NULL OR $this->Num2 != NULL){
			$this->Resault = $this->Num1 * $this->Num2;
		}
		return $this;
	}
}
class MyCalc 
{	
	use  TwoNumero;
	private $Num1 = NULL;
	private $Num2 = NULL;
	private $Resault;
	public function SetNumeroOne($var){
		$this->Num1 = $var;
		return $this;
	}
	public function SetNumeroTwo($var){
		$this->Num2 = $var;
		return $this;
	}
	
	
	public function Sum(int $var){
		if($this->Resault != NULL){
			$this->Resault  = $this->Resault + $var;
		}
		return $this;
	}
	public function Division(int $var){
		if($this->Resault != NULL){
			$this->Resault= $this->Resault / $var;
		}
		return $this;
	}
	public function Subtraction(int $var){
		if($this->Resault != NULL){
			$this->Resault = $this->Resault - $var;
		}
		return $this;
	}
	public function Multiplication(int $var){
		if($this->Resault != NULL){
			$this->Resault = $this->Resault * $var;
		}
		return $this;
	}
	public function result(){
		if($this->Resault != NULL){
			echo $this->Resault;
			return $this;
			
		}else{
			echo "EROR!";
			return NULL;
		}
	}
};
$TEST = new MyCalc();
$TEST->SetNumeroOne(100)->SetNumeroTwo(100);
$TEST->Sum2Numero()->Sum(50)->Division(25);
$TEST->result();

/*

Эм вкратце я бы делил книги с авторами где он один и где их много, да понимаю что в неком идеале можно и даже надо сделать таблицы для окружения (Список авторов, список книг) И уже инсерить их. 
Неспорю, можно но мне кажеться это излишне. Хотя чуть позже пример сделаю
Среди авторов можно искать так 


Вориант 2 
CREATE TABLE `test`.`library2` ( `id` INT NOT NULL AUTO_INCREMENT , `NameBook` varchar(100) NOT NULL UNIQUE , `NameAftor` varchar(100) NOT NULL UNIQUE, `NamesAftors` varchar(100) NOT NULL UNIQUE , PRIMARY KEY (`id`)) ENGINE = MyISAM 
INSERT INTO `library` (`id`, `NameBook`, `NameAftor`, `NamesAftors`) VALUES (NULL, 'Преступление и наказание', 'Достоевский', ''), (NULL, 'Краткая история всего', '', 'Эйнштейн,Перельман,Хокинг');
////
Запрос 
SELECT * FROM library2 WHERE `NameAftor` LIKE '%Д%' 
*/
echo '
<style>
input:checked { 
width: 40px; 
height: 40px; 
transition: .50s; 
}
input:not(:checked) { 
transition: .5s; 
}
</style>




<form>
		<input type = "radio"  name = "first" checked>Кликни на меня!!!<br> 
		<input type = "radio"  name = "first">Кликни на меня!!!<br>
		
		<input type = "checkbox">Я тоже хочу что бы на меня кликнули!!
		<input type = "checkbox" checked>Я тоже хочу что бы на меня кликнули!!
	</form>


';