-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 23 2017 г., 12:16
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc_site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `short_content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `short_content`) VALUES
(1, 'Шпаргалка по SOLID-принципам с примерами на PHP', '2017-11-21 17:06:27', 'Тема SOLID-принципов и в целом чистоты кода не раз поднималась на Хабре и, возможно, уже порядком изъезженная. Но тем не менее, не так давно мне приходилось проходить собеседования в одну интересную IT-компанию, где меня попросили рассказать о принципах SOLID с примерами и ситуациями, когда я не соблюл эти принципы и к чему это привело. И в тот момент я понял, что на каком-то подсознательном уровне я понимаю эти принципы и даже могут назвать их все, но привести лаконичные и понятные примеры для меня стало проблемой. Поэтому я и решил для себя самого и для сообщества обобщить информацию по SOLID-принципам для ещё лучшего её понимания. Статья должна быть полезной, для людей только знакомящихся с SOLID-принципами, также, как и для людей «съевших собаку» на SOLID-принципах.'),
(2, 'Что же такое SOLID-принципы?', '2017-11-21 17:06:27', 'аббревиатура пяти основных принципов дизайна классов в объектно-ориентированном проектировании — Single responsibility, Open-closed, Liskov substitution, Interface segregation и Dependency inversion.\r\n\r\n\r\nТаким образом, мы имеем 5 принципов, которые и рассмотрим ниже:\r\nПринцип единственной ответственности (Single responsibility)\r\nПринцип открытости/закрытости (Open-closed)\r\nПринцип подстановки Барбары Лисков (Liskov substitution)\r\nПринцип разделения интерфейса (Interface segregation)\r\nПринцип инверсии зависимостей (Dependency Invertion)'),
(3, 'Принцип единственной ответственности (Single responsibility)', '2017-11-07 09:11:01', 'Итак, в качества примера возьмём довольно популярный и широкоиспользуемый пример — интернет-магазин с заказами, товарами и покупателями.\r\n\r\nПринцип единственной ответственности гласит — «На каждый объект должна быть возложена одна единственная обязанность». Т.е. другими словами — конкретный класс должен решать конкретную задачу — ни больше, ни меньше.\r\n\r\nРассмотрим следующее описание класса для представления заказа в интернет-магазине:'),
(4, 'К чему это может привести?', '2017-11-21 17:07:30', 'Приводит это к тому, что в случае, если мы хотим внести изменения в методы печати или работы хранилища, мы изменяем сам класс заказа, что может привести к его неработоспособности.\r\nРешить эту проблему стоит разделением данного класса на 3 отдельных класса, каждый из которых будет заниматься своей задачей\r\n\r\nclass Order\r\n{\r\n	public function calculateTotalSum(){/*...*/}\r\n	public function getItems(){/*...*/}\r\n	public function getItemCount(){/*...*/}\r\n	public function addItem($item){/*...*/}\r\n	public function deleteItem($item){/*...*/}\r\n}\r\n\r\nclass OrderRepository\r\n{\r\n	public function load($orderID){/*...*/}\r\n	public function save($order){/*...*/}\r\n	public function update($order){/*...*/}\r\n	public function delete($order){/*...*/}\r\n}\r\n\r\nclass OrderViewer\r\n{\r\n	public function printOrder($order){/*...*/}\r\n	public function showOrder($order){/*...*/}\r\n}');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
