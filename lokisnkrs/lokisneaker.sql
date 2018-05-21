-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2017 at 09:47 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lokisneaker`
--


-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `username`, `password`) VALUES
(1, 'Võ Tuấn Khôi', 'khoi', '111'),
(2, 'khôi đẹp trai', 'tuankhoi', '123'),
(3, 'Trần Khánh Linh', 'linhlu', '123'),
(4, 'Trần Khánh Linh', 'khanhlinh', '123'),
(5, 'Trần Khánh Linh', 'linhtran', '123');

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `catalog_id` int(11) NOT NULL,
  `catalog_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`catalog_id`, `catalog_name`, `parent_id`) VALUES
(1, 'adidas', NULL),
(2, 'asics', NULL),
(3, 'converse', NULL),
(4, 'nike', NULL),
(5, 'yeezy', 1),
(6, 'tubular', 1),
(7, 'nmd', 1),
(8, 'ultra boost', 1),
(9, 'gel lyte iii', 2),
(10, 'gel lyte v', 2),
(11, '1970s', 3),
(12, 'chuck taylor', 3),
(13, 'chuck taylor ii', 3),
(14, 'air max', 4),
(15, 'huarache', 4),
(16, 'jordan', 4),
(17, 'Vans', NULL),
(18, 'Old Skool', 17),
(19, 'Sk8', 17),
(20, 'New Balance', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(1) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `gender`, `dob`, `phone`, `address`, `email`, `password`) VALUES
(1, 'Nguyễn Hoàng Dung', 0, '1996-05-31', '0909123456', 'KTX Khu B, Binh Duong', 'dung@gmail.com', '123'),
(2, 'Nguyễn Định Luật', 1, '1985-05-31', '0908123456', 'KTX Khu B, Binh Duong', 'luat@gmail.com', '123'),
(3, 'Phạm Thị Hoa', 1, '1992-05-31', '0907123456', 'KTX Khu B, Binh Duong', 'hoa@gmail.com', '123'),
(4, 'Trần Ngọc Bảo', 0, '1989-05-31', '0906123456', 'KTX Khu B, Binh Duong', 'bao@gmail.com', '123'),
(5, 'Phạm Lan Hương', 1, '1985-05-31', '0905123456', 'KTX Khu B, Binh Duong', 'huong@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `image`, `content`, `date`) VALUES
(3, 'Mẫu PUMA Clyde với họa tiết Aztec cách điệu theo phong cách Graffiti', '111111.jpg', '<p>Mẫu PUMA Clyde Aztec Graffiti n&agrave;y chỉ được sản xuất với số lượng giới hạn 1000 đ&ocirc;i v&agrave; sẽ kh&ocirc;ng được b&aacute;n ra tại bất cứ cửa h&agrave;ng v&agrave; webshop n&agrave;o. Hiện tại, c&aacute;ch duy nhất để c&oacute; được n&oacute; l&agrave; tham gia chương tr&igrave;nh Sweeptakes tổ chức bởi 1800 Tequila.</p>', '2017-05-28 02:26:15'),
(4, 'Hai mẫu high-top sneaker mới từ phân nhánh DRKSHDW của Rick Owens', 'rick-owens-scarpe-ss17-01-1200x800.jpg', '<p>&nbsp;</p>\r\n<p>Ph&acirc;n nh&aacute;nh gi&aacute; rẻ DRKSHDW của Rich Owens vừa cho ra mắt 2 mẫu high-top sneaker mới cho m&ugrave;a h&egrave; 2017.</p>', '2017-05-28 02:08:26'),
(6, 'Thông tin phát hành pack collab giữa Vans và Anti Social Social Club', 'anti-social-social-club-vans-authentic.jpg', '<p>Vans vừa th&ocirc;ng b&aacute;o về một collab mới song h&agrave;nh với Anti Soc&iacute;al Social Club</p>', '2017-05-28 02:01:16'),
(7, 'Địa điểm và thời gian phát hành của Nike Air Jordan 2 Decon vừa được thông báo', 'deconstructed-jordan-2.jpg', '<p>Air Jordan 2 Decon - biến thể của d&ograve;ng Air Jordan 2 với ngoại h&igrave;nh tối giản hết mức c&oacute; thể vừa được Jordan Brand th&ocirc;ng b&aacute;o lịch v&agrave; địa điểm ph&aacute;t h&agrave;nh</p>', '2017-05-28 02:28:07'),
(8, 'Adidas giới thiệu phát hành Ultra Boost Glow In The Dark', 'glow-in-the-dark-ultra-boost-02_o8pvcg.png', '<p>L&agrave; một trong những ph&aacute;t h&agrave;nh được y&ecirc;u th&iacute;ch nhất của Adidas, Ultra Boost xứng đ&aacute;ng l&agrave; mẫu gi&agrave;y của năm 2015. Kh&ocirc;ng hề c&oacute; dấu hiệu dừng lại, 2016 cũng l&agrave; một năm đại th&agrave;nh c&ocirc;ng của Ultra Boost với nhiều bản collab th&uacute; vị. Nếu kh&ocirc;ng thể với tới c&aacute;c phối m&agrave;u collab đẹp mắt nhưng đắt, phối m&agrave;u mới nhất Glow In the Dark của thiết kế n&agrave;y sẽ gi&uacute;p bạn nổi bật d&ugrave; trong đ&ecirc;m tối hay ngo&agrave;i nắng gắt.</p>', '2017-05-28 02:12:35'),
(9, 'Bộ đôi Vans “Veggie Tan” với lớp upper được xử lý đặc biệt', 'vans-veggie-tan-leather-03.jpg', '<p>Mặc d&ugrave; c&oacute; kh&aacute; nhiều d&ograve;ng sản phẩm nhưng bộ đ&ocirc;i Vans Sk8-Hi v&agrave; Vans Old Skool vẫn lu&ocirc;n thuộc top best seller của Vans, nhờ v&agrave;o thiết kế đơn giản dễ phối đồ. Mới đ&acirc;y Vans đ&atilde; đưa cả 2 thiết kế n&agrave;y v&agrave;o c&ugrave;ng một pack với t&ecirc;n gọi l&agrave; "Veggie Tan".</p>', '2017-05-28 02:17:27'),
(10, 'Nét thanh tịnh trên phối màu “Khu Vườn Nhật Bản” của ASICS GEL-Respector', 'asics-gel-respector-japanese-garden-1.jpg', '<p>GEL-Respector l&agrave; một trong d&ograve;ng gi&agrave;y running kh&aacute; l&acirc;u đời từ ASICS với lần giới thiệu đầu ti&ecirc;n v&agrave;o năm 1991. Tuy vậy, sản phẩm lại kh&aacute; im hơi lặng tiếng so với c&aacute;c d&ograve;ng kh&aacute;c thuộc series GEL-Lyte. Cho lần xuất hiện mới nhất, GEL-Respector được mang đến một phối m&agrave;u mới với cảm hứng thanh tịnh đến từ thiết kế truyền thống của những khu vườn ở Nhật Bản.</p>', '2017-05-28 02:21:08');

--
-- Triggers `news`
--
DELIMITER $$
CREATE TRIGGER `trigger_news_upd_check_date` BEFORE UPDATE ON `news` FOR EACH ROW BEGIN  
	set new.date=now();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cost` int(11) NOT NULL,
  `payment` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `payment_info` text COLLATE utf8_unicode_ci,
  `note` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_payment` int(11) NOT NULL,
  `status_shipment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `member_id`, `name`, `email`, `phone`, `address`, `date`, `cost`, `payment`, `payment_info`, `note`, `status_payment`, `status_shipment`) VALUES
(1, 1, 'Nguyễn Hoàng Dung', 'dung@gmail.com', '0909123456', 'KTX Khu B, Binh Duong, Viet Nam', '2017-06-11 05:01:52', 7500000, 'tienmat', NULL, 'giao hàng giờ hành chính nha', 1, 1);

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `trigger_orders_upd` BEFORE UPDATE ON `orders` FOR EACH ROW BEGIN
	set new.date = now();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `od_detail_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_size` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`od_detail_id`, `orders_id`, `product_id`, `product_size`, `price`, `quantity`) VALUES
(1, 1, 13, 37, 4500000, 1),
(2, 1, 18, 37, 3000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `final_price` int(11) DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image_list` text COLLATE utf8_unicode_ci,
  `date` date NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `catalog_id`, `product_name`, `price`, `description`, `discount`, `final_price`, `image`, `image_list`, `date`, `view`) VALUES
(1, 5, 'Adidas Yeezy Boost 350 - Moonrock', 8000000, '<p>Thiết kế Yeezy l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Adidas, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng Yeezy&nbsp;đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 10, 7200000, 'yeezy_moonrock.jpg', '["yeezy_moonrock2.jpg","yeezy_moonrock3.jpg","yeezy_moonrock4.jpg","yeezy_moonrock5.jpg"]', '2017-04-13', 0),
(2, 6, 'Tubular Radial', 3000000, '<p>Thiết kế Tubular l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Adidas, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng Tubular&nbsp;đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 5, 2850000, 'tubular_radial2.jpg', '["tubular_radial1.jpg","tubular_radial3.jpg","tubular_radial4.jpg"]', '2017-04-03', 0),
(3, 7, 'NMD NOIR BLEU ROUGE', 4000000, '<p>Thiết kế NMD l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Adidas, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng NMD đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 20, 3200000, 'nmd_noir.jpg', '["nmd_noir1.jpg","nmd_noir2.jpg","nmd_noir3.jpg"]', '2017-04-26', 0),
(4, 8, 'ULTRA BOOST TRIPLE WHITE', 3500000, '<p>Thiết kế Ultra Boost&nbsp;l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Adidas, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng Ultra Boost&nbsp;đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 10, 3150000, 'b5.jpg', '["b1.jpg","b3.jpg","b4.jpg"]', '2017-04-13', 0),
(5, 6, 'tubular shadow knit', 3600000, '<p>Thiết kế Tubular&nbsp;l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Adidas, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng Tubular&nbsp;đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 0, 3600000, 'shadow1.jpg', '["shadow2.jpg","shadow3.jpg"]', '2017-05-26', 0),
(6, 7, 'NMD ROSE', 4500000, 'Thiết kế NMD là 1 dòng giày thuộc Adidas, lấy tiêu chí chủ đạo là phục vụ cho các vận động viên hay người đi bộ và cả những fashionista, dòng NMD đã ra đời. Với thiết kế nhẹ, êm, nhưng vẫn đảm bảo tính thời trang đem lại cảm giác đầy sức mạnh trong mỗi bước đi đã sớm trở thành sự lựa chọn cho nhiều người trên khắp thế giới và phát triển mỗi ngày.', 0, 4500000, 'nmd_rose.jpg', '["nmd_rose1.jpg","nmd_rose2.jpg","nmd_rose3.jpg","nmd_rose4.jpg"]', '2017-04-04', 4),
(7, 10, 'ASICS GEL LYTE V', 2500000, '<p>Thiết kế GEL LYTE V l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Adidas, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng GEL LYTE V đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 0, 2500000, 'scarpe_(2).jpg', '["scarpe_(1).jpg","scarpe.jpg","scarpe1.jpg"]', '2017-04-20', 0),
(8, 15, 'HURACHE 2017 BLACK', 3000000, '<p>Thiết kế HURACHE l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Nike, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng HURACHE&nbsp;đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 0, 3000000, 'hua_(4).jpg', '["hua_(1).jpg","hua_(2).jpg","hua_(3).jpg"]', '2017-05-26', 0),
(9, 13, 'Chuck II Shield Canvas', 1700000, '<p>Thiết kế Chuck II l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Converse, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng Chuck II đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 0, 1700000, 'white_(3).jpg', '["white_(1).jpg","white_(1).png","white_(2).jpg"]', '2017-05-26', 0),
(10, 9, 'ASICS Men GEL LYTE III', 3000000, '<p>Thiết kế GEL LYTE III l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Adidas, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng GEL LYTE III đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 0, 3000000, 'as1.jpg', '["as.jpg","as2.jpg","as3.jpg","as4.jpg"]', '2017-05-28', 4),
(11, 14, 'Nike Air Max Neon', 3500000, '<p>Thiết kế Air Max l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Nike, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng Air Max đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 5, 3325000, 'air_(1).jpg', '["air_(2).jpg","air_(3).jpg","air_(4).jpg"]', '2017-05-28', 0),
(12, 12, 'Converse Chuck Taylor Leather', 1700000, '<p>Thiết kế Chuck Taylor l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Converse, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng Chuck Taylor&nbsp;đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 0, 1700000, 'leader_(2).jpg', '["leader_(1).jpg"]', '2017-05-28', 0),
(13, 11, 'Converse 1970s Black', 1700000, '<p>Thiết kế Chuck II l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Converse, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng Chuck II đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 0, 1700000, 'cv4.jpg', '["cv1.jpg","cv2.jpg","cv3.jpg"]', '2017-05-28', 0),
(14, 16, 'Nike Jordan 11', 5500000, '<p>Thiết kế Jordan l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Nike, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng Jordan đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 0, 5500000, 'aaaa.png', '["a.jpg","aa.jpg"]', '2017-05-28', 0),
(15, 18, 'Vans Old Skool Burgundy', 1300000, '<p>Thiết kế Old Skool l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Vans, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng Old Skool đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 0, 1300000, 'cccc.jpg', '["c.jpg","cc.jpg","ccc.jpg"]', '2017-05-28', 0),
(16, 19, 'Vans Sk8 Yellow Zip', 2000000, '<p>Thiết kế Sk8 l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Vans, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng Sk8 đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 0, 2000000, 'q.jpg', '["qq.jpg","qqq.jpg","qqqq.jpg","qqqqq.jpg"]', '2017-05-28', 0),
(17, 8, 'Adidas Ultra Boost Powder', 4500000, '<p>Thiết kế Ultra Boost l&agrave; 1 d&ograve;ng gi&agrave;y thuộc Adidas, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng Ultra Boost&nbsp;đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh sự lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 0, 4500000, 'powder_(2).jpg', '["powder_(1).jpg","powder_(3).jpg"]', '2017-05-28', 4),
(18, 10, 'Asics Gel Lyte V - Prickly Pear', 3500000, '<p>Thiết kế Asics Gel Lyte V l&agrave; một d&ograve;ng gi&agrave;y thuộc Asics, lấy ti&ecirc;u ch&iacute; chủ đạo l&agrave; phục vụ cho c&aacute;c vận động vi&ecirc;n hay người đi bộ v&agrave; cả những fashionista, d&ograve;ng Asics Gel Lyte V đ&atilde; ra đời. Với thiết kế nhẹ, &ecirc;m, nhưng vẫn đảm bảo t&iacute;nh thời trang đem lại cảm gi&aacute;c đầy sức mạnh trong mỗi bước đi đ&atilde; sớm trở th&agrave;nh lựa chọn cho nhiều người tr&ecirc;n khắp thế giới v&agrave; ph&aacute;t triển mỗi ng&agrave;y.</p>', 10, 3150000, 'pricky-pear.jpg', '["prickly-pear5_(1).jpg","prickly-pear5_(2).jpg","prickly-pear5_(3).jpg","prickly-pear5_(4).jpg"]', '2017-06-07', 6);

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `trigger_product_final_price_ins` BEFORE INSERT ON `product` FOR EACH ROW begin 
	set new.final_price = new.price - new.price*(new.discount/100);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_product_final_price_upd` BEFORE UPDATE ON `product` FOR EACH ROW begin 
	set new.final_price = new.price - new.price*(new.discount/100);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `pd_detail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`pd_detail_id`, `product_id`, `size`, `quantity`) VALUES
(1, 1, 36, 21),
(2, 1, 37, 2),
(3, 1, 38, 2),
(4, 1, 39, 2),
(5, 1, 41, 1),
(6, 1, 42, 0),
(7, 1, 43, 2),
(13, 1, 44, 0),
(14, 1, 35, 3),
(15, 2, 38, 5),
(16, 2, 39, 3),
(17, 2, 40, 4),
(18, 2, 41, 2),
(19, 2, 42, 4),
(20, 2, 43, 5),
(21, 3, 40, 0),
(22, 3, 41, 10),
(23, 3, 42, 10),
(24, 4, 36, 4),
(25, 4, 37, 5),
(26, 4, 38, 5),
(27, 4, 39, 5),
(28, 5, 41, 5),
(29, 5, 42, 4),
(30, 5, 43, 5),
(31, 5, 44, 5),
(32, 5, 46, 5),
(33, 6, 36, 5),
(34, 6, 37, 5),
(35, 6, 38, 5),
(36, 6, 39, 5),
(37, 7, 37, 5),
(38, 7, 38, 5),
(39, 7, 40, 5),
(40, 7, 41, 5),
(41, 8, 40, 5),
(42, 8, 41, 5),
(43, 8, 42, 5),
(44, 8, 43, 5),
(45, 9, 41, 3),
(46, 9, 42, 5),
(47, 9, 43, 4),
(48, 9, 44, 5),
(49, 10, 37, 4),
(50, 10, 38, 5),
(51, 10, 39, 5),
(52, 10, 40, 5),
(53, 10, 41, 5),
(54, 10, 42, 5),
(55, 10, 43, 5),
(56, 11, 39, 5),
(57, 11, 40, 5),
(58, 11, 41, 5),
(59, 12, 37, 4),
(60, 12, 38, 5),
(61, 12, 39, 5),
(62, 12, 40, 5),
(63, 12, 41, 5),
(64, 13, 37, 5),
(65, 13, 38, 5),
(66, 13, 39, 5),
(67, 13, 40, 5),
(68, 13, 41, 5),
(69, 14, 37, 5),
(70, 14, 38, 5),
(71, 14, 39, 5),
(72, 14, 40, 5),
(73, 15, 36, 5),
(74, 15, 37, 3),
(75, 15, 38, 5),
(76, 15, 39, 5),
(77, 15, 40, 5),
(78, 15, 41, 5),
(79, 16, 37, 5),
(80, 16, 38, 5),
(81, 16, 39, 5),
(82, 16, 35, 5),
(83, 16, 36, 5),
(84, 17, 38, 0),
(85, 17, 37, 0),
(86, 17, 40, 0),
(87, 17, 39, 0),
(88, 17, 36, 5),
(90, 18, 36, 5),
(91, 18, 37, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`catalog_id`),
  ADD KEY `fk_self` (`parent_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`od_detail_id`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_catalog_id` (`catalog_id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`pd_detail_id`),
  ADD KEY `fk_product` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `catalog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `od_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `pd_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `catalog`
--
ALTER TABLE `catalog`
  ADD CONSTRAINT `fk_self` FOREIGN KEY (`parent_id`) REFERENCES `catalog` (`catalog_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`),
  ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_catalog_id` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`catalog_id`);

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
