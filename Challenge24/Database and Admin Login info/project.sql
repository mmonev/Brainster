-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 06:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(64) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `email`, `company_name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'company@mail.com', 'Company1', '123312313132132', '2023-09-24 13:29:00', '2023-09-24 13:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2021_07_03_161718_create_projects_table', 1),
(20, '2021_07_04_163108_create_employees_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `image` varchar(256) NOT NULL,
  `subtitle` varchar(128) NOT NULL,
  `description` varchar(200) NOT NULL,
  `link` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `image`, `subtitle`, `description`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Wehner, Lowe and Fay', 'https://images.unsplash.com/photo-1517311304941-3a8591023d95?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80', 'Provident qui sed animi dolores.', 'King very decidedly, and the Queen say only yesterday you deserved to be in before the end of.', 'http://borer.info/voluptas-ex-consequatur-laborum-ab-odit-dolorem-expedita', '2023-09-24 13:24:08', '2023-09-24 13:24:08'),
(2, 'Green PLC', 'https://images.unsplash.com/photo-1517311304941-3a8591023d95?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80', 'Veritatis molestiae quo omnis perferendis.', 'Alice was more hopeless than ever: she sat down a large dish of tarts upon it: they looked so.', 'http://collins.com/aperiam-vel-possimus-consequatur-aliquid-laborum-laborum.html', '2023-09-24 13:24:08', '2023-09-24 13:24:08'),
(3, 'Flatley PLC', 'https://images.unsplash.com/photo-1517311304941-3a8591023d95?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80', 'Nihil eaque quae ab.', 'He looked at Alice. \'I\'M not a bit hurt, and she felt that there ought! And when I was going to.', 'http://www.schmeler.org/et-ducimus-hic-eum-debitis-dolore-possimus', '2023-09-24 13:24:08', '2023-09-24 13:24:08'),
(4, 'Fay-Bode', 'https://images.unsplash.com/photo-1517311304941-3a8591023d95?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80', 'Incidunt reiciendis totam deserunt.', 'THAT in a very deep well. Either the well was very likely to eat or drink something or other; but.', 'https://www.flatley.biz/omnis-quis-dignissimos-autem-impedit-sapiente', '2023-09-24 13:24:08', '2023-09-24 13:24:08'),
(5, 'Cronin, Ziemann and DuBuque', 'https://images.unsplash.com/photo-1517311304941-3a8591023d95?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80', 'Sint laboriosam totam voluptatem.', 'Two. Two began in a mournful tone, \'he won\'t do a thing as \"I eat what I say,\' the Mock Turtle.', 'http://www.ziemann.com/', '2023-09-24 13:24:08', '2023-09-24 13:24:08'),
(6, 'Trantow, Purdy and Pagac', 'https://images.unsplash.com/photo-1517311304941-3a8591023d95?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80', 'Et vero sint assumenda rem id.', 'Alas! it was quite impossible to say it any longer than that,\' said the Dodo. Then they both sat.', 'http://www.smith.com/', '2023-09-24 13:24:08', '2023-09-24 13:24:08'),
(7, 'Ziemann-Herman', 'https://images.unsplash.com/photo-1517311304941-3a8591023d95?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80', 'Labore autem enim quia.', 'There was a little wider. \'Come, it\'s pleased so far,\' said the Gryphon, with a sudden burst of.', 'http://www.ryan.biz/accusantium-iusto-expedita-aut-deserunt-pariatur', '2023-09-24 13:24:08', '2023-09-24 13:24:08'),
(8, 'Veum, Wolff and Balistreri', 'https://images.unsplash.com/photo-1517311304941-3a8591023d95?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80', 'Voluptatem ullam qui ut consequatur.', 'I could let you out, you know.\' He was an old conger-eel, that used to come out among the leaves.sd', 'https://muller.net/nobis-quas-fugiat-autem-vero-velit.html', '2023-09-24 13:24:08', '2023-09-24 13:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Brainster', 'brainster@test.com', '2023-09-24 13:24:08', '$2y$10$fu.Hp/gg6SZFq5HKPEM4ru2GBqj/VqmhWyW5ZBHudUVzPiLpCw/S.', 'JmYu1zK5bIiCY9kBxHXZdTVWxYfq7jEs2Xv99kIUWicZV7y3hPZgZ7ZRreCT', '2023-09-24 13:24:08', '2023-09-24 13:24:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
