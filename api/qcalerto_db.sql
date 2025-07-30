-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2025 at 12:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qcalerto_db`
--
-- Ensure the database exists and switch to it
CREATE DATABASE IF NOT EXISTS `qcalerto_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `qcalerto_db`;

--
-- Drop existing tables if they exist to ensure a clean slate
-- (Optional, but good for fresh setup)
DROP TABLE IF EXISTS `discussion_replies`;
DROP TABLE IF EXISTS `discussions`;
DROP TABLE IF EXISTS `community_posts`;
DROP TABLE IF EXISTS `emergency_alerts`;
DROP TABLE IF EXISTS `events`;
DROP TABLE IF EXISTS `resources`;
DROP TABLE IF EXISTS `users`;


-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- IMPORTANT: 'password' column stores plain text passwords. Highly insecure for production.
CREATE TABLE `users` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`username` VARCHAR(50) NOT NULL UNIQUE,
`email` VARCHAR(100) NOT NULL UNIQUE,
`password` VARCHAR(255) NOT NULL, -- Changed from password_hash to password for plain text storage
`mobile_number` VARCHAR(20) DEFAULT NULL UNIQUE,
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `community_posts`
--

CREATE TABLE `community_posts` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`user_id` INT NOT NULL,
`post_content` TEXT NOT NULL,
`sentiment` VARCHAR(20) DEFAULT NULL,
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discussion_replies`
--

CREATE TABLE `discussion_replies` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`discussion_id` INT NOT NULL,
`user_id` INT NOT NULL,
`reply_content` TEXT NOT NULL,
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`user_id` INT NOT NULL,
`topic_title` VARCHAR(255) NOT NULL,
`topic_content` TEXT NOT NULL,
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_alerts`
--

CREATE TABLE `emergency_alerts` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`alert_type` VARCHAR(50) NOT NULL,
`title` VARCHAR(255) NOT NULL,
`description` TEXT NOT NULL,
`severity` ENUM('CRITICAL','URGENT','ADVISORY','INFO') NOT NULL,
`affected_areas` VARCHAR(255) DEFAULT NULL,
`issued_by` VARCHAR(100) DEFAULT NULL,
`issued_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`expires_at` DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`event_name` VARCHAR(255) NOT NULL,
`description` TEXT DEFAULT NULL,
`event_date` DATE NOT NULL,
`event_time` TIME DEFAULT NULL,
`location` VARCHAR(255) DEFAULT NULL,
`organizer` VARCHAR(100) DEFAULT NULL,
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`title` VARCHAR(255) NOT NULL,
`description` TEXT DEFAULT NULL,
`resource_url` VARCHAR(255) DEFAULT NULL,
`category` VARCHAR(50) DEFAULT NULL,
`uploaded_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `community_posts`
--
ALTER TABLE `community_posts`
ADD CONSTRAINT `community_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discussion_replies`
--
ALTER TABLE `discussion_replies`
ADD CONSTRAINT `discussion_replies_ibfk_1` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `discussion_replies_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discussions`
--
ALTER TABLE `discussions`
ADD CONSTRAINT `discussions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
