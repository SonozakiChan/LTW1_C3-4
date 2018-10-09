-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 03, 2018 lúc 09:30 AM
-- Phiên bản máy phục vụ: 5.7.21
-- Phiên bản PHP: 5.6.35

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

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_ID` int(10) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manu_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_ID`, `manu_name`, `manu_img`) VALUES
(1, 'Apple', 'https://cdn.tgdd.vn/Products/Images/42/187554/vivo-v11i-blue-600x600.jpg'),
(2, 'Samsung', 'https://cdn.tgdd.vn/Products/Images/42/187554/vivo-v11i-blue-600x600.jpg'),
(3, 'Huawei', 'https://cdn.tgdd.vn/Products/Images/42/187554/vivo-v11i-blue-600x600.jpg'),
(4, 'SoundMax', 'https://cdn.tgdd.vn/Products/Images/42/187554/vivo-v11i-blue-600x600.jpg'),
(5, 'Dell', 'https://cdn.tgdd.vn/Products/Images/42/187554/vivo-v11i-blue-600x600.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(50) NOT NULL DEFAULT '0',
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `manu_ID` int(10) NOT NULL,
  `type_ID` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ID`, `name`, `price`, `image`, `description`, `manu_ID`, `type_ID`) VALUES
(1, 'Iphone X', 200000, '71qIcwo0SuL._SL1500_.jpg', 'Điểm khiến điện thoại iPhone X bị chê nhiều nhất đó chính là phần \"tai thỏ\" phía trên màn hình, Apple đã chấp nhận điều này để đặt cụm camera TrueDept mới của hãng.', 1, 1),
(14, ' PC Dell Vostro 3670 MT I7 (i7-8700/8GB/1TB)', 400000, '1_26_130.jpg', 'PC của Dell', 5, 5),
(2, 'Iphone 6', 50000, 'iphone-x-64gb-silver-400x460.png', 'Một sản phẫm khởi đầu và phá cách của Apple.', 1, 1),
(4, 'Samsung S9+', 4450000, 'samsung-galaxy-s9-plus-64gb-xanh-san-ho-2-400x460 (1).png', 'Điện thoại của Samsung', 2, 1),
(5, 'Samsung 350U2Y 2434G50', 20000, 'Samsung-350U2Y-2434G50-l.jpg', 'Thông tin sản phẩm', 2, 2),
(13, 'PC Dell Vostro 3670 MT I5 (i5 8400/4GB/1TB)(42VT370016)', 6000000, '64.pc_dell_vostro_v3670a_mt_i7-min.jpg', 'PC của Dell', 5, 5),
(6, 'Samsung Galaxy S9+ 64GB', 50000, 'samsung-galaxy-s9-plus-64gb-xanh-san-ho-2-400x460.png', 'Thông tin sản phẩm', 2, 2),
(7, 'Samsung Galaxy J7 Prime', 28000, 'samsung-galaxy-j7-prime-2-400x460.png', 'Samsung J7 sản phẩm của Samsung', 2, 1),
(8, 'Apple Macbook 12\" MNYF2SA/A Core M 1.2GHz/8GB/256GB (2017)\r\n', 28888, 'rosegold-macbook-1.jpg', 'Sản phẩm Laptop của Macbook', 1, 2),
(9, 'Huawei MediaPad M3 8.0 (2017)', 60000, 'samsung-galaxy-j7-prime-hh-600x600.jpg', 'Sản phẩm laptop cua Huawei', 3, 3),
(10, 'Huawei MediaPad T3 10 (2017)', 60000, '636675937265892591_nova3i-XANH-1.jpg', 'Sản phẩm laptop cua Huawei', 3, 3),
(12, 'Huawei MediaPad T3 7.0 (2017)', 60000, 'huawei-mediapad-t3-70-2017-300-300x300.jpg', 'Sản phẩm laptop cua Huawei', 3, 3),
(19, ' Loa vi tính- 90W', 40000, 'loa-vi-tinh-soundmax-a150.jpg', 'Loa của SoundMax chức năng smart thông minh cho người dùng', 4, 4),
(15, 'PC Dell Vostro 3670 MT I5 (i5 8400/4GB/1TB)(42VT370016)', 400000, '10036969.png', 'PC của Dell', 5, 5),
(16, ' PC Dell Vostro 3670 MT I7 (i7-8700/8GB/1TB)', 400000, '10036967.png', 'PC của Dell', 5, 5),
(17, ' Loa vi tính- 70W', 40000, 'loa-vi-tinh-soundmax-aw300-2.1.jpg', 'Loa của SoundMax', 4, 4),
(18, ' Loa vi tính- 80W', 40000, '10007236_LOAVITÍNH_SOUNDMAX_A130_01.jpg', 'Loa của SoundMax', 4, 4),
(27, 'Apple iPhone 5S Silver 16GB', 220, 'iphone5s.jpg', 'This Certified Refurbished product is tested and\r\nCertified to look and work like new, with limited to No wear.\r\nThe refurbishing process includes functionality testing,\r\ninspection, and repackaging. The product is backed by a\r\nminimum 90-day warranty, and may arrive in a generic box.\r\nThe product ships with a charger and cable, but does not\r\ninclude headphone, Manual or SIM card. Only select sellers\r\nwho maintain a high performance bar may offer Certified\r\nRefurbished products on Amazon.', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_ID` int(10) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_ID`, `type_name`, `type_img`) VALUES
(1, 'Điện thoại', 'https://cdn.tgdd.vn/Products/Images/42/160730/samsung-galaxy-j4-plus-1-600x600.jpg'),
(2, 'Laptop', 'https://cdn.tgdd.vn/Products/Images/42/183657/oppo-a3s-red-600x600.jpg'),
(3, 'Tablet', 'https://cdn.tgdd.vn/Products/Images/42/153963/samsung-galaxy-j4-14-600x600.jpg'),
(4, 'Loa', 'https://cdn.tgdd.vn/Products/Images/42/153963/samsung-galaxy-j4-14-600x600.jpg'),
(5, 'PC', 'https://cdn.tgdd.vn/Products/Images/42/153963/samsung-galaxy-j4-14-600x600.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
