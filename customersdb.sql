-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Sze 26. 13:59
-- Kiszolgáló verziója: 10.4.18-MariaDB
-- PHP verzió: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `customersdb`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `billing_addresses`
--

CREATE TABLE `billing_addresses` (
  `b_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `is_def` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `billing_addresses`
--

INSERT INTO `billing_addresses` (`b_id`, `c_id`, `address`, `tax`, `is_def`) VALUES
(3, 1, 'Szeged, Etelka sor 1/B, 2.emelet 9. -MOD', '-MOD ', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `customers`
--

CREATE TABLE `customers` (
  `c_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `customers`
--

INSERT INTO `customers` (`c_id`, `name`, `address`, `password`, `email`) VALUES
(1, 'Horváth Milán', '6000, Kecskemét Ifjúság utja 93.', 'milanpassword', 'h.milan0713@gmail.com'),
(2, 'Milán Horváth', 'Etelka sor 1/B, 2.emelet 9.', 'milanjelszo', 'h.milan0713@gmail.com');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_def` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`s_id`, `c_id`, `address`, `is_def`) VALUES
(1, 1, '6000, Kecskemét Ifjúság utja 39. - MÓDOSÍTVA', 1),
(2, 2, 'Etelka sor 1/B, 2.emelet 9.s sdfs df sdf s', 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `c_id` (`c_id`);

--
-- A tábla indexei `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- A tábla indexei `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `c_id` (`c_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `billing_addresses`
--
ALTER TABLE `billing_addresses`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD CONSTRAINT `billing_addresses_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customers` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD CONSTRAINT `shipping_addresses_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customers` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
