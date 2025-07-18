-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 12:31 PM
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
-- Database: `trekkar`
--

-- --------------------------------------------------------

--
-- Table structure for table `camp`
--

CREATE TABLE `camp` (
  `camp_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `intensity` varchar(255) NOT NULL,
  `altitude` int(11) NOT NULL,
  `stay` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age_group` varchar(255) NOT NULL,
  `max_members` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `camp`
--

INSERT INTO `camp` (`camp_id`, `location`, `description`, `username`, `name`, `intensity`, `altitude`, `stay`, `gender`, `age_group`, `max_members`, `date`, `price`) VALUES
(1, 'Everest Base Camp', 'Prepare for an awe-inspiring adventure as you embark on a challenging journey to the iconic Everest Base Camp, nestled amidst the towering peaks of the majestic Himalayas. With each step, you\'ll be surrounded by breathtaking vistas of snow-capped mountain', 'vikram_adventurer', 'Vikram Singh', 'High', 5300, '7 Day 6 nights ', 'Anyone ', '19-25', 10, '2024-08-10', 8000),
(2, 'Leh', 'Embark on an exhilarating adventure through rugged terrain and high passes on our High Altitude Trek in the enchanting land of Leh. Set against the backdrop of the majestic Himalayas, this trek offers a thrilling exploration of some of the world\'s most br', 'rohan_explorer', 'Rohan Patel', 'High', 4800, '8 Days 7 nights ', 'Anyone ', '20-30', 8, '2024-09-15', 7000),
(3, 'Spiti Valley', 'Escape to a haven of peace and tranquility amidst the breathtaking landscapes of Spiti Valley at our Himalayan Retreat. Nestled in the heart of the Himalayas, this sanctuary offers a serene retreat from the hustle and bustle of everyday life. Wake up to p', 'riya_adventure', 'Riya Singh', 'High', 4500, '10 days 9 nights ', 'Anyone ', '20-30', 12, '2024-10-20', 6000),
(4, 'Sikkim', 'Embark on a thrilling mountain expedition through the pristine wilderness of Sikkim, where every step unveils a new adventure and a breathtaking vista. Trek through dense forests, meandering rivers, and alpine meadows, surrounded by towering peaks and unt', 'priyanka_hiker', 'Priyanka Sharma', 'High', 4700, '5 days 5 nights ', 'Anyone', '19-35', 10, '2024-11-25', 8500),
(5, 'Uttarakhand', 'Experience the exhilarating thrill of high-altitude trekking amidst the untouched beauty of Uttarakhand, where pristine landscapes and panoramic vistas await at every turn. Journey through remote valleys, verdant forests, and rugged mountain passes, immer', 'pooja_wilderness', 'Pooja Patel', 'High', 5000, '5 days 4 nights ', 'Anyone ', '19-30', 15, '2024-12-30', 7500),
(6, 'Himachal Pradesh', 'Embark on a journey of discovery amidst the picturesque valleys and lush forests of Himachal Pradesh on our Valley Exploration camp. Traverse winding trails that lead you through verdant meadows, dense woodlands, and cascading waterfalls, immersing yourse', 'vikram_adventurer', 'Vikram Singh', 'Moderate', 3000, '6 days 5 nights ', 'Anyone ', '35-45', 20, '2024-08-15', 4500),
(7, 'Coorg', 'Indulge in pure relaxation amidst the serene coffee plantations of Coorg at our Coffee Estate Retreat camp. Nestled amidst verdant hills and lush greenery, this tranquil haven offers a blissful escape from the hustle and bustle of everyday life. Wander th', 'rohan_explorer', 'Rohan Patel', 'Easy ', 1200, '7 days 6 nights  ', 'Anyone ', '19-50', 15, '2024-09-20', 4000),
(8, 'Munnar', 'Immerse yourself in the enchanting charm of Munnar\'s tea plantations and misty hills on our Tea Plantation Stay camp. Set amidst acres of lush greenery and rolling hills, this idyllic retreat offers a unique opportunity to experience the magic of Kerala\'s', 'riya_adventure', 'Riya Singh', 'Easy ', 1600, '6  days 5 nights ', 'Anyone ', '19-45', 18, '2024-10-25', 4200),
(9, 'Tirthan Valley', 'Unwind and reconnect with nature by the pristine riverside at our Riverside Relaxation camp in the breathtaking Tirthan Valley. Nestled amidst the Himalayan foothills, this tranquil retreat offers a perfect blend of serenity and adventure. Spend your days', 'priyanka_hiker', 'Priyanka Sharma', 'Moderate', 1600, ' 5 days 4 nights ', 'Anyone ', '35-40', 12, '2024-11-30', 3800),
(10, 'Ooty', 'Escape to the charming hill station of Ooty and enjoy a refreshing getaway on our Hill Station Getaway camp. Nestled amidst the rolling hills of the Nilgiris, Ooty beckons with its cool climate, verdant landscapes, and old-world charm. Spend your days exp', 'pooja_wilderness', 'Pooja Patel', 'Moderate', 2200, '6 days 5 nights ', 'Anyone ', '30-50', 25, '2024-12-15', 4300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camp`
--
ALTER TABLE `camp`
  ADD PRIMARY KEY (`camp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camp`
--
ALTER TABLE `camp`
  MODIFY `camp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
