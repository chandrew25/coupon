<?php
$installSql = <<<sql
CREATE TABLE IF NOT EXISTS `ims_tuike_jd_jdset` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`weid` int(11) DEFAULT '0',
`appkey` varchar(200),
`appsecret` varchar(200),
`jduid` varchar(50),
`jdpid` varchar(50),
`unionid` varchar(50),
`jdkey` varchar(200),
`createtime` int(10) NOT NULL,
PRIMARY KEY (`id`),
KEY `weid` (`weid`),
KEY `jduid` (`jduid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_tuike_jd_jdsign` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`weid` int(11) DEFAULT '0',
`access_token` varchar(100),
`code` varchar(100),
`refresh_token` varchar(50),
`time` varchar(50),
`token_type` varchar(50),
`uid` varchar(50),
`user_nick` varchar(50),
`createtime` int(10) NOT NULL,
`expires_in` varchar(50),
PRIMARY KEY (`id`),
KEY `weid` (`weid`),
KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

sql;
$row = pdo_run($installSql);