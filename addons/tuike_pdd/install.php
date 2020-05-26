<?php
$installSql = <<<sql
CREATE TABLE IF NOT EXISTS `ims_tuike_pdd_pddsign` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`weid` int(11) DEFAULT '0',
`access_token` varchar(100) COMMENT '结束时间',
`expires_in` varchar(100) COMMENT 'Access_Token过期时间',
`refresh_token` varchar(50) COMMENT '可用来刷新access_token',
`scope` text COMMENT '授权接口范围',
`owner_id` varchar(50) COMMENT '拼多多店铺ID',
`owner_name` varchar(50) COMMENT '拼多多店铺账号名',
`endtime` varchar(30) COMMENT '结束时间',
`client_id` varchar(100) COMMENT 'client_id',
`createtime` int(10) NOT NULL,
PRIMARY KEY (`id`),
KEY `weid` (`weid`),
KEY `client_id` (`client_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_tuike_pdd_set` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`weid` int(11) DEFAULT '0',
`pddpid` varchar(100) COMMENT '默认推广位',
`client_id` varchar(100),
`ddjbbuid` varchar(100),
`client_secret` varchar(50),
`createtime` int(10) NOT NULL,
PRIMARY KEY (`id`),
KEY `weid` (`weid`),
KEY `ddjbbuid` (`ddjbbuid`),
KEY `pddpid` (`pddpid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

sql;
$row = pdo_run($installSql);