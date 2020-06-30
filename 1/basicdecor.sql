-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 30 2017 г., 13:23
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `basicdecor`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `role` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `name`, `role`) VALUES
(3, 'Иванов Андрей', 'Админ'),
(4, 'Ляпкин Денис', 'Пользователь'),
(5, 'Тряпкин Михаил Сергеевич', 'Пользователь ВИП'),
(6, 'Ольга', 'Пользователь'),
(7, 'Боярышникова Елена Сергеевна', 'Пользовател'),
(8, 'Динискин Владимир', 'Менеджер'),
(9, 'Викторов Виктор', 'Менеджер'),
(10, 'Суслина Екатерина Владимировна', 'Пользователь');

-- --------------------------------------------------------

--
-- Структура таблицы `customers_blacklist`
--

CREATE TABLE `customers_blacklist` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `customers_blacklist`
--

INSERT INTO `customers_blacklist` (`id`, `id_customer`, `date`) VALUES
(1, 6, '2017-05-01'),
(2, 9, '2017-03-24');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `products` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_customer`, `sum`, `products`) VALUES
(1, 1, 2000, 'Светильник:2шт:500руб;Бра:1шт:1000руб;'),
(2, 4, 10000, 'Спот:1шт:5000 руб;Подсветка:4 шт:1000 руб; подвес:1шт: 1000руб;'),
(3, 3, 100, 'Торшер:2шт.:1000руб;');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customers_blacklist`
--
ALTER TABLE `customers_blacklist`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `customers_blacklist`
--
ALTER TABLE `customers_blacklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
