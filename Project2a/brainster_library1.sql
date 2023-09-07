-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2023 at 02:37 PM
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
-- Database: `brainster_library1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_comments`
--

CREATE TABLE `admin_comments` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_comments`
--

INSERT INTO `admin_comments` (`id`, `comment_id`, `admin_id`, `approved`) VALUES
(1, 1, NULL, 1),
(2, 2, NULL, 1),
(3, 3, NULL, 0),
(4, 4, NULL, 0),
(5, 5, NULL, 0),
(6, 6, NULL, 0),
(7, 7, NULL, 0),
(8, 8, NULL, 0),
(9, 9, NULL, 0),
(10, 10, NULL, 0),
(11, 11, NULL, 0),
(12, 12, NULL, 0),
(13, 13, NULL, 0),
(14, 14, NULL, 0),
(15, 15, NULL, 0),
(16, 17, NULL, 0),
(17, 18, NULL, 0),
(18, 19, NULL, 0),
(19, 20, NULL, 0),
(20, 21, NULL, 0),
(28, 29, NULL, 0),
(30, 31, NULL, 0),
(31, 32, NULL, 0),
(32, 33, NULL, 1),
(33, 34, NULL, 0),
(35, 36, NULL, 1),
(36, 37, NULL, 0),
(38, 39, NULL, 1),
(39, 40, NULL, 0),
(41, 42, NULL, 0),
(42, 43, NULL, 1),
(43, 44, NULL, 1),
(44, 45, NULL, 1),
(45, 46, NULL, 1),
(46, 47, NULL, 1),
(47, 48, NULL, 1),
(48, 49, NULL, 0),
(49, 50, NULL, 1),
(50, 51, NULL, 0),
(51, 52, NULL, 1),
(52, 53, NULL, 1),
(54, 55, NULL, 0),
(55, 56, NULL, 0),
(56, 57, NULL, 0),
(57, 58, NULL, 0),
(59, 60, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `biography` text DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `surname`, `biography`, `deleted_at`) VALUES
(1, 'Joanne K.', 'Rowling', 'Joanne Rowling, best known by her pen name J. K. Rowling, is a British author and philanthropist. She wrote Harry Potter, a seven-volume children\'s fantasy series published from 1997 to 2007.', '2023-08-17 20:55:46'),
(2, 'George R. R.', 'Martin', 'George Raymond Richard Martin (born George Raymond Martin; September 20, 1948) is an American novelist, screenwriter, television producer and short story writer. He is the author of the series of epic fantasy novels A Song of Ice and Fire, which were adapted into the Emmy Award-winning HBO series Game of Thrones (2011–2019) and its prequel series House of the Dragon (2022–present).', '2023-08-17 21:14:16'),
(3, 'Gillian', 'Flynn', 'Gillian Schieber Flynn is an American author, screenwriter, and producer. She is known for writing the thriller and mystery novels Sharp Objects, Dark Places, and Gone Girl, which are all critically acclaimed.', '2023-08-17 21:35:27'),
(4, 'Howard', 'Zinn', 'Howard Zinn (August 24, 1922 – January 27, 2010) was an American historian, playwright, philosopher, socialist intellectual and World War II veteran. He was chair of the history and social sciences department at Spelman College, and a political science professor at Boston University. Zinn wrote over 20 books, including his best-selling and influential A People\'s History of the United States in 1980.', '2023-08-17 22:02:12'),
(5, 'J.K.', 'Rowling', 'Joanne Rowling, best known by her pen name J. K. Rowling, is a British author and philanthropist. She wrote Harry Potter, a seven-volume children\'s fantasy series published from 1997 to 2007.', '2023-08-17 22:09:00'),
(6, 'Joane K.', 'Rowling', 'Joanne Rowling, best known by her pen name J. K. Rowling, is a British author and philanthropist. She wrote Harry Potter, a seven-volume children\'s fantasy series published from 1997 to 2007.', '2023-08-18 11:26:33'),
(7, 'George', 'R. R. Martin', 'George Raymond Richard Martin (born George Raymond Martin; September 20, 1948) is an American novelist, screenwriter, television producer and short story writer. He is the author of the series of epic fantasy novels A Song of Ice and Fire, which were adapted into the Emmy Award-winning HBO series Game of Thrones (2011–2019) and its prequel series House of the Dragon (2022–present).', NULL),
(8, 'Joanne', 'K. Rowling', 'Joanne Rowling, best known by her pen name J. K. Rowling, is a British author and philanthropist. She wrote Harry Potter, a seven-volume children\'s fantasy series published from 1997 to 2007.', NULL),
(9, 'Barbara', 'W.Tuchman', 'Barbara Wertheim Tuchman (January 30, 1912 – February 6, 1989) was an American historian and author. She won the Pulitzer Prize twice, for The Guns of August (1962), a best-selling history of the prelude to and the first month of World War I, and Stilwell and the American Experience in China (1971), a biography of General Joseph Stilwell.', NULL),
(10, 'Dan', 'Brown', 'Daniel Gerhard Brown (born June 22, 1964) is an American author best known for his thriller novels, including the Robert Langdon novels Angels & Demons (2000), The Da Vinci Code (2003), The Lost Symbol (2009), Inferno (2013), and Origin (2017). His novels are treasure hunts that usually take place over a period of 24 hours.', NULL),
(11, 'Stephen', 'King', 'Stephen Edwin King (born September 21, 1947) is an American author of horror, supernatural fiction, suspense, crime, science-fiction, and fantasy novels. Described as the \"King of Horror\", his books have sold more than 350 million copies as of 2006, and many have been adapted into films, television series, miniseries, and comic books. King has published over 65 novels/novellas, including seven under the pen name Richard Bachman, and five non-fiction books. He has also written approximately 200 short stories, most of which have been published in book collections.', NULL),
(12, 'Abraham', 'Stoker', 'Abraham Stoker (8 November 1847 – 20 April 1912) was an Irish author who wrote the 1897 Gothic horror novel Dracula. During his lifetime, he was better known as the personal assistant of actor Sir Henry Irving and business manager of the West End\'s Lyceum Theatre, which Irving owned.', NULL),
(13, 'Frank', 'Herbert', 'Franklin Patrick Herbert Jr. (October 8, 1920 – February 11, 1986) was an American science fiction author best known for the 1965 novel Dune and its five sequels. Though he became famous for his novels, he also wrote short stories and worked as a newspaper journalist, photographer, book reviewer, ecological consultant, and lecturer.', NULL),
(14, 'Liu', 'Cixin', 'Liu Cixin (born 23 June 1963) is a Chinese computer engineer and science fiction writer. He is a nine-time winner of China\'s Galaxy Award and has also received the 2015 Hugo Award for his novel The Three-Body Problem as well as the 2017 Locus Award for Death\'s End. He is also a winner of the Chinese Nebula Award. In English translations of his works, his name is given as Cixin Liu. ', NULL),
(15, 'Phyllis', 'Dorothy James', 'Phyllis Dorothy James, (3 August 1920 – 27 November 2014), known professionally as P. D. James, was an English novelist and life peer. Her rise to fame came with her series of detective novels featuring the police commander and poet, Adam Dalgliesh.', NULL),
(16, 'Agatha', 'Christie', 'Dame Agatha Mary Clarissa Christie, Lady Mallowan, DBE (15 September 1890 – 12 January 1976) was an English writer known for her 66 detective novels and 14 short story collections, particularly those revolving around fictional detectives Hercule Poirot and Miss Marple.', NULL),
(17, 'Tana', 'French', 'Tana French (born 10 May 1973) is an American-Irish writer and theatrical actress. She is a longtime resident of Dublin, Ireland. Her debut novel In the Woods (2007), a psychological mystery, won the Edgar, Anthony, Macavity, and Barry awards for best first novel. The Independent has referred to her as \"the First Lady of Irish Crime\".', NULL),
(18, 'Mary', 'Beard', 'Dame Winifred Mary Beard,  (born 1 January 1955) is an English scholar of Ancient Rome. She is a trustee of the British Museum and formerly held a personal professorship of Classics at the University of Cambridge. She is a fellow of Newnham College, Cambridge, and Royal Academy of Arts Professor of Ancient Literature.', NULL),
(19, 'Elwyn', 'Brooks White', 'Elwyn Brooks White (July 11, 1899 – October 1, 1985) was an American writer. He was the author of several highly popular books for children, including Stuart Little (1945), Charlotte\'s Web (1952), and The Trumpet of the Swan (1970). ', '2023-08-23 14:13:56'),
(20, 'Roald', 'Dahl', 'Roald Dahl (13 September 1916 – 23 November 1990) was a British popular author of children\'s literature and short stories, a poet, and wartime fighter ace. His books have sold more than 300 million copies worldwide. Dahl has been called \"one of the greatest storytellers for children of the 20th century\".', NULL),
(21, 'Johanna', 'Spyri', 'Johanna Louise Spyri (12 June 1827 – 7 July 1901) was a Swiss author of novels, notably children\'s stories. She wrote the popular book Heidi. Born in Hirzel, a rural area in the canton of Zürich, as a child she spent several summers near Chur in Graubünden, the setting she later would use in her novels.', NULL),
(22, 'Clive', 'Staples Lewis', 'Clive Staples Lewis, (29 November 1898 – 22 November 1963) was a British writer, literary scholar, and Anglican lay theologian.', NULL),
(23, 'Caleb', 'Carr', 'Caleb Carr (born August 2, 1955) is an American military historian and author. Carr is the second of three sons born to Lucien Carr and Francesca Von Hartz. He authored The Alienist, The Angel of Darkness, The Lessons of Terror, Killing Time, The Devil Soldier, The Italian Secretary, and The Legend of Broken. He has taught military history at Bard College, and worked extensively in film, television, and the theater. His military and political writings have appeared in numerous magazines and periodicals, among them The Washington Post, The New York Times, and The Wall Street Journal. He lives in upstate New York.', NULL),
(24, 'Peter', 'Straub', 'Peter Francis Straub (March 2, 1943 – September 4, 2022) was an American novelist and poet. He wrote numerous horror and supernatural fiction novels, including Julia and Ghost Story, as well as The Talisman, which he co-wrote with Stephen King. Straub received such literary honors as the Bram Stoker Award, World Fantasy Award, and International Horror Guild Award.', NULL),
(25, 'William', 'Peter Blatty', 'William Peter Blatty (January 7, 1928 – January 12, 2017) was an American writer, director and producer.[1] He is best known for his 1971 novel, The Exorcist, and for his 1973 screenplay for the film adaptation of the same name. Blatty won an Academy Award for Best Adapted Screenplay for The Exorcist, and was nominated for Best Picture as its producer. The film also earned Blatty a Golden Globe Award for Best Motion Picture – Drama as producer.', NULL),
(26, 'Rupi', 'Kaur', 'Rupi Kaur (born 4 October 1992) is a Canadian poet, illustrator, photographer, and author. Born in Punjab, India, Kaur emigrated to Canada at a young age with her family. She began performing poetry in 2009 and rose to fame on Instagram, eventually becoming a popular poet through her three collections of poetry.', NULL),
(27, 'Walt', 'Whitman', 'Walter Whitman Jr. (May 31, 1819 – March 26, 1892) was an American poet, essayist, and journalist. He is considered one of the most influential poets in American history. Whitman incorporated both transcendentalism and realism in his writings and is often called the father of free verse. His work was controversial in his time, particularly his 1855 poetry collection Leaves of Grass, which was described by some as obscene for its overt sensuality.', NULL),
(28, 'Kaveh', 'Akbar', 'Akbar was born in Tehran, Iran, in 1989. He moved to the United States when he was two years old, and grew up across the United States including New Jersey, Pennsylvania, Wisconsin, and Indiana. Akbar received his bachelor\'s degree from Purdue, his MFA from Butler University, and his PhD in creative writing from Florida State University.', '2023-08-26 14:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `year_of_publication` int(11) DEFAULT NULL,
  `num_pages` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `category_id`, `image_url`, `year_of_publication`, `num_pages`, `deleted_at`) VALUES
(1, 'Harry Potter and the Philosopher\'s Stone', 1, 1, 'https://i2-prod.walesonline.co.uk/incoming/article6890072.ece/ALTERNATES/s615b/hp1.jpg', 1997, 223, '2023-08-17 22:28:04'),
(2, 'A Game of Thrones', 2, 1, 'https://www.georgerrmartin.com/wp-content/uploads/2013/03/GOTMTI2.jpg', 1996, 694, '2023-08-17 22:20:03'),
(3, 'Gone Girl', 3, 6, 'https://cdn.kobo.com/book-images/7292758c-a84a-4c53-80e4-73dd3a45c404/1200/1200/False/gone-girl.jpg', 2012, 432, '2023-08-17 21:44:24'),
(4, 'Harry Potter and the Chamber of Secrets', 6, 1, 'https://upload.wikimedia.org/wikipedia/en/thumb/5/5c/Harry_Potter_and_the_Chamber_of_Secrets.jpg/220px-Harry_Potter_and_the_Chamber_of_Secrets.jpg', 1997, 251, '2023-08-18 11:26:33'),
(5, 'A Clash of Kings', 2, 1, 'https://upload.wikimedia.org/wikipedia/en/3/39/AClashOfKings.jpg', 1998, 761, '2023-08-18 10:34:38'),
(6, 'A Clash of Kings', 7, 1, 'https://upload.wikimedia.org/wikipedia/en/3/39/AClashOfKings.jpg', 1998, 761, NULL),
(7, 'Harry Potter and the Prisoner of Azkaban', 8, 1, 'https://upload.wikimedia.org/wikipedia/en/a/a0/Harry_Potter_and_the_Prisoner_of_Azkaban.jpg', 1999, 317, NULL),
(8, 'The Guns of August', 9, 5, 'https://upload.wikimedia.org/wikipedia/en/thumb/8/84/TheGunsOfAugust.jpg/220px-TheGunsOfAugust.jpg', 1962, 511, NULL),
(9, 'The Da Vinci Code', 10, 4, 'https://upload.wikimedia.org/wikipedia/en/thumb/6/6b/DaVinciCode.jpg/220px-DaVinciCode.jpg', 2003, 489, NULL),
(10, 'The Shining', 11, 7, 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/The_Shining_%281977%29_front_cover%2C_first_edition.jpg/220px-The_Shining_%281977%29_front_cover%2C_first_edition.jpg', 1977, 447, NULL),
(11, 'Dracula', 12, 7, 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/45/Dracula_1st_ed_cover_reproduction.jpg/220px-Dracula_1st_ed_cover_reproduction.jpg', 1897, 418, NULL),
(12, 'Dune', 13, 3, 'https://upload.wikimedia.org/wikipedia/en/thumb/d/de/Dune-Frank_Herbert_%281965%29_First_edition.jpg/220px-Dune-Frank_Herbert_%281965%29_First_edition.jpg', 1965, 896, NULL),
(13, 'The Three-Body Problem', 14, 3, 'https://upload.wikimedia.org/wikipedia/en/thumb/0/0f/Threebody.jpg/220px-Threebody.jpg', 2008, 302, NULL),
(14, 'Cover Her Face', 15, 6, 'https://upload.wikimedia.org/wikipedia/en/thumb/4/4c/CoverHerFace.JPG/220px-CoverHerFace.JPG', 1962, 256, NULL),
(15, 'The Mysterious Affair at Styles', 16, 6, 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/American_cover_of_%C2%ABThe_Mysterious_Affair_at_Styles%C2%BB.png/220px-American_cover_of_%C2%ABThe_Mysterious_Affair_at_Styles%C2%BB.png', 1920, 296, NULL),
(16, 'In the Woods', 17, 4, 'https://upload.wikimedia.org/wikipedia/en/thumb/3/3c/In_the_Woods_cover.jpg/220px-In_the_Woods_cover.jpg', 2007, 496, NULL),
(17, 'SPQR: A History of Ancient Rome', 18, 5, 'https://upload.wikimedia.org/wikipedia/en/thumb/c/c2/SPQR_book.jpg/220px-SPQR_book.jpg', 2015, 608, NULL),
(18, 'Charlottes Web', 19, 9, 'https://upload.wikimedia.org/wikipedia/en/thumb/f/fe/CharlotteWeb.png/220px-CharlotteWeb.png', 1952, 192, '2023-08-23 14:13:56'),
(19, 'Charlottes Web', 19, 9, 'https://upload.wikimedia.org/wikipedia/en/thumb/f/fe/CharlotteWeb.png/220px-CharlotteWeb.png', 1952, 192, '2023-08-23 14:13:56'),
(20, 'Charlie and the Chocolate Factory', 20, 9, 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f6/Charlie_and_the_Chocolate_Factory_original_cover.jpg/220px-Charlie_and_the_Chocolate_Factory_original_cover.jpg', 1964, 192, NULL),
(21, 'Heidi', 21, 9, 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Spyri_Heidi_Cover_1887.jpg/220px-Spyri_Heidi_Cover_1887.jpg', 1880, 352, NULL),
(22, 'The Lion, the Witch and the Wardrobe', 22, 9, 'https://upload.wikimedia.org/wikipedia/en/thumb/8/86/TheLionWitchWardrobe%281stEd%29.jpg/220px-TheLionWitchWardrobe%281stEd%29.jpg', 1950, 172, NULL),
(23, 'The Alienist', 23, 6, 'https://upload.wikimedia.org/wikipedia/en/thumb/2/2d/Alienist-thumb.jpg/220px-Alienist-thumb.jpg', 1994, 496, NULL),
(24, 'A Game of Thrones', 7, 1, 'https://upload.wikimedia.org/wikipedia/en/thumb/9/93/AGameOfThrones.jpg/220px-AGameOfThrones.jpg', 1996, 694, NULL),
(25, 'A Storm of Swords', 7, 1, 'https://upload.wikimedia.org/wikipedia/en/thumb/2/24/AStormOfSwords.jpg/220px-AStormOfSwords.jpg', 2000, 973, NULL),
(26, 'A Feast for Crows', 7, 1, 'https://upload.wikimedia.org/wikipedia/en/a/a3/AFeastForCrows.jpg', 2005, 753, NULL),
(27, 'A Dance with Dragons', 7, 1, 'https://upload.wikimedia.org/wikipedia/en/5/5d/A_Dance_With_Dragons_US.jpg', 2011, 1016, NULL),
(28, 'Ghost Story', 24, 7, 'https://upload.wikimedia.org/wikipedia/en/thumb/0/0c/Ghost_Story_by_Peter_Straub.jpg/220px-Ghost_Story_by_Peter_Straub.jpg', 1979, 483, NULL),
(29, 'The Exorcist', 25, 7, 'https://upload.wikimedia.org/wikipedia/en/thumb/f/fb/The_Exorcist_1971.jpg/220px-The_Exorcist_1971.jpg', 1971, 340, NULL),
(30, 'The Sun and Her Flowers', 26, 10, 'https://upload.wikimedia.org/wikipedia/en/thumb/4/48/The_Sun_and_Her_Flowers_book_cover.jpg/220px-The_Sun_and_Her_Flowers_book_cover.jpg', 2017, 256, NULL),
(31, 'Leaves of Grass', 27, 10, 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Walt_Whitman%2C_steel_engraving%2C_July_1854.jpg/220px-Walt_Whitman%2C_steel_engraving%2C_July_1854.jpg', 1855, 152, '2023-08-26 14:31:49'),
(32, 'Calling a Wolf a Wolf', 28, 10, 'https://upload.wikimedia.org/wikipedia/en/thumb/3/30/Calling_a_Wolf_a_Wolf.jpg/220px-Calling_a_Wolf_a_Wolf.jpg', 2017, 100, '2023-08-26 14:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `deleted_at`) VALUES
(1, 'Fantasy', NULL),
(2, 'Horror', '2023-08-17 18:43:28'),
(3, 'Sci-fi', NULL),
(4, 'Mistery', NULL),
(5, 'History', NULL),
(6, 'Crime', NULL),
(7, 'Horror', NULL),
(8, 'Children\'s literature', '2023-08-23 13:47:50'),
(9, 'Children\'s literature', NULL),
(10, 'Poetry', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `approved` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `denied` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `book_id`, `comment`, `created_at`, `approved`, `deleted_at`, `denied`) VALUES
(1, 2, 1, 'test1', '2023-08-17 10:40:19', 1, '2023-08-17 22:28:04', 0),
(2, 2, 1, 'test2', '2023-08-17 11:41:17', 1, '2023-08-17 22:28:04', 0),
(3, 2, 1, 'test3', '2023-08-17 14:07:19', 1, '2023-08-17 22:28:04', 0),
(4, 2, 2, 'TEST for GOT', '2023-08-17 14:30:46', 1, '2023-08-17 22:20:03', 0),
(5, 2, 1, 'harry potter', '2023-08-17 14:47:51', 1, '2023-08-17 22:28:04', 0),
(6, 2, 3, 'gone girl!', '2023-08-17 14:48:11', 1, '2023-08-17 21:44:24', 0),
(7, 2, 2, 'TEST 2 For GOT', '2023-08-17 14:48:29', 0, '2023-08-17 22:20:03', 0),
(8, 2, 1, 'new test', '2023-08-17 15:16:06', 1, '2023-08-17 22:28:04', 0),
(9, 2, 2, 'test3 for got', '2023-08-17 15:18:18', 1, '2023-08-17 22:20:03', 0),
(10, 2, 2, 'test4 ', '2023-08-17 15:19:52', 1, '2023-08-17 22:20:03', 0),
(11, 2, 2, 'test5', '2023-08-17 15:19:55', 0, '2023-08-17 22:20:03', 0),
(12, 2, 2, 'test4', '2023-08-17 15:23:56', 1, '2023-08-17 22:20:03', 0),
(13, 2, 4, 'test1', '2023-08-17 23:10:24', 1, '2023-08-18 11:26:33', 0),
(14, 2, 6, 'A book of sundry schemes: all hidden lives, strategic brides and switching sides; while honor ebbs and magic thrives.', '2023-08-18 12:03:31', 1, '2023-08-18 13:09:42', 0),
(15, 2, 7, 'test comment for Harry potter and the Prisoner of Azkaban', '2023-08-18 13:14:21', 1, NULL, 0),
(16, 3, 6, 'test comment from new user', '2023-08-19 12:20:09', 1, '2023-08-23 13:42:01', 0),
(17, 3, 8, 'test comment for The Guns of August', '2023-08-19 13:27:14', 1, '2023-08-23 13:46:24', 0),
(18, 2, 8, 'asd', '2023-08-21 17:44:12', 0, '2023-08-21 17:46:08', 0),
(19, 2, 9, 'test comment for The Da Vinci Code', '2023-08-21 17:48:44', 1, NULL, 0),
(20, 3, 9, 'Comment for The Da Vinci Code', '2023-08-21 18:11:11', 1, '2023-08-23 13:42:49', 0),
(21, 3, 16, 'test comment', '2023-08-23 11:55:02', 1, '2023-08-23 13:43:24', 0),
(29, 3, 11, 'comment for Dracula', '2023-08-23 13:09:36', 1, '2023-08-23 13:39:48', 0),
(31, 4, 21, 'Heidi&#39;s life on the mountain is so joyous, and vividly portrayed that kids may end up dreaming of such a life. There&#39;s a reason this book has stayed in print for more than 140 years.', '2023-08-24 08:25:02', 1, NULL, 0),
(32, 4, 13, 'test comment', '2023-08-24 08:28:22', 1, NULL, 0),
(33, 4, 14, 'test comment', '2023-08-24 09:04:56', 1, NULL, 0),
(34, 2, 16, 'test comment ', '2023-08-24 09:40:21', 1, '2023-08-26 14:33:11', 0),
(36, 2, 15, 'test comment for The Mysterious Affair at Styles', '2023-08-24 10:18:44', 1, '2023-08-24 10:26:39', 0),
(37, 3, 12, 'test coomment for Dune', '2023-08-24 10:27:39', 1, NULL, 0),
(39, 3, 21, 'Comment for Heidi', '2023-08-24 10:28:31', 1, '2023-08-24 10:43:11', 0),
(40, 3, 10, 'Comment for The Shining', '2023-08-24 10:28:50', 0, '2023-08-24 10:30:44', 0),
(42, 3, 20, 'comment for Charlie and the Chocolate Factory', '2023-08-24 10:29:49', 1, NULL, 0),
(43, 4, 22, 'test comment for The Lion, the Witch and the Wardrobe', '2023-08-24 10:38:43', 1, NULL, 0),
(44, 4, 11, 'Test comment for Dracula', '2023-08-24 10:43:43', 1, NULL, 0),
(45, 4, 7, 'test comment for Harry potter and the Prisoner of Azkaban from user martin1', '2023-08-24 10:47:40', 1, NULL, 0),
(46, 4, 6, 'test comment for A Clash of Kings ', '2023-08-24 10:55:38', 1, NULL, 0),
(47, 3, 17, 'test comment for SPQR: A History of Ancient Rome by user monev', '2023-08-24 11:00:16', 1, NULL, 0),
(48, 3, 22, 'test comment for The Lion, the Witch and the Wardrobeby user monev', '2023-08-24 11:02:09', 1, NULL, 0),
(49, 3, 15, 'test comment for The Mysterious Affair at Styles by user monev', '2023-08-24 11:02:35', 1, NULL, 0),
(50, 2, 22, 'test comment for The Lion, the Witch and the Wardrobeby user martin', '2023-08-24 11:08:14', 1, NULL, 0),
(51, 2, 21, 'test comment for Heidi user martin', '2023-08-24 11:08:36', 1, NULL, 0),
(52, 2, 12, 'test coomment for Dune by user martin', '2023-08-24 11:08:59', 1, NULL, 0),
(53, 2, 14, 'test comment for Cover Her Face by user martin', '2023-08-24 11:09:24', 1, NULL, 0),
(55, 5, 7, 'test comment for Harry potter and the Prisoner of Azkaban', '2023-08-24 11:19:03', 0, NULL, 1),
(56, 2, 20, 'Comment test', '2023-08-24 11:37:38', 0, NULL, 0),
(57, 2, 30, 'test comment', '2023-08-24 15:47:13', 0, NULL, 0),
(58, 5, 27, 'comment for A Dance with Dragons', '2023-08-24 15:48:49', 0, NULL, 1),
(60, 3, 32, 'Test comment for Calling a Wolf a Wolf', '2023-08-26 14:29:52', 0, '2023-08-26 14:30:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `book_id`, `note`, `created_at`, `deleted_at`) VALUES
(1, 2, 1, 'test1', NULL, '2023-08-17 22:28:04'),
(2, 2, 4, 'test for note', NULL, '2023-08-18 11:26:33'),
(3, 2, 4, 'test 2 for note', NULL, '2023-08-18 11:26:33'),
(8, 2, 7, 'second note', NULL, NULL),
(9, 2, 7, 'asd', NULL, '2023-08-26 14:34:44'),
(10, 2, 7, 'Note - edit test', NULL, NULL),
(11, 2, 7, 'asd', NULL, '2023-08-26 14:34:46'),
(12, 2, 7, 'private note', NULL, NULL),
(13, 2, 7, 'asd', NULL, '2023-08-26 14:34:47'),
(14, 2, 7, 'private note num1', NULL, NULL),
(15, 2, 7, 'private note num2', NULL, NULL),
(16, 3, 6, 'note 1 test from user monev ', NULL, NULL),
(17, 3, 6, 'note 2 test from user monev', NULL, NULL),
(19, 3, 6, 'note 4 test from user monev', NULL, NULL),
(20, 3, 9, 'this is a private note for new book', NULL, NULL),
(22, 3, 11, 'test note', NULL, NULL),
(23, 3, 11, 'test note 2', NULL, NULL),
(24, 3, 11, 'test note 3', NULL, NULL),
(25, 2, 16, 'test for note', NULL, NULL),
(26, 2, 16, 'test 2 for note', NULL, NULL),
(27, 2, 16, 'test3 for note', NULL, '2023-08-24 10:00:43'),
(28, 2, 16, 'test4 for note', '2023-08-24 10:01:24', '2023-08-24 10:03:33'),
(29, 2, 20, '', '2023-08-24 11:37:26', '2023-08-24 11:37:55'),
(30, 2, 20, 'first note for this book', '2023-08-24 11:37:59', NULL),
(31, 2, 20, 'Note testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote testNote test', '2023-08-24 11:38:29', '2023-08-24 11:39:34'),
(32, 2, 21, 'test for note', '2023-08-24 13:32:46', NULL),
(33, 2, 21, 'test2 for note edited', '2023-08-24 13:32:52', NULL),
(34, 2, 6, 'Test for notes', '2023-08-24 15:46:43', NULL),
(35, 2, 7, 'private note num3', '2023-08-26 14:35:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`) VALUES
(1, 'admin', '$2y$10$UO6ipN2SlsGIL9LLkDHiGeyRAuZ8j1GBwl0izTviXX9LXD6OAM1iG', 1),
(2, 'martin', '$2y$10$gdyH3pu1sJGFM3pGvCKpT.T.cj95HLUqLTzMYJgTrXF05CIfjAtt6', 0),
(3, 'monev', '$2y$10$ev2hdRVyrkKkd3/bLJwHBuE5TCPsYVZTh4vpjxlw1/qQQodTx1aMW', 0),
(4, 'martin1', '$2y$10$GQ0ZK/wQnVzdocSzmIjwqO/MaL7TPi0MKljz6SyBMkAUPVUb8ntOi', 0),
(5, 'MartinMonev', '$2y$10$/alpegzoEEKbNHlc7pxJOO022YhMcA2jJSpWrD0yBKVgNR2fAGgki', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_comments`
--
ALTER TABLE `admin_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `fk_books_author` (`author_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_comments`
--
ALTER TABLE `admin_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_comments`
--
ALTER TABLE `admin_comments`
  ADD CONSTRAINT `admin_comments_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_comments_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_books_author` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
