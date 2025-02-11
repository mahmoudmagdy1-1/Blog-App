-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 11, 2025 at 09:41 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog2`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `post_id` int UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`, `created_at`) VALUES
(1, 9, 4, 'Driver of snowmobile injured in nontraffic accident, init', '2025-02-10 19:40:55'),
(2, 9, 7, 'Infect/inflm reaction due to int fix of left fibula, sequela', '2025-02-10 19:40:55'),
(3, 12, 4, 'Disp fx of trapezium, unsp wrist, subs for fx w nonunion', '2025-02-10 19:40:55'),
(4, 3, 19, 'Laceration of musc/tend the rotator cuff of left shoulder', '2025-02-10 19:40:55'),
(5, 4, 7, 'Nondisp fx of capitate bone, r wrist, subs for fx w malunion', '2025-02-10 19:40:55'),
(6, 12, 12, 'Intermittent monocular esotropia, left eye', '2025-02-10 19:40:55'),
(7, 8, 2, 'Poisn by antivaric drugs, inc scler agents, self-harm, subs', '2025-02-10 19:40:55'),
(8, 1, 12, 'Toxic effect of venom of black widow spider, self-harm, init', '2025-02-10 19:40:55'),
(9, 2, 1, 'Mtrcy driver injured in collision w 2/3-whl mv nontraf, init', '2025-02-10 19:40:55'),
(10, 3, 3, 'Chronic gout due to renal impairment, vertebrae, with tophus', '2025-02-10 19:40:55'),
(11, 9, 8, 'Legal intervnt w oth gas, law enforc offl injured, subs', '2025-02-10 19:40:55'),
(12, 9, 2, 'Primary optic atrophy, right eye', '2025-02-10 19:40:55'),
(13, 19, 6, 'Traum subrac hem w LOC of 6 hours to 24 hours, sequela', '2025-02-10 19:40:55'),
(14, 2, 12, 'Unspecified superficial injury of hip and thigh', '2025-02-10 19:40:55'),
(15, 8, 19, 'Paratyphoid fever, unspecified', '2025-02-10 19:40:55'),
(16, 14, 8, 'Tuberculosis of genitourinary system', '2025-02-10 19:40:55'),
(17, 5, 5, 'Passngr off-road veh injured in traffic accident', '2025-02-10 19:40:55'),
(18, 8, 3, 'Displ seg fx shaft of ulna, l arm, init for opn fx type I/2', '2025-02-10 19:40:55'),
(19, 7, 7, 'Sltr-haris Type III physl fx low end humer, right arm, sqla', '2025-02-10 19:40:55'),
(20, 12, 14, 'Traum rupture of unsp ligmt of r little finger at MCP/IP jt', '2025-02-10 19:40:55'),
(21, 2, 3, 'Unsp pedl cyclst inj in clsn w rail trn/veh nontraf, init', '2025-02-10 19:40:55'),
(22, 1, 3, 'Unsp foreign body in trachea causing other injury, sequela', '2025-02-10 19:40:55'),
(23, 9, 9, 'Pasngr on bus injured pick-up truck, pk-up/van nontraf, init', '2025-02-10 19:40:55'),
(24, 5, 2, 'Mycetoma', '2025-02-10 19:40:55'),
(25, 3, 5, 'Partial traumatic amputation of right midfoot, sequela', '2025-02-10 19:40:55'),
(26, 14, 19, 'Benign neoplasm of liver', '2025-02-10 19:40:55'),
(27, 9, 6, 'Leakage of unspecified vascular graft, initial encounter', '2025-02-10 19:40:55'),
(28, 12, 5, 'Burn of unsp degree of right hand, unspecified site, sequela', '2025-02-10 19:40:55'),
(29, 12, 6, 'Infection and inflammatory reaction due to insulin pump', '2025-02-10 19:40:55'),
(30, 2, 14, 'Malocclusion, Angle\'s class, unspecified', '2025-02-10 19:40:55'),
(31, 8, 10, 'Rheumatoid polyneuropathy with rheumatoid arthritis of elbow', '2025-02-10 19:40:55'),
(32, 14, 4, 'Corrosion of unsp degree of shldr/up lmb, except wrs/hnd', '2025-02-10 19:40:55'),
(33, 12, 19, 'Disp fx of low epiphy (separation) of unsp femr, 7thQ', '2025-02-10 19:40:55'),
(34, 14, 7, 'Crepitant synovitis (acute) (chronic), left hand', '2025-02-10 19:40:55'),
(35, 3, 9, 'Occup of dune buggy injured in nontraffic accident, sequela', '2025-02-10 19:40:55'),
(36, 10, 8, 'Superficial foreign body of unsp back wall of thorax, init', '2025-02-10 19:40:55'),
(37, 14, 10, 'Laceration with foreign body of unspecified forearm, sequela', '2025-02-10 19:40:55'),
(38, 12, 6, 'Nondisp fx of coronoid pro of unsp ulna, 7thB', '2025-02-10 19:40:55'),
(39, 19, 10, 'Corneal staphyloma, bilateral', '2025-02-10 19:40:55'),
(40, 8, 8, 'Other mechanical complication of other urinary catheter', '2025-02-10 19:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `post_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(1, 4, 9),
(2, 6, 10),
(3, 8, 4),
(4, 12, 5),
(5, 7, 7),
(6, 6, 19),
(7, 8, 4),
(8, 3, 14),
(9, 2, 6),
(10, 4, 5),
(11, 2, 4),
(12, 5, 12),
(13, 19, 8),
(14, 8, 10),
(15, 7, 2),
(16, 4, 7),
(17, 19, 12),
(18, 14, 2),
(19, 5, 2),
(20, 2, 8),
(21, 2, 2),
(22, 4, 10),
(23, 7, 9),
(24, 3, 10),
(25, 3, 1),
(26, 2, 6),
(27, 3, 19),
(28, 6, 19),
(29, 6, 3),
(30, 4, 9),
(31, 6, 5),
(32, 19, 4),
(33, 1, 8),
(34, 9, 6),
(35, 3, 7),
(36, 12, 6),
(37, 6, 7),
(38, 14, 2),
(39, 1, 7),
(40, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `likes_comment`
--

CREATE TABLE `likes_comment` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `comment_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likes_comment`
--

INSERT INTO `likes_comment` (`id`, `user_id`, `comment_id`) VALUES
(1, 1, 9),
(2, 8, 19),
(3, 2, 2),
(4, 3, 12),
(5, 2, 1),
(6, 12, 8),
(7, 6, 3),
(8, 10, 12),
(9, 1, 14),
(10, 7, 10),
(11, 4, 9),
(12, 14, 3),
(13, 12, 10),
(14, 4, 12),
(15, 12, 1),
(16, 2, 5),
(17, 19, 6),
(18, 2, 2),
(19, 6, 7),
(20, 12, 19),
(21, 14, 1),
(22, 5, 8),
(23, 10, 4),
(24, 1, 8),
(25, 5, 6),
(26, 8, 4),
(27, 14, 8),
(28, 7, 12),
(29, 2, 5),
(30, 7, 7),
(31, 7, 14),
(32, 4, 8),
(33, 7, 6),
(34, 14, 12),
(35, 6, 5),
(36, 1, 12),
(37, 6, 14),
(38, 14, 5),
(39, 10, 12),
(40, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `image` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `user_id`, `image`, `created_at`) VALUES
(1, 'Dental Hygienist', 'Nondisp seg fx shaft of l tibia, 7thF', 10, NULL, '2025-02-10 19:40:55'),
(2, 'Structural Analysis Engineer', 'Unspecified subluxation of left hip, initial encounter', 8, NULL, '2025-02-10 19:40:55'),
(3, 'Senior Quality Engineer', 'Burn first degree of unsp mult fngr, not inc thumb, sqla', 1, NULL, '2025-02-10 19:40:55'),
(4, 'Compensation Analyst', 'Complete lesion at C4 level of cervical spinal cord', 6, NULL, '2025-02-10 19:40:55'),
(5, 'Associate Professor', 'Burn due to unspecified watercraft on fire, subs encntr', 14, NULL, '2025-02-10 19:40:55'),
(6, 'Occupational Therapist', 'Occup of bus injured in collision w ped/anml nontraf, subs', 19, NULL, '2025-02-10 19:40:55'),
(7, 'Clinical Specialist', 'Other subluxation of right knee, subsequent encounter', 6, NULL, '2025-02-10 19:40:55'),
(8, 'Occupational Therapist', 'Inj extensor musc/fasc/tend l rng fngr at forarm lv, subs', 8, NULL, '2025-02-10 19:40:55'),
(9, 'VP Sales', 'Disloc of distal interphaln joint of left thumb, sequela', 10, NULL, '2025-02-10 19:40:55'),
(10, 'Senior Developer', 'Displaced bimalleolar fracture of unsp lower leg, init', 3, NULL, '2025-02-10 19:40:55'),
(11, 'Social Worker', 'Fx unsp part of scapula, l shoulder, init for opn fx', 14, NULL, '2025-02-10 19:40:55'),
(12, 'Quality Control Specialist', 'Other specified nonscarring hair loss', 10, NULL, '2025-02-10 19:40:55'),
(13, 'Nurse Practicioner', 'Chronic osteomyelitis with draining sinus, left shoulder', 9, NULL, '2025-02-10 19:40:55'),
(14, 'Analog Circuit Design manager', 'Disp fx of intermediate cuneiform of left foot, sequela', 3, NULL, '2025-02-10 19:40:55'),
(15, 'Mechanical Systems Engineer', 'Oth fx fifth MC bone, right hand, subs for fx w malunion', 8, NULL, '2025-02-10 19:40:55'),
(16, 'Structural Engineer', 'Other injury of uterus, sequela', 6, NULL, '2025-02-10 19:40:55'),
(17, 'Marketing Assistant', 'Displaced transverse fracture of shaft of unsp ulna, sequela', 14, NULL, '2025-02-10 19:40:55'),
(18, 'Professor', 'Maternal care for (suspected) cnsl malform in fetus, oth', 2, NULL, '2025-02-10 19:40:55'),
(19, 'General Manager', 'Unstable burst fracture of T7-T8 vertebra', 12, NULL, '2025-02-10 19:40:55'),
(20, 'Payment Adjustment Coordinator', 'Burn 1st deg mult sites of right lower limb, ex ank/ft, init', 3, NULL, '2025-02-10 19:40:55'),
(21, 'Computer Systems Analyst I', 'Sltr-haris Type III physeal fx lower end of humer, right arm', 19, NULL, '2025-02-10 19:40:55'),
(22, 'Staff Scientist', 'Nondisp commnt fx shaft of l femr, 7thR', 1, NULL, '2025-02-10 19:40:55'),
(23, 'Statistician I', 'Unspecified disorder of synovium and tendon, right forearm', 8, NULL, '2025-02-10 19:40:55'),
(24, 'Research Nurse', 'Displ bimalleol fx l low leg, subs for clos fx w nonunion', 9, NULL, '2025-02-10 19:40:55'),
(25, 'Environmental Specialist', 'Inj unsp musc/fasc/tend at wrs/hnd lv, left hand, init', 12, NULL, '2025-02-10 19:40:55'),
(26, 'Speech Pathologist', 'Corrosion of second degree of right ankle', 9, NULL, '2025-02-10 19:40:55'),
(27, 'Editor', 'Burn of first degree of right knee, initial encounter', 10, NULL, '2025-02-10 19:40:55'),
(28, 'Project Manager', 'Myositis ossificans progressiva, unspecified site', 2, NULL, '2025-02-10 19:40:55'),
(29, 'Civil Engineer', 'Person outsd 3-whl mv inj in clsn w 2/3-whl mv nontraf, init', 4, NULL, '2025-02-10 19:40:55'),
(30, 'Desktop Support Technician', 'Maternal care for prolapse of gravid uterus, third trimester', 2, NULL, '2025-02-10 19:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `age`, `email`, `password`, `user_image`) VALUES
(1, 'Homer', 'Barthelmes', 1, 'hbarthelmes0@admin.ch', '750098', NULL),
(2, 'Lorelei', 'Everingham', 2, 'leveringham1@state.gov', '567398', NULL),
(3, 'Raymond', 'Deetlof', 3, 'rdeetlof2@slideshare.net', '987417', NULL),
(4, 'Ana', 'Franzettoini', 4, 'afranzettoini3@smugmug.com', '409388', NULL),
(5, 'Veronike', 'Boswell', 5, 'vboswell4@freewebs.com', '138250', NULL),
(6, 'Thibaut', 'Vannoort', 6, 'tvannoort5@auda.org.au', '137941', NULL),
(7, 'Letty', 'Idell', 7, 'lidell6@sitemeter.com', '034592', NULL),
(8, 'Rea', 'Vondracek', 8, 'rvondracek7@printfriendly.com', '802313', NULL),
(9, 'Waylan', 'Lammerich', 9, 'wlammerich8@businessinsider.com', '612961', NULL),
(10, 'Derril', 'Brasier', 10, 'dbrasier9@illinois.edu', '311026', NULL),
(11, 'Salmon', 'Danelet', 11, 'sdaneleta@blog.com', '531607', NULL),
(12, 'Murdoch', 'Hardware', 12, 'mhardwareb@illinois.edu', '864159', NULL),
(13, 'Merry', 'Vedyasov', 13, 'mvedyasovc@google.com.br', '720157', NULL),
(14, 'Hamish', 'Adolthine', 14, 'hadolthined@wikia.com', '610392', NULL),
(15, 'Massimo', 'Delgado', 15, 'mdelgadoe@webs.com', '237993', NULL),
(16, 'Lianne', 'Vaggs', 16, 'lvaggsf@merriam-webster.com', '657092', NULL),
(17, 'Sher', 'Houltham', 17, 'shoulthamg@bbb.org', '402690', NULL),
(18, 'Cherilynn', 'Tournie', 18, 'ctournieh@google.co.jp', '844015', NULL),
(19, 'Clint', 'Reynoollds', 19, 'creynoolldsi@yale.edu', '720132', NULL),
(20, 'Orelee', 'Buglar', 20, 'obuglarj@jimdo.com', '037961', NULL),
(21, 'sgadniogsdnio', 'sonigaognisd', 22, 'mahmoud@email.com', '7a6b8c4ca0727a546fba78a4551c020a6d9c4add', '../app/storage/3de5e3759ac6743d9728941801dd9520.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `likes_comment`
--
ALTER TABLE `likes_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `likes_comment`
--
ALTER TABLE `likes_comment`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `likes_comment`
--
ALTER TABLE `likes_comment`
  ADD CONSTRAINT `likes_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `likes_comment_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
