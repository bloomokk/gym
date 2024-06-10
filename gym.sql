-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 10 2024 г., 13:44
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gym`
--

-- --------------------------------------------------------

--
-- Структура таблицы `price_trainer`
--

CREATE TABLE `price_trainer` (
  `id` int NOT NULL,
  `id_trainer` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `price_trainer`
--

INSERT INTO `price_trainer` (`id`, `id_trainer`, `price`) VALUES
(1, 6, 2200);

-- --------------------------------------------------------

--
-- Структура таблицы `record`
--

CREATE TABLE `record` (
  `id` int NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `busy` int NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `id_trainer` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `record`
--

INSERT INTO `record` (`id`, `time`, `date`, `busy`, `user_id`, `id_trainer`, `created_at`, `updated_at`) VALUES
(9, '18:00:00', '2024-06-01', 1, 6, 6, '2024-05-31 10:35:14', '2024-05-31 10:35:14'),
(10, '19:00:00', '2024-05-01', 0, NULL, 6, '2024-05-31 10:43:53', '2024-05-31 10:43:53'),
(11, '19:00:00', '2024-06-01', 0, NULL, 6, '2024-05-31 11:42:00', '2024-05-31 11:42:00'),
(12, '20:00:00', '2024-06-01', 0, NULL, 6, '2024-05-31 11:42:24', '2024-05-31 11:42:24');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews_coach`
--

CREATE TABLE `reviews_coach` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `text` varchar(255) NOT NULL,
  `id_trainer` int NOT NULL,
  `stars` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reviews_coach`
--

INSERT INTO `reviews_coach` (`id`, `user_id`, `text`, `id_trainer`, `stars`, `created_at`, `updated_at`) VALUES
(1, 6, ' 123', 6, 5, '2024-06-10 10:34:38', '2024-06-10 10:34:38'),
(2, 6, ' 123', 6, 5, '2024-06-10 10:35:08', '2024-06-10 10:35:08');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `photo`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, '1605170441_6032.jpg', 'Групповая тренировка (фитнес)', 2300, '2024-05-20 11:51:33', '2024-05-20 11:51:33');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `phone` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'user.png',
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `surname`, `middle_name`, `phone`, `password`, `birthday`, `avatar`, `address`, `created_at`, `updated_at`) VALUES
(6, 2, '123', '123', '123', 123, '123', '0213-03-12 00:00:00', '1605170441_6032.jpg', '123', '2024-05-16 14:04:41', '2024-05-16 14:04:41'),
(7, 2, '1234', '1234', '1234', 1234, '1234', '2024-05-20 16:14:36', '1605165532_8176.jpg', '1234', '2024-05-20 13:14:59', '2024-05-20 13:14:59'),
(9, 0, 'блум', 'блумов', 'блумович', 783658398, '123', '2006-07-16 00:00:00', '2405123403_6036.', '123', '2024-05-24 09:34:03', '2024-05-24 09:34:03'),
(10, 0, '123213', '1232', '123213', 12321, '123', '0321-03-12 00:00:00', '2405124515_72.', '1232142', '2024-05-24 09:45:15', '2024-05-24 09:45:15');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `price_trainer`
--
ALTER TABLE `price_trainer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews_coach`
--
ALTER TABLE `reviews_coach`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `price_trainer`
--
ALTER TABLE `price_trainer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `record`
--
ALTER TABLE `record`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `reviews_coach`
--
ALTER TABLE `reviews_coach`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
