-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 08:52 AM
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
-- Database: `arcon`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(50) NOT NULL,
  `about_decs` varchar(300) NOT NULL,
  `about_detail` varchar(2000) NOT NULL,
  `ufile` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `about_decs`, `about_detail`, `ufile`) VALUES
(13, 'PT. ADI RAYA CONSTRUCTION', 'Was established at April 25, 2016, beginning from small company comprised of skillful person from different backgrounds.\r\n\r\n\r\nEven though the company’s relatively recent establishment, our people have been working together since 2012 under different banner. Therefore, our crew members have a lot of experiences to work as a team.\r\n\r\nWe start from construction work, and then began to expand into a public company with engineering, procurement, and construction (EPC) services.\r\n\r\nAs a strategic mission, Adi Raya Construction utilizes the strength in networking, supporting, and partnership to professionally organize the works of supply chain sevices and EPC project within internal expertise resources and specialized expertise outsourced, which included (but not limiter to) engineering, manufacturer, transportation fabrication yard facility & performance, construction, commisioning, and maintenance support such as overhauling.\r\n\r\nResources of expertise and experience within the organization is highly correlated with the partnership arrangement which includes a joint operation, consortium, or business to business subcontracting scope.', '5077Tanpa judul (720 x 500 piksel) (2).png');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updated_at`) VALUES
(1, 'admin', 'admin', '2022-07-13 11:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(300) NOT NULL,
  `blog_detail` varchar(2000) NOT NULL,
  `ufile` varchar(1000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `blog_title`, `blog_detail`, `ufile`, `updated_at`) VALUES
(12, 'VISION', '“To be leading national company which providing national engineering, procurement and construction services through application of science and technology\"', '33245511427about.jpg', '2024-03-04 16:19:23'),
(13, 'MISSION', '• To generate added values for our shareholders, as well as for the \r\n   associated stakeholders.\r\n• To empower sustainable development through innovation and technology application.\r\n• To create competitive products and services with excellent quality and environment friendly.', '5511427about.jpg', '2024-03-04 16:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories_news`
--

CREATE TABLE `categories_news` (
  `news_id` int(11) NOT NULL,
  `news_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories_news`
--

INSERT INTO `categories_news` (`news_id`, `news_name`) VALUES
(1, 'News 1'),
(2, 'News 2'),
(3, 'News 3'),
(4, 'News 3'),
(5, 'News 3'),
(6, 'News 3'),
(7, 'news 56');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`) VALUES
(1, 'UI/UX'),
(7, 'Engineering'),
(12, 'Berenang'),
(14, 'Boiler'),
(16, 'Paving'),
(17, 'Instalasi Tangki'),
(22, 'Farhanah sajidahh');

-- --------------------------------------------------------

--
-- Table structure for table `legality`
--

CREATE TABLE `legality` (
  `id` int(11) NOT NULL,
  `legality_title` varchar(500) NOT NULL,
  `legality_desc` varchar(1000) NOT NULL,
  `legality_detail` varchar(2000) NOT NULL,
  `ufile` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `legality`
--

INSERT INTO `legality` (`id`, `legality_title`, `legality_desc`, `legality_detail`, `ufile`) VALUES
(1, 'SERTIFIKAT', 'sertifikat pertama', 'Sertifikat pertama saya Sertifikat pertama saya Sertifikat pertama saya Sertifikat pertama saya', '46893536Ciputra World.jpg'),
(4, 'SERTIFIKAT II', 'Sertifikat kedua saya ya', 'Sertifikat kedua saya Sertifikat kedua saya Sertifikat kedua saya Sertifikat kedua saya II', '51846893536Ciputra World.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `xfile` varchar(1000) NOT NULL,
  `ufile` varchar(1000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `xfile`, `ufile`, `updated_at`) VALUES
(1, '834520240221_221233.png', '393320240221_221233.png', '2024-02-22 02:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ufile` varchar(255) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `author`, `created_at`, `ufile`, `news_id`) VALUES
(2, 'ini title ke dua', 'ini title ke dua ini title ke dua ini title ke dua ini title ke duaini title ke dua', 'Aanda', '2024-03-18 03:46:40', 'about.jpg', 7),
(3, 'iftqfstwdwftsdwqsvqwvsgfwqv', 'iftqfstwdwftsdwqsvqwvsgfwqv iftqfstwdwftsdwqsvqwvsgfwqv iftqfstwdwftsdwqsvqwvsgfwqv iftqfstwdwftsdwqsvqwvsgfwqv iftqfstwdwftsdwqsvqwvsgfwqv iftqfstwdwftsdwqsvqwvsgfwqv iftqfstwdwftsdwqsvqwvsgfwqv iftqfstwdwftsdwqsvqwvsgfwqv ', 'iya', '2024-03-18 04:13:38', 'about.jpg', 7),
(4, 'fgfgsggjfdgj', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', 'fsduigfskfshkjsfd', '2024-03-18 06:23:00', '32831427about.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `ufile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `ufile`) VALUES
(10, '92281.png'),
(11, '65552.png'),
(12, '45423.png'),
(13, '82774.png'),
(14, '3521Tanpa judul (720 x 500 piksel) (720 x 200 piksel) (500 x 200 piksel) (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `port_title` varchar(500) NOT NULL,
  `port_desc` varchar(1000) NOT NULL,
  `port_detail` varchar(2000) NOT NULL,
  `ufile` varchar(1000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tw_link` varchar(2000) NOT NULL,
  `fb_link` varchar(2000) NOT NULL,
  `li_link` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `port_title`, `port_desc`, `port_detail`, `ufile`, `updated_at`, `tw_link`, `fb_link`, `li_link`) VALUES
(11, 'Amanda Manopo', 'Direktur', 'Saya adalah Amanda Manopo. Saya murah senyum dan tidak mudah marah-marah.', '49245283WhatsApp_Image_2023-04-09_at_22.26.32-removebg-preview (2).png', '2024-03-04 16:38:36', 'https://twitter.com/amandamanopo', 'https://instagram.com/amandamanopo', 'https://www.linkedin.com/in/farhanahsajidah/'),
(13, 'Farhanah Sajidah', 'Kontraktor', ' Saya adalah kontraktor Saya adalah kontraktor Saya adalah kontraktor Saya adalah kontraktor Saya adalah kontraktor', '14341.png', '2024-03-07 05:21:17', 'https://twitter.com/amandamanopo', 'https://www.facebook.com/adirayaconstruction/', 'https://www.linkedin.com/in/amdmp/');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(100) NOT NULL,
  `code` varchar(20) NOT NULL,
  `date` varchar(50) NOT NULL,
  `client` varchar(150) NOT NULL,
  `proj_title` varchar(200) NOT NULL,
  `proj_desc` varchar(200) NOT NULL,
  `proj_detail` varchar(200) NOT NULL,
  `ufile` varchar(1000) NOT NULL,
  `location` varchar(150) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `code`, `date`, `client`, `proj_title`, `proj_desc`, `proj_detail`, `ufile`, `location`, `cat_id`, `st_id`) VALUES
(27, 'ARC-SPIN/PRJ/2023/1/', '25-Sep-2023', 'PT. Multimas Nabati Asahan', 'Construction of Storage Tank', 'Construction of Storage Tank 1x300T & 4x500 MT SS', 'Pekerjaan Construction of Storage Tank 1x300T & 4x500 MT SS PT. Multimas Nabati Asahan yang berlokasi di Serang ', '5525about.jpg', 'Serang', 1, 3),
(28, 'ARC-SPIN/PRJ/2023/1/', '20-Nov-2023', 'PT. Wilmar Nabati Indonesia', 'Fabrikasi & Installasi Piping', ' Fabrikasi & Installasi Piping ISBL & OSBL, MCT LYG', 'Fabrikasi & Installasi Piping ISBL & OSBL, MCT LYG PT. Wilmar Nabati Indonesia yang berlokasi di Gresik', '7834Tanpa judul (720 x 500 piksel) (720 x 200 piksel) (500 x 200 piksel) (1).png', 'Gresik', 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `section_title`
--

CREATE TABLE `section_title` (
  `id` int(11) NOT NULL,
  `about_title` varchar(500) NOT NULL,
  `about_text` varchar(1000) NOT NULL,
  `why_title` varchar(500) NOT NULL,
  `why_text` varchar(1000) NOT NULL,
  `service_title` varchar(500) NOT NULL,
  `service_text` varchar(1000) NOT NULL,
  `port_title` varchar(500) NOT NULL,
  `port_text` varchar(1000) NOT NULL,
  `test_title` varchar(500) NOT NULL,
  `test_text` varchar(1000) NOT NULL,
  `contact_title` varchar(500) NOT NULL,
  `contact_text` varchar(1000) NOT NULL,
  `enquiry_title` varchar(500) NOT NULL,
  `enquiry_text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section_title`
--

INSERT INTO `section_title` (`id`, `about_title`, `about_text`, `why_title`, `why_text`, `service_title`, `service_text`, `port_title`, `port_text`, `test_title`, `test_text`, `contact_title`, `contact_text`, `enquiry_title`, `enquiry_text`) VALUES
(1, 'We help to grow your business.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Work smarter, not harder.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'We provide the best digital services', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Our Recent Works', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Our clients says', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Let\'s connect!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Looking for the best digital agency & marketing solution?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `service_title` varchar(500) NOT NULL,
  `service_desc` varchar(1000) NOT NULL,
  `service_detail` varchar(2000) NOT NULL,
  `ufile` varchar(1000) NOT NULL,
  `upadated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service_title`, `service_desc`, `service_detail`, `ufile`, `upadated_at`) VALUES
(2, 'Affiliate Marketing', 'Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.', 'Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.', '5645portrait-happy-young-black-woman-posing-office_116547-21539.webp', '2022-07-17 21:19:37'),
(3, 'Email Marketing', 'Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.', 'Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.', '9668788-7884680_hero-headshot-sitting-hd-png-download.jpg', '2022-07-17 21:20:13'),
(4, 'Website Growth', 'Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.', 'Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.\r\n\r\nLearn More Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt emit.\r\n\r\nLearn More', '648Eternity.jpg', '2022-07-17 21:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `siteconfig`
--

CREATE TABLE `siteconfig` (
  `id` int(11) NOT NULL,
  `site_keyword` varchar(1000) NOT NULL,
  `site_desc` varchar(500) NOT NULL,
  `site_title` varchar(300) NOT NULL,
  `site_about` varchar(1000) NOT NULL,
  `site_footer` varchar(1000) NOT NULL,
  `follow_text` varchar(1000) NOT NULL,
  `site_url` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siteconfig`
--

INSERT INTO `siteconfig` (`id`, `site_keyword`, `site_desc`, `site_title`, `site_about`, `site_footer`, `follow_text`, `site_url`, `updated_at`) VALUES
(1, 'Church, Marketing', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit nihil tenetur minus quidem est deserunt molestias accusamus harum ullam tempore debitis et, expedita, repellat delectus aspernatur neque itaque qui quod.', 'Website', 'Young coders can use events to coordinate timing and communication between different sprites or pieces of their story. For instance, the when _ key pressed block is an event that starts code whenever the corresponding key on the keyboard is pressed.', '© 2023 All Rights Reserved', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit nihil tenetur minus quidem est deserunt molestias.', 'http://localhost:8080/arcon/', '2024-03-08 04:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `sitecontact`
--

CREATE TABLE `sitecontact` (
  `id` int(11) NOT NULL,
  `phone1` varchar(150) NOT NULL,
  `phone2` varchar(150) NOT NULL,
  `email1` varchar(100) NOT NULL,
  `email2` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `latitude` varchar(150) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sitecontact`
--

INSERT INTO `sitecontact` (`id`, `phone1`, `phone2`, `email1`, `email2`, `longitude`, `latitude`, `updated_at`) VALUES
(1, '+89 (0) 2354 547001', '+89  2354 5470091', 'mail@company.com', 'mail@company.com', '112.56920593212594', '-7.072249465917425', '2024-03-08 04:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slide_title` varchar(150) NOT NULL,
  `slide_text` varchar(500) NOT NULL,
  `ufile` varchar(1000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slide_title`, `slide_text`, `ufile`, `updated_at`) VALUES
(1, 'We are digital agency & Marketing', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit nihil tenetur minus quidem est deserunt molestias accusamus harum ullam tempore debitis et, expedita, repellat delectus aspernatur neque itaque qui quod.', '58806059d354562031616499540.png', '2022-07-17 14:23:07'),
(2, 'We are', 'power ranger', '6959150wilmar.jpg', '2024-03-05 02:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `fa` varchar(150) NOT NULL,
  `social_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `name`, `fa`, `social_link`) VALUES
(4, 'Facebook', 'fa-brands fa-facebook', 'https://www.facebook.com/adirayaconstruction/');

-- --------------------------------------------------------

--
-- Table structure for table `static`
--

CREATE TABLE `static` (
  `id` int(11) NOT NULL,
  `stitle` varchar(150) NOT NULL,
  `stext` varchar(500) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `static`
--

INSERT INTO `static` (`id`, `stitle`, `stext`, `updated_at`) VALUES
(1, 'PT. Adi Raya Construction', 'Moving forward to global recognition\r\n\r\nWe, at Adi Raya Construction, endeavour, continuously, to improve designs, technology and services to allow our clients to achieve the most cost affective solutions for engineered construction systems. Our aim is customer satisfaction through products and services of Depnaker standards to Oil and Gas Standards, at competitive prices.', '2024-03-13 07:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `st_id` int(11) NOT NULL,
  `st_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`st_id`, `st_name`) VALUES
(1, 'On Going'),
(2, 'Closed'),
(3, '-');

-- --------------------------------------------------------

--
-- Table structure for table `testimony`
--

CREATE TABLE `testimony` (
  `id` int(11) NOT NULL,
  `message` varchar(300) NOT NULL,
  `name` varchar(150) NOT NULL,
  `position` varchar(100) NOT NULL,
  `ufile` varchar(1000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimony`
--

INSERT INTO `testimony` (`id`, `message`, `name`, `position`, `ufile`, `updated_at`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Yasmin Akter', 'Founder, Themeland', '5110avatar-2.png', '2022-07-17 19:41:45'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Md. Arham', 'CEO, Themeland', '4068avatar-3.png', '2022-07-17 19:48:56'),
(5, 'Admin serta penjual Admin serta penjualAdmin serta penjual Admin serta penjual Admin serta penjual  Admin serta penjual Admin serta penjual', 'Farhanah sajidah', 'Admin serta penjual', '7279secure-shield_388531.png', '2024-03-07 05:46:46'),
(6, 'Pegajar Pegajar Pegajar Pegajar PegajarPegajar Pegajar Pegajar Pegajar Pegajar', 'farah1', 'Pegajar', '4684Tanpa judul (720 x 500 piksel).png', '2024-03-07 05:47:09'),
(7, 'Admin serta penjual Admin serta penjual Admin serta penjual Admin serta penjual Admin serta penjualAdmin serta penjual', '2025', 'Admin serta penjual', '5370aneka jasa ghardika.png', '2024-03-07 05:47:29'),
(8, 'Admin serta penjual Admin serta penjual Admin serta penjual Admin serta penjualAdmin serta penjual Admin serta penjual', 'bb', 'Admin serta penjual', '6808POINT.png', '2024-03-07 05:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `why_us`
--

CREATE TABLE `why_us` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `why_us`
--

INSERT INTO `why_us` (`id`, `title`, `detail`, `updated_on`) VALUES
(3, 'Keyword ranking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur provident unde ex eligendi magni sit impedit iusto, sed ad fuga minima, dignissimos ducimus autem molestias, nostrum nesciunt enim? Ea, non hic voluptates dolorum impedit eveniet dolorem temporibus illo incidunt quis minima facere doloribus sit maiores, blanditiis labore quasi, accusantium quaerat!', '2022-07-17 18:43:07'),
(4, 'Social media', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur provident unde ex eligendi magni sit impedit iusto, sed ad fuga minima, dignissimos ducimus autem molestias, nostrum nesciunt enim? Ea, non hic voluptates dolorum impedit eveniet dolorem temporibus illo incidunt quis minima facere doloribus sit maiores, blanditiis labore quasi, accusantium quaerat!', '2022-07-17 18:44:19'),
(5, 'trend design', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur provident unde ex eligendi magni sit impedit iusto, sed ad fuga minima, dignissimos ducimus autem molestias, nostrum nesciunt enim? Ea, non hic voluptates dolorum impedit eveniet dolorem temporibus illo incidunt quis minima facere doloribus sit maiores, blanditiis labore quasi, accusantium quaerat!', '2022-07-17 18:44:33'),
(7, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, ', '2024-02-23 04:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `work_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `name`, `work_link`) VALUES
(1, '2024', 'https://docs.google.com/spreadsheets/d/1Qkp4btUo-TP3u1_pWMOjXeQlAC_7WcWGqaRpjzOh3ZY/edit?usp=sharing'),
(4, '2023', 'https://docs.google.com/spreadsheets/d/1Qkp4btUo-TP3u1_pWMOjXeQlAC_7WcWGqaRpjzOh3ZY/edit?usp=sharing'),
(5, '2029', 'https://instagram.com/farsaj.123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_news`
--
ALTER TABLE `categories_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `legality`
--
ALTER TABLE `legality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_title`
--
ALTER TABLE `section_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siteconfig`
--
ALTER TABLE `siteconfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitecontact`
--
ALTER TABLE `sitecontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static`
--
ALTER TABLE `static`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `testimony`
--
ALTER TABLE `testimony`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_us`
--
ALTER TABLE `why_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories_news`
--
ALTER TABLE `categories_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `legality`
--
ALTER TABLE `legality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `section_title`
--
ALTER TABLE `section_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sitecontact`
--
ALTER TABLE `sitecontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `static`
--
ALTER TABLE `static`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimony`
--
ALTER TABLE `testimony`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `why_us`
--
ALTER TABLE `why_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
