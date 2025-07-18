-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 03:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_name`, `city`, `essential`, `intensity`, `max_member`, `date`, `price`, `age_group`, `description`, `gender`, `image`) VALUES
(5, 'Desert Safari', 'jodhpur', 'Sunscreen, Hat, Water', 'Moderate', 5, '2024-06-15', 3500, '3-60', 'Embark on an unforgettable journey through the vast expanse of the Thar Desert, traversing its golden sands either atop a swaying camel or in a rugged 4x4 vehicle. As the sun sets, immerse yourself in the rich cultural tapestry of Rajasthan with tradition', 'Anyone', 'http://localhost/trek-kar/activity/activity_image/jodhpur/DESERT_SAFARI/IMG_5.jpg'),
(6, 'Zip Lining at Mehrangarh Fort', 'jodhpur', 'Comfortable Clothe', 'Hard', 2, '2024-07-20', 5600, '8-50', 'Experience the thrill of a lifetime as you soar through the air on a zip line adventure, offering breathtaking panoramic views of the majestic city of Jodhpur from the ramparts of Mehrangarh Fort. Feel the wind rush past you as you zip across the sky, mar', 'Anyone', 'http://localhost/trek-kar/activity/activity_image/jodhpur/ZIPLINE/IMG_1.jpg'),
(8, 'Hot Air Ballooning', 'jodhpur', 'Camera, Jacket', 'Moderate', 5, '2024-08-10', 8400, '5-45', 'Embark on a serene hot air balloon ride over the enchanting city of Jodhpur and its picturesque surroundings. As you gently ascend into the sky, feel a sense of tranquility wash over you while beholding breathtaking views of the iconic Mehrangarh Fort, th', 'Anyone', 'http://localhost/trek-kar/activity/activity_image/jodhpur/HOTAIR_BALLON/IMG_2.jpg'),
(9, 'Bishnoi Village Safari', 'jodhpur', 'Respectful Attire', 'Easy', 6, '2024-07-05', 2800, '5-55', 'Embark on a safari to the enchanting Bishnoi villages, where time seems to stand still, offering a glimpse into the rich tapestry of rural Rajasthan\'s culture, wildlife, and lifestyle. Traverse the rugged terrain in search of elusive wildlife such as blac', 'Anyone', 'http://localhost/trek-kar/activity/activity_image/jodhpur/BISHNOI_VILLAGE_SAFARI/IMG_2.jpg'),
(10, 'Rock Climbing', 'jodhpur', 'Hiking Shoes,Bottle', 'Hard', 10, '2024-06-28', 4200, '10-40', 'Embark on an exhilarating adventure amidst the rugged beauty of the Aravalli Range, where towering cliffs and lush forests beckon the intrepid explorer. Test your skills and endurance with thrilling rock climbing expeditions, scaling sheer rock faces whil', 'Anyone', 'http://localhost/trek-kar/activity/activity_image/jodhpur/ROCK_CLIMBING/IMG_3.jpg'),
(11, 'Lake Pichola Boat Ride', 'udaipur', 'Camera, Sunscreen', 'Easy', 2, '2024-07-10', 800, '3-55', 'Embark on a tranquil boat ride across the shimmering waters of Lake Pichola, immersing yourself in the serene beauty of one of Udaipur\'s most iconic attractions. Glide past majestic palaces, including the floating Lake Palace and the imposing City Palace,', 'Anyone', 'http://localhost/trek-kar/activity/activity_image/udaipur/LAKE_PICHOLA_BOAT_RIDE/IMG_3.jpg'),
(12, 'City Palace Tour', 'udaipur', 'Camera', 'Moderate', 10, '2024-08-05', 1200, '5-60', 'Embark on a captivating journey through time as you explore the majestic City Palace of Udaipur, a testament to the city\'s rich history and architectural splendor. Marvel at the intricate design details of this sprawling complex, where towering domes, del', 'Anyone', 'http://localhost/trek-kar/activity/activity_image/udaipur/CITY_PALACE_TOUR/IMG_5.webp'),
(13, 'Vintage Car Rally', 'udaipur', 'Sunglasses, Hat', 'Moderate', 3, '2024-07-15', 2500, '10-55', 'Step back in time and experience the enchanting charm of Udaipur in style aboard a vintage car tour, meandering through the city\'s historic streets and iconic landmarks. Feel the nostalgia wash over you as you glide past the majestic City Palace, the shim', 'Anyone', 'http://localhost/trek-kar/activity/activity_image/udaipur/VINTAGE_CAR_RALLY/IMG_3.webp'),
(14, 'Amber Fort Elephant Ride', 'jaipur', 'Comfortable Clothes', 'Easy', 2, '2024-07-12', 1000, '5-60', 'Embark on a regal journey to the majestic Amber Fort aboard a traditional elephant ride, immersing yourself in the grandeur and opulence of Rajasthan\'s royal past. As you ascend the winding path to the fort, feel the gentle sway of the elephant beneath yo', 'Anyone', 'http://localhost/trek-kar/activity/activity_image/jaipur/AMBER_FORT_ELEPHANT_RIDE/IMG_1.jpg'),
(15, 'Hot Air Ballooning', 'jaipur', 'Camera, Jacket', 'Moderate', 5, '2024-08-08', 7000, '8-55', 'Embark on an exhilarating adventure and experience Jaipur from a whole new perspective with a thrilling hot air balloon ride over the city. As you gently ascend into the sky, watch in awe as the vibrant hues of Jaipur come alive beneath you, from the maje', 'Anyone', 'http://localhost/trek-kar/activity/activity_image/jaipur/HOTAIR_BALLON/IMG_3.webp'),
(16, 'Cycling Tour', 'jaipur', 'Water Bottle', 'Moderate', 1, '2024-06-30', 1500, '10-55', 'Embark on an immersive journey through Jaipur\'s bustling streets and iconic landmarks on a guided cycling tour, where every pedal stroke reveals a new layer of the city\'s vibrant culture and rich heritage. Follow your expert guide as you weave through the', 'Anyone', 'http://localhost/trek-kar/activity/activity_image/jaipur/CYCLE_RIDE_JAIPUR_TOUR/IMG_3.jpg'),
(17, 'Jaipur City Tour', 'jaipur', 'Camera', 'Easy', 10, '2024-08-18', 800, '3-60', 'Embark on an enriching journey through Jaipur\'s rich cultural heritage on a guided tour that takes you through its iconic monuments and vibrant markets. Accompanied by a knowledgeable guide, delve into the majestic history of the Pink City as you visit la', 'Anyone', 'http://localhost/trek-kar/activity/activity_image/jaipur/JAIPUR_CITY_TOUR/IMG_2.jpg');

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
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `camp`
--

INSERT INTO `camp` (`camp_id`, `location`, `description`, `username`, `name`, `intensity`, `altitude`, `stay`, `gender`, `age_group`, `max_members`, `date`, `price`, `image`) VALUES
(1, 'Everest Base Camp', 'Prepare for an awe-inspiring adventure as you embark on a challenging journey to the iconic Everest Base Camp, nestled amidst the towering peaks of the majestic Himalayas. With each step, you\'ll be surrounded by breathtaking vistas of snow-capped mountain', 'vikram_adventurer', 'Vikram Singh', 'Hard', 5300, '7 Day 6 nights ', 'Anyone ', '19-25', 10, '2024-08-10', 8000, 'http://localhost/trek-kar/camp/camp_image/EVERST_CAMP/IMG_2.jpeg'),
(2, 'Leh', 'Embark on an exhilarating adventure through rugged terrain and high passes on our High Altitude Trek in the enchanting land of Leh. Set against the backdrop of the majestic Himalayas, this trek offers a thrilling exploration of some of the world\'s most br', 'rohan_explorer', 'Rohan Patel', 'Hard', 4800, '8 Days 7 nights ', 'Anyone ', '20-30', 8, '2024-09-15', 7000, 'http://localhost/trek-kar/camp/camp_image/LEH_CAMP/IMG_1.jpg'),
(3, 'Spiti Valley', 'Escape to a haven of peace and tranquility amidst the breathtaking landscapes of Spiti Valley at our Himalayan Retreat. Nestled in the heart of the Himalayas, this sanctuary offers a serene retreat from the hustle and bustle of everyday life. Wake up to p', 'riya_adventure', 'Riya Singh', 'Hard', 4500, '10 days 9 nights ', 'Anyone ', '20-30', 12, '2024-10-20', 6000, 'http://localhost/trek-kar/camp/camp_image/SPITI_VALLY/IMG_3.jpg'),
(4, 'Sikkim', 'Embark on a thrilling mountain expedition through the pristine wilderness of Sikkim, where every step unveils a new adventure and a breathtaking vista. Trek through dense forests, meandering rivers, and alpine meadows, surrounded by towering peaks and unt', 'priyanka_hiker', 'Priyanka Sharma', 'Moderate', 4700, '5 days 5 nights ', 'Anyone', '19-35', 10, '2024-11-25', 8500, 'http://localhost/trek-kar/camp/camp_image/SIKKEM/IMG_4.jpg'),
(5, 'Uttarakhand', 'Experience the exhilarating thrill of high-altitude trekking amidst the untouched beauty of Uttarakhand, where pristine landscapes and panoramic vistas await at every turn. Journey through remote valleys, verdant forests, and rugged mountain passes, immer', 'pooja_wilderness', 'Pooja Patel', 'Easy', 5000, '5 days 4 nights ', 'Anyone ', '19-30', 15, '2024-12-30', 7500, 'http://localhost/trek-kar/camp/camp_image/UTTRAKHAND/IMG_2.jpg'),
(6, 'Himachal Pradesh', 'Embark on a journey of discovery amidst the picturesque valleys and lush forests of Himachal Pradesh on our Valley Exploration camp. Traverse winding trails that lead you through verdant meadows, dense woodlands, and cascading waterfalls, immersing yourse', 'vikram_adventurer', 'Vikram Singh', 'Moderate', 3000, '6 days 5 nights ', 'Anyone ', '35-45', 20, '2024-08-15', 4500, 'http://localhost/trek-kar/camp/camp_image/HIMACHAL_PRADESH/IMG_4.jpg'),
(7, 'Coorg', 'Indulge in pure relaxation amidst the serene coffee plantations of Coorg at our Coffee Estate Retreat camp. Nestled amidst verdant hills and lush greenery, this tranquil haven offers a blissful escape from the hustle and bustle of everyday life. Wander th', 'rohan_explorer', 'Rohan Patel', 'Easy', 1200, '7 days 6 nights  ', 'Anyone ', '19-50', 15, '2024-09-20', 4000, 'http://localhost/trek-kar/camp/camp_image/COORG/IMG_3.jpg'),
(8, 'Munnar', 'Immerse yourself in the enchanting charm of Munnar\'s tea plantations and misty hills on our Tea Plantation Stay camp. Set amidst acres of lush greenery and rolling hills, this idyllic retreat offers a unique opportunity to experience the magic of Kerala\'s', 'riya_adventure', 'Riya Singh', 'Easy', 1600, '6  days 5 nights ', 'Anyone ', '19-45', 18, '2024-10-25', 4200, 'http://localhost/trek-kar/camp/camp_image/MUNNAR/IMG_5.jpg'),
(9, 'Tirthan Valley', 'Unwind and reconnect with nature by the pristine riverside at our Riverside Relaxation camp in the breathtaking Tirthan Valley. Nestled amidst the Himalayan foothills, this tranquil retreat offers a perfect blend of serenity and adventure. Spend your days', 'priyanka_hiker', 'Priyanka Sharma', 'Moderate', 1600, ' 5 days 4 nights ', 'Anyone ', '35-40', 12, '2024-11-30', 3800, 'http://localhost/trek-kar/camp/camp_image/TIRTHAN_VALLEY/IMG_4.jpg'),
(10, 'Ooty', 'Escape to the charming hill station of Ooty and enjoy a refreshing getaway on our Hill Station Getaway camp. Nestled amidst the rolling hills of the Nilgiris, Ooty beckons with its cool climate, verdant landscapes, and old-world charm. Spend your days exp', 'pooja_wilderness', 'Pooja Patel', 'Moderate', 2200, '6 days 5 nights ', 'Anyone ', '30-50', 25, '2024-12-15', 4300, 'http://localhost/trek-kar/camp/camp_image/OOTY/IMG_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `explorer`
--

CREATE TABLE `explorer` (
  `explorer_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `explorer`
--

INSERT INTO `explorer` (`explorer_id`, `city`, `location`, `description`, `image`) VALUES
(3, 'jaipur', 'Medico Seasonal Waterfall', 'Embark on a captivating journey to Medico Seasonal Waterfall, a hidden gem nestled amidst lush greenery and cascading streams. Trek through verdant forests and rocky terrain to reach this natural wonder, where the sight and sound of gushing water create a', 'http://localhost/trek-kar/explorer/explorer_image/JAIPUR/MEDICO_SEASONAL_WATERFALL/IMG_1.jpg'),
(6, 'jodhpur', 'Toorji Ka Jhalra Bavdi', 'Toorji Ka Jhalra Bavdi is an 18th-century stepwell in Jodhpur, Rajasthan, India. Built by Queen Maharani Toorji, it served as a vital water source. The Bavdi features intricate sandstone carvings depicting mythical creatures and gods. Descending its steps', 'http://localhost/trek-kar/explorer/explorer_image/JODHPUR/TOORJI_KA_JHALRA/IMG_1.jpg'),
(7, 'jodhpur', 'Mehrangarh Fort', 'Mehrangarh Fort, standing proudly in Jodhpur, Rajasthan, is a magnificent stronghold of Rajput architecture. Built in the 15th century, it boasts massive sandstone walls, intricate palaces, and breathtaking views of the Blue City below. Within its walls l', 'http://localhost/trek-kar/explorer/explorer_image/JODHPUR/MEHRANGHAR_FORT/IMG_1.jpg'),
(9, 'udaipur', 'Pratap Hill Top', 'Reach new heights at Pratap Hill Top, where adventure and awe-inspiring vistas await. Trek through scenic trails that lead to the summit, offering panoramic views of verdant valleys and towering peaks. Immerse yourself in the tranquility of nature as you ', 'http://localhost/trek-kar/explorer/explorer_image/UDAIPUR/PRATAP_HILL_TOP/IMG_1.jpg'),
(11, 'jodhpur', 'Umaid Bhawan Palace', 'Umaid Bhawan Palace, an architectural marvel nestled amidst the arid landscape of Jodhpur, Rajasthan, stands as a beacon of luxury and grandeur. Constructed in the early 20th century, this magnificent palace is a harmonious blend of Indo-Saracenic and Art', 'http://localhost/trek-kar/explorer/explorer_image/JODHPUR/UMAID_BHAWAN_PALACE/IMG_1.jpg'),
(13, 'udaipur', 'City Palace', 'City Palace (Raj Mahal), Udaipur is a palace complex situated in the city of Udaipur in the Indian state of Rajasthan. It was built over a period of nearly 400 years, with contributions from several rulers of the Mewar dynasty. Its construction began in 1', 'http://localhost/trek-kar/explorer/explorer_image/UDAIPUR/CITY_PALACE/IMG_1.jpg'),
(14, 'udaipur', 'Jagmandir Island Palace', 'Jagmandir Island Palace, nestled amidst the tranquil waters of Lake Pichola in Udaipur, Rajasthan, is a timeless symbol of luxury and refinement. Built in the 17th century by Maharana Jagat Singh I of Mewar, this exquisite palace is renowned for its elega', 'http://localhost/trek-kar/explorer/explorer_image/UDAIPUR/JAGMINDIR_ISLAND_PALACE/IMG_1.jpg'),
(15, 'udaipur', 'Fateh Sagar Lake', 'Fateh Sagar Lake, nestled in the heart of Udaipur, Rajasthan, is a tranquil oasis of beauty and serenity. Constructed in the 17th century by Maharana Jai Singh, this artificial lake is a testament to the ingenuity of Rajput engineering.Spread across an ar', 'http://localhost/trek-kar/explorer/explorer_image/UDAIPUR/FATEH_SAGAR_LAKE/IMG_1.jpeg'),
(16, 'jaipur', 'Amber Palace', 'Amber Fort, a majestic fortress located near Jaipur in Rajasthan, India, is a captivating blend of Rajput and Mughal architecture. Constructed in the 16th century by Raja Man Singh I, it stands as a symbol of Jaipur\'s rich history and cultural heritage.Pe', 'http://localhost/trek-kar/explorer/explorer_image/JAIPUR/AMBER_PALACE/IMG_2.jpg'),
(17, 'bangalore', 'ISKCON temple Bangalore', 'The ISKCON Temple in Bangalore, officially known as the Sri Radha Krishna Temple, is a spiritual landmark and architectural marvel in Karnataka, India. Built in 1997 by the International Society for Krishna Consciousness (ISKCON), this magnificent temple ', 'http://localhost/trek-kar/explorer/explorer_image/BANGALORE/ISKON_TEMPLE/IMG_4.webp');

-- --------------------------------------------------------

--
-- Table structure for table `my_trek`
--

CREATE TABLE `my_trek` (
  `my_trek_id` smallint(3) UNSIGNED NOT NULL,
  `post_id` smallint(3) NOT NULL,
  `member_count` tinyint(3) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `city` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `intensity` varchar(255) NOT NULL,
  `duration` tinyint(3) UNSIGNED NOT NULL,
  `distance` tinyint(3) UNSIGNED NOT NULL,
  `meetup_point` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `min_age` tinyint(3) UNSIGNED NOT NULL,
  `max_age` tinyint(3) UNSIGNED NOT NULL,
  `max_member` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_details`
--

CREATE TABLE `post_details` (
  `created_post_id` smallint(5) UNSIGNED NOT NULL,
  `member_count` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `city` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `intensity` varchar(255) NOT NULL,
  `duration` tinyint(3) UNSIGNED NOT NULL,
  `distance` tinyint(3) UNSIGNED NOT NULL,
  `meetup_point` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `min_age` tinyint(3) UNSIGNED NOT NULL,
  `max_age` tinyint(3) UNSIGNED NOT NULL,
  `max_member` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_details`
--

INSERT INTO `post_details` (`created_post_id`, `member_count`, `user_id`, `username`, `name`, `profile`, `city`, `time`, `date`, `description`, `intensity`, `duration`, `distance`, `meetup_point`, `gender`, `min_age`, `max_age`, `max_member`) VALUES
(1, 1, 54, 'kunal21', 'kunal sharma', 'default.jpg', 'jaipur', '06:00:00', '2024-09-22', 'Guys Lets Trek Together', 'easy', 2, 1, 'Jagatpura Railway station', 'male', 20, 22, 10),
(37, 1, 55, 'aditya21', 'aditya dave', 'default.jpg', 'jaipur', '07:00:00', '2024-09-22', 'Please Maintain Discipline', 'moderate', 2, 2, 'Nahargarh fort', 'anyone', 18, 25, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `user_id` smallint(6) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`user_id`, `username`, `password`, `email`, `name`, `gender`, `age`, `city`, `profile_pic`) VALUES
(54, 'kunal21', '$2y$10$1FGR5bBEULIHdl5X0KhgMe/w7fx35TVzCWXxlLOTaxmwgCqb1ZQl.', 'kunaljodhpur2003@gmail.com', 'kunal sharma', 'male', 21, 'jaipur', 'default.jpg'),
(55, 'aditya21', '$2y$10$Ncr6detwFKT3NyD5aKyJ0OvUyq5NNsXxN7x8YTqa9E5AKjmpJZWfW', 'aditya@gmail.com', 'aditya dave', 'male', 21, 'jaipur', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `camp`
--
ALTER TABLE `camp`
  ADD PRIMARY KEY (`camp_id`);

--
-- Indexes for table `explorer`
--
ALTER TABLE `explorer`
  ADD PRIMARY KEY (`explorer_id`);

--
-- Indexes for table `my_trek`
--
ALTER TABLE `my_trek`
  ADD PRIMARY KEY (`my_trek_id`);

--
-- Indexes for table `post_details`
--
ALTER TABLE `post_details`
  ADD PRIMARY KEY (`created_post_id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `camp`
--
ALTER TABLE `camp`
  MODIFY `camp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `explorer`
--
ALTER TABLE `explorer`
  MODIFY `explorer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `my_trek`
--
ALTER TABLE `my_trek`
  MODIFY `my_trek_id` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `post_details`
--
ALTER TABLE `post_details`
  MODIFY `created_post_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `user_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
