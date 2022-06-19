-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 03:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `core`
--

CREATE TABLE `core` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `header_logo` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `is_smtp` tinyint(1) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_port` varchar(255) NOT NULL,
  `smtp_username` varchar(255) NOT NULL,
  `smtp_password` varchar(255) NOT NULL,
  `connection_prefix` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `core`
--

INSERT INTO `core` (`id`, `site_name`, `email`, `phone`, `address`, `header_logo`, `logo`, `is_smtp`, `smtp_host`, `smtp_port`, `smtp_username`, `smtp_password`, `connection_prefix`) VALUES
(1, 'Clinic', 'robin.smartipz@gmail.com', '', '', 'no-image2.png', 'no-image1.png', 1, 'smtp.gmail.com', '587', 'robin.smartipz@gmail.com', 'Aq1sw2de3@123', 'tls');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'General Medicine'),
(2, 'General Surgery'),
(3, 'Paediatrics'),
(4, 'Orthopaedics'),
(5, 'ENT'),
(6, 'Neurological');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `variables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `slug`, `subject`, `body`, `variables`) VALUES
(1, 'welcome', 'Welcome To Clinic', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:550px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<div style=\"border: solid 1px #d9d9d9;\">\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"header\" style=\"border:solid 1px #FFFFFF; color:#444; font-family:helvetica,arial,sans-serif; font-size:12px; line-height:1.6; width:100%\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"text-align:center; background:#ffffff;\"><img alt=\"Logo\" src=\"http://parrotrealty.smartipz.com/assets/front_end/images/header-logo.png\" style=\"vertical-align:middle; width:400px\" /></div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"content\" style=\"color:#444; font-family:arial,sans-serif; font-size:12px; line-height:1.6; margin-left:30px; margin-right:30px; margin-top:15px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding: 15px 0;\">Welcome and Congratulations,<br />\r\n									<br />\r\n									<br />\r\n									<br />\r\n									Once again, congratulations and we look forward to working for you.<br />\r\n									<br />\r\n									<br />\r\n									<br />\r\n									Regards<br />\r\n									Team clinic</div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"footer\" style=\"font-family:arial,sans-serif; font-size:12px; line-height:1.5; margin-left:30px; margin-right:30px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div><br />\r\n									&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td colspan=\"2\">.</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'name,email,login-url,site_name,site_email'),
(2, 'forgot-password', '[Clinic App] Password Reset', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:550px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<div style=\"border: solid 1px #d9d9d9;\">\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"header\" style=\"border:solid 1px #FFFFFF; color:#444; font-family:helvetica,arial,sans-serif; font-size:12px; line-height:1.6; width:100%\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"text-align:center; background:#ffffff;\"><img alt=\"Logo\" src=\"\" style=\"vertical-align:middle; width:400px\" /></div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"content\" style=\"color:#444; font-family:arial,sans-serif; font-size:12px; line-height:1.6; margin-left:30px; margin-right:30px; margin-top:15px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding: 15px 0;\">Hi [*name*],<br />\r\n									We received a request to reset your password. If you did not make this request, simply ignore this email. If you did make this request, please click the link below to reset your password:<br />\r\n									<br />\r\n									<strong>[*reset-url*]</strong><br />\r\n									<br />\r\n									If the link above does not work, try copying and pasting it into your browser.<br />\r\n									<br />\r\n									Administrator,<br />\r\n									[*site_name*]</div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"footer\" style=\"font-family:arial,sans-serif; font-size:12px; line-height:1.5; margin-left:30px; margin-right:30px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding-top: 15px; padding-bottom: 1px;\">&nbsp;</div>\r\n\r\n									<div>For any requests, please contact <a href=\"mailto:[*site_email*]\">[*site_email*]</a></div>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td colspan=\"2\">.</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'name,reset-url,site_name,site_email'),
(3, 'password-changed', 'Password Change Confirmation', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:550px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<div style=\"border: solid 1px #d9d9d9;\">\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"header\" style=\"border:solid 1px #FFFFFF; color:#444; font-family:helvetica,arial,sans-serif; font-size:12px; line-height:1.6; width:100%\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"text-align:center; background:#ffffff;\"><img alt=\"Logo\" src=\"\" style=\"vertical-align:middle; width:400px\" /></div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"content\" style=\"color:#444; font-family:arial,sans-serif; font-size:12px; line-height:1.6; margin-left:30px; margin-right:30px; margin-top:15px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding: 15px 0;\">Hi [*name*],<br />\r\n									<br />\r\n									You have successfully changed your password.<br />\r\n									<br />\r\n									<br />\r\n									Administrator,<br />\r\n									[*site_name*]</div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"footer\" style=\"font-family:arial,sans-serif; font-size:12px; line-height:1.5; margin-left:30px; margin-right:30px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding-top: 15px; padding-bottom: 1px;\">&nbsp;</div>\r\n\r\n									<div>For any requests, please contact <a href=\"mailto:[*site_email*]\">[*site_email*]</a></div>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td colspan=\"2\">.</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'name,site_name,site_email'),
(10, 'invite-user', 'You\'ve been added To Clinic', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:550px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<div style=\"border: solid 1px #d9d9d9;\">\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"header\" style=\"border:solid 1px #FFFFFF; color:#444; font-family:helvetica,arial,sans-serif; font-size:12px; line-height:1.6; width:100%\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"text-align:center; background:#ffffff;\"><img alt=\"Logo\" src=\"\" style=\"vertical-align:middle; width:400px\" /></div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"content\" style=\"color:#444; font-family:arial,sans-serif; font-size:12px; line-height:1.6; margin-left:30px; margin-right:30px; margin-top:15px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding: 15px 0;\">Hi [*name*],<br />\r\n									<br />\r\n									You have added to [*site_name*], please click the below link to get started<br />\r\n									<br />\r\n									<strong>[*invite-url*]</strong><br />\r\n									<br />\r\n									If the link above does not work, try copying and pasting it into your browser.<br />\r\n									<br />\r\n									Administrator,<br />\r\n									[*site_name*]</div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"footer\" style=\"font-family:arial,sans-serif; font-size:12px; line-height:1.5; margin-left:30px; margin-right:30px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding-top: 15px; padding-bottom: 1px;\">&nbsp;</div>\r\n\r\n									<div>For any requests, please contact <a href=\"mailto:[*site_email*]\">[*site_email*]</a></div>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td colspan=\"2\">.</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'name,invite-url,site_name,site_email'),
(12, 'welcome-user', 'Welcome To Clinic', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:550px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<div style=\"border: solid 1px #d9d9d9;\">\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"header\" style=\"border:solid 1px #FFFFFF; color:#444; font-family:helvetica,arial,sans-serif; font-size:12px; line-height:1.6; width:100%\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"text-align:center; background:#ffffff;\"><font color=\"#333333\" face=\"sans-serif, Arial, Verdana, Trebuchet MS\"><span style=\"font-size: 13px;\"><img alt=\"Logo\" src=\"\" style=\"vertical-align:middle; width:400px\" /></span></font></div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"content\" style=\"color:#444; font-family:arial,sans-serif; font-size:12px; line-height:1.6; margin-left:30px; margin-right:30px; margin-top:15px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding: 15px 0;\"><br />\r\n									<font color=\"#333333\" face=\"sans-serif, Arial, Verdana, Trebuchet MS\"><span style=\"font-size: 13px;\"><span style=\"font-size:16px;\"><strong>Dear</strong>&nbsp;&nbsp;[*name*]</span>,<br />\r\n									<br />\r\n									Congratulations!!&nbsp;You have successfully registered with&nbsp;</span></font>[*site_name*].</div>\r\n\r\n									<div style=\"padding: 15px 0;\"><font color=\"#333333\" face=\"sans-serif, Arial, Verdana, Trebuchet MS\"><span style=\"font-size: 13px;\">As a valuable member of&nbsp; [*site_name*]&nbsp;you can avail all our services from today onwards. &nbsp;Below are your login credentials:</span></font></div>\r\n\r\n									<div style=\"padding: 15px 0;\"><font color=\"#333333\" face=\"sans-serif, Arial, Verdana, Trebuchet MS\"><span style=\"font-size: 13px;\">User Name&nbsp; &nbsp;:&nbsp;&nbsp;[*email*]<br />\r\n									Password&nbsp; &nbsp; &nbsp; :&nbsp; &nbsp;[*pass*]</span></font></div>\r\n\r\n									<div style=\"padding: 15px 0;\"><br />\r\n									<font color=\"#333333\" face=\"sans-serif, Arial, Verdana, Trebuchet MS\"><span style=\"font-size: 13px;\">Best Regards, ​ Team [*site_name*].&nbsp;&nbsp;</span></font></div>\r\n\r\n									<div style=\"padding: 15px 0;\"><br />\r\n									<br />\r\n									<br />\r\n									&nbsp;</div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'name,email,login-url,site_name,site_email,pass'),
(13, 'vendor-otp', 'OTP Verification', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:550px\">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<div style=\"border: solid 1px #d9d9d9;\">\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"header\" style=\"border:solid 1px #FFFFFF; color:#444; font-family:helvetica,arial,sans-serif; font-size:12px; line-height:1.6; width:100%\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"text-align:center; background:#ffffff;\"><img alt=\"Logo\" src=\"\" style=\"vertical-align:middle; width:400px\" /></div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"content\" style=\"color:#444; font-family:arial,sans-serif; font-size:12px; line-height:1.6; margin-left:30px; margin-right:30px; margin-top:15px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding: 15px 0;\">Hi [*name*],<br />\r\n									<br />\r\n									You have added to [*site_name*], please use the below OTP to get started<br />\r\n									<br />\r\n									<strong>[*invite-otp*]</strong><br />\r\n									<br />\r\n									<br />\r\n									Administrator,<br />\r\n									[*site_name*]</div>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"footer\" style=\"font-family:arial,sans-serif; font-size:12px; line-height:1.5; margin-left:30px; margin-right:30px; width:490px\">\r\n							<tbody>\r\n								<tr>\r\n									<td colspan=\"2\">\r\n									<div style=\"padding-top: 15px; padding-bottom: 1px;\">&nbsp;</div>\r\n\r\n									<div>For any requests, please contact <a href=\"mailto:[*site_email*]\">[*site_email*]</a></div>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td colspan=\"2\">.</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'name,invite-otp,site_name,site_email');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`) VALUES
(1, 'Administrator'),
(2, 'Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `password_reset_key` varchar(255) NOT NULL,
  `password_reset_key_expiration` date NOT NULL,
  `invite_key` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_type`, `name`, `email`, `mobile`, `password`, `is_active`, `password_reset_key`, `password_reset_key_expiration`, `invite_key`, `last_login`, `created_at`) VALUES
(2, 3, 'robinmon', 'robinroyabraham@gmail.com', '9074656202', '22aa183ef2b011fc1b1081e010c57d4b', 1, '', '0000-00-00', '', '2022-06-17 07:08:15', '2022-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `session_simple_pos`
--

CREATE TABLE `session_simple_pos` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session_simple_pos`
--

INSERT INTO `session_simple_pos` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('hafmpve5u6ud3vclp6dcjpaq7fug5b8s', '::1', 1654655074, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343635353037343b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('qhiq29dlrudv6luho2nqj1e1mlu9kkjn', '::1', 1654653998, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343635333939373b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('3e8mc0cvjb301hl72luor287cpq7f1r0', '::1', 1654655640, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343635353634303b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d73677c733a363a22536176656421223b5f5f63695f766172737c613a313a7b733a333a226d7367223b733a333a226f6c64223b7d),
('9l0kg83vohf2ci2k93ihftcnk1k0crjf', '::1', 1654658806, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343635383830363b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('oklseriq45iut73o695grshtgs0qtj9t', '::1', 1654659135, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343635393133353b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('24fts9fe04pe5l6s9avd8a4pl7i10g9c', '::1', 1654663567, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343636333536373b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('l7r5kqv24no68a9gdj0e6h8tbbgqn6jj', '::1', 1654664126, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343636343132363b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('6tal7p50a4p2devet8u5bdceho201bhv', '::1', 1654664465, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343636343436353b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('s1pm4eb2it6b1m6dddi0ek7407bb2jj9', '::1', 1654665210, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343636353231303b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('3n360kfvujeb0hm9f9cd8k3fpb6nv71u', '::1', 1654665529, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343636353532393b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('k1ppf3d01u40mfcp2nvgbha0kk2iop8a', '::1', 1654666269, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343636363236393b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d73677c733a363a22536176656421223b5f5f63695f766172737c613a313a7b733a333a226d7367223b733a333a226f6c64223b7d),
('nc1ramv3keufs43e656ra8v168bvijth', '::1', 1654667011, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343636373031313b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('g4oekitibllp77ods6a4q0csrd2jf14h', '::1', 1654667574, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343636373537343b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('ekmm2b64a1n0457isrq20gf3c8aea1t0', '::1', 1654667807, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343636373537343b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('0rg4sne8i22npl4a7djf3422rfa2bqqb', '::1', 1654677413, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343637373135333b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('brn1qdgjbbak4lu9ihedmo1k6njpkrpr', '::1', 1654686462, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343638363436323b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b70726f70657274795f69647c693a343b),
('d0s6cc23oqe4ovdsqt9qigbv1dr5qngs', '::1', 1654686770, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343638363737303b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b70726f70657274795f69647c693a343b),
('jrtdjf561gqq94p7bubdmt9tmsmpbamc', '::1', 1654687104, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343638373130343b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b70726f70657274795f69647c733a313a2233223b),
('v551b92qa11csi0obm68upot9nhlel82', '::1', 1654687905, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343638373930353b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b70726f70657274795f69647c733a313a2233223b),
('pg8lsf5ebu9vvq2269vp0h4m8nvl73op', '::1', 1654688237, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343638383233373b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b70726f70657274795f69647c733a313a2236223b7365617263687c613a303a7b7d),
('p432vd760rgop0hnsscrgetshv77h7gd', '::1', 1654688472, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343638383233373b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b70726f70657274795f69647c733a313a2236223b7365617263687c613a303a7b7d),
('g5kg1rmfmh970stk2ifhedqu6u2fk294', '::1', 1654703483, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343730333438333b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b76656e646f725f757365725f69647c733a313a2237223b76656e646f725f6c6f676765645f696e7c623a313b67726f75705f69647c693a323b),
('rqmmel4aiilvc9d0vgpg8llpq2r5r6bm', '::1', 1654703962, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343730333936323b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b76656e646f725f757365725f69647c733a313a2237223b76656e646f725f6c6f676765645f696e7c623a313b67726f75705f69647c693a323b),
('r920332nsf2811bhju09fk7jr35h2ugs', '::1', 1654705170, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343730353137303b),
('o098kd5oq8v0cjt0umnrgujs5l12hq8m', '::1', 1654708399, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343730383339393b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('11u9ttqda35iv9bngmeh39v8a8tecuv0', '::1', 1654708700, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343730383730303b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('algttvuq8nh5a8ths239lc55ch1smilp', '::1', 1654712726, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343731323732363b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('rlq4lt82ufb6q5eo7lfqg4laivr00a4u', '::1', 1654712727, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343731323732363b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('909jdqfpmdg86eq69uik4qcvmf0ik0gr', '::1', 1654741110, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343734313131303b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('213ukj6nuo0o7cqnpoaiiebs2jid4o67', '::1', 1654741110, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635343734313131303b),
('ovlgaet182ujgaaish9klqfvab65hh56', '::1', 1655003841, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353030333834313b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('lsckjj8tu93ge44q40e5g9nhkm7uqqq6', '::1', 1655004191, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353030343139313b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('1j5853lid7s1qri8fd9nct83g5beenor', '::1', 1655004837, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353030343833373b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('rle9c5s9p0ir1knv95rf69etufnehth9', '::1', 1655005181, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353030353138313b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('vhvh15ibq2tdch8oj3m8r66ifivrhb14', '::1', 1655005713, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353030353731333b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('cbegmau1bl4e9pnlnmnb9od4g7mo77nj', '::1', 1655006016, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353030363031363b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('jvk0trf0cm42sgc1r8rdhd64g2s2lqsm', '::1', 1655006324, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353030363332343b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('a7tdd9hdva84qqmn6qmude5ldru7la1t', '::1', 1655006646, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353030363634363b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d73677c733a363a22536176656421223b5f5f63695f766172737c613a313a7b733a333a226d7367223b733a333a226f6c64223b7d),
('rpo8g5huoi08isml6or68s6vv3dpvsv8', '::1', 1655006718, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353030363634363b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('vso2cun923ajvpegkiv15em265vr1ios', '::1', 1655014983, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353031343938333b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b6d73677c733a33303a2253657474696e67732075706461746564207375636365737366756c6c7921223b5f5f63695f766172737c613a313a7b733a333a226d7367223b733a333a226f6c64223b7d),
('fjlvjls9esj4q52d61d7me5sc0a8nsst', '::1', 1655015380, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353031353338303b),
('au9247hhuer574tbn16h1bf2aq25johu', '::1', 1655015723, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353031353732333b),
('rkk44851qmcrqilj46fkesgonptjoiqj', '::1', 1655016064, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353031363036343b),
('n1mkvltdm52suraepiaankhso95d7gto', '::1', 1655016385, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353031363338353b),
('od4h1eddaaf4qb0frt9oocndi7md4iiq', '::1', 1655016756, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353031363735363b),
('javg7gglnsbtvvl31fdv12p8rh1fd314', '::1', 1655017070, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353031373037303b),
('k6iugf8j3ir8087oruv36d7hgaas62sk', '::1', 1655018348, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353031383334383b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('2avi5051ehjjbi0rjlpkk84kf92fpdd8', '::1', 1655018697, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353031383639373b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c693a323b76656e646f725f757365725f69647c733a313a2238223b76656e646f725f6c6f676765645f696e7c623a313b),
('et1iule4dfk3bocgo8hdjri98hb4tft0', '::1', 1655019117, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353031393131373b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c693a323b76656e646f725f757365725f69647c733a313a2238223b76656e646f725f6c6f676765645f696e7c623a313b70726f70657274795f69647c733a313a2238223b),
('lrlqlme8a9dh3hqcosbgocete23am0q2', '::1', 1655019419, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353031393431393b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c693a323b76656e646f725f757365725f69647c733a313a2238223b76656e646f725f6c6f676765645f696e7c623a313b70726f70657274795f69647c733a313a2238223b),
('etcn96t2gdr0jmam097212a0ir1ek5j2', '::1', 1655019419, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353031393431393b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c693a323b76656e646f725f757365725f69647c733a313a2238223b76656e646f725f6c6f676765645f696e7c623a313b70726f70657274795f69647c733a313a2238223b6d73677c733a36393a22506c6561736520636f6d706c65746520796f75722070726f66696c6520616e64207761697420666f722061646d696e20617070726f76616c20746f20636f6e74696e756521223b5f5f63695f766172737c613a313a7b733a333a226d7367223b733a333a226f6c64223b7d),
('agciicru04q6c7h76fncr4srvp7g4qkv', '::1', 1655030907, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353033303930373b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b),
('v0jqlnt0ph1he9da4mfu1nnvvohgn45f', '::1', 1655031576, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353033313537363b757365726e616d657c733a32353a22726f62696e726f796162726168616d40676d61696c2e636f6d223b656d61696c7c733a32353a22726f62696e726f796162726168616d40676d61696c2e636f6d223b76656e646f725f757365725f69647c733a313a2238223b76656e646f725f6c6f676765645f696e7c623a313b67726f75705f69647c693a323b),
('1dgpbdv5ebk2c40uupkgvc5u3bcmllre', '::1', 1655031808, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353033313634303b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b7365617263687c613a303a7b7d),
('i5tbgd8f547m7veqq9rh3e38ivp0ggel', '::1', 1655396366, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353339363336363b757365726e616d657c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b656d61696c7c733a32323a22726f62696e6d6f6e3336313840676d61696c2e636f6d223b757365725f69647c733a313a2239223b6c6f676765645f696e7c623a313b67726f75705f69647c733a313a2231223b7365617263687c613a303a7b7d),
('2sthkq6a2sv82i4l1ditimktiamej993', '::1', 1655396693, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353339363639333b),
('4hu29u5avuaor4s41qrrh19md8cec982', '::1', 1655397099, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353339373039393b),
('jv63mhmrtf9338tm1lvo4qo15isoqq5m', '::1', 1655397494, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353339373439343b),
('1n6rom8ldnkn39s9l3g2v3tajs83j5gi', '::1', 1655398739, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353339383733393b),
('84h6hkugvviqdap9bc9a9ao6oom0a36b', '::1', 1655400443, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353430303434333b),
('jnl9q14i0cqntuvunfikot4irnqr3ooj', '::1', 1655401405, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353430313430353b),
('dqan26i6kct6519a8aqo5fppjer9j1ek', '::1', 1655401405, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353430313430353b),
('0h4v84hs4p0o1vl4n6ijnk5jss01ecki', '::1', 1655439306, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353433393330363b),
('9sb5kg4har9l2am19pne9gth4hqtjsoq', '::1', 1655439790, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353433393739303b),
('mpjtt26oj4j9pc6u4slfis9nvs9hvc5u', '::1', 1655440106, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353434303130363b),
('tdkd1po1kk1eqjjffq9a482bojuhe8nf', '::1', 1655440557, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353434303535373b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b70617469656e745f757365725f69647c693a313b70617469656e745f6c6f676765645f696e7c623a313b67726f75705f69647c693a333b),
('n3ve3p98vf1k7qmn6lnlhscdlm4357vj', '::1', 1655440944, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353434303934343b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b70617469656e745f757365725f69647c693a313b70617469656e745f6c6f676765645f696e7c623a313b67726f75705f69647c693a333b),
('mqasb0m7kkm6qhqalco3rv95j37v9suo', '::1', 1655441260, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353434313236303b757365726e616d657c733a31343a2261646d696e4074616b6b692e7161223b656d61696c7c733a31343a2261646d696e4074616b6b692e7161223b70617469656e745f757365725f69647c693a313b70617469656e745f6c6f676765645f696e7c623a313b67726f75705f69647c693a333b),
('v21mmh7b3m9ksmbt0meg9b5199gt55so', '::1', 1655442129, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353434323132393b757365726e616d657c733a32353a22726f62696e726f796162726168616d40676d61696c2e636f6d223b656d61696c7c733a32353a22726f62696e726f796162726168616d40676d61696c2e636f6d223b70617469656e745f757365725f69647c733a313a2232223b70617469656e745f6c6f676765645f696e7c623a313b67726f75705f69647c693a333b),
('on52ke333b3aurcr4haao097t9lq0osf', '::1', 1655442441, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353434323434313b757365726e616d657c733a32353a22726f62696e726f796162726168616d40676d61696c2e636f6d223b656d61696c7c733a32353a22726f62696e726f796162726168616d40676d61696c2e636f6d223b70617469656e745f757365725f69647c733a313a2232223b70617469656e745f6c6f676765645f696e7c623a313b67726f75705f69647c693a333b),
('999dbfsj97bhhl5pqqg8u5687ahmcrov', '::1', 1655443710, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353434333731303b),
('uonge6asssa2eqtj0rf6qpqt3rb0jlm8', '::1', 1655444054, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353434343035343b),
('jafcndic8p4kpr90hnr0up933oef70av', '::1', 1655444070, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353434343035343b);

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`id`, `name`, `department_id`) VALUES
(1, 'anorexia', 1),
(2, 'weight loss', 4),
(3, 'shivering', 1),
(4, 'swelling', 1),
(5, 'chest pain', 2),
(6, 'dry mouth', 5),
(7, 'hearing loss', 1),
(8, 'abnormal posturing', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `group_id` int(11) NOT NULL,
  `password_reset_key` varchar(255) NOT NULL,
  `password_reset_key_expiration` datetime DEFAULT NULL,
  `invite_key` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `is_active`, `group_id`, `password_reset_key`, `password_reset_key_expiration`, `invite_key`, `image`, `last_login`, `created_at`, `branch_id`) VALUES
(9, 'Robinmon', 'Roy', 'robinmon3618@gmail.com', '025c2265b5c8bab4d71271a58351ec86', '9074656202', 1, 1, '', '0000-00-00 00:00:00', 'S9VT4GY0Htg5OVy', '', '2022-06-16 18:07:17', '2020-06-17 08:17:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `last_login` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `password_reset_key` varchar(255) NOT NULL,
  `password_reset_key_expiration` datetime NOT NULL,
  `registration_no` varchar(255) NOT NULL,
  `otp` int(10) NOT NULL,
  `is_otp_verified` tinyint(4) NOT NULL,
  `is_approved` tinyint(4) NOT NULL,
  `personal_info` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `hospital_name`, `email`, `password`, `phone`, `status`, `last_login`, `created_at`, `password_reset_key`, `password_reset_key_expiration`, `registration_no`, `otp`, `is_otp_verified`, `is_approved`, `personal_info`, `department_id`, `address`, `state`, `zip`, `image`) VALUES
(8, 'robinmon', 'st', 'robinroyabraham@gmail.com', '22aa183ef2b011fc1b1081e010c57d4b', '9074656202', 0, '2022-06-12 12:56:11', '2022-06-12 08:57:50', '', '0000-00-00 00:00:00', '12345', 8843, 0, 1, 'qqqqqqqqqqqqqqq', 5, 'test address 1', 'Northwest Territories', '1234321', '901_8.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `core`
--
ALTER TABLE `core`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_simple_pos`
--
ALTER TABLE `session_simple_pos`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `core`
--
ALTER TABLE `core`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
