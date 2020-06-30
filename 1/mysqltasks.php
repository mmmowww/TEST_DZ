<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>
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
                        <li><a href="phptasks.php">Задание по PHP</a></li>
                        <li class="active"><a href="mysqltasks.php">Задание по MySQL</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>

        <div class="container">

            <div class="starter-template">
                <h1>Практическое задание по mysql</h1>
                <p>Напишите запросы в блоке "Результаты", реализующие указанные задачи, для подключения к БД используйте реквизиты "localhost", "root", "", "basicdecor"</p>
                <ol>
                    <li>Выведите не заблокированных пользователей</li>
                    <li>Выведите итоговую сумму по всем заказам существующих пользователей</li>
                    <li>Выведите ФИО пользователя, совершившего заказ с наименьшей суммой</li>
                    <li>По какому полю будет проводится группировка в нижеследующем запросе? Почему?
                        <pre>
                            <code class="sql">
SELECT
    IF(ISNULL(prod.fabricSKU), TRIM(prod.product_code), TRIM(prod.fabricSKU)) AS fabricSKU,
FROM
    SS_products AS prod
GROUP BY fabricSKU
                            </code>
                        </pre>
                    </li>
                    <li>Выведите номера заказов, в которых поле sum не соответсвует сумме из поля products (В поле цена указана за продуктовую единицу), и ФИО пользователей</li>
                    <li>Предложите варианты нормализации БД</li>
                </ol>
                <h3>Результаты:</h3>
                <ol>
                    <li>1) По идеи так правельно но меня раздражают поля NULL (Не хателось бы парсить на клиенте результат выборки)</li>
                    <li>SELECT * FROM `customers`LEFT JOIN `customers_blacklist` ON ( customers.id = customers_blacklist.id_customer) GROUP BY customers.name </li>
                    <li>2)Как мне показалось запрос весьма странный</li>
                    <li>SELECT sum(sum) FROM `orders` WHERE 1 </li>
                    <li>3)Долго бился, по логике правельно но компиляр ругаеться</li>
                    <li>SELECT MIN(orders.sum) AS MyKey FROM `customers`,`orders` WHERE MyKey = orders.sum;</li>
                    <li>4)Нарботал со столь сложными командами, шерстя документацию могу предположить следующее</li>
                    <li>Если заказ не НУЛЛ, то чиститься поля, вслучае успеха, выводиться все столбцы которые прошли чистку.</li>
                    <li>5) Таблицы Product нет...</li>
                    <li>6)Нармализация</li>
                    <li>6.1)Customers.name я бы предложил добавить customers.subname, custumer.fathername и раскидать имена</li>
                    <li>6.2)не помешалибы ключи внешние между таблицами</li>
                    <li>6.3)orders.product я бы хранил или в JSON или в тексте который можно спарсить в JSON так как предпологаю что на клиенте парсить то что он заказал крайне трудно</li>
                    <li>6.4)customer_blacklist туда бы я добавил имя, как лишние поле для перепроверки.</li>
                    <li>6.5)Role избыточна, для запросов не потребовалсь можно убрать. Однако если нужно другим разработчикам то я бы оставил но изменил, вместо тексто были бы намера которые ссылались бы на другую таблицу что избежать ошибок как орфаграфических так и логических при заполнении этого поля</li>
                    <li>6.6) Возможно дабавил бы дату к customers не уверен нужно ли, но мне кажеться задавать вопрос с каких тот или иной клиент был активен а когда попал в Бан иногда нужно...</li>
                    

                </ol>
            </div>

        </div><!-- /.container -->

    </body>
</html>
<?php
/*
SELECT * FROM `customers`,`customers_blacklist` WHERE customers.name = customers_blacklist.id_customer AND customers_blacklist.id_customer = customers.id 
*/

