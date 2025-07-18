-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 01:13 PM
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
-- Table structure for table `explorer`
--

CREATE TABLE `explorer` (
  `explorer_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `explorer`
--

INSERT INTO `explorer` (`explorer_id`, `city`, `location`, `description`) VALUES
(1, 'Bangalore', 'Hathuneshwar Mahadev', 'Embark on a soul-stirring pilgrimage to Hathuneshwar Mahadev, a revered temple nestled amidst the serene Himalayas. Trek through picturesque landscapes and verdant valleys to reach this sacred shrine dedicated to Lord Shiva. Feel the divine energy and tra'),
(2, 'Jaipur', 'Charan Mandir Trek', 'Experience the perfect blend of spirituality and adventure on the Charan Mandir Trek. Traverse through scenic trails that lead to the sacred temple dedicated to Lord Shiva, nestled amidst the majestic Himalayas. Enveloped in serene surroundings and pristi'),
(3, 'Jaipur', 'Medico Seasonal Waterfall', 'Embark on a captivating journey to Medico Seasonal Waterfall, a hidden gem nestled amidst lush greenery and cascading streams. Trek through verdant forests and rocky terrain to reach this natural wonder, where the sight and sound of gushing water create a'),
(4, 'Jaipur', 'Amagarh Twin Towers', 'Conquer the heights of Amagarh Twin Towers on an unforgettable trekking adventure. Ascend to the summit and be rewarded with sweeping panoramic views of the surrounding landscapes, where verdant valleys and majestic peaks stretch as far as the eye can see'),
(5, 'Jaipur', 'Ninder ki पहाड़िया', 'Escape the hustle and bustle of city life and embark on a journey to Ninder ki पहाड़िया, where serenity and natural beauty await. Trek through scenic trails that wind through lush forests and rolling hills, offering glimpses of pristine landscapes and tra'),
(6, 'Jodhpur', 'Toorji Ka Jhalra Bavdi', 'Toorji Ka Jhalra Bavdi is an 18th-century stepwell in Jodhpur, Rajasthan, India. Built by Queen Maharani Toorji, it served as a vital water source. The Bavdi features intricate sandstone carvings depicting mythical creatures and gods. Descending its steps'),
(7, 'Jodhpur', 'Mehrangarh Fort', 'Mehrangarh Fort, standing proudly in Jodhpur, Rajasthan, is a magnificent stronghold of Rajput architecture. Built in the 15th century, it boasts massive sandstone walls, intricate palaces, and breathtaking views of the Blue City below. Within its walls l'),
(8, 'Jodhpur', 'Bats Cave', 'Embark on a thrilling journey to Bats Cave, a mystical enclave nestled amidst the wilderness. Trek through rugged terrain and dense forests to discover this hidden treasure, where an enchanting colony of bats resides. Delve into the depths of the cave and'),
(9, 'Udaipur', 'Pratap Hill Top', 'Reach new heights at Pratap Hill Top, where adventure and awe-inspiring vistas await. Trek through scenic trails that lead to the summit, offering panoramic views of verdant valleys and towering peaks. Immerse yourself in the tranquility of nature as you '),
(10, 'Udaipur', 'Rampol Heritage Track', 'Embark on a journey through time along the Rampol Heritage Track, where echoes of ancient civilizations resonate amidst picturesque landscapes. Trek through historic ruins and archaeological sites, tracing the footsteps of bygone eras and unraveling the r'),
(11, 'Jodhpur', 'Umaid Bhawan Palace', 'Umaid Bhawan Palace, an architectural marvel nestled amidst the arid landscape of Jodhpur, Rajasthan, stands as a beacon of luxury and grandeur. Constructed in the early 20th century, this magnificent palace is a harmonious blend of Indo-Saracenic and Art'),
(12, 'Jodhpur', 'Rao Jodha Hills', 'Rao Jodha Hills, located near Jodhpur in Rajasthan, India, are a picturesque range of rocky outcrops that hold historical and cultural significance. Named after Rao Jodha, the founder of Jodhpur, these hills offer stunning panoramic views of the surroundi'),
(13, 'Udaipur', 'City Palace', 'City Palace (Raj Mahal), Udaipur is a palace complex situated in the city of Udaipur in the Indian state of Rajasthan. It was built over a period of nearly 400 years, with contributions from several rulers of the Mewar dynasty. Its construction began in 1'),
(14, 'Udaipur', 'Jagmandir Island Palace', 'Jagmandir Island Palace, nestled amidst the tranquil waters of Lake Pichola in Udaipur, Rajasthan, is a timeless symbol of luxury and refinement. Built in the 17th century by Maharana Jagat Singh I of Mewar, this exquisite palace is renowned for its elega'),
(15, 'Udaipur', 'Fateh Sagar Lake', 'Fateh Sagar Lake, nestled in the heart of Udaipur, Rajasthan, is a tranquil oasis of beauty and serenity. Constructed in the 17th century by Maharana Jai Singh, this artificial lake is a testament to the ingenuity of Rajput engineering.Spread across an ar'),
(16, 'Jaipur', 'Amber Palace', 'Amber Fort, a majestic fortress located near Jaipur in Rajasthan, India, is a captivating blend of Rajput and Mughal architecture. Constructed in the 16th century by Raja Man Singh I, it stands as a symbol of Jaipur\'s rich history and cultural heritage.Pe'),
(17, 'Bangalore', 'ISKCON temple Bangalore', 'The ISKCON Temple in Bangalore, officially known as the Sri Radha Krishna Temple, is a spiritual landmark and architectural marvel in Karnataka, India. Built in 1997 by the International Society for Krishna Consciousness (ISKCON), this magnificent temple ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `explorer`
--
ALTER TABLE `explorer`
  ADD PRIMARY KEY (`explorer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `explorer`
--
ALTER TABLE `explorer`
  MODIFY `explorer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
