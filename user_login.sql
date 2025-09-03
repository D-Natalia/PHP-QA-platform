-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2025 at 03:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL,
  `answer_text` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `questions_id`, `answer_text`, `is_correct`) VALUES
(1, 1, 'H2O', 1),
(2, 1, 'CO2', 0),
(3, 1, 'NaCl', 0),
(4, 2, 'Atomul', 1),
(5, 2, 'Celulă', 0),
(6, 2, 'Moleculă', 0),
(7, 3, 'Marte', 0),
(8, 3, 'Jupiter', 0),
(9, 3, 'Pământul', 1),
(10, 4, 'Se formează o sare și apă', 1),
(11, 4, 'Se eliberează oxigen', 0),
(12, 4, 'Are loc o reacție de oxidare', 0),
(13, 5, 'O colecție de stele, gaze și praf, ținute împreună de gravitație', 1),
(14, 5, 'Un sistem solar mare', 0),
(15, 5, 'O singură stea masivă', 0),
(16, 6, 'George Washington', 1),
(17, 6, 'Thomas Jefferson', 0),
(18, 6, 'Abraham Lincoln', 0),
(19, 7, '1914', 1),
(20, 7, '1918', 0),
(21, 7, '1939', 0),
(22, 8, 'Vincent van Gogh', 0),
(23, 8, 'Pablo Picasso', 0),
(24, 8, 'Leonardo da Vinci', 1),
(25, 9, 'Reunificarea Germaniei', 1),
(26, 9, 'Spre sfârșitul Războiului Rece', 0),
(27, 9, 'Începutul celui de-al Doilea Război Mondial', 0),
(28, 10, 'O regină a Egiptului antic', 1),
(29, 10, 'O împărăteasă romană', 0),
(30, 10, 'O figură mitologică', 0),
(31, 11, 'Londra', 0),
(32, 11, 'Roma', 0),
(33, 11, 'Paris', 1),
(34, 12, 'Nilul', 1),
(35, 12, 'Amazonul', 0),
(36, 12, 'Misisipi', 0),
(37, 13, 'Oceanul Atlantic', 0),
(38, 13, 'Oceanul Pacific', 1),
(39, 13, 'Oceanul Indian', 0),
(40, 14, 'Muntele Kilimanjaro', 1),
(41, 14, 'Muntele Everest', 0),
(42, 14, 'Muntele Aconcagua', 0),
(43, 15, 'Asia', 0),
(44, 15, 'Africa', 1),
(45, 15, 'America de Sud', 0),
(46, 16, '10', 0),
(47, 16, '12', 1),
(48, 16, '16', 0),
(49, 17, '5', 0),
(50, 17, '6', 1),
(51, 17, '7', 0),
(52, 18, '9', 0),
(53, 18, '27', 1),
(54, 18, '33', 0),
(55, 19, '3.14', 1),
(56, 19, '2.71', 0),
(57, 19, '1.61', 0),
(58, 20, '5', 1),
(59, 20, '15', 0),
(60, 20, '2', 0),
(61, 21, 'Charles Dickens', 0),
(62, 21, 'William Shakespeare', 1),
(63, 21, 'Jane Austen', 0),
(64, 22, 'Cervantes', 1),
(65, 22, 'Victor Hugo', 0),
(66, 22, 'Leo Tolstoy', 0),
(67, 23, 'Robinson Crusoe', 1),
(68, 23, 'Gulliver\'s Travels', 0),
(69, 23, 'Treasure Island', 0),
(70, 24, 'To Kill a Mockingbird', 0),
(71, 24, 'The Great Gatsby', 0),
(72, 24, 'The Old Man and the Sea', 0),
(73, 25, 'Herman Melville', 1),
(74, 25, 'Jules Verne', 0),
(75, 25, 'Mark Twain', 0);

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE `domains` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`id`, `name`) VALUES
(3, 'Geography'),
(2, 'History'),
(5, 'Literature'),
(4, 'Math'),
(1, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `domain_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `domain_id`) VALUES
(1, 'What is the chemical formula for water?', 1),
(2, 'What is the smallest unit of matter?', 1),
(3, 'Which planet is the third from the Sun?', 1),
(4, 'What happens when an acid and a base neutralize each other?', 1),
(5, 'What is a galaxy?', 1),
(6, 'Who was the first president of the United States?', 2),
(7, 'In what year did World War I begin?', 2),
(8, 'Who painted the Mona Lisa?', 2),
(9, 'What marked the fall of the Berlin Wall?', 2),
(10, 'Who was Cleopatra?', 2),
(11, 'What is the capital of France?', 3),
(12, 'What is the longest river in the world?', 3),
(13, 'Which ocean is the largest?', 3),
(14, 'What is the highest mountain in Africa?', 3),
(15, 'On which continent is the Sahara Desert located?', 3),
(16, 'What is the square root of 144?', 4),
(17, 'How many sides does a hexagon have?', 4),
(18, 'What number is 3 to the power of 3?', 4),
(19, 'What is the value of Pi (the first 3 digits)?', 4),
(20, 'If x + 5 = 10, what is x?', 4),
(21, 'Who wrote \"Hamlet\"?', 5),
(22, 'Who is the author of the novel \"Don Quixote\"?', 5),
(23, 'What is the title of the famous book about a sailor who is stranded on a deserted island?', 5),
(24, 'Which book begins with \"It was a hot day in August...\"?', 5),
(25, 'Who wrote \"Moby Dick\"?', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`) VALUES
(1, 'test', '$2y$10$CYGD6lrUgGTs.NxN4sXhNO7lXFJlUlOqEt1Ol4IEZ1h2hMeyZAKhO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_id` (`questions_id`);

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domain_id` (`domain_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `domains`
--
ALTER TABLE `domains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`domain_id`) REFERENCES `domains` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
