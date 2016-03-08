--
-- Database: `burritos`
--
CREATE DATABASE IF NOT EXISTS `burritos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `burritos`;

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `name` text NOT NULL,
  `description` text NOT NULL,
  `stage_id` int(11) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `game_id` int(11) NOT NULL,
  `in_inventory` tinyint(1) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`name`, `description`, `game_id`, `in_inventory`, `id`) VALUES
('object1', 'this is an object', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `name` text,
  `game_id` int(11) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`name`, `game_id`, `id`) VALUES
('Joe', 1, 1),
('Mary', 1, 2),
('Mary', 1, 3),
('Mary', 1, 4),
('Mary', 1, 5),
('Mary', 1, 6),
('Mary', 1, 7),
('Mary', 1, 8),
('Mary', 1, 9),
('Mary', 1, 10),
('Mary', 1, 11),
('Mary', 1, 12),
('Mary', 1, 13),
('Mary', 1, 14),
('Mary', 1, 15),
('Mary', 1, 16),
('Mary', 1, 17),
('Mary', 1, 18),
('Mary', 1, 19),
('', 1, 20),
('Mry', 1, 21),
('', 1, 22),
('', 1, 23),
('', 1, 24),
('', 1, 25),
('', 1, 26),
('Mary', 1, 27),
('Mary', 1, 28),
('Joe', 1, 29),
('Joe', 1, 30),
('Joe', 1, 31),
('Joe', 1, 32),
('Joe', 1, 33),
('Joe', 1, 34),
('Mary', 1, 35),
('Joe', 1, 36),
('Joe', 1, 37),
('Joe', 1, 38),
('JOe', 1, 39),
('JOe', 1, 40),
('JOe', 1, 41),
('JOe', 1, 42),
('JOe', 1, 43),
('JOe', 1, 44),
('', 1, 45),
('HOE', 1, 46),
('HOE', 1, 47),
('Joe', 1, 48),
('Joe', 1, 49);

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `game_id` int(11) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`name`, `description`, `game_id`, `id`) VALUES
('BEDROOM', 'You wake up.  You''re hung over, famished, and your room is filthy.  You get the sense that if you do not eat a burrito in the next hour, you WILL die.  WHAT DO?', 1, 101),
('KITCHEN', 'You walk into the kitchen. The sun is extremely bright. You shield your hungover eyes. Inside the kitchen, you have a FRIDGE. KEYS, PHONE, and SUNSCREEN are sitting on the counter. You can enter the GARAGE or LEAVE the house. WHAT DO?', 1, 102),
('FRIDGE', 'You see a horrific sight.  An Amy''s frozen burrito that you keep thawing and forgetting about before tossing it back into the freezer.  It is now a lovely spectrum of green and black, and frozen completely solid.  You could probably hurt someone with this thing.', 1, 103),
('GARAGE', 'You walk into the garage, and see your BIKE. There''s a door for the KITCHEN and a door OUTSIDE. WHAT DO?', 1, 104),
('OUTSIDE', 'You walk outside, and you remember there''s a delicious burrito truck only about a mile away. You also remember that your buddy lives just 2 blocks away. He sometimes has burritos! WHAT DO?', 1, 105),
('BURRITO TRUCK', 'You make your way to the burrito truck. Working at the counter is a sweet but frail old man who seems to be making an ULTIMATE BURRITO for himself. He sees he has a customer and quickly perks up. ''Hello, my friend! What can I get for you?''', 1, 401),
('YOUR BUDDY''S HOUSE', 'You make your way to your buddy''s house. Her name is Wanda. (BET YOU THOUGHT THE BUDDY WAS A GUY. SEXIST. GIRLS CAN BE YOUR BUDDY TOO.) You knock on her door but there is no answer. She usually answers.', 1, 501),
('EN ROUTE TO SUPERMARKET', 'You come across a homeless man asking for change. Do you stop and help him or keep on going?', 1, 601);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
