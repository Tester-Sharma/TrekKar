-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 12:26 PM
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
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `essential` varchar(255) NOT NULL,
  `intensity` varchar(255) NOT NULL,
  `max_member` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  `age_group` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_name`, `city`, `essential`, `intensity`, `max_member`, `date`, `price`, `age_group`, `description`, `gender`) VALUES
(5, 'Desert Safari', 'jodhpur', 'Sunscreen, Hat, Water', 'Moderate', 5, '2024-06-15', 3500, '3-60', 'Embark on an unforgettable journey through the vast expanse of the Thar Desert, traversing its golden sands either atop a swaying camel or in a rugged 4x4 vehicle. As the sun sets, immerse yourself in the rich cultural tapestry of Rajasthan with tradition', 'Anyone'),
(6, 'Zip Lining at Mehrangarh Fort', 'jodhpur', 'Comfortable Clothe', 'Hard', 2, '2024-07-20', 5600, '8-50', 'Experience the thrill of a lifetime as you soar through the air on a zip line adventure, offering breathtaking panoramic views of the majestic city of Jodhpur from the ramparts of Mehrangarh Fort. Feel the wind rush past you as you zip across the sky, mar', 'Anyone'),
(8, 'Hot Air Ballooning', 'jodhpur', 'Camera, Jacket', 'Moderate', 5, '2024-08-10', 8400, '5-45', 'Embark on a serene hot air balloon ride over the enchanting city of Jodhpur and its picturesque surroundings. As you gently ascend into the sky, feel a sense of tranquility wash over you while beholding breathtaking views of the iconic Mehrangarh Fort, th', 'Anyone'),
(9, 'Bishnoi Village Safari', 'jodhpur', 'Respectful Attire', 'Easy', 6, '2024-07-05', 2800, '5-55', 'Embark on a safari to the enchanting Bishnoi villages, where time seems to stand still, offering a glimpse into the rich tapestry of rural Rajasthan\'s culture, wildlife, and lifestyle. Traverse the rugged terrain in search of elusive wildlife such as blac', 'Anyone'),
(10, 'Rock Climbing', 'jodhpur', 'Hiking Shoes,Bottle', 'Hard', 10, '2024-06-28', 4200, '10-40', 'Embark on an exhilarating adventure amidst the rugged beauty of the Aravalli Range, where towering cliffs and lush forests beckon the intrepid explorer. Test your skills and endurance with thrilling rock climbing expeditions, scaling sheer rock faces whil', 'Anyone'),
(11, 'Lake Pichola Boat Ride', 'udaipur', 'Camera, Sunscreen', 'Easy', 2, '2024-07-10', 800, '3-55', 'Embark on a tranquil boat ride across the shimmering waters of Lake Pichola, immersing yourself in the serene beauty of one of Udaipur\'s most iconic attractions. Glide past majestic palaces, including the floating Lake Palace and the imposing City Palace,', 'Anyone'),
(12, 'City Palace Tour', 'udaipur', 'Camera', 'Moderate', 10, '2024-08-05', 1200, '5-60', 'Embark on a captivating journey through time as you explore the majestic City Palace of Udaipur, a testament to the city\'s rich history and architectural splendor. Marvel at the intricate design details of this sprawling complex, where towering domes, del', 'Anyone'),
(13, 'Vintage Car Rally', 'udaipur', 'Sunglasses, Hat', 'Moderate', 3, '2024-07-15', 2500, '10-55', 'Step back in time and experience the enchanting charm of Udaipur in style aboard a vintage car tour, meandering through the city\'s historic streets and iconic landmarks. Feel the nostalgia wash over you as you glide past the majestic City Palace, the shim', 'Anyone'),
(14, 'Amber Fort Elephant Ride', 'jaipur', 'Comfortable Clothes', 'Easy', 2, '2024-07-12', 1000, '5-60', 'Embark on a regal journey to the majestic Amber Fort aboard a traditional elephant ride, immersing yourself in the grandeur and opulence of Rajasthan\'s royal past. As you ascend the winding path to the fort, feel the gentle sway of the elephant beneath yo', 'Anyone'),
(15, 'Hot Air Ballooning', 'jaipur', 'Camera, Jacket', 'Moderate', 5, '2024-08-08', 7000, '8-55', 'Embark on an exhilarating adventure and experience Jaipur from a whole new perspective with a thrilling hot air balloon ride over the city. As you gently ascend into the sky, watch in awe as the vibrant hues of Jaipur come alive beneath you, from the maje', 'Anyone'),
(16, 'Cycling Tour', 'jaipur', 'Water Bottle', 'Moderate', 1, '2024-06-30', 1500, '10-55', 'Embark on an immersive journey through Jaipur\'s bustling streets and iconic landmarks on a guided cycling tour, where every pedal stroke reveals a new layer of the city\'s vibrant culture and rich heritage. Follow your expert guide as you weave through the', 'Anyone'),
(17, 'Jaipur City Tour', 'jaipur', 'Camera', 'Easy', 10, '2024-08-18', 800, '3-60', 'Embark on an enriching journey through Jaipur\'s rich cultural heritage on a guided tour that takes you through its iconic monuments and vibrant markets. Accompanied by a knowledgeable guide, delve into the majestic history of the Pink City as you visit la', 'Anyone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
