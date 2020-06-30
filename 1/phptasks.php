<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"> 
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
        <style>
            body{
                padding-top: 50px;
            }
            .starter-template {
                padding: 40px 0;
            }
        </style>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/candidate/index.php">Практическое задание для кандидатов</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="phptasks.php">Задание по PHP</a></li>
                        <li><a href="mysqltasks.php">Задание по MySQL</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>

        <div class="container">

            <div class="starter-template">
                <h1>Практическое задание по php</h1>
                <h3>1. Работа со строками:</h3>
                <p>Выведите на экран ниже приведенную строку, заменив в ней весь текст в верхний регистр, после второго вхождения символов "от":<br/><br/>
                <i>Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).</i>
                    <?php
                    //Start
                        $x = 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).</br>';
                    //Finish
                    /*
                    1)Как я понял нужно "Поднять весь тект в верхний регистр"
                    2) Но не допонимание вызывает это "после второго вхождения символов "от":"
                    2.1) Как я понял две буквы "ОТ" не трогать.
                    2.2) Надеюсь я прав.
                    */
                    $UpText = mb_strtoupper($x);
                    $Answer = str_replace('ОТ','от',$UpText);
                    /*// Для прочтения раскаментируйте
                    var_dump($Answer);
                    */
                    ?>
                </p>
                
                <h3>2. Работа с массивами:</h3>
                <p>Написать функцию которая из этого массива
                	<pre>
	$data1 = [
	        'parent.child.field' => 1,
	        'parent.child.field2' => 2,
	        'parent2.child.name' => 'test',
	        'parent2.child2.name' => 'test',
	        'parent2.child2.position' => 10,
	        'parent3.child3.position' => 10
	    ];
                	</pre>
                	сделает такой и наоборот
                	<pre>
	$data = [
	        'parent' => [
	            'child' => [
	                'field' => 1,
	                'field2' => 2,
	            ]
	        ],
	        'parent2' => [
	            'child' => [
	                'name' => 'test'
	            ],
	            'child2' => [
	                'name' => 'test',
	                'position' => 10
	            ]
	        ],
	        'parent3' => [
	            'child3' => [
	                'position' => 10
	            ]
	        ]
	    ];
                	</pre>
                </p>
            </div>

        </div><!-- /.container -->
<?php // Array
/*
Решение не моё,
мною была сделана "Красота"
*/
$F;
var_dump("(((".$F."))");
final  class ArrayWorker{
    private $data = NULL;
   
    public  function SetData($var){
        $this->data = $var;
        return $this;
    }
    public  function GetData(){
        if ($this->data == NULL){
            echo "EROR Переменная пустая";
        }else{
            return $this->data;
        }
    }
    public  function getTree(){
        $this->GetData();
    $result = [];
 
    foreach($this->data as $k => $v)
    {
        $k = explode('.', $k);
        $result[$k[0]][$k[1]][$k[2]] = $v;
    }
    $this->data = $result;
    return $result;

    }
    public  function getStrings(){
        $this->GetData();
    $result = [];
 
    foreach($this->data as $k1 => $v1)
        foreach($v1 as $k2 => $v2)
            foreach($v2 as $k3 => $v3)
                $result["{$k1}.{$k2}.{$k3}"] = $v3;
    $this->data = $result;
    return $result;
    }
};

$data1 = [
            'parent.child.field' => 1,
            'parent.child.field2' => 2,
            'parent2.child.name' => 'test',
            'parent2.child2.name' => 'test',
            'parent2.child2.position' => 10,
            'parent3.child3.position' => 10
        ];
        

$data = [
    'parent.child.field' => 1,
    'parent.child.field2' => 2,
    'parent2.child.name' => 'test',
    'parent2.child2.name' => 'test',
    'parent2.child2.position' => 10,
    'parent3.child3.position' => 10,
];

$Work = new ArrayWorker();
$tree = $Work->SetData($data)->getTree();
$string = $Work->SetData($tree)->getStrings();
var_dump($string); // Вывод переменной
var_dump($tree); // Вывод переменной
?>
    </body>
</html>




