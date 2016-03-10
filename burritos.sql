-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:8080
-- Generation Time: Mar 10, 2016 at 09:27 AM
-- Server version: 5.7.10
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
('Keys', 'These are your keys. One of the keys is to your bike lock', 1, 0, 1),
('Frozen Burrito', 'This frozen burrito looks super questionable. It has probably been frozen for a long time, and is as hard as a rock. Is that mold I see?', 1, 0, 2),
('Cactus', 'It is a cactus. Its needles look dangerous. ', 1, 0, 3),
('Sunscreen', 'It can protect you from the sun. It is also very slippery.', 1, 1, 4),
('Bum IOU', 'You helped a bum. Bum magic!', 1, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `money`
--

CREATE TABLE `money` (
  `value` int(11) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `money`
--

INSERT INTO `money` (`value`, `id`) VALUES
(1, 1);

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
('asdsa', 1, 114);

-- --------------------------------------------------------

--
-- Table structure for table `snooze`
--

CREATE TABLE `snooze` (
  `value` int(11) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `snooze`
--

INSERT INTO `snooze` (`value`, `id`) VALUES
(1, 1);

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
('IN YOUR BEDROOM', 'You wake up.  You''re hung over, famished, and your room is filthy.  You get the sense that if you do not eat a burrito in the next hour, you WILL die. You only have one dollar in your wallet though, surely not enough to purchase one whole burrito...  WHAT DO?', 1, 101),
('IN THE KITCHEN', 'You walk into the kitchen. The sun is extremely bright. You shield your hungover eyes. Inside the kitchen, you have a FRIDGE. KEYS, PHONE, and SUNSCREEN are sitting on the counter. You can enter the GARAGE or LEAVE the house. WHAT DO?', 1, 102),
('LOOKING IN THE FRIDGE', 'You see a horrific sight.  An Amy''s frozen burrito that you keep thawing and forgetting about before tossing it back into the freezer.  It is now a lovely spectrum of green and black, and frozen completely solid.  You could probably hurt someone with this thing.', 1, 103),
('IN THE GARAGE', 'You walk into the garage, and see your BIKE. There''s a door for the KITCHEN and a door OUTSIDE. WHAT DO?', 1, 104),
('OUTSIDE', 'You walk outside, and you remember there''s a delicious BURRITO TRUCK only about a mile away. You also remember that your BUDDY lives just 2 blocks away. He sometimes has burritos! There''s also a SUPERMARKET and TACO BELL downtown, but you don''t have enough energy to walk that far. WHAT DO?', 1, 105),
('EATING THE MONSTROUS BURRITO', 'Against your better judgement, you toss the burrito in your microwave and choke the putrid goo-mass down.  You immediately start vomiting and don''t stop.', 1, 106),
('USING THE PHONE', 'You pick up your old school landline phone. Maybe you could order a burrito from Burritos Etc! According to your recollection, their burritos cost $10. You''d better have enough money...', 1, 107),
('FACING THE DELIVERY MAN', 'The delivery man holds his hand out expectantly. But you don''t have enough money! The delivery man has clearly had a bad day, and your lack of money is the straw that breaks the camel''s back. He pulls out a sock full of dimes and beats you to death with it. THIS IS WHAT YOU GET FOR NOT BEING ABLE TO AFFORD A BURRITO.', 1, 108),
('ORDERING A BURRITO', 'The delivery man, who''s had a terrible day, is angry that you are unable to pay him. He comes at you with a hidden switchblade. You think quickly and use your frozen burrito as a weapon, bludgeoning him to death. You get arrested and are given 4 years for manslaughter. Good news is they have Burrito Tuesdays in prison.', 1, 109),
('ORDERING A BURRITO', 'You are delivered the most supreme burrito, a LEVEL 5. CONGRATS!', 1, 110),
('RIDING YOUR BIKE', 'You unlock your bike and take it outside. It''s beautiful!  But the chirping birds and bright sunshine only prove to worsen your pounding hangover headache.  You consider your burrito options...there''s a SUPERMARKET and a TACO BELL a few miles away, a BURRITO TRUCK a mile away, or your BUDDY''S HOUSE a few blocks away. WHAT DO?', 1, 301),
('IN THE GARAGE', 'Your bike is securely locked to the boiler.  That''s probably bad for it, but you have no key.', 1, 302),
('AT THE BURRITO TRUCK', 'You make your way to the BURRITO TRUCK. Working at the counter is a sweet but frail old man who seems to be making an ULTIMATE BURRITO for himself. He sees he has a customer and quickly perks up. ''Hello, my friend! What can I get for you?''', 1, 401),
('ASKING FOR BURRITO', '''One burrito right away, my friend!'' The man proceeds to make a delicious looking burrito with all the works. It looks almost as good as the burrito the man made for himself! ''Alright, my friend, that''ll be $10!''', 1, 402),
('STANDING ABOVE A DYING MAN', 'The old man quickly turns as red as a tomato. ''I TRUSTED YOU TO HAVE MONEY FOR THIS BURRITO! YOU HAVE BETRAYED ME! I AM SO MAD, I COULD....'' the old man is overwhelmed by his emotions and has a heart attack. He drops the burrito he made for you on the ground and it''s totally ruined.', 1, 403),
('FLEEING THE SCENE', 'You ignore the fact that the old man is dying and reach behind the counter to grab his ULTIMATE BURRITO. You eat the burrito as you flee the scene, so it doesn''t get too cold. Wow you should''ve tried eating burritos while running sooner, the burrito is somehow more delicious that way. The old man dies. ', 1, 404),
('CALLING AN AMBULANCE', 'You call an ambulance from the burrito truck''s phone. The ambulance arrives, but unfortunately the driver was at the same party as you last night and had a little too much to drink as well! As he approaches the burrito truck, his foot accidentally slams the gas instead of breaks. He plows into you and the burrito truck at a very high velocity. Everyone just died!', 1, 405),
('TRYING TO TAKE HIS BURRITO', 'You try to distract the old man. ''Is that Gary Busey across the street?'' The old man turns his head slightly, and you try to grab his burrito. As quickly as you reach for the burrito, the old man grabs your arm. ''I don''t think so, my friend.'' You try to struggle out of his grip but this only makes the old man angrier. You punch his throat and the old man''s face turns blue. You broke his windpipe! The old man collapses to the ground, unable to breathe.', 1, 406),
('MAKING A GRAB', 'You try to distract the old man. ''Is that Gary Busey across the street?'' The old man turns his head slightly, and you try to grab his burrito. As quickly as you reach for the burrito, the old man grabs your arm. ''I don''t think so, my friend.'' You try to struggle out of his grip but this only makes the old man angrier. You punch his throat and the old man''s face turns blue. You broke his windpipe! The old man collapses to the ground, unable to breathe.', 1, 407),
('EATING A BURRITO', 'The old man hands you a delicious burrito.  It''s practically glowing and you hear a choir singing.  The clouds part and the hand of god descends to flash you a thumbs up as you bask in the glory and light of the most perfect burrito ever created.\r\n\r\nIt tastes ok.', 1, 408),
('AT YOUR BUDDY''S HOUSE', 'You make your way to your buddy''s house. Her name is Wanda. (BET YOU THOUGHT THE BUDDY WAS A GUY. SEXIST. GIRLS CAN BE YOUR BUDDY TOO.) You knock on her door but there is no answer. She usually answers.', 1, 501),
('INSIDE WANDA''S HOUSE', 'Wanda is passed out cold. She was at the party too! You see her PURSE on the table, as well a tiny but pointy CACTUS. You also that Wanda is holding AN ENTIRE BURRITO in her hand. She must''ve bought it last night but passed out before she could take a bite! WHAT DO?', 1, 502),
('TAKING WANDA''S BURRITO', 'You sneak over to Wanda''s near-lifeless body. She''s not clutching the burrito too hard. This should be easy. As you make a move for her burrito, WANDA''S EYES OPEN! You didn''t notice in her other hand was a SHARP PAIR OF SCISSORS. Before Wanda can even identify you as her friend, she plunges the scissors into your neck. You repeatedly scream at Wanda ''WHY?!'' before you bleed out with your severed jugular.', 1, 503),
('EN ROUTE TO SUPERMARKET', 'You come across a homeless man asking for change. Do you stop and help him or keep on going?', 1, 601),
('HELPING A HOMELESS MAN', 'You give the man $1 from your wallet. He thanks you graciously and says ''I''ll remember this. I swear upon my life I shall repay you.''', 1, 602),
('NOT HELPING THE HOMELESS MAN', 'The homeless man yells at you. You feel bad.', 1, 603),
('ON THE CORNER OF SUPERMARKET AND TACO BELL', 'The homeless man runs away. Finally he''s no longer here on this corner and you can concentrate on where to go for your burrito. The taco bell is kitty corner to the super market. The sign on the front of the taco bell says "ALL BURRITOS $5. AND WE''RE HIRING". Where do you want to try and get a burrito?', 1, 604),
('GOING TO THE SUPERMARKET', 'You enter the supermarket and almost immediately trip over this shitty kid who cuts you off as you''re going for a shopping basket. Annoyed, you ignore the kid and make your way to the frozen aisle. You walk down the aisle until stumbling upon the FROZEN BURRITOS! You reach to open the freezer door when suddenly the shitty kid runs up to the door and presses his weight against it. You are prevented from opening the door. WHAT DO?', 1, 606),
('SHOVING THE KID KID', 'You shove the kid out of your way so you can get to the frozen burritos. The kid falls to his knees and immediately screams bloody murder: "DAD!!!! HELP!!!! THIS PERSON JUST SHOVED IN THE FREEZER AISLE AND I THINK I BRUISED MY KNEE! Suddenly, the child''s beast of a father darts around the corner and goes straight into attack mode. You have NO DEFENSE. The father beats you to death with his bare hands. YOU DEAD.', 1, 607),
('SHOVING THE KID', 'You shove the kid out of your way so you can get to the frozen burritos. The kid falls to his knees and immediately screams bloody murder: "DAD!!!! HELP!!!! THIS PERSON JUST SHOVED IN THE FREEZER AISLE AND I THINK I BRUISED MY KNEE!" Suddenly, the child''s beast of a father darts around the corner and goes straight into attack mode. You have NO DEFENSE. Just as the father is about to throw his first of many punches at your face and neck, THE BUM shows up from out of nowhere. THE BUM uses a makeshift taser made from a travel-size flashlight and aluminum foil and zaps the father to the ground. THE BUM SAVED YOUR LIFE! ''Hey stranger, I didn''t forget how you helped me back there. I didn''t know how to pay you back until this opportunity presented itself in the freezer aisle of our local supermarket. I invested that dollar you gave me in some stocks, and got a burrito when Apple skyrocketed! Here you go!'' How the bum actually got the burrito, you''re not quite sure. But hey, free burrito! YOU WIN', 1, 608),
('SHOVING THE KID', 'You shove the kid out of your way so you can get to the frozen burritos. The kid falls to his knees and immediately screams bloody murder: "DAD!!!! HELP!!!! THIS PERSON JUST SHOVED IN THE FREEZER AISLE AND I THINK I BRUISED MY KNEE!" Suddenly, the child''s beast of a father darts around the corner and goes straight into attack mode. Using your quick thinking, you bust out your bottle of SUNSCREEN and squirt it all over the floor in front of the charging father. He slips hard, momentarily incapacitated. You of course use this opportunity to pull out your CACTUS and stab the father repeatedly in the neck. As the father bleeds out, a crowd forms and applauds your bravery. One woman emerges from the audience, clearly impressed by your combat skills. ''I saw what you did. I bought this burrito for myself but I think today you deserve it more. Here, take my burrito!'' She hands you her burrito, and you cry happily while starting to unwrap it. YOU WIN!', 1, 609),
('SHOVING THE KID', 'You shove the kid out of your way so you can get to the frozen burritos. The kid falls to his knees and immediately screams bloody murder: "DAD!!!! HELP!!!! THIS PERSON JUST SHOVED IN THE FREEZER AISLE AND I THINK I BRUISED MY KNEE!" Suddenly, the child''s beast of a father darts around the corner and goes straight into attack mode. . Using your quick thinking, you bust out your bottle of SUNSCREEN and squirt it all over the floor in front of the charging father. He slips hard, momentarily incapacitated. You of course use this opportunity to pull out your CACTUS and stab the father repeatedly in the neck. THE BUM appears, seemingly out of nowhere, and pulls off his tearaway bum outfit to reveal a tuxedo. ''I''ve been watching you for a long time,'' he says, ''searching far and wide and someone possessing the combat skills and generosity needed to replace me as President of Burritos INC. Today I can officially resign, for I have found YOU, dear stranger. Here are the keys to the company. Also I should note that one of the perks of being president of Burritos INC is an UNLIMITED SUPPLY OF BURRITOS. Hope you are okay with that.'' ''I SURE AM!!!!'' You exclaim emphatically. YOU WIN ALL THE BURRITOS!', 1, 610),
('INSIDE TACO BELL ', 'Yo quiero Taco Bell! This taco bell kinda sucks though and only sells one type of burrito for $5. Fortunately, you have $5. You buy the one burrito that they sell there, which happens to cost $5 AND be your favorite! YOU WIN!', 1, 701),
('INSIDE TACO BELL', 'The cashier notices you are poor. ''Might I make a suggestion kind stranger? Taco Bell offers a WONDERFUL employment experience. With a Taco Bell paycheck, you could get AS MANY BURRITOS AS YOUR SWEET HEART DESIRES! Would you like an application?'' The cashier makes quite an impression on you, and you take the job immediately. Good news: you have an unlimited supply of burritos! Bad news: you work at Taco Bell. YOU.....WIN?', 1, 702);

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
-- Indexes for table `money`
--
ALTER TABLE `money`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `snooze`
--
ALTER TABLE `snooze`
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
-- AUTO_INCREMENT for table `money`
--
ALTER TABLE `money`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `snooze`
--
ALTER TABLE `snooze`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=703;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
