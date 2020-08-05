<?
//TODO :https://bootstraptema.ru/stuff/snippets_bootstrap/charts/grafik_neskolko_osej/35-1-0-1741
//TODO: Дописать графики
// https://html5css.ru/edithtm/index.php
/*Я пытался сделать нормально по бутстрапу, но там почему-то не работало окно поиска и не подключался JS */

echo
'<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2016/bdt/style.css" />
<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2016/bdt/jquery.bdt.min.css" />
<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script src="https://bootstraptema.ru/plugins/2015/b-v3-3-6/bootstrap.min.js"></script>
<script src="https://bootstraptema.ru/plugins/2016/bdt/jquery.sortelements.js" type="text/javascript"></script>
<script src="https://bootstraptema.ru/plugins/2016/bdt/jquery.bdt.min.js" type="text/javascript">';
if(empty($ANSWER)){
	echo "Нет таблицы";
	var_dump($ANSWER);
}
if(!empty($ANSWER)){
	echo "</br>(";

echo '<script type="text/javascript">';

   echo ' var obj = ' .json_encode($ANSWER);

echo '</script>';

	echo '<div class = "TABLE">';
	echo '<input class="form-control" id="myInput" type="text" placeholder="Search..">';
	echo '
	<table id="dtBasicExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Таблица
      </th>
      <th class="th-sm">Валюта
      </th>
      <th class="th-sm">Дата
      </th>
      <th class="th-sm">Значение
      </th>

    </tr>
  </thead>
      <tbody id="myTable">';
	foreach ($ANSWER as $key => $value) {


		if(count($value["TableValue"])==1){ // Если запись 1 то рендорим
    echo '<tr>';
    echo '  <td>'.$value['TableName'].'</td>';
    echo '  <td>'.substr($value['TableName'],-3).'</td>';
    echo '  <td>'.$value["TableValue"][0]['Date'].'</td>';
    echo '  <td>'.$value["TableValue"][0]["Value"].'</td>';
    echo '</tr>';
		}else{ // Если их больше 1 то рендорим
			$valueAllTables = $value["TableValue"];
			foreach ($valueAllTables as $key => $Value) {
				echo '<tr>';
    			echo '  <td>'.$value['TableName'].'</td>';
    			echo '  <td>'.substr($value['TableName'],-3).'</td>';
    			echo '  <td>'.$Value['Date'].'</td>';
    			echo '  <td>'.$Value["Value"].'</td>';
    			echo '</tr>';
			}

		};


	}


echo ' </tbody>
</table>';
echo '</div>';
}
// \|/ - Скрипт что бы всё заработало
echo '
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>';

$string = file_get_contents(__DIR__."\LOG\LOG.json");
file_put_contents(__DIR__."\LOG\LOG.json", json_encode($ANSWER));
$json_a = json_decode($string, true);
echo '<p><a href="currency/getlog" download>Скачать LOG фаил</a>';
