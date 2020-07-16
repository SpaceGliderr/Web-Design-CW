-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 12:11 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech_navi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_ID` int(7) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_ID`, `email`, `admin_name`, `admin_password`) VALUES
(1, 'admin1@technavi.com', 'Admin1', 'Password123');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_ID` int(7) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_name` varchar(120) DEFAULT NULL,
  `product_description` varchar(255) DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `product_stock` int(11) DEFAULT NULL,
  `product_category` varchar(255) DEFAULT NULL,
  `delivery` int(11) DEFAULT NULL,
  `product_specs` varchar(255) DEFAULT NULL,
  `product_rating` double DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `vendor_ID` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_ID`, `product_image`, `product_name`, `product_description`, `product_price`, `product_stock`, `product_category`, `delivery`, `product_specs`, `product_rating`, `product_type`, `vendor_ID`) VALUES
(1, 'product_images/MacBookAir.png', '13-inch MacBook Air 2020', '13-inch MacBook Air 2020 for sale.', 5599, 20, 'pclaptop', 7, 'product_images/MacBookAir-Spec.png', 4.3, 'PC', 1),
(2, 'product_images/iMac.png', '27-inch iMac', '27-inch 6-core iMac for sale.', 7699, 15, 'pclaptop', 10, 'product_images/iMac-Spec.png', 2.3, 'Laptop', 1),
(3, 'product_images/HP Spectre.png', 'HP Spectre x360', 'The thinnest HP convertible is now on sale.', 6499, 50, 'pclaptop', 5, 'product_images/HP Spectre-Spec.png', 5, 'Laptop', 3),
(4, 'product_images/HP Envy 13.png', 'HP Envy 13', 'Get the newest HP Envy 13 here today!', 4199, 60, 'pclaptop', 7, 'product_images/HP Envy 13-Spec.png', 3.9, 'Laptop', 3),
(5, 'product_images/Dell XPS 13.png', 'Dell XPS 13', 'The latest XPS in the Dell XPS series.', 5999, 40, 'pclaptop', 4, 'product_images/Dell XPS 13-Spec.png', 3.8, 'Laptop', 4),
(6, 'product_images/Macbook Pro 16 inch.png', '16-inch MacBook Pro 2020', 'With great power comes great capability', 10499, 40, 'pclaptop', 10, 'product_images/Macbook Pro 16 inch-Spec.png', 4.9, 'Laptop', 1),
(7, 'product_images/Macbook Pro 13-inch.png', '13-inch MacBook Pro 2021', 'With great power comes great capability', 5433, 20, 'pclaptop', 8, 'product_images/Macbook Pro 13-inch-Spec.png', 4.5, 'Laptop', 1),
(8, 'product_images/Dell XPS 15.png', 'Dell XPS 15', 'Dell’s smallest 15.6-inch performance laptop with a stunning OLED display option.', 6799, 30, 'pclaptop', 8, 'product_images/Dell XPS 15-Spec.png', 4.8, 'Laptop', 4),
(9, 'product_images/Asus Zenbook 13.png', 'Asus Zenbook 13', 'This time around, the ScreenPad has made its way to the Zenbook as well and has some interesting improvements going on.', 3899, 50, 'pclaptop', 5, 'product_images/Asus Zenbook 13-Spec.png', 3, 'Laptop', 7),
(10, 'product_images/Acer Swift 5.png', 'Acer Swift 5', 'Designed to be carried around all-day for work and entertainment, the Swift 5 is the lightest', 3699, 40, 'pclaptop', 2, 'product_images/Acer Swift 5-Spec.png', 3, 'Laptop', 8),
(11, 'product_images/iPhone11.png', 'Apple iPhone 11', 'New iPhone 11 for sale.', 3399, 150, 'smartphone', 5, 'product_images/iPhone11-Spec.png', 4.2, 'Smartphone', 1),
(12, 'product_images/iPad.png', '10.2-inch iPad', 'The 2020 edition of the 10.2-inch iPad.', 1499, 300, 'smartphone', 3, 'product_images/iPad-Spec.png', 4.5, 'Tablet', 1),
(13, 'product_images/iPhone 11 Pro.png', 'iPhone 11 Pro 64GB', 'Powerful Devices that enables you to do more', 4799, 150, 'smartphone', 10, 'product_images/iPhone 11 Pro-Spec.png', 4.8, 'Smartphone', 1),
(14, 'product_images/iPhone 11 Pro Max.png', 'iPhone 11 Pro Max 64GB', 'Powerful Devices that enables you to do more', 4999, 150, 'smartphone', 10, 'product_images/iPhone 11 Pro Max-Spec.png', 4.8, 'Smartphone', 1),
(15, 'product_images/S20.png', 'Samsung Galaxy S20', 'This is the phone that will change photography', 3799, 200, 'smartphone', 10, 'product_images/S20-Spec.png', 4.5, 'Smartphone', 2),
(16, 'product_images/S20+.png', 'Samsung Galaxy S20+', 'This is the phone that will change photography', 3999, 200, 'smartphone', 10, 'product_images/S20+-Spec.png', 4.7, 'Smartphone', 2),
(17, 'product_images/S20 Ultra 5G.png', 'Samsung Galaxy S20 Ultra5G', '5G power phone that will change photography', 4999, 150, 'smartphone', 5, 'product_images/S20 Ultra 5G-Spec.png', 4.8, 'Smartphone', 2),
(18, 'product_images/Oppo Find X2 Pro.png', 'Oppo Find X2 Pro 5G', 'Pushed the boundaries of technology, to constantly create new possibilities', 4599, 150, 'smartphone', 7, 'product_images/Oppo Find X2 Pro-Spec.png', 4.8, 'Smartphone', 5),
(19, 'product_images/Huawei P40 Pro.png', 'Huawei P40 Pro 5G', 'Visionary Photography', 3899, 100, 'smartphone', 5, 'product_images/Huawei P40 Pro-Spec.png', 4.6, 'Smartphone', 6),
(20, 'product_images/Huawei Mate 30 Pro.png', 'Huawei Mate 30 Pro', 'Rethink Possibilities', 3799, 100, 'smartphone', 5, 'product_images/Huawei Mate 30 Pro-Spec.png', 4.7, 'Smartphone', 6),
(21, 'product_images/Logitech G502.png', 'Logitech G502', 'Featuring HERO, our best sensor, 11 programmable buttons, LIGHTSYNC RGB technology & tunable weight', 199, 100, 'gaming', 10, 'product_images/Logitech G502-Spec.png', 4.8, 'Gaming Mouse', 9),
(22, 'product_images/Razer Deathadder Elite.png', 'Razer Deathadder Elite', 'Ergonomic mouse gives you the absolute advantage.', 239, 50, 'gaming', 4, 'product_images/Razer Deathadder Elite-Spec.png', 4.8, 'Gaming Mouse', 10),
(23, 'product_images/Razer Goliathus Chroma Mousepad.png', 'Razer Goliathus Chroma Mousepad', 'Our bestselling soft gaming mouse mat is now Powered by Razer Chroma', 161, 50, 'gaming', 3, 'product_images/Razer Goliathus Chroma Mousepad-Spec.png', 4.6, 'Gaming Mouse Pad', 10),
(24, 'product_images/SteelSeries Rival 650.png', 'SteelSeries Rival 650 Dual Sensor RGB Wireless Gaming Mouse', 'First True Performance Wireless Mouse Exclusive Quantum WirelessTM offers lag-free 1000Hz', 539, 20, 'gaming', 2, 'product_images/SteelSeries Rival 650-Spec.png', 4.8, 'Gaming Mouse', 16),
(25, 'product_images/SteelSeries Rival 110.png', 'SteelSeries Rival 110 Gaming Mouse', 'Rival 110 is a streamlined, pure performance gaming mouse engineered with the new TrueMove1 optical sensor for 1 to 1 tracking', 169, 40, 'gaming', 5, 'product_images/SteelSeries Rival 110-Spec.png', 4.5, 'Gaming Mouse', 16),
(26, 'product_images/Logitech G703 LightSpeed.png', 'Logitech G703 LightSpeed Wireless Gaming Mouse', 'Logitech G invented LIGHTSPEED wireless technology to deliver the ultimate in high-performance wireless gaming', 419, 20, 'gaming', 1, 'product_images/Logitech G703 LightSpeed-Spec.png', 4.4, 'Gaming Mouse', 9),
(27, 'product_images/SteelSeries Rival 600.png', 'SteelSeries Rival 600 Wired USB Gaming Mouse', 'The new dual sensor system combines true 1 to 1 tracking with breakthrough state-of-the art lift off distance detection.', 359, 20, 'gaming', 1, 'product_images/SteelSeries Rival 600-Spec.png', 4.5, 'Gaming Mouse', 16),
(28, 'product_images/SteelSeries Rival 310 PUBG Limited Edition.png', 'SteelSeries Rival 310 PUBG Limited Edition Gaming Mouse', 'Comfortable, ergonomic design Multi-color Prism RGB', 329, 10, 'gaming', 2, 'product_images/SteelSeries Rival 310 PUBG Limited Edition-Spec.png', 4, 'Gaming Mouse', 16),
(29, 'product_images/Logitech G440 Hard Gaming Mouse Pad.png', 'Logitech G440 Hard Gaming Mouse Pad', 'Features ultra low surface friction, offering high DPI gamers an ideal surface for subtle hand movements and quick mouse gestures.', 89, 20, 'gaming', 10, 'product_images/Logitech G440 Hard Gaming Mouse Pad-Spec.png', 4.9, 'Gaming Mouse Pad', 9),
(30, 'product_images/SteelSeries QCK+ PUBG Erangel Edition Gaming Mouse Pad.png', 'SteelSeries QCK+ PUBG Erangel Edition Gaming Mouse Pad', 'The Limited Edition PUBG Erangel Edition Qck+ features the legendary micro-woven cloth of the QcK line, the worlds best-selling gaming surface.', 129, 20, 'gaming', 5, 'product_images/SteelSeries QCK+ PUBG Erangel Edition Gaming Mouse Pad-Spec.png', 4.9, 'Gaming Mouse Pad', 16),
(31, 'product_images/Asus RT-N12 4 ports Wireless Router.png', 'Asus RT-N12 4 ports Wireless Router', 'The premier wireless solution from ASUS providing the wireless solution of choice for offices and high-end consumer', 109, 5, 'accessories', 0, 'product_images/Asus RT-N12 4 ports Wireless Router-Spec.png', 4.8, 'Wi-Fi Router', 7),
(32, 'product_images/Asus Blue Cave AC2600 Dual-WAN Dual Band WiFi Router.png', 'Asus Blue Cave AC2600 Dual-WAN Dual Band WiFi Router', 'Protects all connected devices from cyber threats and Advanced Parental Controls filter out inappropriate', 669, 5, 'accessories', 0, 'product_images/Asus Blue Cave AC2600 Dual-WAN Dual Band WiFi Router-Spec.png', 4.5, 'Wi-Fi Router', 7),
(33, 'product_images/Asus RT-AC5300 AC5300 AiMesh Tri-band Gigabit Router.png', 'Asus RT-AC5300 AC5300 AiMesh Tri-band Gigabit Router', 'Gaming Router with MU-MIMO, supporting AiProtection network security powered by Trend Micro', 1439, 2, 'accessories', 0, 'product_images/Asus RT-AC5300 AC5300 AiMesh Tri-band Gigabit Router-Spec.png', 4.9, 'Wi-Fi Router', 7),
(34, 'product_images/D-Link DWM-222 USB 4G LTE Modem.png', 'D-Link DWM-222 USB 4G LTE Modem', 'Plug connects directly to your PC or laptop', 205, 20, 'accessories', 0, 'product_images/D-Link DWM-222 USB 4G LTE Modem-Spec.png', 4.5, 'USB 4G LTE Modem', 13),
(35, 'product_images/D-Link DWM-156 HSUPA USB 3.75G Modem.png', 'D-Link DWM-156 HSUPA USB 3.75G Modem', 'Supports the latest 3.75G High Speed Uplink Packet Access (HSUPA) technology, which boosts the maximum uplink data rate to 5.76Mbps', 73, 20, 'accessories', 0, 'product_images/D-Link DWM-156 HSUPA USB 3.75G Modem-Spec.png', 4.5, 'USB 4G LTE Modem', 13),
(36, 'product_images/Canon PG-47 Ink Cartridge.png', 'Canon PG-47 Ink Cartridge', 'Your kids homework print or that urgent print at office can happen in no time with perfection', 27, 50, 'accessories', 0, 'product_images/Canon PG-47 Ink Cartridge-Spec.png', 4.9, 'Ink Catridge', 11),
(37, 'product_images/Canon CL-57 Color Ink Cartridge.png', 'Canon CL-57 Color Ink Cartridge', 'Can give you high-grade printed documents, photos or other format medias with clear text and graphics', 63, 20, 'accessories', 0, 'product_images/Canon CL-57 Color Ink Cartridge-Spec.png', 4.9, 'Ink Catridge', 11),
(38, 'product_images/HP 680 Black or Tri-Colour Combo Pack Cartridge X4E78AA.png', 'HP 680 Black/Tri-Colour Combo Pack Cartridge X4E78AA', 'Original HP Cartridges Are Uniquely Designed To Perform With HP Printer.', 57.5, 20, 'accessories', 0, 'product_images/HP 680 Black or Tri-Colour Combo Pack Cartridge X4E78AA-Spec.png', 4.9, 'Ink Catridge', 3),
(39, 'product_images/HP (46) CZ638AA Tri-Color Ink Cartridge.png', 'HP (46) CZ638AA Tri-Color Ink Cartridge', 'Original HP Cartridges Are Uniquely Designed To Perform With HP Printer.', 34.5, 20, 'accessories', 0, 'product_images/HP (46) CZ638AA Tri-Color Ink Cartridge-Spec.png', 4.9, 'Ink Catridge', 3),
(40, 'product_images/Epson 141 Ink Cartridge.png', 'Epson 141 Ink Cartridge', 'To get vibrant, long-lasting prints of the highest quality, use EPSON original ink in your inkjet printers or all-in-ones.', 23, 100, 'accessories', 0, 'product_images/Epson 141 Ink Cartridge-Spec.png', 4.5, 'Ink Catridge', 15),
(41, 'product_images/Western Digital My Passport.png', 'Western Digital My Passport 1TB USB 3.0 External Hard Drives (WDBYFT0010)', 'Trusted and loved storage to store the massive amounts of photos, videos and music.', 189, 50, 'storage', 0, 'product_images/Western Digital My Passport-Spec.png', 4.9, 'Portable Hard Drive', 14),
(42, 'product_images/Seagate 1TB Backup Plus Slim USB 3.0 Portable Hard Drive.png', 'Seagate 1TB Backup Plus Slim USB 3.0 Portable Hard Drive', 'Whatever your style, Backup Plus portable drives offer an array of easy-to-use software tools.', 219, 40, 'storage', 0, 'product_images/Seagate 1TB Backup Plus Slim USB 3.0 Portable Hard Drive-Spec.png', 4.9, 'Portable Hard Drive', 12),
(43, 'product_images/Western Digital My Passport 4TB.png', 'Western Digital My Passport 4TB USB 3.0 External Hard Drives (WDBYFT0040)', 'Trusted and loved storage to store the massive amounts of photos, videos and music.', 469, 30, 'storage', 0, 'product_images/Western Digital My Passport 4TB-Spec.png', 4.8, 'Portable Hard Drive', 14),
(44, 'product_images/Western Digital My Passport New Design.png', 'Western Digital My Passport 1TB USB 3.0 External Hard Drives New Design', 'Trusted and loved storage to store the massive amounts of photos, videos and music.', 195, 40, 'storage', 0, 'product_images/Western Digital My Passport New Design-Spec.png', 4.8, 'Portable Hard Drive', 14),
(45, 'product_images/WD Elements 1.5TB.png', 'WD Elements 1.5TB Portable External Hard Disk', 'Trusted and loved storage to store the massive amounts of photos, videos and music.', 189, 40, 'storage', 0, 'product_images/WD Elements 1.5TB-Spec.png', 4.8, 'Portable Hard Drive', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(7) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `username`, `email`, `password`, `address`, `city`, `state`, `zip`) VALUES
(1, 'Cheong', 'cheongks2@gmail.com', 'Ks2201200', 'No.22, Jalan Anggerik Liparis 31/152', 'Shah Alam', 'Selangor', '40460');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_ID` int(7) NOT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `vendor_location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_ID`, `vendor_name`, `vendor_location`) VALUES
(1, 'Apple', 'Kuala Lumpur'),
(2, 'Samsung', 'Petaling Jaya'),
(3, 'HP', 'Johor'),
(4, 'Dell', 'Johor'),
(5, 'Oppo', 'China'),
(6, 'Huawei', 'China'),
(7, 'Asus', 'Taiwan'),
(8, 'Acer', 'Taiwan'),
(9, 'Logitech', 'Kuala Lumpur'),
(10, 'Razer', 'Kuala Lumpur'),
(11, 'Cannon', 'Kuala Lumpur'),
(12, 'Seagate', 'Petaling Jaya'),
(13, 'D-Link', 'Selangor'),
(14, 'Western Digital', 'Selangor'),
(15, 'Epson', 'Kelantan'),
(16, 'Steelseries', 'Kedah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_ID`),
  ADD KEY `vendor_ID` (`vendor_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`vendor_ID`) REFERENCES `vendor` (`vendor_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
