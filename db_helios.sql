-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 07:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_helios`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_banner`
--

CREATE TABLE `db_banner` (
  `id` int(11) NOT NULL COMMENT 'Mã slide',
  `name` varchar(255) NOT NULL COMMENT 'Tên gọi',
  `link` varchar(255) NOT NULL COMMENT 'Đường dẫn',
  `position` varchar(100) NOT NULL COMMENT 'Vị trí',
  `info1` varchar(50) DEFAULT NULL COMMENT 'Dòng thông tin 1',
  `info2` varchar(50) DEFAULT NULL COMMENT 'Dòng thông tin 2',
  `info3` varchar(50) DEFAULT NULL COMMENT 'Dòng thông tin 3',
  `img` varchar(100) NOT NULL COMMENT 'Hình ảnh',
  `orders` int(11) NOT NULL COMMENT 'Sắp xếp',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_brand`
--

CREATE TABLE `db_brand` (
  `id` int(11) NOT NULL COMMENT 'Mã danh mục',
  `name` varchar(255) NOT NULL COMMENT 'Tên danh mục',
  `slug` varchar(255) NOT NULL COMMENT 'Mã hoá url',
  `img` varchar(255) DEFAULT NULL COMMENT 'Ảnh đại diện',
  `orders` int(11) UNSIGNED NOT NULL COMMENT 'Thứ tự sắp xếp',
  `status` smallint(3) NOT NULL DEFAULT 1 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `db_brand`
--

INSERT INTO `db_brand` (`id`, `name`, `slug`, `img`, `orders`, `status`) VALUES
(1, 'Valerie', 'valerie', 'valerie.png', 1, 1),
(2, 'PNJ', 'pnj', 'pnj.png', 2, 1),
(3, 'Tierra', 'tiera', 'tiera.png', 3, 1),
(4, 'doji', 'doji', 'doji.png', 4, 1),
(5, 'SJC', 'sjc', 'sjc.png', 5, 1),
(6, 'Thế Giới Kim Cương', 'the-gioi-kim-cuong', 'the-gioi-kim-cuong.png', 6, 1),
(7, 'Precita', 'precita', 'precita.png', 7, 1),
(8, 'Bảo Tín Minh Châu', 'bao-tinh-minh-chau', 'bao-tinh-minh-chau.png', 8, 1),
(9, 'Phú Quý Jewelry', 'phu-quy-jewelry', 'phu-quy-jewelry.png', 9, 1),
(10, 'Skymond Luxury', 'skymond-luxury', 'skymond-luxury.png', 10, 1),
(11, 'Huy Thanh Jewelry', 'huy-thanh-jewelry', 'huy-thanh-jewelry.png', 11, 1),
(12, 'Ancarat', 'ancarat', 'ancarat.png', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_category`
--

CREATE TABLE `db_category` (
  `id` int(11) NOT NULL COMMENT 'Mã danh mục',
  `name` varchar(255) NOT NULL COMMENT 'Tên danh mục',
  `slug` varchar(255) NOT NULL COMMENT 'Mã hoá url',
  `parent_id` int(11) NOT NULL COMMENT 'Mã danh mục cấp cha',
  `orders` int(11) UNSIGNED NOT NULL COMMENT 'Thứ tự sắp xếp',
  `status` smallint(3) NOT NULL DEFAULT 1 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_config`
--

CREATE TABLE `db_config` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `map` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_contact`
--

CREATE TABLE `db_contact` (
  `id` int(11) NOT NULL COMMENT 'Mã liên hệ',
  `fullname` varchar(100) NOT NULL COMMENT 'Họ tên',
  `email` varchar(100) NOT NULL COMMENT 'Email',
  `phone` varchar(15) DEFAULT NULL COMMENT 'Điện thoại',
  `title` varchar(255) NOT NULL COMMENT 'Tiêu đề',
  `detail` mediumtext NOT NULL COMMENT 'Nội dung',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_hotdeal`
--

CREATE TABLE `db_hotdeal` (
  `id` int(11) NOT NULL COMMENT 'Mã chương trình khuyến mãi',
  `product_id` int(11) NOT NULL COMMENT 'mã sản phẩm',
  `create_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Ngày khởi tạo',
  `end_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Ngày kết thúc',
  `promotion` int(11) NOT NULL COMMENT 'Phần trăm khuyến mãi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_member_card`
--

CREATE TABLE `db_member_card` (
  `id` int(11) NOT NULL COMMENT 'Mã cấp bậc thành viên',
  `name` varchar(50) NOT NULL COMMENT 'Tên cấp bậc thành viên',
  `promotion` int(11) NOT NULL COMMENT 'Mức giảm giá',
  `info1` varchar(50) DEFAULT NULL COMMENT 'Thông tin 1',
  `info2` varchar(50) DEFAULT NULL COMMENT 'Thông tin 2',
  `info3` varchar(50) DEFAULT NULL COMMENT 'Thông tin 3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_menu`
--

CREATE TABLE `db_menu` (
  `id` int(11) NOT NULL COMMENT 'Mã menu',
  `name` varchar(255) DEFAULT NULL COMMENT 'Tên menu',
  `type` varchar(255) NOT NULL COMMENT 'Loại menu',
  `link` varchar(255) DEFAULT NULL COMMENT 'Đường dẫn',
  `table_id` int(11) DEFAULT NULL COMMENT 'Bảng gốc',
  `parent_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Mã cấp cha',
  `orders` int(11) NOT NULL DEFAULT 0 COMMENT 'Sắp xếp',
  `position` varchar(255) NOT NULL COMMENT 'Vị trí',
  `status` int(11) NOT NULL COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_order`
--

CREATE TABLE `db_order` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'Mã đơn hàng',
  `user_id` int(11) NOT NULL COMMENT 'Mã thành viên',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo hoá đơn',
  `exported_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày xuất hoá đơn',
  `status` int(1) NOT NULL DEFAULT 1 COMMENT 'Quy định trạng thái:\r\n1: Đã đặt hàng\r\n2: Đã xuất kho\r\n3: Đang vận chuyển\r\n4: Hoàn thành'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_orderdetail`
--

CREATE TABLE `db_orderdetail` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'mã chi tiết đon hàng',
  `order_id` int(11) UNSIGNED NOT NULL COMMENT 'mã đơn hàng',
  `product_id` int(11) NOT NULL COMMENT 'mã sản phẩm',
  `price` float(12,0) NOT NULL COMMENT 'Giá sản phẩm (có khuyến mãi hoặc không)',
  `quantity` int(11) UNSIGNED NOT NULL COMMENT 'Số lượng sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_post`
--

CREATE TABLE `db_post` (
  `id` int(11) NOT NULL COMMENT 'Mã bài viết',
  `topic_id` int(11) UNSIGNED DEFAULT NULL COMMENT 'Mã chủ đề',
  `title` varchar(255) NOT NULL COMMENT 'Tiêu đề bài viết',
  `slug` varchar(255) NOT NULL COMMENT 'Mã hoá url',
  `detail` longtext NOT NULL COMMENT 'Nội dung bài viết',
  `img` varchar(255) DEFAULT NULL COMMENT 'Ảnh dại diện',
  `type` varchar(50) DEFAULT 'post' COMMENT 'Loại bài viết',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_post_comment`
--

CREATE TABLE `db_post_comment` (
  `id` int(11) NOT NULL COMMENT 'Mã bình luận',
  `post_id` int(11) NOT NULL COMMENT 'Mã bài viết',
  `user_id` int(11) NOT NULL COMMENT 'Mã người dùng',
  `detail` text NOT NULL COMMENT 'Nội dung'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_product`
--

CREATE TABLE `db_product` (
  `id` int(11) NOT NULL COMMENT 'mã sản phẩm',
  `category_id` int(11) NOT NULL COMMENT 'mã danh mục',
  `brand_id` int(11) NOT NULL COMMENT 'Mã thương hiệu',
  `name` varchar(255) NOT NULL COMMENT 'Tên sảnp hẩm',
  `slug` varchar(255) NOT NULL COMMENT 'mã hoá url',
  `smdetail` varchar(255) DEFAULT NULL COMMENT 'Mô tả',
  `detail` longtext DEFAULT NULL COMMENT 'chi tiết',
  `material` varchar(255) DEFAULT NULL COMMENT 'Chất liệu',
  `size` varchar(255) DEFAULT NULL COMMENT 'kích cỡ',
  `quantity` int(11) UNSIGNED NOT NULL COMMENT 'Số lượng',
  `price` int(11) DEFAULT NULL COMMENT 'Giá',
  `promtion` int(11) DEFAULT NULL COMMENT 'Phần trăm khuyến mãi',
  `trending` int(11) DEFAULT NULL COMMENT 'Sản phẩm nổi bật',
  `view` int(11) DEFAULT 0 COMMENT 'Lượt xem',
  `sold_count` int(11) NOT NULL DEFAULT 0 COMMENT 'Số lượng bán ra',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_product_comment`
--

CREATE TABLE `db_product_comment` (
  `id` int(11) NOT NULL COMMENT 'Mã bình luận',
  `product_id` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `user_id` int(11) NOT NULL COMMENT 'Mã người dùng',
  `detail` text NOT NULL COMMENT 'Nội dung'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_product_img`
--

CREATE TABLE `db_product_img` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_slider`
--

CREATE TABLE `db_slider` (
  `id` int(11) NOT NULL COMMENT 'Mã slide',
  `name` varchar(255) NOT NULL COMMENT 'Tên gọi',
  `link` varchar(255) NOT NULL COMMENT 'Đường dẫn',
  `position` varchar(100) NOT NULL COMMENT 'Vị trí',
  `info1` varchar(50) DEFAULT NULL COMMENT 'Dòng thông tin 1',
  `info2` varchar(50) DEFAULT NULL COMMENT 'Dòng thông tin 2',
  `info3` varchar(50) DEFAULT NULL COMMENT 'Dòng thông tin 3',
  `img` varchar(100) NOT NULL COMMENT 'Hình ảnh',
  `orders` int(11) NOT NULL COMMENT 'Sắp xếp',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_topic`
--

CREATE TABLE `db_topic` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'Mã chủ đề',
  `name` varchar(255) NOT NULL COMMENT 'Tên chủ đề',
  `slug` varchar(255) NOT NULL COMMENT 'Mã hoá url',
  `parent_id` int(11) UNSIGNED NOT NULL COMMENT 'Mã cấp cha',
  `orders` int(11) UNSIGNED NOT NULL COMMENT 'Sắp xếp',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `id` int(11) NOT NULL COMMENT 'Mã thành viên',
  `fullname` varchar(255) NOT NULL COMMENT 'Tên thành viên',
  `username` varchar(225) NOT NULL COMMENT 'Tên tài khoản',
  `password` varchar(64) NOT NULL COMMENT 'mật khẩu',
  `email` varchar(255) NOT NULL COMMENT 'email',
  `address` varchar(255) DEFAULT NULL COMMENT 'địa chỉ',
  `gender` int(1) DEFAULT NULL COMMENT 'giới tính',
  `phone` varchar(15) DEFAULT NULL COMMENT 'số điện thoại',
  `img` varchar(100) DEFAULT NULL COMMENT 'ảnh đại diện',
  `role` varchar(255) NOT NULL DEFAULT 'customer' COMMENT 'vai trò',
  `rank_id` int(11) NOT NULL DEFAULT 1 COMMENT 'Cấp thành viên',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_banner`
--
ALTER TABLE `db_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_brand`
--
ALTER TABLE `db_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_category`
--
ALTER TABLE `db_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_config`
--
ALTER TABLE `db_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_contact`
--
ALTER TABLE `db_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_hotdeal`
--
ALTER TABLE `db_hotdeal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hotdeal_product` (`product_id`);

--
-- Indexes for table `db_member_card`
--
ALTER TABLE `db_member_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_menu`
--
ALTER TABLE `db_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_order`
--
ALTER TABLE `db_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_user` (`user_id`);

--
-- Indexes for table `db_orderdetail`
--
ALTER TABLE `db_orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderdetail_order` (`order_id`),
  ADD KEY `fk_orderdetail_product` (`product_id`);

--
-- Indexes for table `db_post`
--
ALTER TABLE `db_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_topic` (`topic_id`);

--
-- Indexes for table `db_post_comment`
--
ALTER TABLE `db_post_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_postcmt_post` (`post_id`),
  ADD KEY `fk_postcmt_user` (`user_id`);

--
-- Indexes for table `db_product`
--
ALTER TABLE `db_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`category_id`),
  ADD KEY `fk_product_brand` (`brand_id`);

--
-- Indexes for table `db_product_comment`
--
ALTER TABLE `db_product_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_productcmt_product` (`product_id`),
  ADD KEY `fk_productcmt_user` (`user_id`);

--
-- Indexes for table `db_product_img`
--
ALTER TABLE `db_product_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_imglist_product` (`product_id`);

--
-- Indexes for table `db_slider`
--
ALTER TABLE `db_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_topic`
--
ALTER TABLE `db_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_rank` (`rank_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_banner`
--
ALTER TABLE `db_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã slide';

--
-- AUTO_INCREMENT for table `db_brand`
--
ALTER TABLE `db_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã danh mục', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `db_category`
--
ALTER TABLE `db_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã danh mục', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `db_config`
--
ALTER TABLE `db_config`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_contact`
--
ALTER TABLE `db_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã liên hệ', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_hotdeal`
--
ALTER TABLE `db_hotdeal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã chương trình khuyến mãi';

--
-- AUTO_INCREMENT for table `db_member_card`
--
ALTER TABLE `db_member_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã cấp bậc thành viên';

--
-- AUTO_INCREMENT for table `db_menu`
--
ALTER TABLE `db_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã menu', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `db_order`
--
ALTER TABLE `db_order`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng';

--
-- AUTO_INCREMENT for table `db_orderdetail`
--
ALTER TABLE `db_orderdetail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'mã chi tiết đon hàng';

--
-- AUTO_INCREMENT for table `db_post`
--
ALTER TABLE `db_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã bài viết', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_product`
--
ALTER TABLE `db_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã sản phẩm', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `db_product_img`
--
ALTER TABLE `db_product_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_slider`
--
ALTER TABLE `db_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã slide', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `db_topic`
--
ALTER TABLE `db_topic`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã chủ đề', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã thành viên', AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_hotdeal`
--
ALTER TABLE `db_hotdeal`
  ADD CONSTRAINT `fk_hotdeal_product` FOREIGN KEY (`product_id`) REFERENCES `db_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_order`
--
ALTER TABLE `db_order`
  ADD CONSTRAINT `fk_order_user` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_orderdetail`
--
ALTER TABLE `db_orderdetail`
  ADD CONSTRAINT `fk_orderdetail_order` FOREIGN KEY (`order_id`) REFERENCES `db_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orderdetail_product` FOREIGN KEY (`product_id`) REFERENCES `db_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_post`
--
ALTER TABLE `db_post`
  ADD CONSTRAINT `fk_post_topic` FOREIGN KEY (`topic_id`) REFERENCES `db_topic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_post_comment`
--
ALTER TABLE `db_post_comment`
  ADD CONSTRAINT `fk_postcmt_post` FOREIGN KEY (`post_id`) REFERENCES `db_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_postcmt_user` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_product`
--
ALTER TABLE `db_product`
  ADD CONSTRAINT `fk_product_brand` FOREIGN KEY (`brand_id`) REFERENCES `db_brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `db_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_product_comment`
--
ALTER TABLE `db_product_comment`
  ADD CONSTRAINT `fk_productcmt_product` FOREIGN KEY (`product_id`) REFERENCES `db_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productcmt_user` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_product_img`
--
ALTER TABLE `db_product_img`
  ADD CONSTRAINT `fk_imglist_product` FOREIGN KEY (`product_id`) REFERENCES `db_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_user`
--
ALTER TABLE `db_user`
  ADD CONSTRAINT `fk_user_rank` FOREIGN KEY (`rank_id`) REFERENCES `db_member_card` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
