-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Май 26 2023 г., 18:20
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
-- Структура таблицы `MainBanner`
--

CREATE TABLE `MainBanner` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `url` varchar(300) NOT NULL,
  `show_counter` int(11) NOT NULL,
  `сurrentDate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `MainBanner`
--

INSERT INTO `MainBanner` (`id`, `name`, `url`, `show_counter`, `сurrentDate`) VALUES
(1, 'cat', '../img/cat.png', 10, 27),
(3, 'dog', '../img/dog.png', 5, 27);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `MainBanner`
--
ALTER TABLE `MainBanner`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `MainBanner`
--
ALTER TABLE `MainBanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
