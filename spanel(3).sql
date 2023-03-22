-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 04:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_list`
--

CREATE TABLE `contact_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ifstatus` enum('email','whatsapp') NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `email_message`
--

CREATE TABLE `email_message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `query` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `status` varchar(125) NOT NULL,
  `array` text NOT NULL,
  `type` varchar(125) NOT NULL,
  `delay` varchar(125) NOT NULL,
  `media` text NOT NULL,
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `category` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1=Notification 2=bayarcash',
  `file` text NOT NULL,
  `query` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `name`, `subject`, `message`, `category`, `file`, `query`, `status`, `timestamp`) VALUES
(2, 'Tri Yatna', 'Welcome to sPanel - Panelnya anak PKM sEntra Universitas Widyatama', 'Halo Tri Yatna,{n}Selamat kamu telah terdaftar di sPanel Panelnya anak PKM sEntra Universitas Widyatama. Kami harap dengan adanya sPanel ini dapat mempermudah mengakses segala informasi internal.{n}Terimakasih! dan selamat bergabung.{n}{n}Regards,{n}Developer.', '1', '', 'UrgWk9FenrBfqAte6akA', '1', '1668416533');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `before_password` varchar(255) NOT NULL,
  `after_password` varchar(255) NOT NULL,
  `token` int(11) NOT NULL,
  `query_reset` varchar(255) NOT NULL,
  `expired` varchar(50) NOT NULL,
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reset_password`
--

INSERT INTO `reset_password` (`id`, `username`, `before_password`, `after_password`, `token`, `query_reset`, `expired`, `timestamp`) VALUES
(6, 'triyatna', '$2y$10$6UWAoCp/ms59z0HuUUcE8eSJRxYxpSEFCcteu3MtDJAHHmj7NXUOC', '$2y$10$oMep55OfeOCwRKR3nugz4eBh9Z0q8O9T9FLU8FUABzBSkgT.EN4pa', 0, '', '', '1668416184');

-- --------------------------------------------------------

--
-- Table structure for table `sentra_agenda`
--

CREATE TABLE `sentra_agenda` (
  `id` int(11) NOT NULL,
  `agenda_name` varchar(255) NOT NULL,
  `query` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('0','1','2') NOT NULL COMMENT '0 = Global | 2 = Staf Inti only | 1 = Divisi',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sentra_calendar`
--

CREATE TABLE `sentra_calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `allday` enum('false','true') NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `by_username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sentra_calendar`
--

INSERT INTO `sentra_calendar` (`id`, `title`, `description`, `start`, `end`, `classname`, `allday`, `timestamp`, `by_username`) VALUES
(27, 'Rapat sEntra', 'sEntra scheduled added by live row', '1668358800', '1668358800', 'bg-primary', 'true', '1668348745', 'triyatna');

-- --------------------------------------------------------

--
-- Table structure for table `sentra_cash`
--

CREATE TABLE `sentra_cash` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `month_1` enum('0','1') NOT NULL DEFAULT '0',
  `month_2` enum('0','1') NOT NULL DEFAULT '0',
  `month_3` enum('0','1') NOT NULL DEFAULT '0',
  `month_4` enum('0','1') NOT NULL DEFAULT '0',
  `month_5` enum('0','1') NOT NULL DEFAULT '0',
  `month_6` enum('0','1') NOT NULL DEFAULT '0',
  `month_7` enum('0','1') NOT NULL DEFAULT '0',
  `month_8` enum('0','1') NOT NULL DEFAULT '0',
  `month_9` enum('0','1') NOT NULL DEFAULT '0',
  `month_10` enum('0','1') NOT NULL DEFAULT '0',
  `month_11` enum('0','1') NOT NULL DEFAULT '0',
  `month_12` enum('0','1') NOT NULL DEFAULT '0',
  `price` varchar(255) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sentra_cash`
--

INSERT INTO `sentra_cash` (`id`, `name`, `npm`, `month_1`, `month_2`, `month_3`, `month_4`, `month_5`, `month_6`, `month_7`, `month_8`, `month_9`, `month_10`, `month_11`, `month_12`, `price`, `date`) VALUES
(18, 'Tri Yatna', '0220101059', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '22000', '2022-11-14 15:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `sentra_cash_request`
--

CREATE TABLE `sentra_cash_request` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cash` varchar(255) NOT NULL,
  `transferto` varchar(255) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `status` enum('1','2','3','4') NOT NULL DEFAULT '2' COMMENT '1 = success 2 = pending 3 = cancel 4 = rejected',
  `query` varchar(255) NOT NULL,
  `no_invoice` varchar(255) NOT NULL,
  `acceptby` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sentra_cash_request`
--

INSERT INTO `sentra_cash_request` (`id`, `id_member`, `name`, `cash`, `transferto`, `bukti`, `status`, `query`, `no_invoice`, `acceptby`, `timestamp`) VALUES
(11, 12, 'Tri Yatna', '5000', 'DANA', 'https://server.sentrawidyatama.my.id/uploads/api-1668281470142-kisspng-employee-benefits-management-recruitment-business-professional-people-5ada6c0b2c4bf8.4602700915242639471815.jpg', '4', 'fwClDgrQmSHqdzmR0Q7O', 'BKS-1200000', '', '1668281473'),
(15, 19, 'Ty Studio Dev', '50000', 'DANA', 'https://server.sentrawidyatama.my.id/uploads/api-1668427726013-sentra-2022.jpeg', '1', 'POyma3Q3E9cOr0UpTOmg', 'BKS-1900002', '', '1668427727'),
(17, 19, 'Ty Studio Dev', '7000', 'BANK BCA', 'https://server.sentrawidyatama.my.id/uploads/api-1668427825665-proses-pelatihan.png', '1', 'SpKuYoOmjRXs8G7XfUpZ', 'BKS-1900004', '', '1668427826'),
(20, 19, 'Ty Studio Dev', '5000', 'ShopeePay', 'https://server.sentrawidyatama.my.id/uploads/api-1668430772486-31.-Mengembangkan-Alternatif-Solusi-di-Perusahaan.jpg', '1', 'giJ4s9DHmyKShEjPVcgF', 'BKS-1900003', '', '1668430774');

-- --------------------------------------------------------

--
-- Table structure for table `sentra_member`
--

CREATE TABLE `sentra_member` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `job` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `angkatan` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `qrcode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sentra_member`
--

INSERT INTO `sentra_member` (`id`, `name`, `npm`, `email`, `phone`, `job`, `position`, `faculty`, `angkatan`, `prodi`, `qrcode`) VALUES
(18, 'Tri Yatna', '0220101059', 'tri.yatna@widyatama.ac.id', '0895349086103', 'Marketing', 'Wakil Ketua', 'FEB', '2020', 'Manajemen', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAKhSURBVO3BQY7DVgwFwX6E7n/ljpdcfUCQ7EwYVsUP1hjFGqVYoxRrlGKNUqxRijVKsUYp1ijFGqVYoxRrlGKNUqxRijVKsUa5eCgJv6RyRxLuUOmS8EsqTxRrlGKNUqxRLl6m8qYkPKHSJaFTuUPlTUl4U7FGKdYoxRrl4suScIfKHUn4NyXhDpVvKtYoxRqlWKNcDKPSJaFT6ZLQqfyXFWuUYo1SrFEuhknC/1mxRinWKMUa5eLLVH5JpUtCl4RO5QmVv6RYoxRrlGKNcvGyJPxlKl0SOpWTJPxlxRqlWKMUa5T4wX9YEu5QmaxYoxRrlGKNEj94IAmdSpeEN6mcJOEOlZMkvEnlm4o1SrFGKdYoFz+m0iWhU3mTSpeELgl3qNyRhJMkdCpPFGuUYo1SrFHiBz+UhBOVLgmdyh1J6FS6JHQqXRJOVE6ScKLypmKNUqxRijXKxY+pdEnoktCpdEnoVO5IwkkSTlT+smKNUqxRijVK/OCBJHQqXRJOVLoknKh0SThROUlCp3KShE7lLynWKMUapVijXDykcqJyh8oTKl0SOpXJijVKsUYp1ijxgweS8EsqTyShU+mS0KmcJKFT6ZLQqXRJ6FSeKNYoxRqlWKNcvEzlTUk4ScIdKicqJ0k4ScK/qVijFGuUYo1y8WVJuEPlCZWTJHQqXRI6lU6lS0KncofKm4o1SrFGKdYoF8Ml4SQJJ0k4UflLijVKsUYp1igXw6mcJKFT6ZJwRxJOVL6pWKMUa5RijXLxZSrfpHKShDuS8ITKSRI6lTcVa5RijVKsUS5eloRfSkKncqLSJaFTOUnCSRJOVL6pWKMUa5RijRI/WGMUa5RijVKsUYo1SrFGKdYoxRqlWKMUa5RijVKsUYo1SrFGKdYoxRrlH3IdA+ljmycqAAAAAElFTkSuQmCC');

-- --------------------------------------------------------

--
-- Table structure for table `sentra_orgwork`
--

CREATE TABLE `sentra_orgwork` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `team` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `media` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sentra_presence`
--

CREATE TABLE `sentra_presence` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `agenda` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sentra_presence`
--

INSERT INTO `sentra_presence` (`id`, `name`, `npm`, `job`, `position`, `agenda`, `date`, `timedate`) VALUES
(1, 'Tri Yatna', '0220101059', 'Marketing', 'Wakil Ketua', 'rapat 1-jam-13:23:11', '2022-11-09', '2022-11-09 06:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `sentra_project`
--

CREATE TABLE `sentra_project` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `division` varchar(255) NOT NULL,
  `team` text NOT NULL,
  `url_link` varchar(225) NOT NULL,
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sentra_project`
--

INSERT INTO `sentra_project` (`id`, `title`, `description`, `division`, `team`, `url_link`, `timestamp`) VALUES
(33, 'Testing Project', 'Testing', 'Marketing', '105', 'https://example.com', '1668418755');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `avatar` longtext NOT NULL,
  `role` enum('1','2','3','10') NOT NULL COMMENT '1=member,2=staf,3=admin,10=developer',
  `status` enum('false','true') NOT NULL DEFAULT 'false',
  `last_login` datetime NOT NULL,
  `ip_last` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created_at`, `avatar`, `role`, `status`, `last_login`, `ip_last`) VALUES
(105, 'Tri Yatna', 'triyatna', '$2y$10$RuW.0zFzhYYtEOjaOWATOeYLfcGD6JfHOw4L5Ef32pSEvMSBwbn4e', '2022-11-14 15:54:46', 'https://avataaars.io/?avatarStyle=Circle&amp;topType=WinterHat4&amp;accessoriesType=Round&amp;hairColor=Auburn&amp;facialHairType=BeardMedium&amp;clotheType=ShirtScoopNeck&amp;clotheColor=White&amp;eyeType=Default&amp;eyebrowType=RaisedExcitedNatural&amp;mouthType=Smile&amp;skinColor=Tanned', '2', 'true', '2022-11-14 16:44:35', '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_list`
--
ALTER TABLE `contact_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_message`
--
ALTER TABLE `email_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `sentra_agenda`
--
ALTER TABLE `sentra_agenda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agenda_name` (`agenda_name`);

--
-- Indexes for table `sentra_calendar`
--
ALTER TABLE `sentra_calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sentra_cash`
--
ALTER TABLE `sentra_cash`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sentra_cash_request`
--
ALTER TABLE `sentra_cash_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sentra_member`
--
ALTER TABLE `sentra_member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sentra_orgwork`
--
ALTER TABLE `sentra_orgwork`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sentra_presence`
--
ALTER TABLE `sentra_presence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sentra_project`
--
ALTER TABLE `sentra_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_list`
--
ALTER TABLE `contact_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_message`
--
ALTER TABLE `email_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sentra_agenda`
--
ALTER TABLE `sentra_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sentra_calendar`
--
ALTER TABLE `sentra_calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sentra_cash`
--
ALTER TABLE `sentra_cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sentra_cash_request`
--
ALTER TABLE `sentra_cash_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sentra_member`
--
ALTER TABLE `sentra_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sentra_orgwork`
--
ALTER TABLE `sentra_orgwork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sentra_presence`
--
ALTER TABLE `sentra_presence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sentra_project`
--
ALTER TABLE `sentra_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD CONSTRAINT `reset_password_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sentra_cash`
--
ALTER TABLE `sentra_cash`
  ADD CONSTRAINT `sentra_cash_ibfk_2` FOREIGN KEY (`name`) REFERENCES `sentra_member` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`name`) REFERENCES `sentra_member` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
