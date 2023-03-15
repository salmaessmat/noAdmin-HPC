-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 09:14 PM
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
-- Database: `publication_log`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `id` int(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `name`) VALUES
(1, 'publication_add');

-- --------------------------------------------------------

--
-- Table structure for table `collaborator`
--

CREATE TABLE `collaborator` (
  `id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `project_edit` int(10) NOT NULL,
  `email_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collaborator`
--

INSERT INTO `collaborator` (`id`, `project_id`, `project_edit`, `email_id`, `created_at`) VALUES
(1, 1, 1, 1, '2022-07-21 11:43:44'),
(2, 1, 1, 2, '2022-07-21 11:44:23'),
(3, 1, 1, 3, '2022-07-21 11:44:23'),
(4, 1, 1, 4, '2022-07-21 11:45:10'),
(5, 1, 2, 1, '2022-07-21 11:45:28'),
(6, 1, 2, 2, '2022-07-21 11:45:28'),
(7, 1, 2, 3, '2022-07-21 11:46:05'),
(8, 1, 2, 4, '2022-07-21 11:46:23'),
(9, 2, 1, 5, '2022-07-22 12:03:23'),
(10, 2, 1, 6, '2022-07-22 12:03:23'),
(11, 2, 1, 7, '2022-07-22 12:04:02'),
(12, 2, 1, 8, '2022-07-22 12:04:28'),
(13, 2, 1, 9, '2022-07-22 12:04:53'),
(14, 2, 1, 9, '2022-07-22 12:05:31'),
(15, 2, 2, 5, '2022-07-22 12:05:31'),
(16, 2, 2, 6, '2022-07-22 12:06:06'),
(17, 2, 2, 7, '2022-07-22 12:06:36'),
(18, 2, 2, 8, '2022-07-22 12:06:54'),
(19, 2, 2, 9, '2022-07-22 12:07:12'),
(20, 2, 2, 10, '2022-07-22 12:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `islisted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`id`, `name`, `islisted`) VALUES
(1, 'Sensors', 1),
(2, 'International Mobile, Intelligent, and Ubiquitous Computing Conference', 1);

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE `domain` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`id`, `name`) VALUES
(1, 'Biomedical Engineering'),
(2, 'Egyptian History'),
(3, 'Biology'),
(4, 'Chemistry'),
(5, 'Physics'),
(6, 'Mechanics');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(10) NOT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `address`) VALUES
(1, 'ibrahim_elhasnony@gmail.com\r\n'),
(2, 'omar_elzeki@gmail.com'),
(3, ' ali_alshehri@gmail.com\r\n'),
(4, 'hanaa_salem@gmail.com\r\n'),
(5, 'karim_yasser@gmail.com'),
(6, 'amr_salama@gmail.com'),
(7, 'ahmed_amr@gmail.com'),
(8, 'loay_yehia@gmail.com'),
(9, 'samira_refaat@gmail.com'),
(10, 'fatma_ismail@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `action_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `action_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_proposal`
--

CREATE TABLE `event_proposal` (
  `event_id` int(10) NOT NULL,
  `proposal_id` int(10) NOT NULL,
  `project_edit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_proposal`
--

INSERT INTO `event_proposal` (`event_id`, `proposal_id`, `project_edit`) VALUES
(1, 1, 2),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `human`
--

CREATE TABLE `human` (
  `id` int(10) NOT NULL,
  `edit` int(10) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `city` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `human`
--

INSERT INTO `human` (`id`, `edit`, `first_name`, `last_name`, `city`, `created_at`) VALUES
(1, 1, 'Ibrahim', ' El-Hasnony', 'EG', '2022-07-21 11:19:30'),
(2, 1, 'Omar ', 'Elzeki', 'EG', '2022-07-21 11:19:30'),
(3, 1, 'Ali ', 'Alshehri', 'EG', '2022-07-21 11:21:16'),
(4, 1, 'Hanaa ', 'Salem', 'EG', '2022-07-21 11:21:47'),
(5, 1, 'Karim', 'Yasser', 'EG', '2022-07-22 11:57:02'),
(6, 1, 'Amr ', 'Salama', 'EG', '2022-07-22 11:57:02'),
(7, 1, 'Ahmed ', 'Amr', 'EG', '2022-07-22 11:57:48'),
(8, 1, 'Loay  ', 'Yehia', 'EG', '2022-07-22 11:58:12'),
(9, 1, 'Samira ', 'Refaat', 'EG', '2022-07-22 11:58:43'),
(10, 1, 'Fatma ', ' Ismail', 'EG', '2022-07-22 11:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `human_email`
--

CREATE TABLE `human_email` (
  `human_id` int(10) NOT NULL,
  `human_edit` int(10) NOT NULL,
  `email_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `human_email`
--

INSERT INTO `human_email` (`human_id`, `human_edit`, `email_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_28_081658_create_action_table', 0),
(6, '2022_08_28_081658_create_collaborator_table', 0),
(7, '2022_08_28_081658_create_conference_table', 0),
(8, '2022_08_28_081658_create_email_table', 0),
(9, '2022_08_28_081658_create_event_table', 0),
(10, '2022_08_28_081658_create_event_proposal_table', 0),
(11, '2022_08_28_081658_create_failed_jobs_table', 0),
(12, '2022_08_28_081658_create_human_table', 0),
(13, '2022_08_28_081658_create_human_email_table', 0),
(14, '2022_08_28_081658_create_password_resets_table', 0),
(15, '2022_08_28_081658_create_personal_access_tokens_table', 0),
(16, '2022_08_28_081658_create_project_table', 0),
(17, '2022_08_28_081658_create_proposal_table', 0),
(18, '2022_08_28_081658_create_publication_table', 0),
(19, '2022_08_28_081658_create_publication_author_table', 0),
(20, '2022_08_28_081658_create_users_table', 0),
(21, '2022_08_28_081659_add_foreign_keys_to_collaborator_table', 0),
(22, '2022_08_28_081659_add_foreign_keys_to_event_table', 0),
(23, '2022_08_28_081659_add_foreign_keys_to_event_proposal_table', 0),
(24, '2022_08_28_081659_add_foreign_keys_to_human_email_table', 0),
(25, '2022_08_28_081659_add_foreign_keys_to_proposal_table', 0),
(26, '2022_08_28_081659_add_foreign_keys_to_publication_table', 0),
(27, '2022_08_28_081659_add_foreign_keys_to_publication_author_table', 0),
(28, '2022_08_29_085846_create_publication_table', 0),
(29, '2022_08_29_085847_add_foreign_keys_to_publication_table', 0),
(30, '2022_08_29_114007_create_domain_table', 0),
(31, '2022_08_29_114617_create_domain_table', 0),
(32, '2022_08_29_114803_create_project_table', 0),
(33, '2022_08_29_114804_add_foreign_keys_to_project_table', 0),
(34, '2022_09_14_124118_create_action_table', 0),
(35, '2022_09_14_124118_create_collaborator_table', 0),
(36, '2022_09_14_124118_create_conference_table', 0),
(37, '2022_09_14_124118_create_domain_table', 0),
(38, '2022_09_14_124118_create_email_table', 0),
(39, '2022_09_14_124118_create_event_table', 0),
(40, '2022_09_14_124118_create_event_proposal_table', 0),
(41, '2022_09_14_124118_create_failed_jobs_table', 0),
(42, '2022_09_14_124118_create_human_table', 0),
(43, '2022_09_14_124118_create_human_email_table', 0),
(44, '2022_09_14_124118_create_password_resets_table', 0),
(45, '2022_09_14_124118_create_personal_access_tokens_table', 0),
(46, '2022_09_14_124118_create_project_table', 0),
(47, '2022_09_14_124118_create_proposal_table', 0),
(48, '2022_09_14_124118_create_publication_table', 0),
(49, '2022_09_14_124118_create_publication_author_table', 0),
(50, '2022_09_14_124118_create_users_table', 0),
(51, '2022_09_14_124119_add_foreign_keys_to_collaborator_table', 0),
(52, '2022_09_14_124119_add_foreign_keys_to_event_table', 0),
(53, '2022_09_14_124119_add_foreign_keys_to_event_proposal_table', 0),
(54, '2022_09_14_124119_add_foreign_keys_to_human_email_table', 0),
(55, '2022_09_14_124119_add_foreign_keys_to_project_table', 0),
(56, '2022_09_14_124119_add_foreign_keys_to_proposal_table', 0),
(57, '2022_09_14_124119_add_foreign_keys_to_publication_table', 0),
(58, '2022_09_14_124119_add_foreign_keys_to_publication_author_table', 0),
(59, '2022_09_14_124228_create_action_table', 0),
(60, '2022_09_14_124228_create_collaborator_table', 0),
(61, '2022_09_14_124228_create_conference_table', 0),
(62, '2022_09_14_124228_create_domain_table', 0),
(63, '2022_09_14_124228_create_email_table', 0),
(64, '2022_09_14_124228_create_event_table', 0),
(65, '2022_09_14_124228_create_event_proposal_table', 0),
(66, '2022_09_14_124228_create_failed_jobs_table', 0),
(67, '2022_09_14_124228_create_human_table', 0),
(68, '2022_09_14_124228_create_human_email_table', 0),
(69, '2022_09_14_124228_create_password_resets_table', 0),
(70, '2022_09_14_124228_create_personal_access_tokens_table', 0),
(71, '2022_09_14_124228_create_project_table', 0),
(72, '2022_09_14_124228_create_proposal_table', 0),
(73, '2022_09_14_124228_create_publication_table', 0),
(74, '2022_09_14_124228_create_publication_author_table', 0),
(75, '2022_09_14_124228_create_users_table', 0),
(76, '2022_09_14_124229_add_foreign_keys_to_collaborator_table', 0),
(77, '2022_09_14_124229_add_foreign_keys_to_event_table', 0),
(78, '2022_09_14_124229_add_foreign_keys_to_event_proposal_table', 0),
(79, '2022_09_14_124229_add_foreign_keys_to_human_email_table', 0),
(80, '2022_09_14_124229_add_foreign_keys_to_project_table', 0),
(81, '2022_09_14_124229_add_foreign_keys_to_proposal_table', 0),
(82, '2022_09_14_124229_add_foreign_keys_to_publication_table', 0),
(83, '2022_09_14_124229_add_foreign_keys_to_publication_author_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(10) NOT NULL,
  `edit` int(10) NOT NULL,
  `title` varchar(155) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `scientific_case` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `domain_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `edit`, `title`, `summary`, `scientific_case`, `created_at`, `domain_id`) VALUES
(1, 1, 'Machine Learning Model for Heart Disease Prediction ', 'The rapid growth and adaptation of medical information to identify significant health trends and help with timely preventive care have been recent hallmarks of the modern healthcare data system. Heart disease is the deadliest condition in the developed world. Cardiovascular disease and its complications, including dementia, can be averted with early detection. Further research in this area is needed to prevent strokes and heart attacks. An optimal machine learning model can help achieve this goal with a wealth of healthcare data on heart disease. Heart disease can be predicted and diagnosed using machine-learning-based systems. Active learning (AL) methods improve classification quality by incorporating user–expert feedback with sparsely labelled data. In this paper, five (MMC, Random, Adaptive, QUIRE, and AUDI) selection strategies for multi-label active learning were applied and used for reducing labelling costs by iteratively selecting the most relevant data to query their labels. The selection methods with a label ranking classifier have hyperparameters optimized by a grid search to implement predictive modelling in each scenario for the heart disease dataset. Experimental evaluation includes accuracy and F-score with/without hyperparameter optimization. Results show that the generalization of the learning model beyond the existing data for the optimized label ranking model uses the selection method versus others due to accuracy. However, the selection method was highlighted in regards to the F-score using optimized settings.', 'Hospitals and clinics are constrained to storing and analyzing medical data using traditional and manual methods. Many medical institutions have made significant efforts to overcome this limitation by combining considerable data resources with new technologies [1]; however, numerous medical facilities failed to implement new systems early. There is still a lack of knowledge about diseases and how to treat them, despite the enormous number of data available. In light of the data’s complexity, data mining and machine learning (ML) techniques [2] are becoming increasingly popular for their use in data analysis. Machine learning and data-driven tactics can produce accurate diagnostic tools. The current study aims to identify and assess the organizational hurdles that prohibit medical institutions from adopting a successful method to offer managers strategic solutions to these difficulties ', '2022-07-21 11:12:29', 1),
(1, 2, 'Machine Learning Model for Heart Disease Prediction ', 'The rapid growth and adaptation of medical information to identify significant health trends and help with timely preventive care have been recent hallmarks of the modern healthcare data system. Heart disease is the deadliest condition in the developed world. Cardiovascular disease and its complications, including dementia, can be averted with early detection. Further research in this area is needed to prevent strokes and heart attacks. An optimal machine learning model can help achieve this goal with a wealth of healthcare data on heart disease. Heart disease can be predicted and diagnosed using machine-learning-based systems. Active learning (AL) methods improve classification quality by incorporating user–expert feedback with sparsely labelled data. In this paper, five (MMC, Random, Adaptive, QUIRE, and AUDI) selection strategies for multi-label active learning were applied and used for reducing labelling costs by iteratively selecting the most relevant data to query their labels. The selection methods with a label ranking classifier have hyperparameters optimized by a grid search to implement predictive modelling in each scenario for the heart disease dataset. Experimental evaluation includes accuracy and F-score with/without hyperparameter optimization. Results show that the generalization of the learning model beyond the existing data for the optimized label ranking model uses the selection method versus others due to accuracy. However, the selection method was highlighted in regards to the F-score using optimized settings.', 'Hospitals and clinics are constrained to storing and analyzing medical data using traditional and manual methods. Many medical institutions have made significant efforts to overcome this limitation by combining considerable data resources with new technologies [1]; however, numerous medical facilities failed to implement new systems early. There is still a lack of knowledge about diseases and how to treat them, despite the enormous number of data available. In light of the data’s complexity, data mining and machine learning (ML) techniques [2] are becoming increasingly popular for their use in data analysis. Machine learning and data-driven tactics can produce accurate diagnostic tools. The current study aims to identify and assess the organizational hurdles that prohibit medical institutions from adopting a successful method to offer managers strategic solutions to these difficulties ', '2022-07-21 11:12:29', 1),
(2, 1, 'Classify outpainted Egyptian monuments images using GAN and ResNet', 'Since Egypt is the cradle of civilizations, it contains many monuments and historical places. Tourist guides need the help of machine learning techniques to aid foreigners in getting to know Egypt\'s great history. This paper introduces a system to recognize monuments and provides a detailed description. A significant challenge is tackled in this paper, which is recognizing cropped monuments. When a tourist captures a monument image in real life, it may be occluded by an object. The human brain fills in the blanks and completes the image automatically. Our main contribution is to use generative adversarial deep learning techniques (GAN) to outpaint the cropped image. The outpainted image is then fed into state of art classifier RESNET to classify the monument and show a detailed explanation of its remarkable history. We trained the system with a dataset collected by the team of authors. After 1000 epochs of training, the Adversarial Loss of training GAN is 0.28344184 and the validation loss is 0.30181705. The performance measures of the RESNET classifier in testing are 97.0% for accuracy, 97.1% for precision, 97.0% for recall, and 97.0% for F1-measure.', 'Inspection of historical sites has expanded dramatically due to the spectacular expansion of the communication industry. For years, tourism has strongly affected many countries, particularly in Western countries. Instead of simply traveling, one might learn about other people and cultures when visiting a specific location. Every day, many tourists from all over the world come to Egypt to explore historical sites. Egypt was selected by 61 % of respondents as a country they wished to visit in their lifetime, and Egypt was chosen by 53% as the next great thing soon [1]. Unfortunately, many individuals cannot recognize historical monuments and statues just by looking at them without a caption or a guide.\r\n', '2022-07-22 11:51:31', 2),
(2, 2, 'Classify outpainted Egyptian monuments images using GAN and ResNet', 'Since Egypt is the cradle of civilizations, it contains many monuments and historical places. Tourist guides need the help of machine learning techniques to aid foreigners in getting to know Egypt\'s great history. This paper introduces a system to recognize monuments and provides a detailed description. A significant challenge is tackled in this paper, which is recognizing cropped monuments. When a tourist captures a monument image in real life, it may be occluded by an object. The human brain fills in the blanks and completes the image automatically. Our main contribution is to use generative adversarial deep learning techniques (GAN) to outpaint the cropped image. The outpainted image is then fed into state of art classifier RESNET to classify the monument and show a detailed explanation of its remarkable history. We trained the system with a dataset collected by the team of authors. After 1000 epochs of training, the Adversarial Loss of training GAN is 0.28344184 and the validation loss is 0.30181705. The performance measures of the RESNET classifier in testing are 97.0% for accuracy, 97.1% for precision, 97.0% for recall, and 97.0% for F1-measure.', 'Inspection of historical sites has expanded dramatically due to the spectacular expansion of the communication industry. For years, tourism has strongly affected many countries, particularly in Western countries. Instead of simply traveling, one might learn about other people and cultures when visiting a specific location. Every day, many tourists from all over the world come to Egypt to explore historical sites. Egypt was selected by 61 % of respondents as a country they wished to visit in their lifetime, and Egypt was chosen by 53% as the next great thing soon [1]. Unfortunately, many individuals cannot recognize historical monuments and statues just by looking at them without a caption or a guide.', '2022-07-22 11:51:31', 2);

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `project_edit` int(10) NOT NULL,
  `duration` int(10) DEFAULT NULL,
  `submitted` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `project_id`, `project_edit`, `duration`, `submitted`, `created_at`) VALUES
(1, 1, 1, 12, b'1', '2022-07-21 11:13:24'),
(1, 1, 2, 12, b'1', '2022-07-21 11:13:24'),
(2, 2, 1, 10, b'1', '2022-07-22 11:54:28'),
(2, 2, 2, 10, b'1', '2022-07-22 11:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `id` int(10) NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_edit` int(11) NOT NULL,
  `conference_id` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(225) NOT NULL,
  `year` int(10) DEFAULT NULL,
  `image` mediumtext DEFAULT NULL,
  `file` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`id`, `project_id`, `project_edit`, `conference_id`, `title`, `url`, `year`, `image`, `file`, `created_at`) VALUES
(3, 1, 2, 1, 'Multi-Label Active Learning-Based Machine Learning Model for Heart Disease Prediction', 'https://www.mdpi.com/1424-8220/22/3/1184/htm', 2022, '1663182532.jpg', '1663182532.pdf', '2022-09-14 17:08:52'),
(4, 2, 2, 2, 'Egyart_classify: an approach to classify outpainted Egyptian monuments images using GAN and ResNet', 'https://ieeexplore.ieee.org/abstract/document/9781780', 2022, '1663182641.jpg', '1663182641.pdf', '2022-09-14 17:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `publication_author`
--

CREATE TABLE `publication_author` (
  `publication_id` int(10) NOT NULL,
  `human_id` int(10) NOT NULL,
  `human_edit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publication_author`
--

INSERT INTO `publication_author` (`publication_id`, `human_id`, `human_edit`) VALUES
(3, 1, 1),
(3, 2, 1),
(3, 3, 1),
(3, 4, 1),
(4, 5, 1),
(4, 6, 1),
(4, 7, 1),
(4, 8, 1),
(4, 9, 1),
(4, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collaborator`
--
ALTER TABLE `collaborator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKcollaborat976307` (`project_id`,`project_edit`),
  ADD KEY `FKcollaborat177178` (`email_id`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action_id` (`action_id`);

--
-- Indexes for table `event_proposal`
--
ALTER TABLE `event_proposal`
  ADD PRIMARY KEY (`event_id`,`proposal_id`,`project_edit`),
  ADD KEY `FKevent_prop415416` (`proposal_id`,`project_edit`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `human`
--
ALTER TABLE `human`
  ADD PRIMARY KEY (`id`,`edit`);

--
-- Indexes for table `human_email`
--
ALTER TABLE `human_email`
  ADD PRIMARY KEY (`human_id`,`human_edit`,`email_id`),
  ADD KEY `FKhuman_emai562982` (`email_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`,`edit`),
  ADD KEY `domain_id` (`domain_id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`,`project_edit`),
  ADD KEY `FKproposal80654` (`project_id`,`project_edit`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKpublicatio842385` (`conference_id`),
  ADD KEY `project_id` (`project_id`,`project_edit`);

--
-- Indexes for table `publication_author`
--
ALTER TABLE `publication_author`
  ADD PRIMARY KEY (`publication_id`,`human_id`,`human_edit`),
  ADD KEY `FKpublicatio11348` (`human_id`,`human_edit`);

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
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `collaborator`
--
ALTER TABLE `collaborator`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `conference`
--
ALTER TABLE `conference`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collaborator`
--
ALTER TABLE `collaborator`
  ADD CONSTRAINT `FKcollaborat177178` FOREIGN KEY (`email_id`) REFERENCES `email` (`id`),
  ADD CONSTRAINT `FKcollaborat976307` FOREIGN KEY (`project_id`,`project_edit`) REFERENCES `project` (`id`, `edit`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `action` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_proposal`
--
ALTER TABLE `event_proposal`
  ADD CONSTRAINT `FKevent_prop374491` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `FKevent_prop415416` FOREIGN KEY (`proposal_id`,`project_edit`) REFERENCES `proposal` (`id`, `project_edit`);

--
-- Constraints for table `human_email`
--
ALTER TABLE `human_email`
  ADD CONSTRAINT `FKhuman_emai487330` FOREIGN KEY (`human_id`,`human_edit`) REFERENCES `human` (`id`, `edit`),
  ADD CONSTRAINT `FKhuman_emai562982` FOREIGN KEY (`email_id`) REFERENCES `email` (`id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`domain_id`) REFERENCES `domain` (`id`);

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `FKproposal80654` FOREIGN KEY (`project_id`,`project_edit`) REFERENCES `project` (`id`, `edit`);

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `FKpublicatio842385` FOREIGN KEY (`conference_id`) REFERENCES `conference` (`id`),
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`project_id`,`project_edit`) REFERENCES `project` (`id`, `edit`);

--
-- Constraints for table `publication_author`
--
ALTER TABLE `publication_author`
  ADD CONSTRAINT `FKpublicatio11348` FOREIGN KEY (`human_id`,`human_edit`) REFERENCES `human` (`id`, `edit`),
  ADD CONSTRAINT `FKpublicatio725691` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
