
--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `like_table`
--

CREATE TABLE IF NOT EXISTS `like_table` (
  `id` int(11) NOT NULL,
  `framework` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_table`
--

INSERT INTO `like_table` (`id`, `framework`) VALUES
(2, 'Laravel'),
(3, 'Symfony'),
(4, 'Yii'),
(5, 'CakePHP'),
(6, 'Codeigniter'),
(7, 'Codeigniter'),
(8, 'Laravel'),
(9, 'Yii'),
(10, 'Codeigniter'),
(11, 'Laravel'),
(12, 'Symfony'),
(13, 'Codeigniter'),
(14, 'Yii'),
(15, 'Codeigniter'),
(16, 'CakePHP'),
(17, 'Yii'),
(18, 'Codeigniter'),
(19, 'Laravel'),
(20, 'Laravel'),
(21, 'Laravel'),
(22, 'Laravel'),
(23, 'Codeigniter'),
(24, 'Codeigniter'),
(25, 'Codeigniter'),
(26, 'CakePHP'),
(27, 'CakePHP'),
(28, 'Codeigniter'),
(29, 'Laravel'),
(30, 'Symfony'),
(31, 'Yii'),
(32, 'Codeigniter'),
(33, 'Codeigniter'),
(34, 'Laravel'),
(35, 'Symfony'),
(36, 'Yii'),
(37, 'CakePHP'),
(38, 'Codeigniter'),
(39, 'Codeigniter'),
(40, 'Codeigniter'),
(41, 'Codeigniter'),
(42, 'CakePHP'),
(43, 'Laravel'),
(44, 'Symfony');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `like_table`
--
ALTER TABLE `like_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;