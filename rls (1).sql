-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 07:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rls`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `author_bio` text NOT NULL,
  `author_image` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `desc` varchar(600) NOT NULL,
  `article` text NOT NULL,
  `featured` varchar(10) NOT NULL,
  `cover_image` varchar(200) NOT NULL,
  `publish_date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `author`, `author_bio`, `author_image`, `title`, `desc`, `article`, `featured`, `cover_image`, `publish_date`, `timestamp`) VALUES
(60, 'fW,EJFBKJSKFEJBJDS', 'FWEFKHJBSDJFHBKS.DFVJWBD', 'IMG63fe0556a79e25.46550616.jpg', 'wfeWkuihlsiufgkaw', 'gerag erg eragtht herh eaherh erahe', 'SEVGSWRHEZDRBF HDETY,MZERBNRHSRTHEVASBGEBSRYN', 'YES', 'IMG63fe0556a76256.50457871.png', '2028-02-23', '2023-02-28 13:44:54'),
(61, 'JOHN WICK', 'MangaReader is a Free website to download and read manga online. We have a big library of over 600,000 manga chapters in all genres that are available to read or download for FREE without registration. The manga is updated daily to make sure no one will ever miss the latest chapter on their favorite manga. If you like the website, please bookmark it and help us to spread the words. Thank you!', 'IMG63fe119a959901.81771497.jpg', 'i dont know', 'MangaReader is a Free website to download and read manga online. We have a big library of over 600,000 manga chapters in all genres that are available to read or download for FREE without registration. The manga is updated daily to make sure no one will ever miss the latest chapter on their favorite manga. If you like the website, please bookmark it and help us to spread the words. Thank you!MangaReader is a Free website to download and read manga online. We have a big library of over 600,000 manga chapters in all genres that are available to read or download for FREE without registration. The', 'MangaReader is a Free website to download and read manga online. We have a big library of over 600,000 manga chapters in all genres that are available to read or download for FREE without registration. The manga is updated daily to make sure no one will ever miss the latest chapter on their favorite manga. If you like the website, please bookmark it and help us to spread the words. Thank you!MangaReader is a Free website to download and read manga online. We have a big library of over 600,000 manga chapters in all genres that are available to read or download for FREE without registration. The manga is updated daily to make sure no one will ever miss the latest chapter on their favorite manga. If you like the website, please bookmark it and help us to spread the words. Thank you!MangaReader is a Free website to download and read manga online. We have a big library of over 600,000 manga chapters in all genres that are available to read or download for FREE without registration. The manga is updated daily to make sure no one will ever miss the latest chapter on their favorite manga. If you like the website, please bookmark it and help us to spread the words. Thank you!MangaReader is a Free website to download and read manga online. We have a big library of over 600,000 manga chapters in all genres that are available to read or download for FREE without registration. The manga is updated daily to make sure no one will ever miss the latest chapter on their favorite manga. If you like the website, please bookmark it and help us to spread the words. Thank you!MangaReader is a Free website to download and read manga online. We have a big library of over 600,000 manga chapters in all genres that are available to read or download for FREE without registration. The manga is updated daily to make sure no one will ever miss the latest chapter on their favorite manga. If you like the website, please bookmark it and help us to spread the words. Thank you!', 'YES', 'IMG63fe119a9560f1.85960309.jpg', '2028-02-23', '2023-02-28 14:37:14'),
(62, 'hasnain002', 'TrendingMangareader does not store any files on our server, we only linked to the media which is hosted on 3rd party services. © Mangareader.toMangareader does not store any files on our server, we only linked to the media which is hosted on 3rd party services. © Mangareader.to', 'IMG63fe11dcea3117.69406527.jpg', 'Trending', 'Mangareader does not store any files on our server, we only linked to the media which is hosted on 3rd party services. © Mangareader.toMangareader does not store any files on our server, we only linked to the media which is hosted on 3rd party services. © Mangareader.toMangareader does not store any files on our server, we only linked to the media which is hosted on 3rd party services. © Mangareader.toMangareader does not store any files on our server, we only linked to the media which is hosted on 3rd party services. © Mangareader.toMangareader does not store any files on our server, we only ', 'Mangareader does not store any files on our server, we only linked to the media which is hosted on 3rd party services.\r\n© Mangareader.toMangareader does not store any files on our server, we only linked to the media which is hosted on 3rd party services.\r\n© Mangareader.toMangareader does not store any files on our server, we only linked to the media which is hosted on 3rd party services.\r\n© Mangareader.toMangareader does not store any files on our server, we only linked to the media which is hosted on 3rd party services.\r\n© Mangareader.toMangareader does not store any files on our server, we only linked to the media which is hosted on 3rd party services.\r\n© Mangareader.to', 'NO', 'IMG63fe11dcea0da4.92209899.jpg', '2028-02-23', '2023-02-28 14:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `foreign_key` varchar(50) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_date` date NOT NULL,
  `event_report` text NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE `event_images` (
  `image_id` int(50) NOT NULL,
  `event_key` varchar(50) NOT NULL,
  `image_name` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poems`
--

CREATE TABLE `poems` (
  `poem_id` int(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `author_bio` varchar(1000) NOT NULL,
  `author_image` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `desc` varchar(300) NOT NULL,
  `poem` text NOT NULL,
  `featured` varchar(10) NOT NULL,
  `cover_image` varchar(200) NOT NULL,
  `publish_date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poems`
--

INSERT INTO `poems` (`poem_id`, `author`, `author_bio`, `author_image`, `title`, `desc`, `poem`, `featured`, `cover_image`, `publish_date`, `timestamp`) VALUES
(27, 'Kinrick o Scotland', 'The Kingdom of Scotland (Scottish Gaelic: Rìoghachd na h-Alba; Scots: Kinrick o Scotland, Norn: Kongungdum Skotland) was a sovereign state in northwest Europe traditionally said to have been founded in 843. Its territories expanded and shrank, but it came to occupy the northern third of the island of Great Britain, sharing a land border to the south with England. ', 'IMG63fe1474b495b2.35415503.png', 'Kingdom of Scotland', 'The Crown was the most important element of government. The Scottish monarchy in the Middle Ages was a largely itinerant institution, before Edinburgh developed as a capital city in the second half of the 15th century. ', 'The Crown was the most important element of government. The Scottish monarchy in the Middle Ages was a largely itinerant institution, before Edinburgh developed as a capital city in the second half of the 15th century. The Crown remained at the centre of political life and in the 16th century emerged as a major centre of display and artistic patronage, until it was effectively dissolved with the 1603 Union of Crowns. The Scottish Crown adopted the conventional offices of western European monarchical states of the time and developed a Privy Council and great offices of state. Parliament also emerged as a major legal institution, gaining an oversight of taxation and policy, but was never as central to the national life. In the early period, the kings of the Scots depended on the great lords—the mormaers and toísechs—but from the reign of David I, sheriffdoms were introduced, which allowed more direct control and gradually limited the power of the major lordships. In the 17th century, the creation of Justices of Peace and Commissioners of Supply helped to increase the effectiveness of local government. The continued existence of courts baron and the introduction of kirk sessions helped consolidate the power of local lairds.\r\n\r\nScots law developed in the Middle Ages and was reformed and codified in the 16th and 17th centuries. Under James IV the legal functions of the council were rationalised, with Court of Session meeting daily in Edinburgh. In 1532, the College of Justice was founded, leading to the training and professionalisation of lawyers. David I is the first Scottish king known to have produced his own coinage. At the 1603 Union the Pound Scots was fixed at only one-twelfth the value of the English pound. The Bank of Scotland issued pound notes from 1704. Scottish currency was abolished by the Acts of Union 1707; however to the present day, Scotland retains unique banknotes.\r\n\r\nGeographically, Scotland is divided between the Highlands and Islands and the Lowlands. The Highlands had a relatively short growing season, which was even shorter during the Little Ice Age. Scotland\'s population at the start of the Black Death was about 1 million; by the end of the plague, it was only half a million. It expanded in the first half of the 16th century, reaching roughly 1.2 million by the 1690s. Significant languages in the medieval kingdom included Gaelic, Old English, Norse and French; but by the early modern era Middle Scots had begun to dominate. Christianity was introduced into Scotland from the 6th century. In the Norman period the Scottish church underwent a series of changes that led to new monastic orders and organisation. During the 16th century, Scotland underwent a Protestant Reformation that created a predominately Calvinist national kirk. There were a series of religious controversies that resulted in divisions and persecutions. The Scottish Crown developed naval forces at various points in its history, but often relied on privateers and fought a guerre de course. Land forces centred around the large common army, but adopted European innovations from the 16th century; and many Scots took service as mercenaries and as soldiers for the English Crown.', 'YES', 'IMG63fe1474b450f0.62813147.jpg', '2028-02-23', '2023-02-28 14:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `prose_id` int(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `author_bio` varchar(1000) NOT NULL,
  `author_image` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `desc` varchar(300) NOT NULL,
  `prose` text NOT NULL,
  `featured` varchar(10) NOT NULL,
  `cover_image` varchar(200) NOT NULL,
  `publish_date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proses`
--

INSERT INTO `proses` (`prose_id`, `author`, `author_bio`, `author_image`, `title`, `desc`, `prose`, `featured`, `cover_image`, `publish_date`, `timestamp`) VALUES
(18, 'JOHN WICK', 'TrendingMangareader does not store any files on our server, we only linked to the media which is hosted on 3rd party services. © Mangareader.toMangareader does not store any files on our server, we only linked to the media which is hosted on 3rd party services. © Mangareader.to', 'IMG63fe1308901e97.21775284.jpg', 'Devilman Saga', 'Hail Babayaga USS Indiana was the lead ship of her class and the first battleship in the United States Navy comparable to foreign battleships of the time. Authorized in 1890, she was launched on 28 February 1893 and commissioned on 20 November 1895. The ship pioneered the use of an intermediate batt', 'USS Indiana was the lead ship of her class and the first battleship in the United States Navy comparable to foreign battleships of the time. Authorized in 1890, she was launched on 28 February 1893 and commissioned on 20 November 1895. The ship pioneered the use of an intermediate battery. Indiana served in the Spanish–American War as part of the North Atlantic Squadron and took part in the blockade of Santiago de Cuba and the battle of Santiago de Cuba. After the war she became obsolete—despite several modernizations—and spentUSS Indiana was the lead ship of her class and the first battleship in the United States Navy comparable to foreign battleships of the time. Authorized in 1890, she was launched on 28 February 1893 and commissioned on 20 November 1895. The ship pioneered the use of an intermediate battery. Indiana served in the Spanish–American War as part of the North Atlantic Squadron and took part in the blockade of Santiago de Cuba and the battle of Santiago de Cuba. After the war she became obsolete—despite several modernizations—and spent', 'YES', 'IMG63fe13088ff1b7.27345074.jpg', '2028-02-23', '2023-02-28 14:43:20'),
(19, 'Helen Turner Watson', '1897 – Ranavalona III, the last sovereign ruler of the Kingdom of Madagascar, was deposed by French military forces.', 'IMG63fe135e7147f6.59237262.png', 'A Blonde Woman', 'Community portal – The central hub for editors, with resources, links, tasks, and announcements. Village pump – Forum for discussions about Wikipedia itself, including policies and technical issues.', '	\r\nKatherine Johnson (1918–2020) was an African-American mathematician whose calculations of orbital mechanics as a NASA employee were critical to the success of U.S. crewed spaceflights. During her 33-year career at NASA and its predecessor, the National Advisory Committee for Aeronautics, she earned a reputation for mastering complex manual calculations and helped the space agency pioneer the use of computers to perform tasks. She worked with the Apollo program, calculating rendezvous paths for the lunar lander and command module on its flights to the Moon. Johnson\'s calculations were essential to the beginning of the Space Shuttle program and she also worked on plans for a mission to Mars. In 2015, President Barack Obama awarded her the Presidential Medal of Freedom, as a pioneering example of African-American women in STEM. She was portrayed by Taraji P. Henson as a lead character in the 2016 film Hidden Figures. This NASA photographic portrait of Johnson was taken in 1983.', 'YES', 'IMG63fe135e711790.25867590.jpg', '2028-02-23', '2023-02-28 14:44:46'),
(20, 'Scottish Gaelic', 'The 16th century Reformation resulted in a Church of Scotland which was Presbyterian in structure and Calvinist in doctrine. In 1560, the Scottish Parliament designated the kirk as the sole form of religion in Scotland, and adopted the Scots Confession which rejected many Catholic teachings and practices, including bishops.[3]', 'IMG63fe13a83b3665.13108606.jpg', 'National Covenant', 'Following the Prayer Book riots protestors became more organized, and in November 1637 began claiming councillors had encouraged them to elect commissioners to represent their case to the government. This action was endorsed by Sir Thomas Hope, the king\'s advocate, and the protestors created a natio', 'The National Covenant starts by repeating the Negative or King\'s Confession, signed in 1581 as an anti-Catholic statement by James VI.[15][13] This is followed by a list of parliamentary statutes defining the polity and liturgy of the church in Scotland.[15] The Covenant concludes with a bond committing the signatories to stand together to maintain the nation\'s religion and oppose any changes to it. Signatories were also committed to upholding the king\'s authority, although it was understood this did not include obedience to an ill-advised king.[13]\r\n\r\nThe Covenant had the appearance of working within constitutional precedent, contributing to its success in appealing to all areas of Scottish society by drawing on a sense of patriotic outrage at the rule and policies of Charles as an absentee monarch, as well as the provincialization of Scotland within a system dominated by England. The Covenant was also vague enough to avoid putting people off, for example by implicitly supporting Presbyterianism, without explicitly condemning episcopacy.[15] The precise details were less important than the sense that political and religious authority started with the community, rather than with the king.[16]\r\n\r\nAdoptionThe National Covenant starts by repeating the Negative or King\'s Confession, signed in 1581 as an anti-Catholic statement by James VI.[15][13] This is followed by a list of parliamentary statutes defining the polity and liturgy of the church in Scotland.[15] The Covenant concludes with a bond committing the signatories to stand together to maintain the nation\'s religion and oppose any changes to it. Signatories were also committed to upholding the king\'s authority, although it was understood this did not include obedience to an ill-advised king.[13]\r\n\r\nThe Covenant had the appearance of working within constitutional precedent, contributing to its success in appealing to all areas of Scottish society by drawing on a sense of patriotic outrage at the rule and policies of Charles as an absentee monarch, as well as the provincialization of Scotland within a system dominated by England. The Covenant was also vague enough to avoid putting people off, for example by implicitly supporting Presbyterianism, without explicitly condemning episcopacy.[15] The precise details were less important than the sense that political and religious authority started with the community, rather than with the king.[16]\r\n\r\nAdoption', 'NO', 'IMG63fe13a83b12d1.48269638.jpg', '2028-02-23', '2023-02-28 14:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(50) NOT NULL,
  `email_id` varchar(60) NOT NULL,
  `enrollmentno` varchar(20) NOT NULL,
  `ip_address` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_id` int(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `facultyno` varchar(30) NOT NULL,
  `is_super_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email_id`, `enrollmentno`, `ip_address`, `password`, `user_id`, `timestamp`, `facultyno`, `is_super_admin`) VALUES
('Shanur Rahman', 'shanurrahman02@gmail.com', 'GL9780', '', 'test@123', 1, '2023-02-24 18:43:47', '20COB506', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `poems`
--
ALTER TABLE `poems`
  ADD PRIMARY KEY (`poem_id`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`prose_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `image_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `poems`
--
ALTER TABLE `poems`
  MODIFY `poem_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `prose_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
