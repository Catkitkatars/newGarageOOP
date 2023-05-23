-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Май 23 2023 г., 18:25
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
-- Структура таблицы `GarageWithMoto`
--

CREATE TABLE `GarageWithMoto` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `model` varchar(300) NOT NULL,
  `volume` int(11) NOT NULL,
  `speed` float NOT NULL,
  `type` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `GarageWithMoto`
--

INSERT INTO `GarageWithMoto` (`id`, `name`, `model`, `volume`, `speed`, `type`) VALUES
(2, 'Kawasaki', 'Ninja', 1000, 250, 'Sport'),
(3, 'KTM', 'XC-W', 500, 150, 'Cross-country'),
(4, 'Vespa', 'Elettrica', 0, 45, 'Electro');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `GarageWithMoto`
--
ALTER TABLE `GarageWithMoto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `GarageWithMoto`
--
ALTER TABLE `GarageWithMoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
