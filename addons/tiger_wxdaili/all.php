Array<?xml version="1.0" encoding="utf-8"?>
<manifest xmlns="http://www.we7.cc" versionCode="0.6,0.52">
	<application setting="true" >
		<name><![CDATA[微信淘宝客【代理系统】]]></name>
		<identifie><![CDATA[tiger_wxdaili]]></identifie>
		<version><![CDATA[2.99.76]]></version>
		<type><![CDATA[activity]]></type>
		<ability><![CDATA[微信淘宝客【代理系统】]]></ability>
		<description><![CDATA[微信淘宝客【代理系统】]]></description>
		<author><![CDATA[老虎]]></author>
		<url><![CDATA[http://bbs.we7.cc/]]></url>
	</application>
	<platform>
		<subscribes>
		</subscribes>
		<handles>
			<message type="image" />
			<message type="voice" />
			<message type="video" />
			<message type="shortvideo" />
			<message type="location" />
			<message type="link" />
			<message type="subscribe" />
			<message type="qr" />
			<message type="trace" />
			<message type="click" />
			<message type="merchant_order" />
			<message type="text" />
		</handles>
		<rule embed="true" />
		<card embed="false" />
		<supports>
			<item type="app" />
		</supports>
	</platform>
	<bindings>
		<cover>
			<entry title="搜索入口" do="search" state="" direct="" icon="" />
			<entry title="代理选品库" do="xpk" state="" direct="" icon="" />
			<entry title="代理申请入口" do="dlreg" state="" direct="" icon="" />
			<entry title="新代理入口" do="user" state="" direct="" icon="" />
		</cover>
		<menu>
			<entry title="提现审核" do="dltxsh" state="" direct="" icon="" />
			<entry title="代理支付管理" do="order" state="" direct="" icon="" />
			<entry title="代理管理" do="dlmember" state="" direct="" icon="" />
			<entry title="加群管理" do="qungl" state="" direct="" icon="" />
			<entry title="基础设置" do="dlset" state="" direct="" icon="" />
			<entry title="PC网站广告" do="ad" state="" direct="" icon="" />
			<entry title="佣金结算记录" do="yjlog" state="" direct="" icon="" />
			<entry title="手动结算" do="searchyj" state="" direct="" icon="" />
			<entry title="拼多多PID管理" do="pddpidlist" state="" direct="" icon="" />
			<entry title="京东推广位管理" do="jdpidlist" state="" direct="" icon="" />
			<entry title="淘宝PID管理" do="tbpidlist" state="" direct="" icon="" />
			<entry title="渠道ID管理" do="qudaoidlist" state="" direct="" icon="" />
			<entry title="批量佣金管理" do="plyjlist" state="" direct="" icon="" />
			<entry title="团长佣金管理" do="tzyjlist" state="" direct="" icon="" />
		</menu>
	</bindings>
	<permissions>
	</permissions>
	<install><![CDATA[
	  CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_set` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `weid` int(11) DEFAULT '0',
			`tztype` int(11) DEFAULT '0' COMMENT  '1开启',
		  `dltype` int(11) DEFAULT '3' COMMENT  '1 级 2级 3级',
		  `dlname1` varchar(100) DEFAULT NULL COMMENT  '一级名称',
		  `dlname2` varchar(100) DEFAULT NULL COMMENT  '二级名称',
		  `dlname3` varchar(100) DEFAULT NULL COMMENT  '三级名称',
		  `dlbl1` int(11) DEFAULT NULL COMMENT    '一级-自己产生佣金比率',
		  `dlbl1t2` int(11) DEFAULT NULL COMMENT  '一级-提取二级佣金比率',
		  `dlbl1t3` int(11) DEFAULT NULL COMMENT  '一级-提取三级佣金比率',
		  `dlbl2` int(11) DEFAULT NULL COMMENT    '二级-自己产生佣金比率',
		  `dlbl2t3` int(11) DEFAULT NULL COMMENT  '二级-提取三级佣金比率',
		  `dlbl3` int(11) DEFAULT NULL COMMENT    '三级-自己产生佣金比率',
		  `dlfftype` int(11) DEFAULT '0' NULL COMMENT    '0不开启 1开启',
		  `dlffprice` varchar(100) DEFAULT NULL COMMENT  '付费金额',
		  `fxtype` int(11) DEFAULT '0' NULL COMMENT    '0抽成模式 1普通分销',
		  `ddtype` int(11) DEFAULT '0' NULL COMMENT    '0全显示 1显示一部分',
		  `seartype` int(11) DEFAULT '0' NULL COMMENT    '超级搜0显示 1不显示',
		  `dlzbtype` int(11) DEFAULT '0' NULL COMMENT    '直播 1显示',
		  `fzname` varchar(100) DEFAULT NULL COMMENT  '分站名称',
		  
		  `zfmsg0` varchar(1000) DEFAULT NULL COMMENT  '支付提醒',
		  `zfmsg1` varchar(1000) DEFAULT NULL COMMENT  '一级支付提醒',
		  `zfmsg2` varchar(1000) DEFAULT NULL COMMENT  '二级支付提醒',
		  `zfmsg3` varchar(1000) DEFAULT NULL COMMENT  '三级支付提醒',

		  `level1` varchar(50) DEFAULT NULL COMMENT  '代理付费一级奖励',
		  `level2` varchar(50) DEFAULT NULL COMMENT  '代理付费二级奖励',
		  `level3` varchar(50) DEFAULT NULL COMMENT  '代理付费三级奖励',
		  `glevel1` varchar(50) DEFAULT NULL COMMENT  '代理付费固定一级奖励',
		  `glevel2` varchar(50) DEFAULT NULL COMMENT  '代理付费固定二级奖励',
		  `glevel3` varchar(50) DEFAULT NULL COMMENT  '代理付费固定三级奖励',
		  `dlkcbl` varchar(30) DEFAULT NULL COMMENT  '扣除佣金',
		  `dlyjfltype` int(3) DEFAULT '0' NULL COMMENT  '提交订单是示开启返二级 0 不开启 1开启',
		  `dlfxtype` int(11) DEFAULT '0' NULL COMMENT    '代理商是否支持提交订单反现 0 支持 1 不支持',

		  PRIMARY KEY (`id`),
		  KEY `idx_weid` (`weid`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

	  CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_qun` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `weid` int(11) DEFAULT '0',
		  `px` int(11) DEFAULT '0',
		  `type` int(1) DEFAULT '0' COMMENT  '状态1 开始',
		  `title` varchar(200) DEFAULT NULL COMMENT  '群名称',
		  `keyw` varchar(200) DEFAULT NULL COMMENT  '关键词',
		  `picurl` varchar(250) DEFAULT NULL COMMENT  '二维码',
		  `xzrs` varchar(200) DEFAULT NULL COMMENT  '上线人数',
		  `qtype` varchar(200) DEFAULT NULL COMMENT  '群类型 1微信群 QQ群2',
		  `createtime` varchar(50),
		  PRIMARY KEY (`id`),
		  KEY `weid` (`weid`),
		  KEY `keyw` (`keyw`)
	   ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;	

	   CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_qunmember` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `weid` int(11) DEFAULT '0',
		  `quntitle` varchar(200) DEFAULT 0,
		  `qunid` int(11) DEFAULT '0' COMMENT  '所属群ID',
		  `openid` varchar(50) DEFAULT 0,
		  `nickname` varchar(200) DEFAULT NULL COMMENT  '群名称',
		  `avatar` varchar(200) DEFAULT NULL,
		  `province` varchar(50),
		  `city` varchar(50),
		  `sex` varchar(50),	
		  `createtime` varchar(50),
		  PRIMARY KEY (`id`),
		  KEY `weid` (`weid`),
		  KEY `qunid` (`qunid`)
	   ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;	

	   
	   CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_ad` (
		   `id` int(11) NOT NULL AUTO_INCREMENT,
		   `weid` int(11) DEFAULT 0,
		   `type` int(11) DEFAULT 0,
		   `title` varchar(250) DEFAULT 0,
		   `pic` varchar(250) DEFAULT 0,
		   `url` varchar(250) DEFAULT 0,	
		   `createtime` int(10) NOT NULL,
		   PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;

		CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_order` (
		  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `weid` int(10) unsigned NOT NULL,
		  `ddtype` int(2) DEFAULT '0' COMMENT '订单类型，代理订单0 1团长订单',
		  `tzday` int(10) DEFAULT '0' COMMENT '团长购买天数',
		  `ffqdtype` int(2) DEFAULT '0' COMMENT '代理支付渠道',
		  `memberid` int(11) unsigned DEFAULT NULL COMMENT 'member用户ID',
		  `usernames` varchar(50) DEFAULT NULL,
		  `nickname` varchar(100) DEFAULT NULL,
		  `avatar` varchar(255) DEFAULT NULL,
		  `tel` varchar(200) DEFAULT NULL,
		  `openid` varchar(50) DEFAULT NULL COMMENT '自有OPENID',
		  `city` varchar(100) DEFAULT NULL,
		  `address` varchar(100) DEFAULT NULL,
		  `province` varchar(100) DEFAULT NULL,
		  `country` varchar(100) DEFAULT NULL,
		  `goods_id` int(10) unsigned DEFAULT NULL,
		  `orderno` varchar(50) DEFAULT NULL COMMENT '订单号',
		  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
		  `price` Decimal(10,4) DEFAULT NULL DEFAULT '0',
		  `level1` Decimal(10,4) DEFAULT NULL DEFAULT '0',
		  `level2` Decimal(10,4) DEFAULT NULL DEFAULT '0',
		  `level3` Decimal(10,4) DEFAULT NULL DEFAULT '0',
		  `state` int(2) DEFAULT '0' COMMENT '状态',
		  `paytime` int(10) unsigned DEFAULT NULL DEFAULT '0',
		  `txtime` int(10) unsigned DEFAULT NULL DEFAULT '0' COMMENT '提现时间',
		  `paystate` int(2) DEFAULT '0' COMMENT '支付状态 0 已支付1',
		  `txtype` int(2) DEFAULT '0' COMMENT '未提现 0 已提现1 审核中2',
		  `msg` varchar(200) DEFAULT NULL COMMENT '如：小虎的会员费奖励',
		  `cengji` int(2) unsigned DEFAULT NULL COMMENT '层级 自购 0  一级 1 二级2 三级3',
		  `kuaidi` varchar(200) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `weid` (`weid`),
		  KEY `openid` (openid),
		  KEY `orderno` (`orderno`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 4;

		CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_yjlog` (
		   `id` int(11) NOT NULL AUTO_INCREMENT,
		   `weid` int(11) DEFAULT 0,
		   `type` int(11) DEFAULT 0,
		   `uid` int(11) DEFAULT 0 COMMENT 'share表ID',
		   `month` varchar(20) DEFAULT NULL COMMENT '结算月份',
		   `memberid` int(11) unsigned DEFAULT NULL COMMENT 'member用户ID',
		   `nickname` varchar(100) DEFAULT NULL COMMENT '粉丝昵称',
		   `openid` varchar(100) DEFAULT NULL COMMENT '粉丝OPENID',
		   `msg` varchar(100) DEFAULT NULL  COMMENT '如：2017年2月份佣金，自动结算时间：2017-3-21',
		   `price` varchar(20) DEFAULT NULL COMMENT '提现佣金余额',
		   `createtime` int(14) NOT NULL,
		   KEY `weid` (`weid`),
		   UNIQUE KEY `openid_createtime` (`openid`,`createtime`),
		   PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;

		CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_txlog` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `weid` int(11) DEFAULT NULL,
		  `nickname` varchar(255) DEFAULT NULL COMMENT '微信用户昵称',
		  `openid` varchar(255) DEFAULT NULL COMMENT '微信用户openid',
		  `avatar` varchar(255) DEFAULT 0 COMMENT '',
		  `addtime` int(11) DEFAULT NULL COMMENT '打款时间',
		  `credit1` int(11) DEFAULT NULL COMMENT '消耗积分',
		  `credit2` varchar(100) DEFAULT NULL COMMENT '金额，分为单位',
		  `zfbuid` varchar(100) DEFAULT NULL COMMENT '支付宝帐号',
		  `dmch_billno` varchar(50) DEFAULT NULL COMMENT '生成的商户订单号',
		  `sh` tinyint(1) DEFAULT 0 COMMENT '是否打款成功 0未审核 1已审核',
		  `dresult` varchar(255) DEFAULT NULL COMMENT '失败提示',
		  `createtime` varchar(255) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;
		
		CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_tkpid` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `weid` int(11) DEFAULT '0',
		  `px` int(11) DEFAULT '0',
		  `type` int(1) DEFAULT '0' COMMENT  '状态1 已分配 ',
		  `nickname` varchar(200) DEFAULT NULL COMMENT  '分配昵称',
		  `uid` varchar(50) DEFAULT NULL COMMENT  '分配会员ID',
			`tbuid` varchar(50) DEFAULT NULL COMMENT  '淘宝ID',
		  `pid` varchar(250) DEFAULT NULL COMMENT  '淘客PID',
		  `tgwname` varchar(100) DEFAULT NULL COMMENT  '推广位名称',
		  `fptime` varchar(50) DEFAULT NULL COMMENT  '分配时间',
		  `createtime` varchar(50) COMMENT  '生成时间',
		  PRIMARY KEY (`id`),
		  KEY `weid` (`weid`),
		  KEY `pid` (`pid`),
		  KEY `uid` (`uid`)
	   ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;	
	   
	   CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_pddpid` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `weid` int(11) DEFAULT '0',
		  `px` int(11) DEFAULT '0',
		  `type` int(1) DEFAULT '0' COMMENT  '状态1 已分配 ',
		  `nickname` varchar(200) DEFAULT NULL COMMENT  '分配昵称',
		  `uid` varchar(50) DEFAULT NULL COMMENT  '分配会员ID',
		  `pid` varchar(250) DEFAULT NULL COMMENT  '淘客PID',
		  `tgwname` varchar(100) DEFAULT NULL COMMENT  '推广位名称',
		  `fptime` varchar(50) DEFAULT NULL COMMENT  '分配时间',
		  `createtime` varchar(50) COMMENT  '生成时间',
		  PRIMARY KEY (`id`),
		  KEY `weid` (`weid`),
		  KEY `pid` (`pid`),
		  KEY `uid` (`uid`)
	   ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;	
	   
	   CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_jdpid` (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`weid` int(11) DEFAULT '0',
					`px` int(11) DEFAULT '0',
					`type` int(1) DEFAULT '0' COMMENT  '状态1 已分配 ',
					`nickname` varchar(200) DEFAULT NULL COMMENT  '分配昵称',
					`uid` varchar(50) DEFAULT NULL COMMENT  '分配会员ID',
					`pid` varchar(250) DEFAULT NULL COMMENT  '淘客PID',
					`tgwname` varchar(100) DEFAULT NULL COMMENT  '推广位名称',
					`fptime` varchar(50) DEFAULT NULL COMMENT  '分配时间',
					`createtime` varchar(50) COMMENT  '生成时间',
					PRIMARY KEY (`id`),
					KEY `weid` (`weid`),
					KEY `pid` (`pid`),
					KEY `uid` (`uid`)
	   ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;	
		 
  CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_dlshuju` (
  		`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  		`weid` int(10) unsigned NOT NULL,		
  		`uid` int(11)  DEFAULT 0 COMMENT '用户ID',		 			
  		`tb1` int(11)  DEFAULT 0 COMMENT '本人-今天已付款订单数',		
  		`tb2` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`tb3` int(11)  DEFAULT 0 COMMENT '本人-昨天已付款订单',	
  		`tb4` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`tb5` int(11)  DEFAULT 0 COMMENT '本人-本月已付款订单数',	
  		`tb6` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`tb7` int(11)  DEFAULT 0 COMMENT '本人-上月已结算订单数',	
  		`tb8` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`tb9` int(11)  DEFAULT 0 COMMENT '本人-上月已付款订单数',	
  		`tb10` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`tb11` int(11)  DEFAULT 0 COMMENT '二级-今天已付款订单数',		
  		`tb12` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`tb13` int(11)  DEFAULT 0 COMMENT '二级-昨天已付款订单',	
  		`tb14` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`tb15` int(11)  DEFAULT 0 COMMENT '二级-本月已付款订单数',	
  		`tb16` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`tb17` int(11)  DEFAULT 0 COMMENT '二级-上月已结算订单数',	
  		`tb18` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`tb19` int(11)  DEFAULT 0 COMMENT '二级-上月已付款订单数',	
  		`tb20` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`tb21` int(11)  DEFAULT 0 COMMENT '三级-今天已付款订单数',		
  		`tb22` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`tb23` int(11)  DEFAULT 0 COMMENT '三级-昨天已付款订单',	
  		`tb24` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`tb25` int(11)  DEFAULT 0 COMMENT '三级-本月已付款订单数',	
  		`tb26` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`tb27` int(11)  DEFAULT 0 COMMENT '三级-上月已结算订单数',	
  		`tb28` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`tb29` int(11)  DEFAULT 0 COMMENT '三级-上月已付款订单数',	
  		`tb30` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`pdd1` int(11)  DEFAULT 0 COMMENT '本人-今天已付款订单数',		
  		`pdd2` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`pdd3` int(11)  DEFAULT 0 COMMENT '本人-昨天已付款订单',	
  		`pdd4` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`pdd5` int(11)  DEFAULT 0 COMMENT '本人-本月已付款订单数',	
  		`pdd6` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`pdd7` int(11)  DEFAULT 0 COMMENT '本人-上月已结算订单数',	
  		`pdd8` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`pdd9` int(11)  DEFAULT 0 COMMENT '本人-上月已付款订单数',	
  		`pdd10` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`pdd11` int(11)  DEFAULT 0 COMMENT '二级-今天已付款订单数',		
  		`pdd12` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`pdd13` int(11)  DEFAULT 0 COMMENT '二级-昨天已付款订单',	
  		`pdd14` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`pdd15` int(11)  DEFAULT 0 COMMENT '二级-本月已付款订单数',	
  		`pdd16` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`pdd17` int(11)  DEFAULT 0 COMMENT '二级-上月已结算订单数',	
  		`pdd18` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`pdd19` int(11)  DEFAULT 0 COMMENT '二级-上月已付款订单数',	
  		`pdd20` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`pdd21` int(11)  DEFAULT 0 COMMENT '三级-今天已付款订单数',		
  		`pdd22` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`pdd23` int(11)  DEFAULT 0 COMMENT '三级-昨天已付款订单',	
  		`pdd24` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`pdd25` int(11)  DEFAULT 0 COMMENT '三级-本月已付款订单数',	
  		`pdd26` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`pdd27` int(11)  DEFAULT 0 COMMENT '三级-上月已结算订单数',	
  		`pdd28` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`pdd29` int(11)  DEFAULT 0 COMMENT '三级-上月已付款订单数',	
  		`pdd30` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`jd1` int(11)  DEFAULT 0 COMMENT '本人-今天已付款订单数',		
  		`jd2` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`jd3` int(11)  DEFAULT 0 COMMENT '本人-昨天已付款订单',	
  		`jd4` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`jd5` int(11)  DEFAULT 0 COMMENT '本人-本月已付款订单数',	
  		`jd6` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`jd7` int(11)  DEFAULT 0 COMMENT '本人-上月已结算订单数',	
  		`jd8` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`jd9` int(11)  DEFAULT 0 COMMENT '本人-上月已付款订单数',	
  		`jd10` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`jd11` int(11)  DEFAULT 0 COMMENT '二级-今天已付款订单数',		
  		`jd12` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`jd13` int(11)  DEFAULT 0 COMMENT '二级-昨天已付款订单',	
  		`jd14` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`jd15` int(11)  DEFAULT 0 COMMENT '二级-本月已付款订单数',	
  		`jd16` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`jd17` int(11)  DEFAULT 0 COMMENT '二级-上月已结算订单数',	
  		`jd18` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`jd19` int(11)  DEFAULT 0 COMMENT '二级-上月已付款订单数',	
  		`jd20` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`jd21` int(11)  DEFAULT 0 COMMENT '三级-今天已付款订单数',		
  		`jd22` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`jd23` int(11)  DEFAULT 0 COMMENT '三级-昨天已付款订单',	
  		`jd24` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`jd25` int(11)  DEFAULT 0 COMMENT '三级-本月已付款订单数',	
  		`jd26` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`jd27` int(11)  DEFAULT 0 COMMENT '三级-上月已结算订单数',	
  		`jd28` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`jd29` int(11)  DEFAULT 0 COMMENT '三级-上月已付款订单数',	
  		`jd30` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
		
		`tb31` int(11)  DEFAULT 0 COMMENT '本人-本月已结算订单数',	
		`tb32` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已结算预估佣金数',
		
		`tb33` int(11)  DEFAULT 0 COMMENT '二级-本月已结算订单数',	
		`tb34` Decimal(10,2)  DEFAULT 0 COMMENT '二级-本月已结算预估佣金数',
		
		`tb35` int(11)  DEFAULT 0 COMMENT '三级-本月已结算订单数',	
		`tb36` Decimal(10,2)  DEFAULT 0 COMMENT '三级-本月已结算预估佣金数',
		
		`pdd31` int(11)  DEFAULT 0 COMMENT '二级-本月已结算订单数',	
		`pdd32` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已结算预估佣金数',
		
		`pdd33` int(11)  DEFAULT 0 COMMENT '二级-本月已结算订单数',	
		`pdd34` Decimal(10,2)  DEFAULT 0 COMMENT '二级-本月已结算预估佣金数',
		
		`pdd35` int(11)  DEFAULT 0 COMMENT '三级-本月已结算订单数',	
		`pdd36` Decimal(10,2)  DEFAULT 0 COMMENT '三级-本月已结算预估佣金数',
		
		`jd31` int(11)  DEFAULT 0 COMMENT '本人-本月已结算订单数',	
		`jd32` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已结算预估佣金数',
		
		`jd33` int(11)  DEFAULT 0 COMMENT '二级-本月已结算订单数',	
		`jd34` Decimal(10,2)  DEFAULT 0 COMMENT '二级-本月已结算预估佣金数',
		
		`jd35` int(11)  DEFAULT 0 COMMENT '三级-本月已结算订单数',	
		`jd36` Decimal(10,2)  DEFAULT 0 COMMENT '三级-本月已结算预估佣金数',
  		
  		`createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',		
  		PRIMARY KEY (`id`),
  		KEY `weid` (`weid`),
  		KEY `uid` (`uid`),
		UNIQUE KEY `u_w` (`uid`,`weid`)
  	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 4;
  	
  	CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_tzyjlog` (
		   `id` int(11) NOT NULL AUTO_INCREMENT,
		   `weid` int(11) DEFAULT 0,
		   `type` int(11) DEFAULT 0,
		   `uid` int(11) DEFAULT 0 COMMENT 'share表用户ID',
		   `month` int(11) DEFAULT 0 COMMENT '结算月份 201701',
		   `nickname` varchar(100) DEFAULT NULL COMMENT '粉丝昵称',
		   `openid` varchar(100) DEFAULT NULL COMMENT '粉丝OPENID',
		   `msg` varchar(100) DEFAULT NULL  COMMENT '如：数据更新时间：2017-3-21',
		   `tbbyfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '本月付款',
		   `tbsyjsprice` Decimal(10,2)  DEFAULT 0 COMMENT '上月结算',
		   `tbjrfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '今日付款',
		   `tbzrfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '昨日付款',
		   `pddbyfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '本月付款',
		   `pddsyjsprice` Decimal(10,2)  DEFAULT 0 COMMENT '上月结算',
		   `pddjrfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '今日付款',
		   `pddzrfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '昨日付款',
		   `jdbyfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '本月付款',
		   `jdsyjsprice` Decimal(10,2)  DEFAULT 0 COMMENT '上月结算',
		   `jdjrfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '今日付款',
		   `jdzrfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '昨日付款',		   
		   `createtime` int(14) NOT NULL,
		   `jstype` int(2)  DEFAULT 0 COMMENT '1已经结算',			   
		   `jstime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '结算时间',
		   `tbjsrmb` Decimal(10,2)  DEFAULT 0 COMMENT '淘宝结算金额',
		   `pddjsrmb` Decimal(10,2)  DEFAULT 0 COMMENT '拼多多结算金额',
		   `jdjsrmb` Decimal(10,2)  DEFAULT 0 COMMENT '京东结算金额',
		   KEY `weid` (`weid`),
		   KEY `uid` (`uid`),
		   KEY `month` (`month`),
		   UNIQUE KEY `uid_month` (`uid`,`month`),
		   PRIMARY KEY (`id`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8;


	]]></install>
	<uninstall><![CDATA[
	DROP TABLE IF EXISTS `ims_tiger_wxdaili_tzyjlog`;
	DROP TABLE IF EXISTS `ims_tiger_wxdaili_dlshuju`;
	DROP TABLE IF EXISTS `ims_tiger_wxdaili_qun`;
	DROP TABLE IF EXISTS `ims_tiger_wxdaili_qunmember`;
	DROP TABLE IF EXISTS `ims_tiger_wxdaili_ad`;
	DROP TABLE IF EXISTS `ims_tiger_wxdaili_set`;
	DROP TABLE IF EXISTS `ims_tiger_wxdaili_order`;	
	DROP TABLE IF EXISTS `ims_tiger_wxdaili_yjlog`;	
	DROP TABLE IF EXISTS `ims_tiger_wxdaili_txlog`;	
	DROP TABLE IF EXISTS `ims_tiger_wxdaili_tkpid`;	
	DROP TABLE IF EXISTS `ims_tiger_wxdaili_pddpid`;	
	DROP TABLE IF EXISTS `ims_tiger_wxdaili_jdpid`;
	]]></uninstall>
	<upgrade><![CDATA[upgrade.php]]></upgrade>
</manifest>Array
	  CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_set` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `weid` int(11) DEFAULT '0',
			`tztype` int(11) DEFAULT '0' COMMENT  '1开启',
		  `dltype` int(11) DEFAULT '3' COMMENT  '1 级 2级 3级',
		  `dlname1` varchar(100) DEFAULT NULL COMMENT  '一级名称',
		  `dlname2` varchar(100) DEFAULT NULL COMMENT  '二级名称',
		  `dlname3` varchar(100) DEFAULT NULL COMMENT  '三级名称',
		  `dlbl1` int(11) DEFAULT NULL COMMENT    '一级-自己产生佣金比率',
		  `dlbl1t2` int(11) DEFAULT NULL COMMENT  '一级-提取二级佣金比率',
		  `dlbl1t3` int(11) DEFAULT NULL COMMENT  '一级-提取三级佣金比率',
		  `dlbl2` int(11) DEFAULT NULL COMMENT    '二级-自己产生佣金比率',
		  `dlbl2t3` int(11) DEFAULT NULL COMMENT  '二级-提取三级佣金比率',
		  `dlbl3` int(11) DEFAULT NULL COMMENT    '三级-自己产生佣金比率',
		  `dlfftype` int(11) DEFAULT '0' NULL COMMENT    '0不开启 1开启',
		  `dlffprice` varchar(100) DEFAULT NULL COMMENT  '付费金额',
		  `fxtype` int(11) DEFAULT '0' NULL COMMENT    '0抽成模式 1普通分销',
		  `ddtype` int(11) DEFAULT '0' NULL COMMENT    '0全显示 1显示一部分',
		  `seartype` int(11) DEFAULT '0' NULL COMMENT    '超级搜0显示 1不显示',
		  `dlzbtype` int(11) DEFAULT '0' NULL COMMENT    '直播 1显示',
		  `fzname` varchar(100) DEFAULT NULL COMMENT  '分站名称',
		  
		  `zfmsg0` varchar(1000) DEFAULT NULL COMMENT  '支付提醒',
		  `zfmsg1` varchar(1000) DEFAULT NULL COMMENT  '一级支付提醒',
		  `zfmsg2` varchar(1000) DEFAULT NULL COMMENT  '二级支付提醒',
		  `zfmsg3` varchar(1000) DEFAULT NULL COMMENT  '三级支付提醒',

		  `level1` varchar(50) DEFAULT NULL COMMENT  '代理付费一级奖励',
		  `level2` varchar(50) DEFAULT NULL COMMENT  '代理付费二级奖励',
		  `level3` varchar(50) DEFAULT NULL COMMENT  '代理付费三级奖励',
		  `glevel1` varchar(50) DEFAULT NULL COMMENT  '代理付费固定一级奖励',
		  `glevel2` varchar(50) DEFAULT NULL COMMENT  '代理付费固定二级奖励',
		  `glevel3` varchar(50) DEFAULT NULL COMMENT  '代理付费固定三级奖励',
		  `dlkcbl` varchar(30) DEFAULT NULL COMMENT  '扣除佣金',
		  `dlyjfltype` int(3) DEFAULT '0' NULL COMMENT  '提交订单是示开启返二级 0 不开启 1开启',
		  `dlfxtype` int(11) DEFAULT '0' NULL COMMENT    '代理商是否支持提交订单反现 0 支持 1 不支持',

		  PRIMARY KEY (`id`),
		  KEY `idx_weid` (`weid`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

	  CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_qun` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `weid` int(11) DEFAULT '0',
		  `px` int(11) DEFAULT '0',
		  `type` int(1) DEFAULT '0' COMMENT  '状态1 开始',
		  `title` varchar(200) DEFAULT NULL COMMENT  '群名称',
		  `keyw` varchar(200) DEFAULT NULL COMMENT  '关键词',
		  `picurl` varchar(250) DEFAULT NULL COMMENT  '二维码',
		  `xzrs` varchar(200) DEFAULT NULL COMMENT  '上线人数',
		  `qtype` varchar(200) DEFAULT NULL COMMENT  '群类型 1微信群 QQ群2',
		  `createtime` varchar(50),
		  PRIMARY KEY (`id`),
		  KEY `weid` (`weid`),
		  KEY `keyw` (`keyw`)
	   ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;	

	   CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_qunmember` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `weid` int(11) DEFAULT '0',
		  `quntitle` varchar(200) DEFAULT 0,
		  `qunid` int(11) DEFAULT '0' COMMENT  '所属群ID',
		  `openid` varchar(50) DEFAULT 0,
		  `nickname` varchar(200) DEFAULT NULL COMMENT  '群名称',
		  `avatar` varchar(200) DEFAULT NULL,
		  `province` varchar(50),
		  `city` varchar(50),
		  `sex` varchar(50),	
		  `createtime` varchar(50),
		  PRIMARY KEY (`id`),
		  KEY `weid` (`weid`),
		  KEY `qunid` (`qunid`)
	   ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;	

	   
	   CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_ad` (
		   `id` int(11) NOT NULL AUTO_INCREMENT,
		   `weid` int(11) DEFAULT 0,
		   `type` int(11) DEFAULT 0,
		   `title` varchar(250) DEFAULT 0,
		   `pic` varchar(250) DEFAULT 0,
		   `url` varchar(250) DEFAULT 0,	
		   `createtime` int(10) NOT NULL,
		   PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;

		CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_order` (
		  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `weid` int(10) unsigned NOT NULL,
		  `ddtype` int(2) DEFAULT '0' COMMENT '订单类型，代理订单0 1团长订单',
		  `tzday` int(10) DEFAULT '0' COMMENT '团长购买天数',
		  `ffqdtype` int(2) DEFAULT '0' COMMENT '代理支付渠道',
		  `memberid` int(11) unsigned DEFAULT NULL COMMENT 'member用户ID',
		  `usernames` varchar(50) DEFAULT NULL,
		  `nickname` varchar(100) DEFAULT NULL,
		  `avatar` varchar(255) DEFAULT NULL,
		  `tel` varchar(200) DEFAULT NULL,
		  `openid` varchar(50) DEFAULT NULL COMMENT '自有OPENID',
		  `city` varchar(100) DEFAULT NULL,
		  `address` varchar(100) DEFAULT NULL,
		  `province` varchar(100) DEFAULT NULL,
		  `country` varchar(100) DEFAULT NULL,
		  `goods_id` int(10) unsigned DEFAULT NULL,
		  `orderno` varchar(50) DEFAULT NULL COMMENT '订单号',
		  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
		  `price` Decimal(10,4) DEFAULT NULL DEFAULT '0',
		  `level1` Decimal(10,4) DEFAULT NULL DEFAULT '0',
		  `level2` Decimal(10,4) DEFAULT NULL DEFAULT '0',
		  `level3` Decimal(10,4) DEFAULT NULL DEFAULT '0',
		  `state` int(2) DEFAULT '0' COMMENT '状态',
		  `paytime` int(10) unsigned DEFAULT NULL DEFAULT '0',
		  `txtime` int(10) unsigned DEFAULT NULL DEFAULT '0' COMMENT '提现时间',
		  `paystate` int(2) DEFAULT '0' COMMENT '支付状态 0 已支付1',
		  `txtype` int(2) DEFAULT '0' COMMENT '未提现 0 已提现1 审核中2',
		  `msg` varchar(200) DEFAULT NULL COMMENT '如：小虎的会员费奖励',
		  `cengji` int(2) unsigned DEFAULT NULL COMMENT '层级 自购 0  一级 1 二级2 三级3',
		  `kuaidi` varchar(200) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `weid` (`weid`),
		  KEY `openid` (openid),
		  KEY `orderno` (`orderno`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 4;

		CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_yjlog` (
		   `id` int(11) NOT NULL AUTO_INCREMENT,
		   `weid` int(11) DEFAULT 0,
		   `type` int(11) DEFAULT 0,
		   `uid` int(11) DEFAULT 0 COMMENT 'share表ID',
		   `month` varchar(20) DEFAULT NULL COMMENT '结算月份',
		   `memberid` int(11) unsigned DEFAULT NULL COMMENT 'member用户ID',
		   `nickname` varchar(100) DEFAULT NULL COMMENT '粉丝昵称',
		   `openid` varchar(100) DEFAULT NULL COMMENT '粉丝OPENID',
		   `msg` varchar(100) DEFAULT NULL  COMMENT '如：2017年2月份佣金，自动结算时间：2017-3-21',
		   `price` varchar(20) DEFAULT NULL COMMENT '提现佣金余额',
		   `createtime` int(14) NOT NULL,
		   KEY `weid` (`weid`),
		   UNIQUE KEY `openid_createtime` (`openid`,`createtime`),
		   PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;

		CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_txlog` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `weid` int(11) DEFAULT NULL,
		  `nickname` varchar(255) DEFAULT NULL COMMENT '微信用户昵称',
		  `openid` varchar(255) DEFAULT NULL COMMENT '微信用户openid',
		  `avatar` varchar(255) DEFAULT 0 COMMENT '',
		  `addtime` int(11) DEFAULT NULL COMMENT '打款时间',
		  `credit1` int(11) DEFAULT NULL COMMENT '消耗积分',
		  `credit2` varchar(100) DEFAULT NULL COMMENT '金额，分为单位',
		  `zfbuid` varchar(100) DEFAULT NULL COMMENT '支付宝帐号',
		  `dmch_billno` varchar(50) DEFAULT NULL COMMENT '生成的商户订单号',
		  `sh` tinyint(1) DEFAULT 0 COMMENT '是否打款成功 0未审核 1已审核',
		  `dresult` varchar(255) DEFAULT NULL COMMENT '失败提示',
		  `createtime` varchar(255) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;
		
		CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_tkpid` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `weid` int(11) DEFAULT '0',
		  `px` int(11) DEFAULT '0',
		  `type` int(1) DEFAULT '0' COMMENT  '状态1 已分配 ',
		  `nickname` varchar(200) DEFAULT NULL COMMENT  '分配昵称',
		  `uid` varchar(50) DEFAULT NULL COMMENT  '分配会员ID',
			`tbuid` varchar(50) DEFAULT NULL COMMENT  '淘宝ID',
		  `pid` varchar(250) DEFAULT NULL COMMENT  '淘客PID',
		  `tgwname` varchar(100) DEFAULT NULL COMMENT  '推广位名称',
		  `fptime` varchar(50) DEFAULT NULL COMMENT  '分配时间',
		  `createtime` varchar(50) COMMENT  '生成时间',
		  PRIMARY KEY (`id`),
		  KEY `weid` (`weid`),
		  KEY `pid` (`pid`),
		  KEY `uid` (`uid`)
	   ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;	
	   
	   CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_pddpid` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `weid` int(11) DEFAULT '0',
		  `px` int(11) DEFAULT '0',
		  `type` int(1) DEFAULT '0' COMMENT  '状态1 已分配 ',
		  `nickname` varchar(200) DEFAULT NULL COMMENT  '分配昵称',
		  `uid` varchar(50) DEFAULT NULL COMMENT  '分配会员ID',
		  `pid` varchar(250) DEFAULT NULL COMMENT  '淘客PID',
		  `tgwname` varchar(100) DEFAULT NULL COMMENT  '推广位名称',
		  `fptime` varchar(50) DEFAULT NULL COMMENT  '分配时间',
		  `createtime` varchar(50) COMMENT  '生成时间',
		  PRIMARY KEY (`id`),
		  KEY `weid` (`weid`),
		  KEY `pid` (`pid`),
		  KEY `uid` (`uid`)
	   ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;	
	   
	   CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_jdpid` (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`weid` int(11) DEFAULT '0',
					`px` int(11) DEFAULT '0',
					`type` int(1) DEFAULT '0' COMMENT  '状态1 已分配 ',
					`nickname` varchar(200) DEFAULT NULL COMMENT  '分配昵称',
					`uid` varchar(50) DEFAULT NULL COMMENT  '分配会员ID',
					`pid` varchar(250) DEFAULT NULL COMMENT  '淘客PID',
					`tgwname` varchar(100) DEFAULT NULL COMMENT  '推广位名称',
					`fptime` varchar(50) DEFAULT NULL COMMENT  '分配时间',
					`createtime` varchar(50) COMMENT  '生成时间',
					PRIMARY KEY (`id`),
					KEY `weid` (`weid`),
					KEY `pid` (`pid`),
					KEY `uid` (`uid`)
	   ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;	
		 
  CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_dlshuju` (
  		`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  		`weid` int(10) unsigned NOT NULL,		
  		`uid` int(11)  DEFAULT 0 COMMENT '用户ID',		 			
  		`tb1` int(11)  DEFAULT 0 COMMENT '本人-今天已付款订单数',		
  		`tb2` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`tb3` int(11)  DEFAULT 0 COMMENT '本人-昨天已付款订单',	
  		`tb4` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`tb5` int(11)  DEFAULT 0 COMMENT '本人-本月已付款订单数',	
  		`tb6` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`tb7` int(11)  DEFAULT 0 COMMENT '本人-上月已结算订单数',	
  		`tb8` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`tb9` int(11)  DEFAULT 0 COMMENT '本人-上月已付款订单数',	
  		`tb10` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`tb11` int(11)  DEFAULT 0 COMMENT '二级-今天已付款订单数',		
  		`tb12` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`tb13` int(11)  DEFAULT 0 COMMENT '二级-昨天已付款订单',	
  		`tb14` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`tb15` int(11)  DEFAULT 0 COMMENT '二级-本月已付款订单数',	
  		`tb16` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`tb17` int(11)  DEFAULT 0 COMMENT '二级-上月已结算订单数',	
  		`tb18` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`tb19` int(11)  DEFAULT 0 COMMENT '二级-上月已付款订单数',	
  		`tb20` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`tb21` int(11)  DEFAULT 0 COMMENT '三级-今天已付款订单数',		
  		`tb22` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`tb23` int(11)  DEFAULT 0 COMMENT '三级-昨天已付款订单',	
  		`tb24` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`tb25` int(11)  DEFAULT 0 COMMENT '三级-本月已付款订单数',	
  		`tb26` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`tb27` int(11)  DEFAULT 0 COMMENT '三级-上月已结算订单数',	
  		`tb28` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`tb29` int(11)  DEFAULT 0 COMMENT '三级-上月已付款订单数',	
  		`tb30` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`pdd1` int(11)  DEFAULT 0 COMMENT '本人-今天已付款订单数',		
  		`pdd2` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`pdd3` int(11)  DEFAULT 0 COMMENT '本人-昨天已付款订单',	
  		`pdd4` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`pdd5` int(11)  DEFAULT 0 COMMENT '本人-本月已付款订单数',	
  		`pdd6` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`pdd7` int(11)  DEFAULT 0 COMMENT '本人-上月已结算订单数',	
  		`pdd8` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`pdd9` int(11)  DEFAULT 0 COMMENT '本人-上月已付款订单数',	
  		`pdd10` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`pdd11` int(11)  DEFAULT 0 COMMENT '二级-今天已付款订单数',		
  		`pdd12` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`pdd13` int(11)  DEFAULT 0 COMMENT '二级-昨天已付款订单',	
  		`pdd14` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`pdd15` int(11)  DEFAULT 0 COMMENT '二级-本月已付款订单数',	
  		`pdd16` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`pdd17` int(11)  DEFAULT 0 COMMENT '二级-上月已结算订单数',	
  		`pdd18` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`pdd19` int(11)  DEFAULT 0 COMMENT '二级-上月已付款订单数',	
  		`pdd20` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`pdd21` int(11)  DEFAULT 0 COMMENT '三级-今天已付款订单数',		
  		`pdd22` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`pdd23` int(11)  DEFAULT 0 COMMENT '三级-昨天已付款订单',	
  		`pdd24` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`pdd25` int(11)  DEFAULT 0 COMMENT '三级-本月已付款订单数',	
  		`pdd26` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`pdd27` int(11)  DEFAULT 0 COMMENT '三级-上月已结算订单数',	
  		`pdd28` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`pdd29` int(11)  DEFAULT 0 COMMENT '三级-上月已付款订单数',	
  		`pdd30` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`jd1` int(11)  DEFAULT 0 COMMENT '本人-今天已付款订单数',		
  		`jd2` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`jd3` int(11)  DEFAULT 0 COMMENT '本人-昨天已付款订单',	
  		`jd4` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`jd5` int(11)  DEFAULT 0 COMMENT '本人-本月已付款订单数',	
  		`jd6` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`jd7` int(11)  DEFAULT 0 COMMENT '本人-上月已结算订单数',	
  		`jd8` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`jd9` int(11)  DEFAULT 0 COMMENT '本人-上月已付款订单数',	
  		`jd10` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`jd11` int(11)  DEFAULT 0 COMMENT '二级-今天已付款订单数',		
  		`jd12` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`jd13` int(11)  DEFAULT 0 COMMENT '二级-昨天已付款订单',	
  		`jd14` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`jd15` int(11)  DEFAULT 0 COMMENT '二级-本月已付款订单数',	
  		`jd16` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`jd17` int(11)  DEFAULT 0 COMMENT '二级-上月已结算订单数',	
  		`jd18` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`jd19` int(11)  DEFAULT 0 COMMENT '二级-上月已付款订单数',	
  		`jd20` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
  		
  		`jd21` int(11)  DEFAULT 0 COMMENT '三级-今天已付款订单数',		
  		`jd22` Decimal(10,2)  DEFAULT 0 COMMENT '本人-今天已付款佣预估金数',	
  		
  		`jd23` int(11)  DEFAULT 0 COMMENT '三级-昨天已付款订单',	
  		`jd24` Decimal(10,2)  DEFAULT 0 COMMENT '本人-昨天已付款预估佣金数',	
  		
  		`jd25` int(11)  DEFAULT 0 COMMENT '三级-本月已付款订单数',	
  		`jd26` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已付款预估佣金数',	
  		
  		`jd27` int(11)  DEFAULT 0 COMMENT '三级-上月已结算订单数',	
  		`jd28` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已结算预估佣金数',
  		
  		`jd29` int(11)  DEFAULT 0 COMMENT '三级-上月已付款订单数',	
  		`jd30` Decimal(10,2)  DEFAULT 0 COMMENT '本人-上月已付款预估佣金数',
		
		`tb31` int(11)  DEFAULT 0 COMMENT '本人-本月已结算订单数',	
		`tb32` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已结算预估佣金数',
		
		`tb33` int(11)  DEFAULT 0 COMMENT '二级-本月已结算订单数',	
		`tb34` Decimal(10,2)  DEFAULT 0 COMMENT '二级-本月已结算预估佣金数',
		
		`tb35` int(11)  DEFAULT 0 COMMENT '三级-本月已结算订单数',	
		`tb36` Decimal(10,2)  DEFAULT 0 COMMENT '三级-本月已结算预估佣金数',
		
		`pdd31` int(11)  DEFAULT 0 COMMENT '二级-本月已结算订单数',	
		`pdd32` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已结算预估佣金数',
		
		`pdd33` int(11)  DEFAULT 0 COMMENT '二级-本月已结算订单数',	
		`pdd34` Decimal(10,2)  DEFAULT 0 COMMENT '二级-本月已结算预估佣金数',
		
		`pdd35` int(11)  DEFAULT 0 COMMENT '三级-本月已结算订单数',	
		`pdd36` Decimal(10,2)  DEFAULT 0 COMMENT '三级-本月已结算预估佣金数',
		
		`jd31` int(11)  DEFAULT 0 COMMENT '本人-本月已结算订单数',	
		`jd32` Decimal(10,2)  DEFAULT 0 COMMENT '本人-本月已结算预估佣金数',
		
		`jd33` int(11)  DEFAULT 0 COMMENT '二级-本月已结算订单数',	
		`jd34` Decimal(10,2)  DEFAULT 0 COMMENT '二级-本月已结算预估佣金数',
		
		`jd35` int(11)  DEFAULT 0 COMMENT '三级-本月已结算订单数',	
		`jd36` Decimal(10,2)  DEFAULT 0 COMMENT '三级-本月已结算预估佣金数',
  		
  		`createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',		
  		PRIMARY KEY (`id`),
  		KEY `weid` (`weid`),
  		KEY `uid` (`uid`),
		UNIQUE KEY `u_w` (`uid`,`weid`)
  	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT = 4;
  	
  	CREATE TABLE IF NOT EXISTS `ims_tiger_wxdaili_tzyjlog` (
		   `id` int(11) NOT NULL AUTO_INCREMENT,
		   `weid` int(11) DEFAULT 0,
		   `type` int(11) DEFAULT 0,
		   `uid` int(11) DEFAULT 0 COMMENT 'share表用户ID',
		   `month` int(11) DEFAULT 0 COMMENT '结算月份 201701',
		   `nickname` varchar(100) DEFAULT NULL COMMENT '粉丝昵称',
		   `openid` varchar(100) DEFAULT NULL COMMENT '粉丝OPENID',
		   `msg` varchar(100) DEFAULT NULL  COMMENT '如：数据更新时间：2017-3-21',
		   `tbbyfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '本月付款',
		   `tbsyjsprice` Decimal(10,2)  DEFAULT 0 COMMENT '上月结算',
		   `tbjrfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '今日付款',
		   `tbzrfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '昨日付款',
		   `pddbyfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '本月付款',
		   `pddsyjsprice` Decimal(10,2)  DEFAULT 0 COMMENT '上月结算',
		   `pddjrfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '今日付款',
		   `pddzrfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '昨日付款',
		   `jdbyfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '本月付款',
		   `jdsyjsprice` Decimal(10,2)  DEFAULT 0 COMMENT '上月结算',
		   `jdjrfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '今日付款',
		   `jdzrfkprice` Decimal(10,2)  DEFAULT 0 COMMENT '昨日付款',		   
		   `createtime` int(14) NOT NULL,
		   `jstype` int(2)  DEFAULT 0 COMMENT '1已经结算',			   
		   `jstime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '结算时间',
		   `tbjsrmb` Decimal(10,2)  DEFAULT 0 COMMENT '淘宝结算金额',
		   `pddjsrmb` Decimal(10,2)  DEFAULT 0 COMMENT '拼多多结算金额',
		   `jdjsrmb` Decimal(10,2)  DEFAULT 0 COMMENT '京东结算金额',
		   KEY `weid` (`weid`),
		   KEY `uid` (`uid`),
		   KEY `month` (`month`),
		   UNIQUE KEY `uid_month` (`uid`,`month`),
		   PRIMARY KEY (`id`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8;


	d099e6de1cd88bdeb3bc91988a9d5180