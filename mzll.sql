-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?10 �?16 �?22:08
-- 服务器版本: 5.5.47
-- PHP 版本: 5.5.30

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `mzll`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `pwd` varchar(225) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `name`, `pwd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `basics_config`
--

CREATE TABLE IF NOT EXISTS `basics_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `decimal` decimal(6,2) DEFAULT NULL,
  `mark` int(1) DEFAULT NULL,
  `desc` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='ip基础费用和首页广告显示' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `basics_config`
--

INSERT INTO `basics_config` (`id`, `decimal`, `mark`, `desc`) VALUES
(1, '2.00', NULL, 'ip基础费用'),
(2, NULL, 0, '广告开启关闭'),
(3, '0.30', NULL, '一级分销提成'),
(4, '0.10', NULL, '二级分销提成');

-- --------------------------------------------------------

--
-- 表的结构 `finance`
--

CREATE TABLE IF NOT EXISTS `finance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `opera` int(1) NOT NULL COMMENT '1是充值，2是提现',
  `money` decimal(6,2) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='财务' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `date` int(11) NOT NULL,
  `content` text NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `title`, `date`, `content`, `order`) VALUES
(1, '22222', 0, '312321313131', 10),
(2, '312313', 1473472925, '313312', 10);

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `ip` int(11) NOT NULL COMMENT '需要刷的ip流量',
  `pv` int(11) NOT NULL COMMENT 'pv/ip',
  `url` varchar(225) NOT NULL COMMENT '所需网址',
  `name` varchar(225) NOT NULL COMMENT '任务名车',
  `price` decimal(6,2) NOT NULL COMMENT '订单价格',
  `tid` int(11) NOT NULL COMMENT 'ip驻留时间',
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`id`, `uid`, `ip`, `pv`, `url`, `name`, `price`, `tid`, `date`) VALUES
(1, 9, 1000, 3, 'dsadsadadadda', '测试一', '5.00', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(225) NOT NULL,
  `pricerate` decimal(3,1) NOT NULL COMMENT '价格倍率',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='ip驻留时间表' AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `time`
--

INSERT INTO `time` (`id`, `time`, `pricerate`) VALUES
(1, '3-30秒随机停留', '1.0'),
(2, '10-15秒精确停留', '1.5'),
(3, '20-25秒精确停留', '2.0'),
(4, '30-35秒精确停留', '2.5'),
(5, '35-40秒精确停留', '3.0'),
(12, '40-45秒精确停留', '3.5'),
(17, '50-55秒精确停留', '4.0');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(225) NOT NULL COMMENT '电话信息，用户登录和注册',
  `pwd` varchar(255) NOT NULL,
  `balance` decimal(6,2) NOT NULL DEFAULT '0.00',
  `parent` int(11) DEFAULT '0' COMMENT '上一级的分销',
  `extensionlink` varchar(225) NOT NULL COMMENT '推广链接',
  `extensionid` varchar(225) NOT NULL COMMENT '推广id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`),
  UNIQUE KEY `id_3` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户信息' AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `phone`, `pwd`, `balance`, `parent`, `extensionlink`, `extensionid`) VALUES
(9, '111', '111', '3213.00', 0, 'localhost:2020/index.php?a=Home&c=index&a=extensionRegin&id=1b021dce3029bca91db13df02a615e1d', '1b021dce3029bca91db13df02a615e1d'),
(15, '15757812030', 'e10adc3949ba59abbe56e057f20f883e', '0.00', 0, 'localhost:2020/index.php?a=Home&c=index&a=extensionRegin&id=60960d283d65cfc1925f1e756fd14d4f', '60960d283d65cfc1925f1e756fd14d4f'),
(18, '13884419731', 'e10adc3949ba59abbe56e057f20f883e', '0.00', 0, 'localhost:2020/index.php?a=Home&c=index&a=extensionRegin&id=936e086de6cb40f8f056832ce7b0c91a', '936e086de6cb40f8f056832ce7b0c91a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
