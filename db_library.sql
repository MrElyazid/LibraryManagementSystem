-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 08:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE `adds` (
  `id_operation` bigint(20) UNSIGNED NOT NULL,
  `book` bigint(20) UNSIGNED NOT NULL,
  `librarian` bigint(20) UNSIGNED NOT NULL,
  `added_qty` bigint(20) NOT NULL,
  `operation_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id_author` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id_author`, `name`, `lastname`, `birth_date`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Selma', 'Lagerlof', '1858-11-20', 'Swedish author renowned for her storytelling and vivid imagination, known for \"The Wonderful Adventures of Nils\" and being the first woman to win the Nobel Prize in Literature.', 'image1.jpg', '2024-07-25 10:24:51', '2024-07-25 10:24:51'),
(2, 'John', 'Steinbeck', '1902-02-27', 'John Steinbeck was an American author celebrated for his poignant and socially conscious novels. His works often depict the struggles of the working class, with \"The Grapes of Wrath\" and \"Of Mice and Men\" being among his most famous. Steinbeck\'s writing is known for its realistic portrayal of everyday people and its deep empathy for their plight. He received the Nobel Prize in Literature in 1962.', 'image2.jpg', '2024-07-25 10:24:51', '2024-07-25 10:24:51'),
(3, 'George', 'Eliot', '1819-11-22', 'George Eliot, the pen name of Mary Ann Evans, was an English novelist known for her deep psychological insight and detailed depiction of rural society. Her most famous works include \"Middlemarch,\" which is often hailed as one of the greatest novels in the English language, and \"Silas Marner.\" Eliot\'s novels are characterized by their rich character development and exploration of social and moral issues.', 'image0.jpg', '2024-07-25 10:24:51', '2024-07-25 10:24:51'),
(4, 'Anne', 'Frank', '1929-06-12', 'Anne Frank was a Jewish girl who became one of the most discussed Holocaust victims due to her posthumously published diary. \"The Diary of a Young Girl\" chronicles her life in hiding from the Nazis during World War II. The diary offers a poignant and personal perspective on the horrors of war and the strength of the human spirit. Anne Frank\'s writings have become a symbol of resilience and hope amidst oppression and tragedy.', 'image3.jpg', '2024-07-25 10:24:51', '2024-07-25 10:24:51'),
(5, 'Lewis', 'Caroll', '1832-01-27', 'Lewis Carroll, the pen name of Charles Lutwidge Dodgson, was an English writer, mathematician, and logician. He is best known for his children\'s books \"Alice\'s Adventures in Wonderland\" and its sequel \"Through the Looking-Glass.\" Carroll\'s works are celebrated for their whimsical characters, imaginative landscapes, and playful use of language. His stories have fascinated and entertained readers of all ages, making him a beloved figure in children\'s literature.', 'image4.jpg', '2024-07-25 10:24:51', '2024-07-25 10:24:51'),
(6, 'Anton', 'Chekhov', '1860-01-29', 'Anton Chekhov was a Russian playwright and short-story writer known for his profound influence on modern literature. His works often explore human nature and the complexities of everyday life, with a focus on character development and subtle plotlines. Notable plays such as \"The Cherry Orchard,\" \"Uncle Vanya,\" and \"The Seagull\" have made significant contributions to dramatic literature. Chekhov\'s stories are acclaimed for their keen psychological insight and innovative use of narrative technique.', 'image5.jpg', '2024-07-26 14:29:22', '2024-07-26 14:29:22'),
(7, 'Victor', 'Hugo', '1802-02-26', 'Victor Hugo was a French poet, novelist, and dramatist, considered one of the greatest writers in the French language. His most famous works include the novels \"Les Misérables\" and \"The Hunchback of Notre-Dame.\" Hugo\'s writing often addresses themes of social justice, human rights, and the struggles of the poor and marginalized. His powerful storytelling and vivid characters have left a lasting impact on literature and culture worldwide.', 'image14.jpg', '2024-07-26 14:28:18', '2024-07-26 14:28:18'),
(8, 'Ernest', 'Hemingway', '1899-07-21', 'Ernest Hemingway was an American novelist and short story writer known for his terse, economical prose style and adventurous life. His notable works include \"The Old Man and the Sea,\" \"A Farewell to Arms,\" and \"For Whom the Bell Tolls.\" Hemingway\'s writing often reflects themes of courage, love, and loss, and his distinctive style has influenced generations of writers. He won the Nobel Prize in Literature in 1954.', 'image6.jpg', '2024-07-26 14:31:27', '2024-07-26 14:31:27'),
(9, 'Mark', 'Twain', '1835-11-30', 'Mark Twain, the pen name of Samuel Langhorne Clemens, was an American writer and humorist renowned for his novels \"The Adventures of Tom Sawyer\" and \"Adventures of Huckleberry Finn.\" Twain\'s works are celebrated for their wit, satirical humor, and keen observations of society. His writing often critiques social injustices and explores themes of race, freedom, and identity. Twain remains a pivotal figure in American literature.', 'image9.jpg', '2024-07-26 14:45:23', '2024-07-26 14:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `backpacks`
--

CREATE TABLE `backpacks` (
  `id_backpack` bigint(20) UNSIGNED NOT NULL,
  `client` bigint(20) UNSIGNED NOT NULL,
  `book` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id_book` bigint(20) UNSIGNED NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `status` set('Available','Coming Soon','Not Available') NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id_book`, `isbn`, `title`, `category`, `status`, `quantity`, `image`, `author`, `description`, `created_at`, `updated_at`) VALUES
(1, '978-8-4051-8857-8', 'How The World Works', 4, 'Coming Soon', 8, 'image14.jpg', 8, 'Etiam neque libero, sodales vitae ipsum non, fermentum lobortis lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam facilisis posuere leo a vehicula. Suspendisse.', '2024-07-26 16:05:33', '2024-07-26 16:05:33'),
(2, '978-5-8872-1670-6', 'Napoleaon a biography', 3, 'Available', 3, 'image0.jpg', 9, 'Nam consectetur tristique odio, a feugiat orci vestibulum nec. Sed auctor eu ante quis sagittis. Praesent vitae purus massa. Proin fringilla rutrum dui, id viverra.', '2024-07-26 16:08:43', '2024-07-26 16:08:43'),
(3, '978-3-4160-8505-2', 'Enclyclopedia of Mathematics', 1, 'Available', 6, 'image3.jpg', 4, 'Maecenas placerat ex eget finibus porttitor. Etiam volutpat ultrices neque. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc rhoncus purus sit amet.', '2024-07-26 16:11:54', '2024-07-26 16:11:54'),
(4, '978-3-8553-7758-9', 'Encyclopedia of CS', 6, 'Not Available', 0, 'image1.jpg', 2, 'Vestibulum sodales nulla non vestibulum pretium. Curabitur porta nisi eget orci volutpat lobortis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque nunc.', '2024-07-26 16:23:48', '2024-07-26 16:23:48'),
(5, '978-0-8577-9274-7', 'Genius Foods', 5, 'Available', 6, 'image12.jpg', 5, 'Curabitur gravida ligula et ipsum commodo, quis pulvinar lectus feugiat. Sed convallis massa in mauris lacinia faucibus. Vivamus mattis aliquet diam, eget imperdiet dolor aliquet.', '2024-07-26 16:26:05', '2024-07-26 16:26:05'),
(6, '978-2-0938-4719-9', 'Living in the light', 4, 'Coming Soon', 5, 'image4.jpg', 3, 'Suspendisse feugiat justo eget massa tincidunt, ut rhoncus odio finibus. Maecenas mauris odio, tincidunt eget metus et, condimentum pretium velit. Mauris consectetur viverra enim id.', '2024-07-26 16:27:37', '2024-07-26 16:27:37'),
(7, '978-8-7648-1699-0', 'Encyclopedia of Biology', 1, 'Available', 5, 'image2.jpg', 6, 'Quisque faucibus sed odio eget facilisis. Duis venenatis nunc quis tortor rhoncus ultricies. In gravida sagittis neque, a lobortis magna dictum vel. Maecenas consequat hendrerit.', '2024-07-26 16:32:34', '2024-07-26 16:32:34'),
(8, '978-4-4847-1538-4', 'How to draw', 2, 'Available', 8, 'image5.jpg', 5, 'Curabitur ac tincidunt diam. Duis a fringilla augue. Aenean sagittis, nibh eget dignissim sollicitudin, augue massa gravida lectus, eget volutpat tellus orci ac orci. Fusce.', '2024-07-26 16:34:24', '2024-07-26 16:34:24'),
(9, '978-8-6079-8975-1', 'Matlab Tutorial', 4, 'Not Available', 1, 'image7.jpg', 1, 'Nulla porta lorem pretium, ultrices neque ac, venenatis nibh. Praesent facilisis urna enim, vitae egestas velit consequat id. Cras elementum porta sem, varius faucibus libero.', '2024-07-26 16:36:00', '2024-07-26 16:36:00'),
(10, '978-2-9429-9024-3', 'Ocean Encyclopedia', 1, 'Available', 4, 'image16.jpg', 5, 'In hac habitasse platea dictumst. Maecenas a pellentesque risus, nec lacinia purus. Etiam et luctus sapien. Mauris vitae odio blandit felis cursus hendrerit eget ut.', '2024-07-26 16:41:44', '2024-07-25 23:00:00'),
(11, '978-9-6287-4945-4', 'The Alchemist', 4, 'Available', 10, 'image9.jpg', 3, 'Donec arcu velit, imperdiet ut felis vitae, lobortis dictum mi. Suspendisse potenti. Integer finibus nisl vel iaculis varius. Donec convallis, lacus in sodales laoreet, orci.', '2024-07-26 17:01:07', '2024-07-26 17:01:07'),
(12, '978-5-4362-2949-2', 'Startalk', 6, 'Coming Soon', 6, 'image17.jpg', 7, 'Aenean semper vulputate sapien, nec ultricies nunc feugiat sed. Morbi odio nibh, rhoncus at vulputate sit amet, tempus a nisl. Aenean dolor nunc, gravida eget.', '2024-07-26 16:59:18', '2024-07-26 16:59:18'),
(13, '978-7-2744-3492-2', 'Kant biography', 4, 'Available', 0, 'image15.jpg', 1, 'Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse aliquam libero et metus consectetur pulvinar. Morbi gravida.', '2024-07-26 17:05:19', '2024-07-26 17:05:19'),
(14, '978-4-9452-6218-1', 'The 5 seconds Rule', 4, 'Available', 10, 'image21.jpg', 4, 'Pellentesque efficitur lorem et orci rhoncus dignissim. Aenean lobortis ligula ut velit efficitur aliquet. Nulla facilisi. Vestibulum commodo placerat justo sed facilisis. Vivamus semper, diam.', '2024-07-26 17:07:42', '2024-07-26 17:07:42'),
(15, '978-9-5091-6086-6', 'Space Encyclopedia', 6, 'Available', 10, 'image13.jpg', 7, 'Morbi ultricies congue enim quis cursus. Aenean lacinia egestas mauris vel eleifend. Aenean ut mi et lacus placerat efficitur. Lorem ipsum dolor sit amet, consectetur.', '2024-07-26 17:10:28', '2024-07-30 15:26:45'),
(16, '978-7-0799-8749-4', 'History of Asia', 2, 'Coming Soon', 2, 'image6.jpg', 7, 'Maecenas in turpis at lacus sodales vulputate. Donec lacinia ac enim sed commodo. Donec laoreet odio ut enim dictum, a blandit elit interdum. Sed rhoncus.', '2024-07-26 17:12:25', '2024-07-31 14:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Encyclopedias', 'Encyclopedias are comprehensive reference works containing information on a wide range of subjects or on numerous aspects of a single subject, typically arranged alphabetically. They provide summaries of knowledge and are used for quick fact-checking or as starting points for deeper research.', 'encyclopedias.jpg', '2024-07-25 10:24:51', '2024-07-25 10:24:51'),
(2, 'Fiction', 'Fiction is a literary genre that involves imaginative storytelling, featuring invented characters, plots, and settings. It is not based on real events but created from the author\'s imagination.', 'fiction.jpg', '2024-07-25 10:24:51', '2024-07-25 10:24:51'),
(3, 'Language', 'The language/grammar category includes books focused on the rules and structure of a language, covering topics such as syntax, punctuation, and usage, to help readers improve their language skills.', 'language.jpeg', '2024-07-25 10:24:51', '2024-07-25 10:24:51'),
(4, 'Literature', 'Literature encompasses written works, particularly those considered to have artistic or intellectual value. This category includes novels, poetry, drama, and essays, often exploring themes of human experience and expression.', 'litterature.jpg', '2024-07-25 10:24:51', '2024-07-25 10:24:51'),
(5, 'Nature', 'Nature books focus on the natural world, including topics like plants, animals, ecosystems, and environmental science. They aim to educate readers about the beauty, diversity, and importance of the natural environment.', 'nature.jpg', '2024-07-25 10:24:51', '2024-07-25 10:24:51'),
(6, 'Science', 'Science books cover a wide range of scientific disciplines such as physics, chemistry, biology, and astronomy. They explain scientific concepts, discoveries, and principles, often aimed at making complex topics accessible to a general audience.', 'science.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id_client` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `student` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id_client`, `name`, `lastname`, `email`, `student`, `created_at`, `updated_at`, `password`) VALUES
(16, 'Elyazid', 'Essoly', 'elyazid.assouli@gmail.com', 0, '2024-08-07 13:18:42', '2024-08-07 13:18:42', '$2y$12$ZKTolqnFIicPeJy686qFeuho/hywzVVsylz5swqqlZFR3ABC5jYQq'),
(17, 'Denzel', 'Aguilar', 'client1@gmail.com', 0, '2024-08-07 14:23:42', '2024-08-07 14:23:42', '$2y$12$ZKTolqnFIicPeJy686qFeuho/hywzVVsylz5swqqlZFR3ABC5jYQq'),
(18, 'Ada', 'Beasley', 'client2@gmail.com', 0, '2024-08-07 14:23:42', '2024-08-07 14:23:42', '$2y$12$ZKTolqnFIicPeJy686qFeuho/hywzVVsylz5swqqlZFR3ABC5jYQq'),
(20, 'Bonnie', 'Davila', 'client3@gmail.com', 0, '2024-08-07 14:23:42', '2024-08-07 14:23:42', '$2y$12$ZKTolqnFIicPeJy686qFeuho/hywzVVsylz5swqqlZFR3ABC5jYQq'),
(21, 'Adam', 'Molina', 'client4@gmail.com', 0, '2024-08-07 14:23:42', '2024-08-07 14:23:42', '$2y$12$ZKTolqnFIicPeJy686qFeuho/hywzVVsylz5swqqlZFR3ABC5jYQq'),
(22, 'Sophie', 'Strickland', 'client5@gmail.com', 0, '2024-08-07 14:23:42', '2024-08-07 14:23:42', '$2y$12$ZKTolqnFIicPeJy686qFeuho/hywzVVsylz5swqqlZFR3ABC5jYQq'),
(23, 'Chantelle', 'Soto', 'client6@gmail.com', 0, '2024-08-07 14:23:42', '2024-08-07 14:23:42', '$2y$12$ZKTolqnFIicPeJy686qFeuho/hywzVVsylz5swqqlZFR3ABC5jYQq'),
(24, 'Gladys', 'Griffin', 'client7@gmail.com', 0, '2024-08-07 14:23:42', '2024-08-07 14:23:42', '$2y$12$ZKTolqnFIicPeJy686qFeuho/hywzVVsylz5swqqlZFR3ABC5jYQq'),
(25, 'Ewan', 'Gutierrez', 'client8@gmail.com', 0, '2024-08-07 14:23:42', '2024-08-07 14:23:42', '$2y$12$ZKTolqnFIicPeJy686qFeuho/hywzVVsylz5swqqlZFR3ABC5jYQq'),
(26, 'Lester', 'Cole', 'client9@gmail.com', 0, '2024-08-07 14:23:42', '2024-08-07 14:23:42', '$2y$12$ZKTolqnFIicPeJy686qFeuho/hywzVVsylz5swqqlZFR3ABC5jYQq'),
(27, 'Bryan', 'Bright', 'client10@gmail.com', 0, '2024-08-07 14:23:42', '2024-08-07 14:23:42', '$2y$12$ZKTolqnFIicPeJy686qFeuho/hywzVVsylz5swqqlZFR3ABC5jYQq'),
(28, 'Marco', 'Jones', 'librarian.example@gmail.com', 0, '2024-08-07 14:23:42', '2024-08-07 14:23:42', '$2y$12$ZKTolqnFIicPeJy686qFeuho/hywzVVsylz5swqqlZFR3ABC5jYQq');

-- --------------------------------------------------------

--
-- Table structure for table `deletes`
--

CREATE TABLE `deletes` (
  `id_operation` bigint(20) UNSIGNED NOT NULL,
  `book` bigint(20) UNSIGNED NOT NULL,
  `librarian` bigint(20) UNSIGNED NOT NULL,
  `operation_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `edits`
--

CREATE TABLE `edits` (
  `id_operation` bigint(20) UNSIGNED NOT NULL,
  `book` bigint(20) UNSIGNED NOT NULL,
  `librarian` bigint(20) UNSIGNED NOT NULL,
  `operation_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id_image` bigint(20) UNSIGNED NOT NULL,
  `type` set('Author','Category','Cover') NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `librarians`
--

CREATE TABLE `librarians` (
  `id_librarian` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `librarians`
--

INSERT INTO `librarians` (`id_librarian`, `name`, `lastname`, `phone_number`, `password`, `email`, `created_at`, `updated_at`) VALUES
(7, 'Marco', 'Jones', '0612345678', '$2y$12$ZKTolqnFIicPeJy686qFeuho/hywzVVsylz5swqqlZFR3ABC5jYQq', 'librarian.example@gmail.com', '2024-08-07 14:38:22', '2024-08-07 14:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id_loan` bigint(20) UNSIGNED NOT NULL,
  `book` bigint(20) UNSIGNED NOT NULL,
  `client` bigint(20) UNSIGNED NOT NULL,
  `date_borrowed` date NOT NULL,
  `due_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id_loan`, `book`, `client`, `date_borrowed`, `due_date`, `return_date`, `created_at`, `updated_at`) VALUES
(16, 15, 23, '2024-08-08', '2024-08-22', NULL, '2024-08-07 14:43:15', '2024-08-07 14:43:15'),
(17, 14, 27, '2024-08-05', '2024-08-23', NULL, '2024-08-07 14:53:20', '2024-08-07 14:53:20'),
(18, 8, 21, '2024-07-24', '2024-08-05', '2024-08-05', '2024-08-07 14:53:20', '2024-08-07 14:53:20'),
(19, 2, 25, '2024-08-15', '2024-08-27', NULL, '2024-08-07 14:55:48', '2024-08-07 14:55:48'),
(20, 5, 22, '2024-07-16', '2024-08-30', NULL, '2024-08-07 14:55:48', '2024-08-07 14:55:48'),
(21, 7, 20, '2024-08-01', '2024-08-07', '2024-08-07', '2024-08-07 14:57:59', '2024-08-07 14:57:59'),
(22, 14, 26, '2024-07-27', '2024-08-03', NULL, '2024-08-07 14:57:59', '2024-08-07 14:57:59'),
(23, 8, 22, '2024-08-03', '2024-08-16', NULL, '2024-08-07 15:01:15', '2024-08-07 15:01:15'),
(24, 11, 17, '2024-07-20', '2024-08-01', '2024-08-02', '2024-08-07 15:01:15', '2024-08-07 15:01:15'),
(25, 14, 16, '2024-08-07', '2024-08-14', NULL, '2024-08-07 16:19:54', '2024-08-07 16:19:54'),
(26, 10, 16, '2024-08-07', '2024-08-28', NULL, '2024-08-07 16:22:11', '2024-08-07 16:22:11'),
(27, 7, 16, '2024-08-07', '2024-08-21', NULL, '2024-08-07 16:22:31', '2024-08-07 16:22:31');

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
(102, '2024_07_18_212844_create_images_table', 1),
(127, '0001_01_01_000001_create_cache_table', 2),
(128, '0001_01_01_000002_create_jobs_table', 2),
(129, '2024_07_18_211825_create_clients_table', 2),
(130, '2024_07_18_212541_create_librarians_table', 2),
(131, '2024_07_19_130520_create_categories_table', 2),
(132, '2024_07_19_131204_create_authors_table', 2),
(133, '2024_07_19_132308_create_books_table', 2),
(134, '2024_07_19_133613_create_adds_table', 2),
(135, '2024_07_19_134431_create_edits_table', 2),
(136, '2024_07_19_134618_create_deletes_table', 2),
(137, '2024_07_19_135644_create_wishlists_table', 2),
(138, '2024_07_19_141851_create_backpacks_table', 2),
(139, '2024_07_19_142350_create_loans_table', 2),
(140, '2024_07_23_123206_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cuYTnJGeQrvsqWGyh43kS5f9PC6dwOEfeuk9g03S', 28, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNlVIYzdGVlIxTTRzbkEwWEdBV0pxSGVDSnp4V1k0bWxYTTl3cnJSYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9saWJyYXJpYW4vYWRkQm9vayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI4O30=', 1723053493);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id_wishlist` bigint(20) UNSIGNED NOT NULL,
  `book` bigint(20) UNSIGNED NOT NULL,
  `client` bigint(20) UNSIGNED NOT NULL,
  `date_added` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id_wishlist`, `book`, `client`, `date_added`, `created_at`, `updated_at`) VALUES
(9, 16, 16, '2024-08-07', '2024-08-07 16:21:41', '2024-08-07 16:21:41'),
(10, 13, 16, '2024-08-07', '2024-08-07 16:21:51', '2024-08-07 16:21:51'),
(11, 7, 16, '2024-08-07', '2024-08-07 16:22:41', '2024-08-07 16:22:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`id_operation`),
  ADD KEY `adds_book_foreign` (`book`),
  ADD KEY `adds_librarian_foreign` (`librarian`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id_author`),
  ADD UNIQUE KEY `authors_name_lastname_unique` (`name`,`lastname`);

--
-- Indexes for table `backpacks`
--
ALTER TABLE `backpacks`
  ADD PRIMARY KEY (`id_backpack`),
  ADD UNIQUE KEY `backpacks_book_client_unique` (`book`,`client`),
  ADD KEY `backpacks_client_foreign` (`client`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`),
  ADD KEY `books_category_foreign` (`category`),
  ADD KEY `books_author_foreign` (`author`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `deletes`
--
ALTER TABLE `deletes`
  ADD PRIMARY KEY (`id_operation`),
  ADD KEY `deletes_book_foreign` (`book`),
  ADD KEY `deletes_librarian_foreign` (`librarian`);

--
-- Indexes for table `edits`
--
ALTER TABLE `edits`
  ADD PRIMARY KEY (`id_operation`),
  ADD KEY `edits_book_foreign` (`book`),
  ADD KEY `edits_librarian_foreign` (`librarian`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarians`
--
ALTER TABLE `librarians`
  ADD PRIMARY KEY (`id_librarian`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id_loan`),
  ADD UNIQUE KEY `loans_book_client_unique` (`book`,`client`),
  ADD KEY `loans_client_foreign` (`client`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD UNIQUE KEY `wishlists_book_client_unique` (`book`,`client`),
  ADD KEY `wishlists_client_foreign` (`client`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adds`
--
ALTER TABLE `adds`
  MODIFY `id_operation` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id_author` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `backpacks`
--
ALTER TABLE `backpacks`
  MODIFY `id_backpack` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id_book` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `deletes`
--
ALTER TABLE `deletes`
  MODIFY `id_operation` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `edits`
--
ALTER TABLE `edits`
  MODIFY `id_operation` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id_image` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `librarians`
--
ALTER TABLE `librarians`
  MODIFY `id_librarian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id_loan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id_wishlist` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adds`
--
ALTER TABLE `adds`
  ADD CONSTRAINT `adds_book_foreign` FOREIGN KEY (`book`) REFERENCES `books` (`id_book`) ON DELETE NO ACTION,
  ADD CONSTRAINT `adds_librarian_foreign` FOREIGN KEY (`librarian`) REFERENCES `librarians` (`id_librarian`) ON DELETE NO ACTION;

--
-- Constraints for table `backpacks`
--
ALTER TABLE `backpacks`
  ADD CONSTRAINT `backpacks_book_foreign` FOREIGN KEY (`book`) REFERENCES `books` (`id_book`),
  ADD CONSTRAINT `backpacks_client_foreign` FOREIGN KEY (`client`) REFERENCES `clients` (`id_client`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_foreign` FOREIGN KEY (`author`) REFERENCES `authors` (`id_author`) ON DELETE NO ACTION,
  ADD CONSTRAINT `books_category_foreign` FOREIGN KEY (`category`) REFERENCES `categories` (`id_category`) ON DELETE NO ACTION;

--
-- Constraints for table `deletes`
--
ALTER TABLE `deletes`
  ADD CONSTRAINT `deletes_book_foreign` FOREIGN KEY (`book`) REFERENCES `books` (`id_book`) ON DELETE NO ACTION,
  ADD CONSTRAINT `deletes_librarian_foreign` FOREIGN KEY (`librarian`) REFERENCES `librarians` (`id_librarian`) ON DELETE NO ACTION;

--
-- Constraints for table `edits`
--
ALTER TABLE `edits`
  ADD CONSTRAINT `edits_book_foreign` FOREIGN KEY (`book`) REFERENCES `books` (`id_book`) ON DELETE NO ACTION,
  ADD CONSTRAINT `edits_librarian_foreign` FOREIGN KEY (`librarian`) REFERENCES `librarians` (`id_librarian`) ON DELETE NO ACTION;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_book_foreign` FOREIGN KEY (`book`) REFERENCES `books` (`id_book`),
  ADD CONSTRAINT `loans_client_foreign` FOREIGN KEY (`client`) REFERENCES `clients` (`id_client`) ON DELETE NO ACTION;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_book_foreign` FOREIGN KEY (`book`) REFERENCES `books` (`id_book`) ON DELETE NO ACTION,
  ADD CONSTRAINT `wishlists_client_foreign` FOREIGN KEY (`client`) REFERENCES `clients` (`id_client`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
