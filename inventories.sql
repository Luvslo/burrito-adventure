--
-- Database: `burritos`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

DROP TABLE IF EXISTS `inventories`;
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
('keys', 'These are your keys. One of the keys is to your bike lock', 1, 0, 1),
('frozen burrito', 'This frozen burrito looks super questionable. It has probably been frozen for a long time, and is as hard as a rock. Is that mold I see?', 1, 0, 2),
('cactus', 'It is a cactus. Its needles look dangerous. ', 1, 0, 3),
('sunscreen', 'It can protect you from the sun. It is also very slippery.', 1, 0, 4),
('bumhelp', 'You helped a bum. For some reason your inventory is remembering this. Bum magic!', 1, 0, 5),
('zero dollars', 'You have NO money.', 1, 0, 6),
('one dollar', 'You have one dollar. Hi George.', 1, 1, 7),
('two dollars', 'You have two dollars.', 1, 0, 8),
('three dollars', 'You have three dollars.', 1, 0, 9),
('four dollars', 'You have four dollars.', 1, 0, 10),
('five dollars', 'You have five dollars.', 1, 0, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
