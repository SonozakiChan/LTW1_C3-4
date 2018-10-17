-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2018 lúc 08:33 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `testphpmyadmin`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

CREATE TABLE `manufactures` (
  `manu_ID` int(10) NOT NULL,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manu_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_ID`, `manu_name`, `manu_img`) VALUES
(1, 'Apple', 'apple.png'),
(2, 'Samsung', 'samsung.png'),
(3, 'Huawei', 'huawei.jpg'),
(13, 'SoudMax', 'soundmax.png'),
(5, 'Dell', 'dell.png'),
(14, 'Xiaomi', 'xiaomi.png'),
(15, 'Blackbery', 'blackbery3.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ID` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(50) NOT NULL DEFAULT '0',
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `manu_ID` int(10) NOT NULL,
  `type_ID` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ID`, `name`, `price`, `image`, `description`, `manu_ID`, `type_ID`) VALUES
(1, 'Iphone X', 200000, '71qIcwo0SuL._SL1500_.jpg', 'Điểm khiến điện thoại iPhone X bị chê nhiều nhất đó chính là phần \"tai thỏ\" phía trên màn hình, Apple đã chấp nhận điều này để đặt cụm camera TrueDept mới của hãng.', 1, 1),
(14, ' PC Dell Vostro 3670 MT I7 (i7-8700/8GB/1TB)', 400000, '1_26_130.jpg', 'PC của Dell', 5, 5),
(2, 'Iphone 6', 50000, 'iphone-x-64gb-silver-400x460.png', 'Một sản phẫm khởi đầu và phá cách của Apple.', 1, 1),
(32, 'samsung t775', 40000, 'Samsung-Galaxy-Ace-SM-J110H-DD.jpg', 'qwe12312', 15, 1),
(5, 'Samsung 350U2Y 2434G50', 20000, 'Samsung-350U2Y-2434G50-l.jpg', 'Thông tin sản phẩm', 2, 2),
(13, 'PC Dell Vostro 3670 MT I5 (i5 8400/4GB/1TB)(42VT370016)', 6000000, '64.pc_dell_vostro_v3670a_mt_i7-min.jpg', 'PC của Dell', 5, 5),
(6, 'Samsung Galaxy S9+ 64GB', 50000, 'samsung-galaxy-s9-plus-64gb-xanh-san-ho-2-400x460.png', 'Thông tin sản phẩm', 2, 2),
(7, 'Samsung Galaxy J7 Prime', 28000, 'samsung-galaxy-j7-prime-2-400x460.png', 'Samsung J7 sản phẩm của Samsung', 2, 1),
(8, 'Apple Macbook 12\" MNYF2SA/A Core M 1.2GHz/8GB/256GB (2017)\r\n', 28888, 'rosegold-macbook-1.jpg', 'Sản phẩm Laptop của Macbook', 1, 2),
(9, 'Huawei MediaPad M3 8.0 (2017)', 60000, 'samsung-galaxy-j7-prime-hh-600x600.jpg', 'Sản phẩm laptop cua Huawei', 3, 3),
(10, 'Huawei MediaPad T3 10 (2017)', 60000, '222222222222222222.jpg', 'Sản phẩm laptop cua Huawei', 15, 3),
(12, 'Huawei MediaPad T3 7.0 (2017)', 60000, 'huawei-mediapad-t3-70-2017-300-300x300.jpg', 'Sản phẩm laptop cua Huawei', 3, 3),
(19, 'samsung node js', 40000, '12312312312.jpg', 'qwrwqr', 15, 4),
(15, 'PC Dell Vostro 3670 MT I5 ', 400000, '12312312312d1d2d21.jpg', 'PC của Dell', 15, 5),
(17, ' Loa vi tính- 70W', 40000, 'loa-vi-tinh-soundmax-aw300-2.1.jpg', 'Loa của SoundMax', 4, 4),
(18, ' Loa vi tính- 80W', 40000, '10007236_LOAVITÍNH_SOUNDMAX_A130_01.jpg', 'Loa của SoundMax', 4, 4),
(27, 'Apple iPhone 5S Silver 16GB', 2200, 'iphone5s.jpg', 'Amozom', 1, 1),
(30, 'samsung a8 pro', 40000, '2113123123.png', 'wer23r23r', 15, 1),
(31, 'samsung node js222fdsds   hgfhf', 40000, 'Penguins.jpg', 'qwrwqr', 5, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

CREATE TABLE `protypes` (
  `type_ID` int(10) NOT NULL,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_ID`, `type_name`, `type_img`) VALUES
(1, 'Điện thoại', 'smartphone.jpg'),
(2, 'Laptop', 'laptop.jpg'),
(3, 'Tablet', 'tablet.jpg'),
(4, 'Loa', 'loa.jpg'),
(5, 'PC', 'pc.jpg'),
(13, 'USBb', '943_3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(2) DEFAULT '1',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `level`, `name`) VALUES
(1, 'admin01', '123456', 1, 'Duy'),
(2, 'admin02', '123456', 1, 'Quy');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`manu_ID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `protypes`
--
ALTER TABLE `protypes`
  ADD PRIMARY KEY (`type_ID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `manu_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `protypes`
--
ALTER TABLE `protypes`
  MODIFY `type_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
