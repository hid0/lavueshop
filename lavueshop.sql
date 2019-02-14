-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 21, 2018 at 08:57 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

INSERT INTO `books` (`id`, `title`, `slug`, `description`, `author`, `publisher`, `cover`, `price`, `views`, `stock`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'How to become great man', 'how-to-become-great-man', 'The book description', 'Noone', 'Nopublisher', 'book-covers/riSvIG5fsoNOCE0OhwIdNh3EewgYuCLAqEPSaV9w.png', 390000.00, 0, 330, 'PUBLISH', 1, 1, NULL, '2018-07-26 07:20:14', '2018-10-02 08:49:45', '2018-10-02 08:49:45'),
(4, 'How to become ninja Developer', 'how-to-become-ninja-developer', 'Descriptions goes here', 'Muhammad Azamuddin', 'Indie Publisher', 'book-covers/2x9OEHtj57kVp9UZe9Av39TBMNphRw8FrEh4Nium.png', 239000.00, 0, 9, 'PUBLISH', 1, NULL, NULL, '2018-10-02 07:06:39', '2018-10-02 08:42:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `book_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 2, 5, NULL, NULL),
(4, 4, 5, NULL, NULL),
(5, 4, 6, NULL, NULL);


--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Programming', 'programming', 'category_images/TOzjSpDAhf7IEaKn3z3UNZMowaodnLqtUtczfEBI.jpeg', 1, 1, NULL, NULL, '2018-07-16 04:04:48', '2018-07-26 07:17:59'),
(3, 'Hardware', 'hardware', 'category_images/sCYd3L9ZHPUa7bnTWIjaTDO3RWzCwfBPq5qbQL3h.jpeg', 1, 1, NULL, NULL, '2018-07-23 03:21:00', '2018-07-26 07:18:13'),
(4, 'Ilmiiah', 'ilmiiah', 'category_images/ej14L2H7HLHcvCFGZoT9GwTb2rX9nmEUNyKkEXKZ.jpeg', 1, NULL, NULL, NULL, '2018-07-23 03:21:15', '2018-07-23 03:21:15'),
(5, 'Self Development', 'self-development', 'category_images/nE9xMN84MaKeHyVG1jcwPF1ChOUvaYzGXjSI19Mu.png', 1, NULL, NULL, NULL, '2018-07-26 07:18:50', '2018-07-26 07:18:50'),
(6, 'Business', 'business', 'category_images/vLhVcc7mSOm5WzdxEifRqbj41KAwrxvB4qfEEkRh.png', 1, NULL, NULL, NULL, '2018-07-26 07:21:27', '2018-07-26 07:21:27'),
(7, 'Joseph Mueller', 'incidunt-ut-sint-necessitatibus-aut', '/tmp/f22bc6dd11e9659a530ecdf0b594a542.jpg', 1, NULL, NULL, '2018-10-02 07:10:14', '2018-08-06 08:29:40', '2018-10-02 07:10:14'),
(8, 'Alize Jacobs', 'voluptatem-aut-explicabo-voluptatum-est', '/tmp/7eeba2afaad844803b7029f670058def.jpg', 1, NULL, NULL, '2018-10-02 07:10:19', '2018-08-06 08:29:40', '2018-10-02 07:10:19'),
(9, 'Shaniya Collins', 'consequatur-nihil-saepe-facilis-hic', '/tmp/75f3166283222da447dc60d790ba8fec.jpg', 1, NULL, NULL, '2018-10-02 07:10:09', '2018-08-06 08:29:40', '2018-10-02 07:10:09'),
(10, 'Mrs. Magdalena Graham I', 'necessitatibus-ut-assumenda-et-eligendi-aut', '/tmp/96ec46942ad5c6873f7c3e3bedc031bf.jpg', 1, NULL, NULL, '2018-10-02 07:10:23', '2018-08-06 08:29:40', '2018-10-02 07:10:23'),
(12, 'Ronny Emmerich', 'quidem-placeat-cum-et-ducimus-culpa', '/tmp/30d7c88ce5ec62b924e5baed6056ff73.jpg', 1, NULL, NULL, '2018-10-02 07:09:59', '2018-08-06 08:29:40', '2018-10-02 07:09:59'),
(13, 'Maximus Cole', 'et-eum-eum-cupiditate', '/tmp/01c1d77b125096c1231390022fe64f42.jpg', 1, NULL, NULL, '2018-10-02 07:10:05', '2018-08-06 08:29:40', '2018-10-02 07:10:05'),
(14, 'Rosella Mayert', 'omnis-quis-ut-esse-sapiente-ea', '/tmp/7115ee98fbad181ee81a02e7b5273fa1.jpg', 1, NULL, NULL, NULL, '2018-08-06 08:29:40', '2018-08-06 08:29:40'),
(15, 'Trinity Sawayn', 'dignissimos-facilis-quam-non-fugiat-voluptatibus-inventore-reiciendis', '/tmp/d2d88e81c0661535fd3727813e348507.jpg', 1, NULL, NULL, NULL, '2018-08-06 08:29:40', '2018-08-06 08:29:40'),
(16, 'Delpha Cruickshank', 'soluta-aperiam-sint-vel-voluptatem-hic-ut', '/tmp/9e46dad5b71f00b2013ea311d77ba0a4.jpg', 1, NULL, NULL, NULL, '2018-08-06 08:29:40', '2018-08-06 08:29:40'),
(17, 'Dr. Harvey Walsh Sr.', 'qui-dolor-fuga-tenetur', '/tmp/ede39441f7366073b79cf11aab7f5df0.jpg', 1, NULL, NULL, NULL, '2018-08-06 08:30:12', '2018-08-06 08:30:12'),
(18, 'Andres Douglas Sr.', 'nobis-repellat-vel-voluptate-impedit', '/tmp/0367a691a496b71e08889e98b60b41d6.jpg', 1, NULL, NULL, NULL, '2018-08-06 08:30:12', '2018-08-06 08:30:12'),
(19, 'Dallin Daugherty', 'pariatur-qui-dolorem-corporis-autem', '/tmp/16cc9d8af2d9ca2bddb5fa6fee6a954b.jpg', 1, NULL, NULL, NULL, '2018-08-06 08:30:12', '2018-08-06 08:30:12'),
(20, 'Gerald Bosco', 'tenetur-amet-ducimus-sunt-reiciendis-soluta-eaque-quia-voluptatem', '/tmp/9b05f35d08513a902d34a30187b0aad3.jpg', 1, NULL, NULL, NULL, '2018-08-06 08:30:12', '2018-08-06 08:30:12'),
(21, 'Tiffany Lebsack', 'nesciunt-dignissimos-quam-voluptatem-quaerat-rerum', '/tmp/6b4353696d6a2d3ba7e9342ee4c50c9f.jpg', 1, NULL, NULL, NULL, '2018-08-06 08:30:12', '2018-08-06 08:30:12'),
(22, 'Myra Durgan', 'voluptas-labore-perspiciatis-facilis-tenetur-laudantium-perferendis', '/tmp/1549161129e9392219930177817cfc0e.jpg', 1, NULL, NULL, NULL, '2018-08-06 08:30:12', '2018-08-06 08:30:12'),
(23, 'Laila Brekke', 'possimus-sunt-consequuntur-recusandae-similique-nam', '/tmp/332b4ab741b09504c4d19058ec65aef3.jpg', 1, NULL, NULL, NULL, '2018-08-06 08:30:12', '2018-08-06 08:30:12'),
(24, 'Landen Olson', 'commodi-aut-et-ut-blanditiis', '/tmp/c01fad5a4e7e1281b9d49810692a3a0b.jpg', 1, NULL, NULL, NULL, '2018-08-06 08:30:12', '2018-08-06 08:30:12'),
(25, 'Prof. Coby Lehner Jr.', 'totam-inventore-placeat-accusamus-adipisci-sunt-minima-sed', '/tmp/f01c4d9b11d50a21adf0a6326b8454cd.jpg', 1, NULL, NULL, NULL, '2018-08-06 08:30:12', '2018-08-06 08:30:12'),
(26, 'Guillermo Cummerata', 'doloribus-et-reprehenderit-dignissimos-praesentium-nesciunt-iste-repudiandae', '/tmp/70e45be7923b272e15f4caf767a089ac.jpg', 1, NULL, NULL, NULL, '2018-08-06 08:30:12', '2018-08-06 08:30:12'),
(27, 'Gay Wilkinson', 'repudiandae-maiores-consequatur-consequatur-repudiandae-dolor-facere', 'storage/app/public/category_images/9b69be059332ecdfb0a7f9563c6bb44d.jpg', 1, NULL, NULL, NULL, '2018-08-06 09:14:41', '2018-08-06 09:14:41'),
(28, 'Miss Carmella Bergstrom Jr.', 'autem-laboriosam-et-adipisci-ducimus-rerum-impedit-et-nisi', 'storage/app/public/category_images/018b48cf42f4763f3c1032619b03056e.jpg', 1, NULL, NULL, NULL, '2018-08-06 09:16:05', '2018-08-06 09:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2018_07_10_115805_penyesuaian_table_users', 2),
(10, '2018_07_16_020754_create_table_categories', 3),
(25, '2018_07_21_203443_create_books_table', 4),
(26, '2018_07_21_204915_create_book_category_table', 5),
(28, '2018_07_25_075101_create_orders_table', 6),
(29, '2018_07_25_082000_create_book_order_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `invoice_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 390000.00, '201807060001', 'FINISH', '2018-07-06 00:00:00', '2018-07-06 00:00:00'),
(2, 14, 780000.00, '201807250002', 'PROCESS', '2018-07-26 00:00:00', '2018-10-02 08:50:04');
