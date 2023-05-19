-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Май 19 2023 г., 14:01
-- Версия сервера: 5.7.34
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `first_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `GarageWithCars`
--

CREATE TABLE `GarageWithCars` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `model` varchar(300) NOT NULL,
  `engine` float NOT NULL,
  `horsepower` int(11) NOT NULL,
  `acceleration` float NOT NULL,
  `price` int(11) NOT NULL,
  `color` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `GarageWithCars`
--

INSERT INTO `GarageWithCars` (`id`, `name`, `model`, `engine`, `horsepower`, `acceleration`, `price`, `color`) VALUES
(4, 'Changan', 'X5', 3.5, 280, 6, 100000, 'Red'),
(7, 'Hyundai', 'Getz', 1.4, 97, 11.4, 450000, ''),
(10, 'Porshe', 'Panamera', 3.8, 400, 4.5, 12000000, 'gray');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `GarageWithCars`
--
ALTER TABLE `GarageWithCars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `GarageWithCars`
--
ALTER TABLE `GarageWithCars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
