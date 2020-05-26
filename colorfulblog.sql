-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Ağu 2019, 17:21:55
-- Sunucu sürümü: 10.3.16-MariaDB
-- PHP Sürümü: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `colorfulblog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `baslik` varchar(50) COLLATE utf8_bin NOT NULL,
  `icerik` longtext COLLATE utf8_bin NOT NULL,
  `keywords` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `kategori` varchar(100) COLLATE utf8_bin NOT NULL,
  `resimyolu` varchar(150) COLLATE utf8_bin NOT NULL,
  `tarih` datetime NOT NULL,
  `sefurl` varchar(100) COLLATE utf8_bin NOT NULL,
  `slayt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogkategori`
--

CREATE TABLE `blogkategori` (
  `id` int(11) NOT NULL,
  `sira` int(11) NOT NULL,
  `baslik` varchar(50) COLLATE utf8_bin NOT NULL,
  `sefurl` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `blogID` int(11) NOT NULL,
  `adsoyad` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `web` varchar(100) COLLATE utf8_bin NOT NULL,
  `mesaj` text COLLATE utf8_bin NOT NULL,
  `tarih` datetime NOT NULL,
  `ip` varchar(20) COLLATE utf8_bin NOT NULL,
  `onoff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `telefon` varchar(20) COLLATE utf8_bin NOT NULL,
  `mesaj` text COLLATE utf8_bin NOT NULL,
  `tarih` datetime NOT NULL,
  `ip` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `sira` int(11) NOT NULL,
  `post_title` varchar(50) COLLATE utf8_bin NOT NULL,
  `content` longtext COLLATE utf8_bin NOT NULL,
  `seolink` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `logo` varchar(150) COLLATE utf8_bin NOT NULL,
  `color` varchar(20) COLLATE utf8_bin NOT NULL,
  `seourl` varchar(5) COLLATE utf8_bin NOT NULL,
  `analytics` text COLLATE utf8_bin NOT NULL,
  `keywords` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `facebook` varchar(150) COLLATE utf8_bin NOT NULL,
  `twitter` varchar(150) COLLATE utf8_bin NOT NULL,
  `banner` text COLLATE utf8_bin NOT NULL,
  `reklam` text COLLATE utf8_bin NOT NULL,
  `iletisim` text COLLATE utf8_bin NOT NULL,
  `yazi_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`title`, `logo`, `color`, `seourl`, `keywords`, `description`, `facebook`, `twitter`, `banner`, `reklam`, `iletisim`, `yazi_limit`) VALUES
('Colorful Blog', '', 'blue', '.php', '#', '#', '#', '#', '<img src=\"images/white_468x60.gif\" alt=\"\" />', '<li><a href=\"#\"><img src=\"images/125x125.gif\" alt=\"\" /></a></li>\r\n<li class=\"last\"><a href=\"#\"><img src=\"images/125x125.gif\" alt=\"\" /></a></li>', 'Bize ulaşmak için aşağıdaki bilgileri kullanabilirsiniz.<br><br>\r\n\r\n<b>E-mail :</b> info@phpscriptlerim.com<br><br>', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetim`
--

CREATE TABLE `yonetim` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `yonetim`
--

INSERT INTO `yonetim` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blogkategori`
--
ALTER TABLE `blogkategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yonetim`
--
ALTER TABLE `yonetim`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `blogkategori`
--
ALTER TABLE `blogkategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `yonetim`
--
ALTER TABLE `yonetim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
