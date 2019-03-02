-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2019 at 04:23 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(16, ' AULIYA -e- KERAM'),
(17, 'Syed Abdul Qadir Jilani');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contuct`
--

CREATE TABLE `tbl_contuct` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contuct`
--

INSERT INTO `tbl_contuct` (`id`, `firstname`, `lastname`, `email`, `body`, `status`, `date`) VALUES
(1, 'Rasel', 'Munshi', 'bhootcse330@gmail.com', 'OK', 1, '2018-03-05 06:52:15'),
(3, 'd', 'ddd', 'ras@gmail.com', 'e and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2018-03-06 05:57:34'),
(4, 'kabor', 'ddd', 'bhootcse330@gmail.com', 'e and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2018-03-06 05:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_copyright`
--

CREATE TABLE `tbl_copyright` (
  `id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_copyright`
--

INSERT INTO `tbl_copyright` (`id`, `note`) VALUES
(1, 'Rasel munshi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `title`, `body`) VALUES
(1, 'About', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>'),
(2, 'police polyce', '<p><strong>Lorem Ipsum</strong> is simply&nbsp;police polyce dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`, `userid`) VALUES
(30, 16, 'Imam Rabbani Mujaddid Alf-e Sani Shaykh Ahmad Sirhindi Faruqi', '<p>Ahmad Sirhindi</p>\r\n<p>Ahmad al-FÄrÅ«qÄ« al-SirhindÄ« (1564&ndash;1624) was an Indian Islamic scholar, a Hanafi jurist, and a prominent member of the NaqshbandÄ« Sufi order. He has been described as the Mujaddid Alf saÄnÄ«, meaning the \"reviver of the second millennium\",[3]:92 for his work in rejuvenating Islam and opposing the dissident opinions prevalent in the time of Mughal Emperor Akbar.[4] While early South Asian scholarship credited him for contributing to conservative trends in Indian Islam, more recent works, notably by ter Haar, Friedman, and Buehler, have pointed to Sirhindi\'s significant contributions to Sufi epistemology and practices.[5]</p>\r\n<p>Most of the NaqshbandÄ« suborders today, such as the MujaddidÄ«, KhÄlidÄ«, SaifÄ«, TÄhirÄ«, Qasimiya and HaqqÄnÄ« sub-orders, trace their spiritual lineage through Sirhindi.</p>\r\n<p>Sirhindi\'s shrine, known as Rauza Sharif, is located in Sirhind, Punjab, India.</p>\r\n<h1><span style=\"font-size: x-large; color: #008000;\">Early life and education</span></h1>\r\n<p>Shaykh Ahmad Sirhindi was born on Friday[6] 26 June 1564 in the village of Sirhind.[3]:90 He received most of his early education from his father, Shaykh \'Abd al-Ahad, his brother, Shaykh Muhammad Sadiq and from Shaykh Muhammad Tahir al-Lahuri.[7] He also memorised the Qur\'an. He then studied in Sialkot,[3]:90 in modern-day Pakistan, which had become an intellectual centre under the Kashmir-born scholar Maulana Kamaluddin Kashmiri.[8] There he learned logic, philosophy and theology and read advanced texts of tafsir and hadith under another scholar from Kashmir, Sheikh Yaqub Sarfi Kashmiri (1521-1595), who was a sheikh of the tariqa Hamadaniyya. He gave Shaykh Ahmad Sirhindi bayah in Hamadaniyya Path, Sufi Order founded by Mir Sayyid Ali Hamadani. Hamadani is well known as Ali Saani (second Ali) and Said-Ul-Auliya. He was a great preacher in Islamic history, he traveled around the world and propagated Islam in different countries.[9][10] Qazi Bahlol Badakhshani taught him jurisprudence, prophet Muhammad\'s biography and history.[11][12]</p>\r\n<p>&nbsp;</p>\r\n<p>Sirhindi also made rapid progress in the SuhrawardÄ«, the QadirÄ«, and the ChistÄ« turÅ«q, and was given permission to initiate and train followers at the age of 17. He eventually joined the NaqshbandÄ« order through the Sufi missionary Shaykh Muhammad al-BaqÄ«, and became a leading master of this order. His deputies traversed the length and breadth of the Mughal Empire in order to popularize the order and eventually won some favour with the Mughal court.[13]</p>\r\n<h1><span style=\"font-size: x-large; color: #008000;\">Views</span></h1>\r\n<p>Ahmad Sirhindi\'s teaching emphasized the inter-dependence of both the Sufi path and shariah, stating that \"what is outside the path shown by the prophet is forbidden.\" Arthur Buehler explains that Sirhindi\'s concept of shariah is a multivalent and inclusive term encompassing outward acts of worship, faith, and the Sufi path. Sirhindi emphasizes Sufi initiation and practices as a necessary part of shariah, and criticizes jurists who follow only the outward aspects of the sharia. In his criticism of the superficial jurists, he states: \"For a worm hidden under a rock, the sky is the bottom of the rock.\"[14]</p>\r\n<h1><span style=\"font-size: x-large; color: #008000;\">Importance of Sufism in Shari&rsquo;ah</span></h1>\r\n<p>According to Simon Digby, \"modern hagiographical literature emphasizes [Sirhindi\'s] reiterated profession of strict Islamic orthodoxy, his exaltation of the shariah and exhortations towards its observance.\"[15] On the other hand, Yohanan Friedmann, apparently oblivious to the fact that shariah and Sufism are not mutually exclusive terms, questions how committed Shaykh Ahmad Sirhindi was to shariah by commenting: \"it is noteworthy that while Shaykh Ahmad Sirhindi never wearies of describing the minutest details of Sufi experience, his exhortations to comply with the shariah remain general to an extreme.\"[16] Friedmann also claims \"Shaykh Ahmad Sirhindi was primarily a Sufi interested first and foremost in questions of mysticism.\".[17] Ahmad Sirhindi wrote a letter to mughal emperor Jehangir emphasizing that he is now correcting the wrong path taken by his father, emperor Akbar.</p>\r\n<h1><span style=\"font-size: x-large; color: #008000;\">Oneness of appearance (wahdat ash-shuhÅ«d) and Oneness of being (wahdat al-wujÅ«d)</span></h1>\r\n<p>Shaykh Ahmad Sirhindi advanced the notion of wahdat ash-shuhÅ«d (oneness of appearance).[3]:93 According to this doctrine, the experience of unity between God and creation is purely subjective and occurs only in the mind of the Sufi who has reached the state of fana\' fi Allah (to forget about everything except Almighty Allah).[18] Sirhindi considered wahdat ash-shuhÅ«d to be superior to wahdat al-wujÅ«d,[3]:92 which he understood to be a preliminary step on the way to the Absolute Truth.[19</p>\r\n<p>Despite this, Shaykh Ahmad Sirhindi still used Ibn al-\'Arabi\'s vocabulary without hesitation.[3]:95</p>\r\n<p>Shaykh Ahmad Sirhindi writes:</p>\r\n<p>&nbsp;&nbsp;&nbsp; I wonder that Shaykh MuhyÄ« \'l-DÄ«n appears in vision to be one of those with whom God is pleased, while most of his ideas which differ from the doctrines of the People of truth appear to be wrong and mistaken. It seems that since they are due to error in kashf, he has been forgiven... I consider him as one of those with whom God is well-pleased; on the other hand, I believe that all his ideas in which he opposes (the people of truth) are wrong and harmful.[20]</p>\r\n<h1><span style=\"font-size: x-large; color: #008000;\">Reality of the Quran (haqiqat-i quran) and Ka\'ba (haqiqat-i ka\'ba-yi rabbani) versus The Reality of Muhammad (haqiqat-i Muhammadi)</span></h1>\r\n<p>Shaykh Ahmad Sirhindi had originally declared the reality of the Quran (haqiqat-i quran) and the reality of the Ka\'ba (haqiqat-i ka\'ba-yi rabbani) to be above the reality of Muhammad (haqiqat-i Muhammadi). This caused fury of opposition, particularly among certain Sufis and ulama of Hijaz who objected to the Ka\'ba having exalted spiritual \"rank\" than the Prophet.[21] Sirhindi argued in response that the reality of the Prophet is superior to any creature. The real Ka\'ba is worthy of prostration since it is not created and is covered with the veil of nonexistence. It is this Ka\'ba in the essence of God that Sirhindi was referring to as the reality of the Ka\'ba, not the appearance of the Ka\'ba (surat-i ka\'ba), which is only a stone.[22] By the latter part of the nineteenth century, the consensus of the Naqshbandi community had placed the prophetic realities closer to God than the divine realities. The rationale for this development may have been to neutralize unnecessary discord with the large Muslim community whose emotional attachment to Muhammad was greater than any understanding of philosophical fine points.</p>', 'upload/1cff379d05.jpg', 'admin', 'AULIYA-e-KERAM', '2018-03-14 10:00:44', 1),
(31, 16, 'Abdul Qadir Gilani', '<p>Muá¸¥yÄ«-al-DÄ«n AbÅ« Muá¸¥ammad b. AbÅ« SÄleh Ê¿Abd al-QÄdir al-GÄ«lÄnÄ« (Persian: Ø¹Ø¨Ø¯Ø§Ù„Ù‚Ø§Ø¯Ø± Ú¯ÛŒÙ„Ø§Ù†ÛŒ&lrm;, Arabic: Ø¹Ø¨Ø¯Ø§Ù„Ù‚Ø§Ø¯Ø± Ø§Ù„Ø¬ÙŠÙ„Ø§Ù†ÙŠ&lrm;, Turkish: Abd&uuml;lk&acirc;dir Geyl&acirc;n&icirc;, Kurdish: Evdilqadir&ecirc; Geylan&icirc;&lrm;, Sorani Kurdish: Ø¹Ù‡&zwnj;Ø¨Ø¯ÙˆØ§Ù„Ù‚Ø§Ø¯Ø±ÛŒ Ú¯Ù‡&zwnj;ÛŒÙ„Ø§Ù†ÛŒ&lrm;),[3] known as Ê¿Abd al-QÄdir al-JÄ«lÄnÄ« for short or reverently as Shaykh Ê¿Abd al-QÄdir al-JÄ«lÄnÄ« by Sunni Muslims, was a notable Sunni Hanbali preacher, orator, ascetic, mystic, jurist, and theologian[4] who became famous for being the eponymous founder of the Qadiriyya spiritual order of Sunni Sufism.[5]</p>\r\n<p>Born 29 Shaban 470 AH (around 1077) in the town of Na\'if, district of Gilan-e Gharb, Gilan, Iran[6][nb 1][7] and died Monday, February 14, 1166 (11 Rabi\' al-thani 561 AH), in Baghdad,[8] (1077&ndash;1166 CE), was a Persian[6] Hanbali Sunni[1][2] jurist and sufi based in Baghdad. The Qadiriyya tariqa (Sufi order) is named after him.[9</p>\r\n<h2><span style=\"font-size: x-large; color: #008000;\">Name</span></h2>\r\n<p>Gilani is granted the title Sayyid to indicate his descent from Muhammad.[10] The name Muhiyudin describes him as a \"reviver of religion\".[11] Gilan (Arabic al-Jilani) refers to his place of birth, Gilan.[12][13] However, Gilani also carried the epithet Baghdadi.[14][15][16] referring to his residence and burial in Baghdad. He is also called al-Hasani wa\'l-Husayni, which indicates a claim to lineal descent from both Hasan ibn Ali and Husayn ibn Ali, the sons of Ali and grandsons of Muhammad.[17][18]</p>\r\n<h1><span style=\"font-size: x-large; color: #008000;\">Education</span></h1>\r\n<p>Gilani spent his early life in Gilan, the town of his birth. In 1095, at the age of eighteen years, he went to Baghdad. There, he pursued the study of Hanbali law [24] under Abu Saeed Mubarak Makhzoomi and ibn Aqil.[25] He was given lessons on Hadith by Abu Muhammad Ja\'far al-Sarraj.[25] His Sufi spiritual instructor was Abu\'l-Khair Hammad ibn Muslim al-Dabbas.[26] (A detailed description of his various teachers and subjects are included below). After completing his education, Gilani left Baghdad. He spent twenty-five years as a reclusive wanderer in the desert regions of Iraq.[27]</p>\r\n<h1><span style=\"font-size: x-large; color: #008000;\">Later life</span></h1>\r\n<p>In 1127, Gilani returned to Baghdad and began to preach to the public.[7] He joined the teaching staff of the school belonging to his own teacher, al-Mazkhzoomi, and was popular with students. In the morning he taught hadith and tafsir, and in the afternoon he held discourse on the science of the heart and the virtues of the Quran. He was said to have been a convincing preacher and converted numerous Jews and Christians. His strength came in the reconciling of the mystical nature of Sufism and strict nature of the Quran.[7]</p>\r\n<h1><span style=\"font-size: x-large; color: #008000;\">Death and burial</span></h1>\r\n<p>Gilani died in the evening of Tuesday, February 21, 1166 (11th Rabi\' al-thani 561 AH) at the age of ninety one years according to the Islamic calendar.[8] His body was entombed in a shrine within his madrasa in Babul-Sheikh, Rusafa on the east bank of the Tigris in Baghdad, Iraq.[29][30][31] During the reign of the Safavid Shah Ismail I, Gilani\'s shrine was destroyed.[32] However, in 1535, the Ottoman Sultan Suleiman the Magnificent had a turba (dome) built over the shrine, which exists to this day.[33]</p>\r\n<h1><span style=\"font-size: x-large; color: #008000;\">Birthday &amp; Death Anniversary celebration</span></h1>\r\n<p>1 Ramadan is celebrated as the birthday of Abdul Qadir Gilani while the death anniversary is on 11 Rabi us Thani. The later is called in the Subcontinent as Giyarwee Shareef or Honoured Day of 11th.[34]</p>', 'upload/6f11af3950.jpg', 'admin', 'AULIYA-e-KERAM', '2018-03-14 10:04:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slide`
--

CREATE TABLE `tbl_slide` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slide`
--

INSERT INTO `tbl_slide` (`id`, `title`, `image`) VALUES
(7, 'first image', 'upload/slider/b48e3234cd.jpg'),
(8, '2nd Image', 'upload/slider/01060cf6d0.jpg'),
(9, '3rd Image', 'upload/slider/7373845191.jpg'),
(10, 'Four Image', 'upload/slider/5e8ae26265.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `tw`, `ln`, `gp`) VALUES
(2, 'https://www.facebook.com/rasel', 'https://www.twitter.com/', 'https://bd.linkedin.com/', 'https://bd.googleplus.com/rasel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `details`, `role`) VALUES
(1, 'Rasel', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'bhootcse330@gmail.com', '<p>k</p>', 0),
(5, 'Pythons', 'author', '827ccb0eea8a706c4c34a16891f84e7b', 'ras@gmail.com', '<p>ll</p>', 1),
(6, 'pavel', 'editor', '827ccb0eea8a706c4c34a16891f84e7b', 'ka@gmail.com', '<p>j</p>', 2);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'My site name', 'Lova to All', 'upload/logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contuct`
--
ALTER TABLE `tbl_contuct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_copyright`
--
ALTER TABLE `tbl_copyright`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slide`
--
ALTER TABLE `tbl_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_contuct`
--
ALTER TABLE `tbl_contuct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_copyright`
--
ALTER TABLE `tbl_copyright`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_slide`
--
ALTER TABLE `tbl_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
