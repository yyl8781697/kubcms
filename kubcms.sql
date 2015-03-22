-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2012 年 12 月 28 日 21:59
-- 服务器版本: 5.5.28
-- PHP 版本: 5.4.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `kubcms`
--

-- --------------------------------------------------------

--
-- 表的结构 `kub_article`
--

CREATE TABLE IF NOT EXISTS `kub_article` (
  `articleid` int(11) NOT NULL AUTO_INCREMENT,
  `colid` int(11) NOT NULL,
  `urlname` varchar(64) NOT NULL,
  `title` varchar(128) NOT NULL,
  `author` varchar(64) NOT NULL,
  `source` varchar(128) DEFAULT NULL,
  `tags` varchar(128) DEFAULT NULL,
  `content` text,
  `imagepath` varchar(128) DEFAULT NULL,
  `createtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  `istop` int(1) NOT NULL,
  `color` char(10) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `isenabled` int(1) NOT NULL,
  `isdelete` int(1) NOT NULL,
  PRIMARY KEY (`articleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `kub_article`
--

INSERT INTO `kub_article` (`articleid`, `colid`, `urlname`, `title`, `author`, `source`, `tags`, `content`, `imagepath`, `createtime`, `updatetime`, `istop`, `color`, `hits`, `isenabled`, `isdelete`) VALUES
(1, 4, '1', '测试文章', '管理员', '本站', 'test', '测试文章 测试内容22', 'uploadfiles/articleimg/2012121010570917.png', '2012-11-27 20:31:45', '2012-12-05 23:33:46', 1, '#0000FF', 1, 1, 0),
(2, 3, 'xxx', '苦逼的文章啊', '管理员', '本站', 'kub', '我是文章内容   内容啊 内容啊<br />', 'uploadfiles/articleimg/2012121122162735.png', '2012-12-11 22:16:27', '2012-12-11 22:16:27', 1, 'green', 0, 1, 0),
(3, 6, 'seal-iphone', '33个地区 iPhone 5 发售，中国不排队老外很意外', '管理员', '', 'iphone5', '<p style="text-indent:2em;font-family:微软雅黑, Verdana, sans-serif, 宋体;font-size:14px;background-color:#FFFFFF;">\n	几乎所有关于昨日iPhone 5中国发售的国外新闻中，都带着“夜里竟无人排队”，或者“排队者比以往少很多”的说法。相对而言这次马来西亚的 iPhone 5发售排队就要比我国热闹很多。\n</p>\n<p style="text-indent:2em;font-family:微软雅黑, Verdana, sans-serif, 宋体;font-size:14px;background-color:#FFFFFF;">\n	这全球33个地区包括：阿尔巴尼亚、安提瓜和巴布达,亚美尼亚、巴哈马、巴林、玻利维亚、巴西、智利、中国、哥斯达黎加、塞浦路斯、厄瓜多尔、格林纳达、 印度尼西亚、以色列、牙买加、约旦、科威特、马其顿、马来西亚、摩尔多瓦、黑山、巴拿马、巴拉圭、菲律宾、卡塔尔、俄罗斯、沙特阿拉伯、南非、台湾、土耳 其、阿拉伯联合酋长国和委内瑞拉。\n</p>', '', '2012-12-15 18:16:54', '2012-12-15 18:16:54', 1, '#red', 0, 1, 0),
(4, 10, 'ieieie', 'IE浏览器曝最新漏洞：黑客可追踪你的鼠标轨迹', '开源中国', 'oschina', 'ie啊', '<p style="text-indent:2em;font-family:微软雅黑, Verdana, sans-serif, 宋体;font-size:14px;background-color:#FFFFFF;">\n	一般来说，普通种植在本地的木马，工作方式是记录用户敲击键盘的顺序，以此盗取用户的银行账号、信用卡密码等信息。但几个月之前，广告分析公司Spider.io发现，IE浏览器存在一个JS漏洞，可致用户鼠标操作的轨迹遭恶意站点追踪，这样一来许多软件的密码输入，即便采用屏幕数字软键盘，也存在账户被盗的风险。类似跟踪鼠标轨迹的木马还是第一次被大规模发现。\n</p>\n<p style="text-indent:2em;font-family:微软雅黑, Verdana, sans-serif, 宋体;font-size:14px;background-color:#FFFFFF;">\n	按照Spider.io的说法，IE的鼠标移动轨迹追踪漏洞存在于从IE6至IE10的所有版本之上，甚至也威胁到了不少平板用户。Spider.io今年10月1日的时候就将此问题呈报给了微软，微软安全研究中心也承认了此漏洞确实存在，并表示目前正在调查中并将积极处理此事。\n</p>\n<p style="text-indent:2em;font-family:微软雅黑, Verdana, sans-serif, 宋体;font-size:14px;background-color:#FFFFFF;">\n	这一漏洞的可怕之处在于，<strong>用户电脑上根本无需安装或存在任何恶意程序，黑客只需在IE用户访问的站点放置可记录鼠标移动轨迹的恶意广告，即可实现信息盗取的目的</strong>，期间没有所谓的感染过程。更重要的是，用户只要打开这样的网站，即便此IE标签或IE浏览器没有处于激活状态，用户正在使用其他程序或浏览其他站点，鼠标轨迹一样可被完整记录。\n</p>\n<p style="text-indent:2em;font-family:微软雅黑, Verdana, sans-serif, 宋体;font-size:14px;background-color:#FFFFFF;">\n	Spider.io表示IE的这一安全漏洞已经被某些广告商利用，互联网上已有至少两家广告分析公司在利用此漏洞对用户的广告浏览习惯进行追踪，而且每个月页面的浏览量过亿。所以Spider.io提醒所有IE用户需要有意识地警醒这个问题。\n</p>\n<p style="text-indent:2em;font-family:微软雅黑, Verdana, sans-serif, 宋体;font-size:14px;background-color:#FFFFFF;">\n	在Spider.io前两天向公众曝光该IE安全漏洞之后，微软方面辩称此漏洞并非只存在于IE之上，其他浏览器产品也有类似的问题，并且认为Spider.io动机不纯——Spider.io本身作为一家广告分析企业，显然是想通过这样的爆料手段击倒另外两个竞争对手。当前Spider.io仍未对此说法做出任何回应。\n</p>\n<p style="text-indent:2em;font-family:微软雅黑, Verdana, sans-serif, 宋体;font-size:14px;background-color:#FFFFFF;">\n	对用户来说，既然漏洞确实存在，不管各企业之间抱持怎样的恩怨看待此问题，当务之急还是期望微软能够及早修复此漏洞，下面的视频简单演示了整个鼠标轨迹的记录过程。微软称当前没有用户因此漏洞受到影响，但愿那些不法分子不会在听闻该爆料之后蜂拥购买不法广告位。\n</p>', '', '2012-12-15 18:19:35', '2012-12-15 18:19:35', 1, '#009966', 0, 1, 0),
(5, 7, 'asd', 'asdasd', 'zxc', 'qwe', '', 'zxcxfdvdfg', '', '2012-12-28 21:57:30', '2012-12-28 21:57:30', 0, '#009999', 0, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `kub_column`
--

CREATE TABLE IF NOT EXISTS `kub_column` (
  `colid` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `urlname` varchar(64) DEFAULT NULL,
  `createtime` datetime NOT NULL,
  `type` varchar(20) NOT NULL,
  `navigation` varchar(20) NOT NULL,
  `colindex` int(4) NOT NULL,
  `isenabled` int(1) NOT NULL,
  `linktarget` varchar(20) DEFAULT NULL,
  `content` text,
  `linkurl` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`colid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `kub_column`
--

INSERT INTO `kub_column` (`colid`, `parentid`, `name`, `urlname`, `createtime`, `type`, `navigation`, `colindex`, `isenabled`, `linktarget`, `content`, `linkurl`) VALUES
(1, 0, '首页', 'shouye', '2012-11-27 20:16:02', 'home', 'main', 0, 1, NULL, NULL, NULL),
(2, 0, '体育', 'sport', '2012-11-27 20:31:45', 'category', 'main', 1, 1, '_self', '', 'baidu'),
(3, 0, '数据库技术', 'database', '2012-11-27 20:31:45', 'category', 'main', 2, 1, '_self', '', ''),
(4, 0, '网络技术', 'network', '2012-11-27 20:31:45', 'category', 'main', 3, 1, '_self', NULL, NULL),
(5, 0, '服务器', 'server', '2012-11-27 20:31:45', 'category', 'main', 4, 1, '_self', '我是服务器 哈哈', NULL),
(6, 5, 'Windows Server', 'windows-server', '2012-11-27 20:31:45', 'article', 'main', 5, 1, '_self', '', ''),
(7, 5, 'Linux', 'Linux', '2012-11-27 20:31:45', 'article', 'main', 6, 1, '_self', '', ''),
(9, 0, '设计', 'design', '2012-12-04 23:38:19', 'category', 'main', 3, 1, '_self', '', ''),
(10, 0, '各种新闻', 'allnews', '2012-12-15 18:11:59', 'category', 'main', 6, 1, '_self', '我是各种新闻的集合啊', '');

-- --------------------------------------------------------

--
-- 表的结构 `kub_link`
--

CREATE TABLE IF NOT EXISTS `kub_link` (
  `linkid` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `linkindex` int(3) NOT NULL COMMENT '显示顺序',
  PRIMARY KEY (`linkid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `kub_link`
--

INSERT INTO `kub_link` (`linkid`, `title`, `url`, `linkindex`) VALUES
(1, '百度', 'http://www.baidu.com', 1),
(2, 'goole ', 'http://g.cn', 2),
(3, '网易', 'http://www.163.com', 3),
(4, '新浪', 'http://sina.com.cn', 4);

-- --------------------------------------------------------

--
-- 表的结构 `kub_user`
--

CREATE TABLE IF NOT EXISTS `kub_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `useraccount` char(32) NOT NULL,
  `password` char(32) NOT NULL,
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `telephone` varchar(64) DEFAULT NULL,
  `level` int(1) NOT NULL,
  `permission` varchar(128) DEFAULT NULL,
  `isenabled` int(1) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `UserAccount` (`useraccount`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `kub_user`
--

INSERT INTO `kub_user` (`userid`, `useraccount`, `password`, `username`, `email`, `telephone`, `level`, `permission`, `isenabled`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'tester', '179083636.com', '15267851111', 1, '2,3,4', 0),
(2, 'guest', '21232f297a57a5a743894a0e4a801fc3', 'guanlizhe3', 'yyl8781697@qq.coom', '15267851111', 0, '2,3,4', 1),
(4, 'zhangsan', 'admin123', '李四1', 'asd@11.com', '123', 0, NULL, 0);
