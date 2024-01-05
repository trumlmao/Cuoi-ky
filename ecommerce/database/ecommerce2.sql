-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 04:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `oid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `opname` varchar(255) NOT NULL,
  `opprice` float NOT NULL,
  `oqnt` int(10) NOT NULL,
  `ototal` float NOT NULL,
  `paid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`oid`, `pid`, `uid`, `opname`, `opprice`, `oqnt`, `ototal`, `paid`) VALUES
(20, 1, 5, 'Corsair K95 RGB Platinum', 169.99, 5, 849.95, 1);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `shipping` float NOT NULL,
  `sub_total` float NOT NULL,
  `total` float NOT NULL,
  `paid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `uid`, `shipping`, `sub_total`, `total`, `paid`) VALUES
(11, 5, 19.99, 849.95, 869.94, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `pay_name` varchar(255) DEFAULT NULL,
  `card_no` int(50) DEFAULT NULL,
  `exp` date DEFAULT NULL,
  `cvv` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `user_name`, `full_name`, `phone`, `email`, `pass`, `pay_name`, `card_no`, `exp`, `cvv`) VALUES
(5, 'vana', 'Nguyen van a', 123456789, 'trumeakao2001@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE `main_category` (
  `main_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`main_category_id`, `name`) VALUES
(1, 'Brand'),
(2, 'Connectivity'),
(3, 'Size'),
(4, 'Product Type'),
(5, 'LED'),
(6, 'Switch');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(10) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pprice` float NOT NULL,
  `pdes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pprice`, `pdes`) VALUES
(1, 'Echeveria Preta', 74.99, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit ratione fugiat praesentium, atque at labore quas impedit nostrum officia illo reiciendis, adipisci minus? Nesciunt nulla suscipit corrupti perspiciatis ut repellendus obcaecati vel totam atque iure. Veritatis, fugiat excepturi odit nihil mollitia aspernatur esse praesentium dolorem porro explicabo impedit tempore modi dolor, ullam tenetur magni quasi nulla aperiam facere in architecto rerum expedita? Voluptatem, libero. Necessitatibus neque omnis illo. Temporibus, eligendi nobis voluptates similique quas quod neque rem odit. Impedit atque officiis, nobis est sequi ea, molestias, repudiandae sit blanditiis quasi tempora eveniet voluptates quisquam soluta assumenda iste eligendi. Cupiditate, deleniti!'),
(2, 'Fiddle Leaf Fig', 54.99, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit ratione fugiat praesentium, atque at labore quas impedit nostrum officia illo reiciendis, adipisci minus? Nesciunt nulla suscipit corrupti perspiciatis ut repellendus obcaecati vel totam atque iure. Veritatis, fugiat excepturi odit nihil mollitia aspernatur esse praesentium dolorem porro explicabo impedit tempore modi dolor, ullam tenetur magni quasi nulla aperiam facere in architecto rerum expedita? Voluptatem, libero. Necessitatibus neque omnis illo. Temporibus, eligendi nobis voluptates similique quas quod neque rem odit. Impedit atque officiis, nobis est sequi ea, molestias, repudiandae sit blanditiis quasi tempora eveniet voluptates quisquam soluta assumenda iste eligendi. Cupiditate, deleniti!'),
(3, 'Maranta', 64.99, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit ratione fugiat praesentium, atque at labore quas impedit nostrum officia illo reiciendis, adipisci minus? Nesciunt nulla suscipit corrupti perspiciatis ut repellendus obcaecati vel totam atque iure. Veritatis, fugiat excepturi odit nihil mollitia aspernatur esse praesentium dolorem porro explicabo impedit tempore modi dolor, ullam tenetur magni quasi nulla aperiam facere in architecto rerum expedita? Voluptatem, libero. Necessitatibus neque omnis illo. Temporibus, eligendi nobis voluptates similique quas quod neque rem odit. Impedit atque officiis, nobis est sequi ea, molestias, repudiandae sit blanditiis quasi tempora eveniet voluptates quisquam soluta assumenda iste eligendi. Cupiditate, deleniti!'),
(4, 'Monstera Deliciosa', 64.99, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit ratione fugiat praesentium, atque at labore quas impedit nostrum officia illo reiciendis, adipisci minus? Nesciunt nulla suscipit corrupti perspiciatis ut repellendus obcaecati vel totam atque iure. Veritatis, fugiat excepturi odit nihil mollitia aspernatur esse praesentium dolorem porro explicabo impedit tempore modi dolor, ullam tenetur magni quasi nulla aperiam facere in architecto rerum expedita? Voluptatem, libero. Necessitatibus neque omnis illo. Temporibus, eligendi nobis voluptates similique quas quod neque rem odit. Impedit atque officiis, nobis est sequi ea, molestias, repudiandae sit blanditiis quasi tempora eveniet voluptates quisquam soluta assumenda iste eligendi. Cupiditate, deleniti!'),
(5, 'Philodendron Green', 49.99, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit ratione fugiat praesentium, atque at labore quas impedit nostrum officia illo reiciendis, adipisci minus? Nesciunt nulla suscipit corrupti perspiciatis ut repellendus obcaecati vel totam atque iure. Veritatis, fugiat excepturi odit nihil mollitia aspernatur esse praesentium dolorem porro explicabo impedit tempore modi dolor, ullam tenetur magni quasi nulla aperiam facere in architecto rerum expedita? Voluptatem, libero. Necessitatibus neque omnis illo. Temporibus, eligendi nobis voluptates similique quas quod neque rem odit. Impedit atque officiis, nobis est sequi ea, molestias, repudiandae sit blanditiis quasi tempora eveniet voluptates quisquam soluta assumenda iste eligendi. Cupiditate, deleniti!'),
(6, 'Floor-sized Pot 14 inch', 14.99, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit ratione fugiat praesentium, atque at labore quas impedit nostrum officia illo reiciendis, adipisci minus? Nesciunt nulla suscipit corrupti perspiciatis ut repellendus obcaecati vel totam atque iure. Veritatis, fugiat excepturi odit nihil mollitia aspernatur esse praesentium dolorem porro explicabo impedit tempore modi dolor, ullam tenetur magni quasi nulla aperiam facere in architecto rerum expedita? Voluptatem, libero. Necessitatibus neque omnis illo. Temporibus, eligendi nobis voluptates similique quas quod neque rem odit. Impedit atque officiis, nobis est sequi ea, molestias, repudiandae sit blanditiis quasi tempora eveniet voluptates quisquam soluta assumenda iste eligendi. Cupiditate, deleniti!'),
(7, 'Floor-sized Pot 11.5 inch', 14.99, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit ratione fugiat praesentium, atque at labore quas impedit nostrum officia illo reiciendis, adipisci minus? Nesciunt nulla suscipit corrupti perspiciatis ut repellendus obcaecati vel totam atque iure. Veritatis, fugiat excepturi odit nihil mollitia aspernatur esse praesentium dolorem porro explicabo impedit tempore modi dolor, ullam tenetur magni quasi nulla aperiam facere in architecto rerum expedita? Voluptatem, libero. Necessitatibus neque omnis illo. Temporibus, eligendi nobis voluptates similique quas quod neque rem odit. Impedit atque officiis, nobis est sequi ea, molestias, repudiandae sit blanditiis quasi tempora eveniet voluptates quisquam soluta assumenda iste eligendi. Cupiditate, deleniti!'),
(8, 'Lava Rocks', 9.99, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit ratione fugiat praesentium, atque at labore quas impedit nostrum officia illo reiciendis, adipisci minus? Nesciunt nulla suscipit corrupti perspiciatis ut repellendus obcaecati vel totam atque iure. Veritatis, fugiat excepturi odit nihil mollitia aspernatur esse praesentium dolorem porro explicabo impedit tempore modi dolor, ullam tenetur magni quasi nulla aperiam facere in architecto rerum expedita? Voluptatem, libero. Necessitatibus neque omnis illo. Temporibus, eligendi nobis voluptates similique quas quod neque rem odit. Impedit atque officiis, nobis est sequi ea, molestias, repudiandae sit blanditiis quasi tempora eveniet voluptates quisquam soluta assumenda iste eligendi. Cupiditate, deleniti!'),
(9, 'Watering Can', 9.99, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit ratione fugiat praesentium, atque at labore quas impedit nostrum officia illo reiciendis, adipisci minus? Nesciunt nulla suscipit corrupti perspiciatis ut repellendus obcaecati vel totam atque iure. Veritatis, fugiat excepturi odit nihil mollitia aspernatur esse praesentium dolorem porro explicabo impedit tempore modi dolor, ullam tenetur magni quasi nulla aperiam facere in architecto rerum expedita? Voluptatem, libero. Necessitatibus neque omnis illo. Temporibus, eligendi nobis voluptates similique quas quod neque rem odit. Impedit atque officiis, nobis est sequi ea, molestias, repudiandae sit blanditiis quasi tempora eveniet voluptates quisquam soluta assumenda iste eligendi. Cupiditate, deleniti!'),
(10, 'Soil', 24.99, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit ratione fugiat praesentium, atque at labore quas impedit nostrum officia illo reiciendis, adipisci minus? Nesciunt nulla suscipit corrupti perspiciatis ut repellendus obcaecati vel totam atque iure. Veritatis, fugiat excepturi odit nihil mollitia aspernatur esse praesentium dolorem porro explicabo impedit tempore modi dolor, ullam tenetur magni quasi nulla aperiam facere in architecto rerum expedita? Voluptatem, libero. Necessitatibus neque omnis illo. Temporibus, eligendi nobis voluptates similique quas quod neque rem odit. Impedit atque officiis, nobis est sequi ea, molestias, repudiandae sit blanditiis quasi tempora eveniet voluptates quisquam soluta assumenda iste eligendi. Cupiditate, deleniti!');

-- --------------------------------------------------------

--
-- Table structure for table `product2`
--

CREATE TABLE `product2` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pprice` decimal(10,2) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `pdes` text NOT NULL,
  `main_category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `keyboard_type` varchar(50) DEFAULT NULL,
  `switch_type` varchar(50) DEFAULT NULL,
  `interface_type` varchar(50) DEFAULT NULL,
  `accessory_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product2`
--

INSERT INTO `product2` (`pid`, `pname`, `pprice`, `p_img`, `pdes`, `main_category_id`, `subcategory_id`, `keyboard_type`, `switch_type`, `interface_type`, `accessory_type`) VALUES
(1, 'Corsair K95 RGB Platinum', 169.99, 'https://product.hstatic.net/200000722513/product/k95_chuan_1f31e14c9d7947349b596e71299b27d8_1024x1024.png', 'Mechanical gaming keyboard with Cherry MX switches, RGB lighting, and aluminum frame.', 1, 16, 'Mechanical', 'Cherry MX', 'USB', 'RGB Lighting'),
(2, 'E-Dra EK368L Alpha', 499.00, 'https://minhancomputercdn.com/media/product/13103_13079_ek387l_brown_switch_02.jpg', 'Mechanical gaming keyboard with Cherry MX switches, RGB lighting, and aluminum frame.', 1, 17, 'OFFICE', 'Cherry MX', 'Bluetooth', 'None'),
(4, 'Rapoo V500 Alloy', 690.00, 'https://product.hstatic.net/200000722513/product/9602_21e9b7c37f5bdc5db1c022c21ba4ca38_78a0f6e0f2194ad59c53c7cc0c377912_7a9519dd934e4aa78f76eb03d4fc2149_1024x1024.jpg', 'L?p trên cùng b?ng h?p kim nhôm là b? khung c?a bàn phím. V500 Alloy ???c ch? t?o t? nh?ng v?t li?u cao c?p nh?t.', 1, 18, 'Gaming', 'Rapoo Blue', 'USB', 'RGB'),
(5, ' E-Dra EK387L', 549.00, 'https://product.hstatic.net/200000722513/product/0ed9a4bcac54d75b4d1305e1600a103_006a076a313744d49fdd8971990e260c_large_41aa955d90ed4946a55bbf4079cb9c4b_1024x1024.jpg', 'Bàn phím E-Dra EK387L là m?t trong nh?ng bàn phím c? giá r? ?áng s? h?u cho game th?. Bàn phím ???c hoàn thi?n b?ng nh? ABS ?? t?i ?u hóa tr?ng l??ng t?ng th?. Ki?u dáng TKL g?n gàng, ti?n l?i nh?ng v?n ?áp ?ng ?? m?i nhu c?u s? d?ng c?a ng??i dùng.', 1, 17, 'Gaming', 'Huano Brown', 'USB', 'RGB'),
(6, 'Outemu Red', 2500.00, 'https://lacdau.com/media/product/3921-4768_red.jpg', 'Red Switch: Hay còn g?i là linear switch, Dòng Switch dành cho nh?ng cai yêu thích s? m??t mà và không ?n ào! Red Switch không phát ra ti?ng và hành trình c?ng không có kh?c t?o c?m giác b?m tr?n m??t êm ái và nhanh nh?y! tùy tay m?i ng??i s? có c?m nh?n riêng!', 6, 1, NULL, NULL, '3 pin', NULL),
(7, 'SteelSeries Apex Pro Mechanical Gaming Keyboard', 199.99, 'https://product.hstatic.net/200000722513/product/gvn_steel_apexpro_437eae419aaa4a4a8e83ad04772215a4_caee2ca4d25144f7b6f07018af28d83c_1024x1024.png', 'Adjustable mechanical switches, OLED Smart Display, and aluminum frame for personalized gaming experience.', 1, 16, 'Mechanical', 'OmniPoint Adjustable', 'USB', 'Adjustable Mechanical Switches, OLED Display, Alum'),
(8, 'Ducky One 2 Mini Mechanical Keyboard', 109.99, 'https://product.hstatic.net/200000722513/product/gearvn_duckyminiones_860d46b7237b419bbff247ba99d0323b_1024x1024.png', '60% compact mechanical keyboard with customizable RGB lighting and detachable USB-C cable.', 1, 16, 'Mechanical', 'Various Switch Options', 'USB-C', 'Compact Design, Customizable RGB Lighting'),
(9, 'Corsair K70 RGB MK.2 Mechanical Gaming Keyboard', 159.99, 'https://product.hstatic.net/200000722513/product/n.com-products-corsair-k70-rgb-mk-2-1_d4146896b68f4602996d5a9acceb2a3b_1c28692d39374689919ea2676bf15fcf_1024x1024.png', 'Mechanical gaming keyboard with Cherry MX switches, per-key RGB lighting, and dedicated media controls.', 1, 16, 'Mechanical', 'Cherry MX', 'USB', 'Per-Key RGB Lighting, Dedicated Media Controls'),
(10, 'HyperX Alloy FPS Pro Mechanical Gaming Keyboard', 69.99, 'https://hyperx.com/cdn/shop/files/hyperx_alloy_origins_core_us_1_top_down_renamed_0_1080x.jpg?v=1688317946', 'Compact tenkeyless mechanical keyboard with Cherry MX switches, solid steel frame, and red backlighting.', 1, 16, 'Mechanical', 'Cherry MX', 'USB', 'Compact Design, Solid Steel Frame, Red Backlightin'),
(11, 'Logitech G513 Carbon Mechanical Gaming Keyboard', 129.99, 'https://resource.logitechg.com/w_1600,c_limit,q_auto,f_auto,dpr_1.0/d_transparent.gif/content/dam/gaming/en/products/g513/g513-carbon-gallery-1.png?v=1', 'Full-sized mechanical gaming keyboard with Romer-G switches, customizable RGB lighting, and dedicated media controls.', 1, 16, 'Mechanical', 'Romer-G', 'USB', 'Customizable RGB Lighting, Dedicated Media Control'),
(12, 'Roccat Vulcan 121 AIMO Mechanical Gaming Keyboard', 149.99, 'https://ca.roccat.com/cdn/shop/products/pdp_gallery_01_main_904fef1f-90f4-4d53-93c4-2ac6d182ae72_1200x@2x.png?v=1616625253', 'Mechanical gaming keyboard with Titan switches, customizable AIMO RGB lighting, and anodized aluminum top plate.', 1, 16, 'Mechanical', 'Titan', 'USB', 'Customizable AIMO RGB Lighting, Aluminum Top Plate'),
(13, 'Anne Pro 2 Mechanical Gaming Keyboard', 89.99, 'https://getannepro.com/cdn/shop/products/01_2048x2048.jpg?v=1626421900', 'Compact 60% wireless mechanical keyboard with customizable RGB lighting and programmable keys.', 1, 16, 'Mechanical', 'Various Switch Options', 'Wireless/Bluetooth', 'Compact Design, Wireless Connectivity'),
(14, 'Cooler Master CK552 Gaming Mechanical Keyboard', 79.99, 'https://product.hstatic.net/1000129940/product/coolermaster_ck552_master.jpg', 'Full-sized mechanical gaming keyboard with Gateron switches, customizable RGB lighting, and brushed aluminum design.', 1, 16, 'Mechanical', 'Gateron', 'USB', 'Customizable RGB Lighting, Brushed Aluminum Design'),
(15, 'Cherry MX Red Switch', 9.99, 'https://www.cherrymx.de/_Resources/Persistent/3/f/3/c/3f3cc49f11b55bb11db3ade8f8b1ee5404f90a24/MX2A_Red_non_RGB-368x368.png', 'Linear mechanical switch with a soft actuation force, ideal for gaming.', 6, 1, 'Switch', 'Cherry MX Red', NULL, 'Linear, Soft Actuation Force'),
(16, 'Razer Green Switch', 12.99, 'https://assets2.razerzone.com/images/pnx.assets/8e46d4bf7c172afd97fa485f06526bf9/500x500-greenswitch.webp', 'Tactile and clicky mechanical switch with optimized actuation and reset points for gaming.', 6, 1, 'Switch', 'Razer Green', NULL, 'Tactile, Clicky, Optimized Actuation'),
(17, 'Logitech Romer-G Switch', 11.99, 'https://down-vn.img.susercontent.com/file/6bd74522d308615d4919e3b649eb1099', 'Tactile and quiet mechanical switch designed for precision and performance.', 6, 1, 'Switch', 'Romer-G', NULL, 'Tactile, Quiet, Precision'),
(18, 'Gateron Blue Switch', 8.99, 'https://down-vn.img.susercontent.com/file/vn-50009109-7726b3959ab31921bf4ada8e7e9d3576', 'Tactile and clicky mechanical switch with a distinctive audible click sound.', 6, 1, 'Switch', 'Gateron Blue', NULL, 'Tactile, Clicky, Audible Click Sound'),
(20, 'Kalih Brown Switch', 10.99, 'https://lacdau.com/media/product/250-3463-9.jpg', 'Tactile mechanical switch with a medium actuation force, suitable for typing and gaming.', 6, 1, 'Switch', 'Kalih Brown', NULL, 'Tactile, Medium Actuation Force'),
(21, 'Cherry MX Silent Red Switch', 11.99, 'https://down-vn.img.susercontent.com/file/e7817d3ab830a9824c08975155d14b41', 'Linear mechanical switch with reduced noise for a quiet typing experience.', 6, 1, 'Switch', 'Cherry MX Silent Red', NULL, 'Linear, Reduced Noise'),
(22, 'Outemu Blue Switch', 7.99, 'https://down-vn.img.susercontent.com/file/b4a30ea37ed7806b0fcc5d80cd1e647a', 'Tactile and clicky mechanical switch with a similar feel to Cherry MX Blue.', 6, 1, 'Switch', 'Outemu Blue', NULL, 'Tactile, Clicky'),
(23, 'Roccat Titan Switch', 13.99, 'http://review.loa.com.vn/wp-content/uploads/2018/11/TitanSwitch-Image-1-750x400.jpg', 'Tactile and precise mechanical switch designed for gaming performance.', 6, 1, 'Switch', 'Roccat Titan', NULL, 'Tactile, Precise');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `main_category_id` int(11) DEFAULT NULL,
  `subcat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `main_category_id`, `subcat_name`) VALUES
(1, 1, 'ACER'),
(2, 1, 'Ajazz'),
(3, 1, 'AKKO'),
(4, 2, 'Bluetooth'),
(5, 2, 'Wi-Fi'),
(6, 2, 'USB'),
(7, 3, 'TKL'),
(8, 3, 'Full size'),
(9, 3, 'Mini'),
(10, 4, 'Gaming'),
(11, 4, 'Case'),
(13, 5, 'RGB'),
(14, 5, 'Single'),
(15, 5, 'None'),
(16, 1, 'Corsair'),
(17, 1, 'E-Dra'),
(18, 1, 'Rapoo'),
(19, 6, 'Red'),
(20, 6, 'Blue'),
(21, 6, 'White'),
(22, 6, 'Brown'),
(23, 6, 'Black');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `cart_ibfk_1` (`pid`),
  ADD KEY `cart_ibfk_2` (`uid`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `product2`
--
ALTER TABLE `product2`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `oid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product2`
--
ALTER TABLE `product2`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
