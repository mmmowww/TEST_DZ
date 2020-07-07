<?php 

/*Удалить класс 'navbar-inverse navbar-fixed-top navbar'*/
//TODO: Всё готово, осталось стили и работа с БД

echo '<script type = "text/javascript">
	var Width = document.body.clientWidth;
	var Height = document.body.clientHeight;
	console.log(Width,Height);
	if(Width <= 320){
		
	}




		</script>';

if ($ANSWER == NULL){
	echo '<script type = "text/javascript">
	console.log("Товара нет");
	</script>';
}else{
	
	foreach ($ANSWER as $key => $value) {
		/* Тут я получаю и рендорю каждый товар в отдельности
		И проявляю последнею логику при их рендоре.
		Например использование скидки и т.д.
		*/
		//echo '</br>';
		
		//echo $key;
		$ID = $value['id'];
		$Name = $value['NameProduct'];
		$Price = $value['Price'];
		$CountBox = $value['CountBox'];
		$CountPackage = $value['CountPackage'];
		$charge = $value['charge'];
		$Distance = $value['Distance'];
		$time = $value['time'];
		$Caliber = $value['Caliber'];
		$InStock = $value['InStock'];
		$Discount = $value['Discount'];
		//var_dump($value);
		/// Я подготовил их как глобальные переменные 
		// Ныне рендорю в некий скелет
		/// Возможно и подход не ахти но мне хотелось что бы было всё более менее читабельно.
		/// И да я понимаю что отхожу от ООП больше в функцыональщину.
		echo '<div class = "product" name = '.$ID.'>';
		echo '<div class = "NavBar">';
		echo '<div class = "New">Новинка</div>';
		echo '<div class = "Hit">Хит продаж</div>';
		echo '<div class = "Play">Плеер</div>';// Иконка красного плейра
		echo '</div>';
		
		$img = '<img href = "..."></img>';
		echo '<img width = "320px" height ="189.71px" src = "\img\atribute\Face.jpg"></img>';
		echo $img;
		echo '</img>';

		/////
		echo '<div class = "productName">';
		echo $Name;
		echo '</div>';
		echo '<div class = "ArticalAndCount">';
        echo '<div class = "productId">';
		echo $ID;
		echo '</div>';
		/////////
		echo '<div class = "productCount">';
		echo 'В наличии: '.$InStock;
		echo '</div></div>';

		echo '<div class = "productDestinct">';
		echo '</div>';


		echo '<div class = "productLittelMenu">';
		echo '<div class = "productDestinctLeft">'; 
		echo '<div class = "ImageBloc"><img width="30" height="20" src = "\img\atribute\Bomb.png"></img> '.$CountBox.'</div>';
		echo '<div class = "ImageBloc"><img width="30" height="20" src = "\img\atribute\Strela.png"></img> '.$Distance.'</div>';
		echo '</div>';
		echo '<div class = "productDestinctCentr">';
		echo '<div class = "ImageBloc"><img width="30" height="20" src = "\img\atribute\Baraban.png"></img> '.$Coliber.'</div>';
		echo '<div class = "ImageBloc"><img width="30" height="20" src = "\img\atribute\Box.png"></img> '.$CountBox.'</div>';
		echo'</div>';
		echo '<div class = "productDestinctRight">';
		echo '<div class = "ImageBloc"><img width="30" height="20" src = "\img\atribute\Clock.png"></img> '.$time.'</div>';
		echo '<div class = "ImageBloc">Минимальный заказ штука</div>';
		echo'</div>';

		echo '</div>';
		echo '<div class = "productDestinctTwo"></div>';
		//////////
		echo '<div class = "OR">';
		echo '</div>';
		echo '<div class = "PriceOne">';
		echo '<div>штука</div>';
		echo '<div>'.$Price.'</div>';
		echo'</div>';
		echo '<div class = "PricePackeje">';
		echo '<div>Упаковка</div>';
					$price = $Price*24;
		echo '<div>'.$price.'</div>';
		echo'</div>';
		echo '<div class = "PriceBox">';
		echo '<div>Коробка (30 упаковок)</div>';
					$price = $Price*24*30;
		echo '<div>'.$price.'</div>';
		echo'</div>';
		echo '<div class = "MyButton">';
		echo '<button class = "productButton">В корзину</button>';
		echo '</div>';
		echo '</div>';
		///////////
		


		
		
		
		
	};
	
}