/**
 This is the main script for `comment system` application
 @author : AQM Saiful Islam
 */
DROP DATABASE IF EXISTS commentSystem;

CREATE DATABASE commentSystem;

USE commentSystem;

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `post_Id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(200) DEFAULT NULL,
  `post_email` varchar(100) NOT NULL,
  `post_description` text,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `comment_Id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_name` varchar(100) DEFAULT NULL,
  `comment_email` varchar(100) DEFAULT NULL,
  `comment_description` text,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_id_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`comment_Id`),
  KEY `comments_fk_constrains` (`post_id_fk`),
  CONSTRAINT `comments_fk_constrains` FOREIGN KEY (`post_id_fk`) REFERENCES `posts` (`post_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
