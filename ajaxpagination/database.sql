 --  
 -- Table structure for table `tbl_student`  
 --  
 CREATE TABLE IF NOT EXISTS `tbl_student` (  
  `student_id` int(11) NOT NULL AUTO_INCREMENT,  
  `student_name` varchar(250) NOT NULL,  
  `student_phone` varchar(20) NOT NULL,  
  PRIMARY KEY (`student_id`)  
 ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;  
 --  
 -- Dumping data for table `tbl_student`  
 --  
 INSERT INTO `tbl_student` (`student_id`, `student_name`, `student_phone`) VALUES  
 (1, 'Pauline S. Rich', '412-735-0224'),  
 (2, 'Sarah C. White', '320-552-9961'),  
 (3, 'Samuel L. Leslie', '201-324-8264'),  
 (4, 'Norma R. Manly', '478-322-4715'),  
 (5, 'Kimberly R. Castro', '479-966-6788'),  
 (6, 'Elaine R. Davis', '701-685-8912'),  
 (7, 'Concepcion S. Gardner', '607-829-8758'),  
 (8, 'Patricia J. White', '803-789-0429'),  
 (9, 'Michael M. Bothwell', '214-585-0737'),  
 (10, 'Ronald C. Vansickle', '630-571-4107'),  
 (11, 'Clarence A. Rich', '904-459-3747'),  
 (12, 'Elizabeth W. Peterson', '404-380-9481'),  
 (13, 'Renee R. Hewitt', '323-350-4973'),  
 (14, 'John K. Love', '337-229-1983'),  
 (15, 'Teresa J. Rincon', '216-394-6894'),  
 (16, 'Erin S. Huckaby', '503-284-8652');