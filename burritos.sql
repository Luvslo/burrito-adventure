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
('keys', 'These are your keys. One of the keys is to your bike lock', 1, 1, 1),
('frozen burrito', 'This frozen burrito looks super questionable. It has probably been frozen for a long time, and is as hard as a rock. Is that mold I see?', 1, 0, 2),
('cactus', 'It is a cactus. Its needles look dangerous. ', 1, 1, 3),
('sunscreen', 'It can protect you from the sun. It is also very slippery.', 1, 1, 4),
('bumhelp', 'You helped a bum. For some reason your inventory is remembering this. Bum magic!', 1, 0, 5),
('zero dollars', 'You have NO money.', 1, 0, 6),
('one dollar', 'You have one dollar. Hi George.', 1, 1, 7),
('two dollars', 'You have two dollars.', 1, 0, 8),
('three dollars', 'You have three dollars.', 1, 0, 9),
('four dollars', 'You have four dollars.', 1, 0, 10),
('five dollars', 'You have five dollars.', 1, 0, 11),
('phone', 'This is your phone. You can call people from it!', 1, 0, 12);

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
('Joe', 1, 49),
('Joe', 1, 50),
('', 1, 51),
('Marika', 1, 52),
('Marika', 1, 53),
('Marky mark', 1, 54),
('Hi', 1, 55),
('Joe', 1, 56),
('Joe', 1, 57),
('Joe', 1, 58),
('Marika', 1, 59),
('Joe', 1, 60);

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
('EATING THE MONSTROUS BURRITO', 'Against your better judgement, you toss the burrito in your microwave and choke the putrid goo-mass down.  You immediately start vomiting and don''t stop.', 1, 106),
('RIDE YOUR BIKE', 'You unlock your bike and take it outside. It''s beautiful!  But the chirping birds and bright sunshine only prove to worsen your pounding hangover headache.  You consider your burrito options...there''s a SUPERMARKEY and a TACO BELL a few miles away, a BURRITO TRUCK a mile away, or your BUDDY''S HOUSE a few blocks away. WHAT DO?', 1, 301),
('BURRITO TRUCK', 'You make your way to the BURRITO TRUCK. Working at the counter is a sweet but frail old man who seems to be making an ULTIMATE BURRITO for himself. He sees he has a customer and quickly perks up. ''Hello, my friend! What can I get for you?''', 1, 401),
('ASKING FOR BURRITO', '''One burrito right away, my friend!'' The man proceeds to make a delicious looking burrito with all the works. It looks almost as good as the burrito the man made for himself! ''Alright, my friend, that''ll be $5!''', 1, 402),
('STANDING ABOVE A DYING MAN', 'The old man quickly turns as red as a tomato. ''I TRUSTED YOU TO HAVE MONEY FOR THIS BURRITO! YOU HAVE BETRAYED ME! I AM SO MAD, I COULD....'' the old man is overwhelmed by his emotions and has a heart attack. He drops the burrito he made for you on the ground and it''s totally ruined.', 1, 403),
('FLEEING THE SCENE', 'You ignore the fact that the old man is dying and reach behind the counter to grab his ULTIMATE BURRITO. You eat the burrito as you flee the scene, so it doesn''t get too cold. Wow you should''ve tried eating burritos while running sooner, the burrito is somehow more delicious that way. The old man dies. ', 1, 404),
('CALLING AN AMBULANCE', 'You call an ambulance from the burrito truck''s phone. The ambulance arrives, but unfortunately the driver was at the same party as you last night and had a little too much to drink as well! As he approaches the burrito truck, his foot accidentally slams the gas instead of breaks. He plows into you and the burrito truck at a very high velocity. Everyone just died!', 1, 405),
('TRYING TO TAKE HIS BURRITO', 'You try to distract the old man. ''Is that Gary Busey across the street?'' The old man turns his head slightly, and you try to grab his burrito. As quickly as you reach for the burrito, the old man grabs your arm. ''I don''t think so, my friend.'' You try to struggle out of his grip but this only makes the old man angrier. You punch his throat and the old man''s face turns blue. You broke his windpipe! The old man collapses to the ground, unable to breathe.', 1, 406),
('MAKING A GRAB', 'You try to distract the old man. ''Is that Gary Busey across the street?'' The old man turns his head slightly, and you try to grab his burrito. As quickly as you reach for the burrito, the old man grabs your arm. ''I don''t think so, my friend.'' You try to struggle out of his grip but this only makes the old man angrier. You punch his throat and the old man''s face turns blue. You broke his windpipe! The old man collapses to the ground, unable to breathe.', 1, 407),
('EATING A BURRITO', 'The old man hands you a delicious burrito.  It''s practically glowing and you hear a choir singing.  The clouds part and the hand of god descends to flash you a thumbs up as you bask in the glory and light of the most perfect burrito ever created.\r\n\r\nIt tastes ok.', 1, 408),
('YOUR BUDDY''S HOUSE', 'You make your way to your buddy''s house. Her name is Wanda. (BET YOU THOUGHT THE BUDDY WAS A GUY. SEXIST. GIRLS CAN BE YOUR BUDDY TOO.) You knock on her door but there is no answer. She usually answers.', 1, 501),
('INSIDE WANDA''S HOUSE', 'Wanda is passed out cold. She was at the party too! You see her PURSE on the table, as well a tiny but pointy CACTUS. You also that Wanda is holding AN ENTIRE BURRITO in her hand. She must''ve bought it last night but passed out before she could take a bite! WHAT DO?', 1, 502),
('TAKING WANDA''S BURRITO', 'You sneak over to Wanda''s near-lifeless body. She''s not clutching the burrito too hard. This should be easy. As you make a move for her burrito, WANDA''S EYES OPEN! You didn''t notice in her other hand was a SHARP PAIR OF SCISSORS. Before Wanda can even identify you as her friend, she plunges the scissors into your neck. You repeatedly scream at Wanda ''WHY?!'' before you bleed out with your severed jugular.', 1, 503),
('EN ROUTE TO SUPERMARKET', 'You come across a homeless man asking for change. Do you stop and help him or keep on going?', 1, 601),
('HELPING A HOMELESS MAN', 'You give the man $1 from your wallet (money -=1). He thanks you graciously and says ''I''ll remember this. I swear upon my life I shall repay you.''', 1, 602),
('NOT HELPING THE HOMELESS MAN', 'The homeless man yells at you. You feel bad.', 1, 603);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
