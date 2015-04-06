-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2015 at 10:27 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `camptrek`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` int(11) NOT NULL COMMENT 'image id',
  `src_id` int(11) NOT NULL COMMENT 'park id in park table or post id in post table',
  `src_type` enum('park','post') NOT NULL COMMENT 'type of photo',
  `photoURL` varchar(255) NOT NULL COMMENT 'photo url',
  `photoDesc` varchar(255) NOT NULL COMMENT 'photo description',
  `author_id` int(11) NOT NULL COMMENT 'corresponds to user table id',
  `tagged id` int(11) NOT NULL COMMENT 'for later use to tag people in photots'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `src_id`, `src_type`, `photoURL`, `photoDesc`, `author_id`, `tagged id`) VALUES
(1, 1, 'post', 'images/JT1.JPG', 'Rocks at Jumbo Rock.', 1, 0),
(2, 2, 'post', 'images/JT2.JPG', 'Tall rocks at Jumbo Rock.', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `park`
--

CREATE TABLE IF NOT EXISTS `park` (
`id` int(11) unsigned NOT NULL COMMENT 'park id',
  `name` varchar(255) NOT NULL COMMENT 'park name',
  `lat` float(10,6) NOT NULL COMMENT 'latitude',
  `lon` float(10,6) NOT NULL COMMENT 'longitude',
  `info` varchar(10000) NOT NULL COMMENT 'general info',
  `map_object` varchar(255) NOT NULL COMMENT 'google map object',
  `img_id` varchar(11) NOT NULL COMMENT 'id corresponds with images table id for default photo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id` int(7) NOT NULL COMMENT 'park id',
  `campground` varchar(255) NOT NULL COMMENT 'campground name',
  `time_created` int(11) NOT NULL COMMENT 'time post created',
  `category` varchar(50) NOT NULL COMMENT 'category of camping place',
  `rating` float NOT NULL COMMENT 'rating ',
  `summary` varchar(10000) NOT NULL COMMENT 'summary of trip',
  `tips_tricks` varchar(5000) NOT NULL COMMENT 'tips and tricks for camping spot',
  `user_id` int(7) NOT NULL COMMENT 'corresponds with user id',
  `like_count` int(7) NOT NULL COMMENT '"like" count',
  `date` int(11) NOT NULL COMMENT 'date of trip'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `campground`, `time_created`, `category`, `rating`, `summary`, `tips_tricks`, `user_id`, `like_count`, `date`) VALUES
(1, 'Jumbo Rock', 1428071265, 'desert', 10, 'This trip was so awesome. I had so much fun. There are tons of things to do there. Everyone there is nice. It''s worth the drive. I would go here over and over again. ', 'Bring tons of water', 1, 77, 1428071265),
(2, 'Camp Davis', 1428071265, 'river', 9, 'This trip was so awesome. I had so much fun. There are tons of things to do there. Everyone there is nice. It''s worth the drive. I would go here over and over again. ', 'Bring tons of beer', 2, 97, 1428071265),
(3, 'Sequoia', 1428120803, 'Hiking', 8, 'It was very very fun.', 'Show up early. ', 1, 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
`id` int(11) NOT NULL COMMENT 'rating id',
  `user_id` int(11) NOT NULL COMMENT 'corresponds with id of user table',
  `src_id` int(11) NOT NULL COMMENT 'park id from park table or post id from post table',
  `src_type` enum('park','post') NOT NULL COMMENT 'park review of post review',
  `rating` float NOT NULL COMMENT 'rating  10/10',
  `date created` int(11) NOT NULL COMMENT 'timestamp of when review was created'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(7) NOT NULL COMMENT 'user id',
  `username` varchar(255) NOT NULL COMMENT 'username',
  `email` varchar(255) NOT NULL COMMENT 'user email',
  `password` varchar(255) NOT NULL COMMENT 'user password',
  `avatar_url` varchar(255) NOT NULL COMMENT 'avatar url',
  `date_created` int(11) NOT NULL COMMENT 'date profile created',
  `last_login` int(11) NOT NULL COMMENT 'last login date',
  `status` int(2) NOT NULL COMMENT 'status of user'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar_url`, `date_created`, `last_login`, `status`) VALUES
(1, 'adrian', 'nieto.adrian87@gmail.com', 'aafdc23870ecbcd3d557b6423a8982134e17927e', '', 0, 0, 0),
(2, 'sandra', 'sandra.manzo@ymail.com', 'aafdc23870ecbcd3d557b6423a8982134e17927e', '', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `park`
--
ALTER TABLE `park`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'image id',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `park`
--
ALTER TABLE `park`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'park id';
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT COMMENT 'park id',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'rating id';
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT COMMENT 'user id',AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
