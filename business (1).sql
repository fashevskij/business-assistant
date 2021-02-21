-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 09 2020 г., 08:39
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `business`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Добавлено',
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `status`, `title`) VALUES
(0, 'Удалено', 'Не выбрано'),
(1, 'Добавлено', 'Еда и рестораны'),
(2, 'Добавлено', 'Развлечения'),
(3, 'Добавлено', 'Красота и SPA'),
(4, 'Добавлено', 'Спорт и фитнес'),
(5, 'Добавлено', 'Обучение'),
(6, 'Добавлено', 'Текстиль'),
(7, 'Добавлено', 'Услуги'),
(8, 'Добавлено', 'Здоровье'),
(11, 'Добавлено', 'Другое'),
(13, 'Удалено', 'test');

-- --------------------------------------------------------

--
-- Структура таблицы `consult`
--

CREATE TABLE `consult` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `user_b_id` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `processed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `consult`
--

INSERT INTO `consult` (`id`, `user_id`, `user_b_id`, `message`, `date_time`, `processed`) VALUES
(7, '', '2', 'Здравствуйте!\r\nМне не хватает денег для выплаты заработной платы моим работникам.\r\nНакапливается задолженность.\r\nКак мне правильно поступить в данной ситуации?\r\nБуду благодарен за помощь, спасибо!', '2020-07-21 15:08:12', 0),
(9, '', '2', 'привет', '2020-07-22 15:33:57', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `innovation`
--

CREATE TABLE `innovation` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `user_b_id` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `processed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `innovation`
--

INSERT INTO `innovation` (`id`, `user_id`, `user_b_id`, `message`, `date_time`, `processed`) VALUES
(1, '19', '', 'А что, если мы начнем возить товар не в клетчатых сумках, а в полосатых?', '2020-07-21 15:37:48', 0),
(2, '', '1', 'Предлагаю введение нового стандарта оформления кода PHP.', '2020-07-21 15:39:56', 1),
(6, '18', '', 'Ку ку', '2020-07-22 15:32:30', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon` varchar(50) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `coupon`, `data`, `email`, `product_id`) VALUES
(17, 18, 'g1rpX1EmPm9R3bT', '2020-07-17 13:52:59', 'user@gmail.com', 2),
(19, 18, 'niamDUo58mfUGb0', '2020-07-17 13:54:54', 'user@gmail.com', 1),
(20, 19, 'e6cAhrnXmuABwiw', '2020-07-17 14:15:30', 'andrey@gmail.com', 2),
(27, 19, 'IPWbRnVBD6wZ5w6', '2020-07-19 18:17:48', 'andrey@gmail.com', 3),
(28, 22, 'braQAS1iSTWCOoY', '2020-07-19 19:53:20', 'ann@gmail.com', 3),
(33, 18, 'yLBdwqQ3ltEqzec', '2020-07-19 20:23:10', 'ann@gmail.com', 3),
(34, 19, 'wfvdCPBFJ1NLmb2', '2020-07-20 12:31:05', 'viktor@gmail.com', 1),
(35, 18, '46XdJLrZngSLKiE', '2020-07-22 14:57:09', 'user@gmail.com', 4),
(36, 22, 'jz1GDg9g3BaHAlO', '2020-07-22 15:04:27', 'ann@gmail.com', 5),
(37, 18, 'euNiHsCRzrIFbv3', '2020-11-07 18:29:28', 'user@gmail.com', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_maps`
--

CREATE TABLE `orders_maps` (
  `id` int(11) NOT NULL,
  `user_b_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `data_start` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Новый',
  `data_stop` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders_maps`
--

INSERT INTO `orders_maps` (`id`, `user_b_id`, `product_id`, `data`, `data_start`, `email`, `adress`, `status`, `data_stop`) VALUES
(2, 2, 2, '2020-07-18 17:59:28', '2020-07-25', 'andrey@gmail.com', 'adress andrey 23/85', 'Завершена', '2020-10-25'),
(4, 2, 2, '2020-07-18 20:56:19', '2020-11-07', 'andrey@gmail.com', 'красный камень', 'Активна', '2021-02-07'),
(5, 1, 1, '2020-07-22 15:04:00', '0000-00-00', 'user@gmail.com', 'красный камень', 'Новый', '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Добавлено'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `request_id`, `title`, `cost`, `description`, `content`, `image`, `category_id`, `status`) VALUES
(1, 0, 'Кафе Мороженное', 500, '15% скидки на все товары', 'Очень вкусное и полезное мороженное, так же присутствует много других вкусняшек. Приходи и приобретай с продукцией отличное настроение.', 'iceCream.jpg', 1, 'Добавлено'),
(2, 0, 'Тибетский массаж', 600, '40% скидки на 10 посещений', 'Лучший тибетский массаж в городе', 'massage.jpg', 3, 'Добавлено'),
(3, 4, 'Торты', 150, '40% на любое кондитерское изделие', 'К Вашему вниманию – торты(пряники.,капкейки,чизкейки и т. д) на заказ в городе Днепр, на все случаи жизни: Дни рождения (детей и взрослых), юбилеи, свадьбы, корпоративы и др. Ну а если Вам просто вечером стало скучно и захотелось подсластить одиночество чем-то необычным, лень выходить из дома – можно получить торт на заказ. И это – не напрягая силы на поиски и транспортировку кондитерского изделия до дома.', 'cake.jpg', 1, 'Добавлено'),
(4, 0, 'MegaSocks \"Вино/Сыр\" ', 10, 'Скидка 100 грн на подарочный набор носков от MegaSocks', 'Описание\r\nПросто признай без набора носков от \r\nMegaSocks жизнь твоя не та. Наши эксперты прям влюбились в ваши счастливые перевоплощения при покупке одной пары носков MegaSocks. Именно потому был созданы уникальные наборы из двух пар носков. Пару второй паре подбирали исключительно по твоему вкусу\r\n\r\nВ набор входит: \r\nСпортивные носки MegaSocks «Вино» 36-39\r\nНоски MegaSocks «Сыр» 36-39\r\n\r\nКому дарить Набор носков:\r\nМожешь не сомневаться, ты делаешь правильный выбор. Он станет промежуточным и тем самым роковым на пути к настоящему счастью. Настоящие счастливчики больше всего ждут и ценят эмоции радости и счастья, просто поверь если еще колеблешься.\r\n\r\nСвойства Набор носков:\r\n\r\nУпаковка: прозрачный тубус\r\nРазмер: 19*7 см.\r\n\r\nУход: стирка при температуре не выше 40 градусов, не утюжить и не отбеливать', 'socks.jpg', 6, 'Добавлено'),
(5, 0, 'Игрушки для лета', 15, '50% скидки для активного лета', 'Сейчас самое время для игры во дворе. А чтобы дети провели его максимально интересно, мы дарит 50% скидки на мелкие игрушки для летних развлечений: наборы для песочницы, игрушечное оружие, мыльные пузыри и еще много-много других интересных игрушек.\r\n\r\nГотовы ли вы провести это лето максимально интересно? Тогда наши скидки вам помогут!', 'kids.jpg', 7, 'Добавлено'),
(10, 12, 'test', 300, 'test test test', 'test test test', 'shop.jpg', 8, 'Добавлено'),
(11, 12, 'test', 300, 'test test test', 'test test test', 'shop.jpg', 8, 'Добавлено'),
(13, 0, 'test', 150, 'вор', 'чапоча', '', 1, 'Удалено');

-- --------------------------------------------------------

--
-- Структура таблицы `products_maps`
--

CREATE TABLE `products_maps` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Добавлено'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products_maps`
--

INSERT INTO `products_maps` (`id`, `title`, `cost`, `content`, `image`, `status`) VALUES
(1, '1 месяц', 300, 'один месяц ваш офис будет виден всем пользователям на картах', '', 'Добавлено'),
(2, '3 месяца', 700, '3 месяца ваш офис будет виден всем пользователям на картах', '', 'Добавлено'),
(5, 'Торты', 300, 'првря', '', 'Удалено');

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'shop.jpg',
  `cost` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Новый'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `request`
--

INSERT INTO `request` (`id`, `title`, `description`, `content`, `category_id`, `image`, `cost`, `user_id`, `phone`, `status`) VALUES
(4, 'Торты', '40% на любое кондитерское изделие', 'К Вашему вниманию – торты(пряники.,капкейки,чизкейки и т. д) на заказ в городе Днепр, на все случаи жизни: Дни рождения (детей и взрослых), юбилеи, свадьбы, корпоративы и др.\r\nНу а если Вам просто вечером стало скучно и захотелось подсластить одиночество чем-то необычным, лень выходить из дома – можно получить торт на заказ. И это – не напрягая силы на поиски и транспортировку кондитерского изделия до дома.', 1, 'cake.jpg', 150, 2, '0965202547', 'Добавлено'),
(7, 'Лучшие сеты', '30% на все меню', 'Дарим подарки за заказы в нашем сервисе доставки еды! Чтобы получить подарок Вам необходимо заказать суши, салаты, или пиццу:    \r\nСделайте заказ на сумму от 349 грн и получите скретч-карту, в которой зашифрован ваш подарок к следующему заказу. Акция действует до 31.08.2020 г. Карту можно обменять на подарок в любой день, кроме 8 марта.\r\nСделайте заказ на сумму от 599 грн и получайте вкусный Десерт в баночке бесплатно.\r\nСделайте заказ на сумму  999 грн и получайте сет из роллов \"Лайт Сет\" в подарок.', 1, 'sushi.jpg', 50, 2, '0965547547', 'Новый'),
(12, 'test', 'test test test', 'test test test', 8, 'shop.jpg', 300, 1, 'phone4', 'Новый'),
(13, 'вяаов', '', '', 0, 'shop.jpg', 0, 2, '', 'Новый');

-- --------------------------------------------------------

--
-- Структура таблицы `request_serv`
--

CREATE TABLE `request_serv` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `house` varchar(255) NOT NULL,
  `flat` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'unnamed.jpg',
  `status` varchar(255) NOT NULL DEFAULT 'Новый'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `request_serv`
--

INSERT INTO `request_serv` (`id`, `user_id`, `cat_id`, `title`, `description`, `content`, `phone`, `town`, `street`, `house`, `flat`, `image`, `status`) VALUES
(4, 2, 2, 'test', 'test', 'test', '096524583', 'Днепр', 'красный камень', '5', '6', 'unnamed.jpg', 'Новый'),
(7, 1, 2, 'TEST', 'ouo', 'gou', '0965202933', 'Днепр', 'красный камень', '18', '3', 'unnamed.jpg', 'Новый'),
(9, 2, 0, 'вравяр', '', '', '', '', '', '', '', 'unnamed.jpg', 'Новый');

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `modificator` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `reviewText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `modificator`, `unit_id`, `user_id`, `date_time`, `reviewText`) VALUES
(1, 1, 3, 3, '2020-07-17 19:19:22', 'Какой молодец!\r\nТак починил кран!!!!\r\nДевочки, рекомендую...'),
(2, 1, 4, 4, '2020-07-17 19:21:50', 'Замечательная служба, все на высшем уровне!\r\nРекомендую'),
(3, 1, 3, 3, '2020-07-17 19:52:20', 'Все отлично, молодцы'),
(4, 1, 3, 3, '2020-07-17 19:53:22', 'Какой молодец!\r\nТак починил кран!!!!\r\nДевочки, рекомендую...'),
(5, 1, 5, 4, '2020-07-17 19:54:50', 'Замечательная служба, все на высшем уровне!\r\nРекомендую'),
(6, 1, 5, 3, '2020-07-17 19:55:20', 'Оперативно, четко, рекомендую'),
(7, 1, 3, 4, '2020-07-17 23:13:32', 'Так быстро все погрузили и увезли.\r\nМы не ожидали! Здорово!\r\nРекомендую!!!'),
(9, 1, 3, 3, '2020-07-17 19:19:22', 'Какой молодец!\r\nТак починил кран!!!!\r\nДевочки, рекомендую...'),
(10, 1, 3, 4, '2020-07-17 19:21:50', 'Замечательная служба, все на высшем уровне!\r\nРекомендую'),
(11, 1, 5, 3, '2020-07-17 19:52:20', 'Все отлично, молодцы'),
(12, 1, 3, 3, '2020-07-17 19:53:22', 'Какой молодец!\r\nТак починил кран!!!!\r\nДевочки, рекомендую...'),
(13, 1, 3, 4, '2020-07-17 19:54:50', 'Замечательная служба, все на высшем уровне!\r\nРекомендую'),
(14, 1, 4, 3, '2020-07-17 19:55:20', 'Оперативно, четко, рекомендую'),
(15, 1, 4, 4, '2020-07-17 23:13:32', 'Так быстро все погрузили и увезли.\r\nМы не ожидали! Здорово!\r\nРекомендую!!!'),
(17, 1, 3, 3, '2020-07-17 19:19:22', 'Какой молодец!\r\nТак починил кран!!!!\r\nДевочки, рекомендую...'),
(18, 1, 3, 4, '2020-07-17 19:21:50', 'Замечательная служба, все на высшем уровне!\r\nРекомендую'),
(19, 1, 3, 3, '2020-07-17 19:52:20', 'Все отлично, молодцы'),
(20, 1, 3, 3, '2020-07-17 19:53:22', 'Какой молодец!\r\nТак починил кран!!!!\r\nДевочки, рекомендую...'),
(21, 1, 4, 4, '2020-07-17 19:54:50', 'Замечательная служба, все на высшем уровне!\r\nРекомендую'),
(22, 1, 3, 3, '2020-07-17 19:55:20', 'Оперативно, четко, рекомендую'),
(23, 1, 4, 4, '2020-07-17 23:13:32', 'Так быстро все погрузили и увезли.\r\nМы не ожидали! Здорово!\r\nРекомендую!!!'),
(24, 1, 9, 9, '2020-07-21 16:31:06', 'Замечательный сервис!\r\nПриехали оперативно, почистили ноут от пыли, оптимизировали работу ОС\r\nРекомендую!'),
(25, 1, 5, 5, '2020-07-21 16:32:37', 'Ранее уже сталкивались с данными предпринимателями, порядочные люди.\r\nВсе строго и порядочно.\r\nСпасибо им!'),
(26, 1, 3, 7, '2020-07-21 16:33:51', 'Быстро, качественно.\r\nМного грузчиков, быстро справились.\r\nСпасибо!'),
(28, 1, 9, 18, '2020-07-22 15:12:13', 'Очень хороший и добросовестный мастер. Все починил качественно и оперативно.');

-- --------------------------------------------------------

--
-- Структура таблицы `review_products`
--

CREATE TABLE `review_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `review_products`
--

INSERT INTO `review_products` (`id`, `product_id`, `user_id`, `text`, `data`) VALUES
(1, 1, 18, 'Очень вкусное мороженное. А с такой скидкой вообще каждый день туда хожу за порцией вкусняшки и хорошего настроения.', '2020-07-08 00:00:00'),
(2, 2, 18, 'Здесь хорошо делают массаж и тем более не дорого, раз в неделю могу себе позволить, после тяжёлой трудовой недели. Мастер настоящий профи своего дела, отлично разминает каждый сантиметр спины.', '2020-07-15 00:00:00'),
(3, 3, 18, 'Заказывали подарочки детям в школу. Безе в форме розы, печенье в форме листика и макарон. Все упаковали в шикарные коробочки. По моей просьбе осталось место и для пачки сока в коробочках. Все в восторге! Свежее, вкусное, красивое! Доставка вовремя и вежливо. Огромное спасибо!', '2020-07-06 00:00:00'),
(7, 2, 19, 'Замечательная процедура, немного ощущала боли в спине, но благодаря массажу все прошло. Обслуживание - на высоте, буду посещать.', '2020-07-19 00:00:00'),
(8, 3, 19, 'Большое спасибо! Заказала торт для любимой подруги и осталась очень довольна. Вкусно! Красиво! Художественное оформление на высшем уровне!!! Праздник удался!!!', '2020-07-18 00:00:00'),
(11, 1, 19, 'Персонал компетентен. Не обязательно знать название, можно просто рассказать, какой хочешь получить результат и тебе предложат варианты (дороже, дешевле также оговаривают самостоятельно, чтоб не смущать покупателя). Кассир работает быстро. Я довольна как обслуживанием так и товаром порекомендованным мне консультантами.', '2020-07-20 00:00:00'),
(13, 1, 0, 'Самое вкусное мороженное которое ел. Всем советую!', '2020-07-19 00:00:00'),
(14, 1, 0, 'Очень вкусно и атмосферно. Погрузилась в детство, каждый должен хоть раз побывать в таком месте.', '2020-07-16 00:00:00'),
(18, 4, 18, 'Крутые носки! Креативные, а самое главное очень приятные и практичные в носке, что очень порадовало.', '2020-07-22 00:00:00'),
(19, 5, 18, 'Очень крутая акция, закупились игрушками для ребенка. Все товары очень качественные и прослужат долго.', '2020-07-22 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `serv_category`
--

CREATE TABLE `serv_category` (
  `serv_cat_id` int(11) NOT NULL,
  `serv_cat_name` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Добавлено'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `serv_category`
--

INSERT INTO `serv_category` (`serv_cat_id`, `serv_cat_name`, `status`) VALUES
(0, 'Не выбрано', 'Удалено'),
(1, 'Работы на дому', 'Добавлено'),
(2, 'Грузоперевозки', 'Добавлено'),
(3, 'Обучение', 'Добавлено'),
(4, 'Консультация', 'Добавлено'),
(5, 'Сдать - арендовать', 'Добавлено');

-- --------------------------------------------------------

--
-- Структура таблицы `serv_orders`
--

CREATE TABLE `serv_orders` (
  `id` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `user_b_id` varchar(255) NOT NULL DEFAULT '0',
  `cat_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `addr_town` varchar(255) NOT NULL,
  `addr_street` varchar(255) NOT NULL,
  `addr_house` varchar(255) NOT NULL,
  `addr_flat` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Добавлено'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `serv_orders`
--

INSERT INTO `serv_orders` (`id`, `id_request`, `user_b_id`, `cat_id`, `title`, `description`, `content`, `phone`, `addr_town`, `addr_street`, `addr_house`, `addr_flat`, `image`, `status`) VALUES
(3, 0, '1', '1', 'Все виды сантехнических работ', 'Осуществляем ремонт бытовой сантехники. Принимаем частные заказы.', 'Требуется выполнить ремонт сантехники, установить бойлер, заменить кран, прочистить канализацию, заменить стояк канализации и водопровода, отремонтировать унитаз, обслужить питьевой фильтр на кухне, установить умывальник, провести сантехнические работы под ключ в квартире и доме. Мы именно те, кто занимается предоставлением качественных сантехнических услуг, в городе Киев и в пригороде.', '0631231255', 'Киев', 'Бажова', '1', '19', '311235_preview.jpg', 'Добавлено'),
(4, 0, '2', '2', 'Доставка грузов', 'Доставка грузов средней габаритности. Доставляем по всей Украине', ' срочно доставляет грузы от 5 грамм до 5 тонн с выездом к отправителю и доставкой до двери получателя более чем в 250 населённых пунктов Украины. Сеть подразделений в 36 городах и ежедневные рейсы позволяют доставлять Ваши товары получателям за 24-48 часов. Стоимость доставки от 25грн.', '0671593563', '', '', '', '', '311247.jpg', 'Добавлено'),
(5, 0, '0', '5', 'Аренда складского помещения', 'Предоставляем складское помещение 500 кв. м. Оборудовано под современный склад, сухое, охрана территории, сигнализация', 'Особенностью этого объекта является эффективная концентрация различных коммерческих площадей в одном комплексе. Важным преимуществом объекта является наличие в структуре комплекса офисных помещений высокого класса и максимально выгодное месторасположение, характеризующееся близостью к транспортным развязкам. Перечисленные факторы заинтересуют как арендаторов, которые ищут офисы, так и тех, кто подбирает оптимальные складские решения.', '0931172513', '', '', '', '', '311239_preview.jpg', 'Добавлено'),
(6, 0, '1', '1', 'Все виды сантехнических работ', 'Осуществляем ремонт бытовой сантехники. Принимаем частные заказы.', 'Требуется выполнить ремонт сантехники, установить бойлер, заменить кран, прочистить канализацию, заменить стояк канализации и водопровода, отремонтировать унитаз, обслужить питьевой фильтр на кухне, установить умывальник, провести сантехнические работы под ключ в квартире и доме. Мы именно те, кто занимается предоставлением качественных сантехнических услуг, в городе Киев и в пригороде.', '0631231255', 'Киев', 'Бажова', '1', '19', '311235_preview.jpg', 'Добавлено'),
(7, 0, '2', '2', 'Доставка грузов', 'Доставка грузов средней габаритности. Доставляем по всей Украине', ' срочно доставляет грузы от 5 грамм до 5 тонн с выездом к отправителю и доставкой до двери получателя более чем в 250 населённых пунктов Украины. Сеть подразделений в 36 городах и ежедневные рейсы позволяют доставлять Ваши товары получателям за 24-48 часов. Стоимость доставки от 25грн.', '0671593563', '', '', '', '', '311247.jpg', 'Добавлено'),
(8, 0, '0', '5', 'Аренда складского помещения', 'Предоставляем складское помещение 500 кв. м. Оборудовано под современный склад, сухое, охрана территории, сигнализация', 'Особенностью этого объекта является эффективная концентрация различных коммерческих площадей в одном комплексе. Важным преимуществом объекта является наличие в структуре комплекса офисных помещений высокого класса и максимально выгодное месторасположение, характеризующееся близостью к транспортным развязкам. Перечисленные факторы заинтересуют как арендаторов, которые ищут офисы, так и тех, кто подбирает оптимальные складские решения.', '0931172513', '', '', '', '', '311239_preview.jpg', 'Добавлено'),
(9, 0, '0', '1', 'Ремонт на дому Компьютеров Ноутбуков', 'Ремонт вашего ПК на дому в городе Вишневое!\r\nПриеду быстро ! Диагностика и выезд специалиста бесплатно !', 'Мы готовы предложить: ремонт компьютеров, ремонт ноутбуков, установку Windows, чистку ноутбуков от пыли, установку программ, настройку интернет, настройку роутеров, чистку вирусов и т.д. На сегодняшний день рынок услуг заполненный компьютерными специалистами и имеет большую конкуренцию. В свою очередь очень сложно найти настоящее качество, которое соответствует заявленным ценам.', '044-555-13-27', 'Киев', 'Жилянская', '68', '55', '311220_preview.jpg', 'Добавлено'),
(13, 4, '2', '2', 'test', 'test', 'test', '096524583', 'Днепр', 'красный камень', '5', '6', 'unnamed.jpg', 'Добавлено'),
(16, 0, '0', '3', 'test', 'test test', 'test test test', 'test', 'test', 'test', 'test', 'test', 'unnamed.jpg', 'Добавлено'),
(19, 4, '2', '2', 'test', 'test', 'test', '096524583', 'Днепр', 'красный камень', '5', '6', 'unnamed.jpg', 'Добавлено'),
(20, 0, '0', '1', 'test', '', '', '', '', '', '', '', 'unnamed.jpg', 'Удалено');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `confirm_mail` varchar(255) NOT NULL,
  `verifided` int(11) NOT NULL DEFAULT 0,
  `favorites` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Добавлено'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `name`, `phone`, `confirm_mail`, `verifided`, `favorites`, `status`) VALUES
(18, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', 'User User', '0965202933', 'qNJXATpf7C0w8uuoIiYK', 1, '{\"favorites\":[]}', 'Добавлено'),
(19, 'andrey', 'baf22ddb7b1a317d860f48638254e2e9', 'andrey@gmail.com', 'Andrey', '0965202578', 'KvkS5QbVYu3BvSzA87xY', 1, '{\"favorites\":[{\"product_id\":\"4\"}]}', 'Добавлено'),
(22, 'Anna', '97a9d330e236c8d067f01da1894a5438', 'anna@gmail.com', 'Ann', '', '3y5r5fko4sqt43djxs5i', 1, '', 'Добавлено');

-- --------------------------------------------------------

--
-- Структура таблицы `users_b`
--

CREATE TABLE `users_b` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `confirm_mail` varchar(255) NOT NULL,
  `verifided` int(11) NOT NULL DEFAULT 0,
  `info` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Добавлено'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users_b`
--

INSERT INTO `users_b` (`id`, `login`, `password`, `email`, `name`, `phone`, `confirm_mail`, `verifided`, `info`, `status`) VALUES
(1, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', 'User User', '0965796933', 'vE4Q0AkV8jK8Xvsr2ZZA', 1, '', 'Добавлено'),
(2, 'andrey', 'baf22ddb7b1a317d860f48638254e2e9', 'andrey@gmail.com', 'Andrey', '0965202247', '3ZABX3U5PlJlPj9VEx9z', 1, '', 'Добавлено'),
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin@mail.ru', 'Admin', 'admin', 'LunKZv49vo3BlE3qRNQt', 1, '', 'Добавлено');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `consult`
--
ALTER TABLE `consult`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `innovation`
--
ALTER TABLE `innovation`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders_maps`
--
ALTER TABLE `orders_maps`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products_maps`
--
ALTER TABLE `products_maps`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `request_serv`
--
ALTER TABLE `request_serv`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `review_products`
--
ALTER TABLE `review_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `serv_category`
--
ALTER TABLE `serv_category`
  ADD PRIMARY KEY (`serv_cat_id`);

--
-- Индексы таблицы `serv_orders`
--
ALTER TABLE `serv_orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_b`
--
ALTER TABLE `users_b`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `consult`
--
ALTER TABLE `consult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `innovation`
--
ALTER TABLE `innovation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `orders_maps`
--
ALTER TABLE `orders_maps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `products_maps`
--
ALTER TABLE `products_maps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `request_serv`
--
ALTER TABLE `request_serv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `review_products`
--
ALTER TABLE `review_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `serv_category`
--
ALTER TABLE `serv_category`
  MODIFY `serv_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `serv_orders`
--
ALTER TABLE `serv_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `users_b`
--
ALTER TABLE `users_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
