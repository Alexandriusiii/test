-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 09 2022 г., 06:49
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phpcrud`
--

-- --------------------------------------------------------

--
-- Структура таблицы `completed_tasks`
--

CREATE TABLE `completed_tasks` (
  `id` int(11) NOT NULL,
  `TaskName` varchar(200) NOT NULL,
  `TaskDesc` varchar(500) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `completed_tasks`
--

INSERT INTO `completed_tasks` (`id`, `TaskName`, `TaskDesc`, `CreationDate`) VALUES
(5, 'Ноксирон', '', '2022-09-30 12:30:43');

-- --------------------------------------------------------

--
-- Структура таблицы `tblusers`
--

CREATE TABLE `tblusers` (
  `ID` int(10) NOT NULL,
  `TaskName` varchar(200) DEFAULT NULL,
  `TaskDesc` varchar(200) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tblusers`
--

INSERT INTO `tblusers` (`ID`, `TaskName`, `TaskDesc`, `status`, `CreationDate`) VALUES
(94, 'Кол-во выполненых задач в день', '', 0, '2022-10-06 15:35:04'),
(96, '  Настроить ГИТ', '', 1, '2022-10-09 02:22:05'),
(102, 'delett task description', NULL, 1, '2022-10-09 02:22:16'),
(103, 'Выровнять input + button', NULL, 1, '2022-10-09 04:08:49'),
(104, 'Увелить шрифт задач', NULL, 1, '2022-10-09 04:08:39'),
(105, 'Изменить цвет строк', NULL, 1, '2022-10-09 04:30:36'),
(106, 'Скачать бд', NULL, 0, '2022-10-09 04:46:06');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `completed_tasks`
--
ALTER TABLE `completed_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `completed_tasks`
--
ALTER TABLE `completed_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
