<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>合伙人中心</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/css/style.css" />
</head>

<body class="pb">
    <div class="m-memb">
        <div  class="top" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/images/bj2.png);padding: 12px 15px 20px;">
            <div class="head" style="margin-top:17px;">
            	<?php  if($share['avatar']) { ?>
            		<img src="<?php  echo preg_replace('/\/0$/', '/96', stripslashes($share['avatar']));?>" alt="" />
            	<?php  } else { ?>
                	<img src="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/images/head.png" alt="" />
                <?php  } ?>
            </div>
            <div class="desc">                
                <div class="txt">
									<div class="info" style="width: 100px;float: right;">
										<a href="../app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=useredit&m=tiger_newhu&pid=<?php  echo $pid;?>&uid=<?php  echo $share['id'];?>">
											<img src="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/images/install.png" alt="" class="img2" />
										</a>
									</div>
                    <h3 style="color: #fff;padding-top: 17px;"><?php  echo $share['nickname'];?>(UID:<?php  echo $share['id'];?>)<span class="sp1"><?php  echo $bl['dlname1'];?></span></h3>
										<?php  if($bl['tztype']==1) { ?>
										    
												<div style="width: 100%;height:30px;position: relative;">
													<?php  if($share['tztype']==1) { ?>
														<a href="<?php  echo $this->createMobileUrl('tzmember')?>" style="position: absolute; right: 0;top: 0;line-height: 22px;border: 1px solid #faa69d;border-radius: 5px; padding: 2px 10px 2px 10px;color: #ffffff;">团长管理</a>
													<?php  } else { ?>
														<a href="<?php  echo $this->createMobileUrl('dltzreg')?>" style="position: absolute; right: 0;top: 0;line-height: 22px;border: 1px solid #faa69d;border-radius: 5px; padding: 2px 10px 2px 10px;color: #ffffff;">团长管理</a>
													<?php  } ?>
														<p style="line-height: 30px;"><?php  if($share['qdid']) { ?>渠道ID：<?php  echo $share['qdid'];?>  &nbsp; &nbsp;<?php  } ?>邀请码：<span id="word"><?php  echo $share['yaoqingma'];?></span><em class="em1" id="copy">复制</em></p>
													</div>
										<?php  } ?>
                    
										<!-- <a href="" class="tdgl">团队管理</a> -->
                </div>
            </div>
        </div>
        <div class="money" style="margin: 0;border-radius:0 ;">
            <div class="num">
                <p class="p1">可提现金额<span><i>¥</i><?php  if($share['credit2']) { ?><?php  echo $share['credit2'];?><?php  } else { ?>0.00<?php  } ?></span></p>
                <a href="../app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=tx&m=tiger_newhu&pid=<?php  echo $pid;?>&uid=<?php  echo $share['id'];?>" class="tx">提现</a>
            </div>
            <div class="info">
                <div class="box" style="width: 50%;text-align: left;padding-left: 30px;">
					<span class="sp1" style="color: #f86900;">上月结算预估收入</span>
                    <p class="p2" style="font-size:22px;color: #000;"><i style="font-size: 14px;">¥</i><?php  echo $dldata['tb8']+$dldata['tb18']+$dldata['tb28']+$dldata['pdd8']+$dldata['pdd18']+$dldata['pdd28']+$dldata['jd8']+$dldata['jd18']+$dldata['jd28']?></p>
                    <!-- <span class="sp1" style="color: #f86900;">确认收货结算+付款订单</span> -->
                </div>               
                <div class="box" style="width: 50%;text-align: left;padding-left: 30px;">
					<span class="sp1" style="color:green;">本月付款预估收入</span>
                    <p class="p2" style="font-size: 22px;color: #000;"><i style="font-size: 14px;">¥</i><?php  echo $dldata['tb6']+$dldata['tb16']+$dldata['tb26']+$dldata['pdd6']+$dldata['pdd16']+$dldata['pdd26']+$dldata['jd6']+$dldata['jd16']+$dldata['jd26']?></p>
                    <!-- <span class="sp1" style="color: #f86900;">成交付款订单</span> -->
                </div>
				<div class="box" style="width: 50%;text-align: left;padding-left: 30px;">
					<span class="sp1" style="color: #f86900">上月付款预估收入</span>
				    <p class="p2" style="font-size:22px;color: #000;"><i style="font-size: 14px;">¥</i><?php  echo $dldata['tb10']+$dldata['tb20']+$dldata['tb30']+$dldata['pdd10']+$dldata['pdd20']+$dldata['pdd30']+$dldata['jd10']+$dldata['jd20']+$dldata['jd30']?></p>
				    <!-- <span class="sp1" style="color: #f86900;">确认收货结算+付款订单</span> -->
				</div>               
				<div class="box" style="width: 50%;text-align: left;padding-left: 30px;">
					<span class="sp1"  style="color:green">本月结算预估收入</span>
				    <p class="p2" style="font-size: 22px;color: #000;"><i style="font-size: 14px;">¥</i><?php  echo $dldata['tb32']+$dldata['tb34']+$dldata['tb36']+$dldata['pdd32']+$dldata['pdd34']+$dldata['pdd36']+$dldata['jd32']+$dldata['jd34']+$dldata['jd36']?></p>
				    <!-- <span class="sp1" style="color: #f86900;">成交付款订单</span> -->
				</div>
            </div>
            
        </div>
				<div style="width: 100%;background: #fbfbfb; line-height:20px;padding: 10px;font-size: 12px;">每月20日开始结算上月预估收入，本月预估收入则在下月20日结算</div>
        <div class="boxorder">
					  <ul class="TAB_CLICK"  id=".tab-show">
								<li class="on"><a href="javascript:void(0);">今天</a></li>
								<li><a href="javascript:void(0);">昨天</a></li>
								<li><a href="javascript:void(0);">本月</a></li>
								<li><a href="javascript:void(0);">上月</a></li>
						</ul>
						
						<!-- 今天开始 -->
						<div class="daybox tab-show on">
							<div class="toptext">今天预估成交收入： ¥ <?php  echo $dldata['tb2']+$dldata['tb12']+$dldata['tb22']+$dldata['pdd2']+$dldata['pdd12']+$dldata['pdd22']+$dldata['jd2']+$dldata['jd12']+$dldata['jd22']?></div>
							<div class="topbox">
									<div class="tbbox">
										<p>淘宝成交</p>
										<span><?php  echo $dldata['tb2']+$dldata['tb12']+$dldata['tb22']?></span>
									</div>
									<div class="pddbox">
										<p>拼多多成交</p>
										<span><?php  echo $dldata['pdd2']+$dldata['pdd12']+$dldata['pdd22']?></span>
									</div>
									<div class="jdbox">
										<p>京东成交</p>
										<span><?php  echo $dldata['jd2']+$dldata['jd12']+$dldata['jd22']?></span>
									</div>
									
									<div class="daylist">
										 <div class="tbbox2"><span class="ys1">淘宝</span>订单<br><?php  echo $dldata['tb1'];?>笔</div>
										 <div class="tbbox3"><span class="ys2">拼多多</span>订单<br><?php  echo $dldata['pdd1'];?>笔</div>
										 <div class="tbbox4"><span class="ys3">京东</span>订单<br><?php  echo $dldata['jd1'];?>笔</div>
									</div>
									
									<div class="daylist">
										<div class="tbbox2"><span class="ys1">LV1</span>(自购订单)<br><?php  echo $dldata['tb2'];?></div>
										<div class="tbbox3"><span class="ys2">LV1</span>(自购订单)<br><?php  echo $dldata['pdd2'];?></div>
										<div class="tbbox4"><span class="ys3">LV1</span>(自购订单)<br><?php  echo $dldata['jd2'];?></div>
									</div>
									
									<div class="daylist">
										<div class="tbbox2"><span class="ys1">LV2</span>(贡献订单)<br><?php  echo $dldata['tb12'];?></div>
										<div class="tbbox3"><span class="ys2">LV2</span>(贡献订单)<br><?php  echo $dldata['pdd12'];?></div>
										<div class="tbbox4"><span class="ys3">LV2</span>(贡献订单)<br><?php  echo $dldata['jd12'];?></div>
									</div>
									
									<div class="daylist">
										<div class="tbbox2"><span class="ys1">LV3</span>(贡献订单)<br><?php  echo $dldata['tb22'];?></div>
										<div class="tbbox3"><span class="ys2">LV3</span>(贡献订单)<br><?php  echo $dldata['pdd22'];?></div>
										<div class="tbbox4"><span class="ys3">LV3</span>(贡献订单)<br><?php  echo $dldata['jd22'];?></div>
									</div>
							</div>								
						</div>
						<!-- 今天结束 -->
						
						<!-- 昨天天开始 -->
						<div class="daybox tab-show" style="display: none;">
							<div class="toptext">昨天预估成交收入： ¥ <?php  echo $dldata['tb4']+$dldata['tb14']+$dldata['tb24']+$dldata['pdd4']+$dldata['pdd14']+$dldata['pdd24']+$dldata['jd4']+$dldata['jd14']+$dldata['jd24']?></div>
							<div class="topbox">
									<div class="tbbox">
										<p>淘宝成交</p>
										<span><?php  echo $dldata['tb4']+$dldata['tb14']+$dldata['tb24']?></span>
									</div>
									<div class="pddbox">
										<p>拼多多成交</p>
										<span><?php  echo $dldata['pdd4']+$dldata['pdd14']+$dldata['pdd24']?></span>
									</div>
									<div class="jdbox">
										<p>京东成交</p>
										<span><?php  echo $dldata['jd4']+$dldata['jd14']+$dldata['jd24']?></span>
									</div>
									
									<div class="daylist">
										<div class="tbbox2"><span class="ys1">淘宝</span>订单<br><?php  echo $dldata['tb3'];?>笔</div>
										<div class="tbbox3"><span class="ys2">拼多多</span>订单<br><?php  echo $dldata['pdd3'];?>笔</div>
										<div class="tbbox4"><span class="ys3">京东</span>订单<br><?php  echo $dldata['jd3'];?>笔</div>
									</div>
									
									<div class="daylist">
										<div class="tbbox2"><span class="ys1">LV1</span>(自购订单)<br><?php  echo $dldata['tb4'];?></div>
										<div class="tbbox3"><span class="ys2">LV1</span>(自购订单)<br><?php  echo $dldata['pdd4'];?></div>
										<div class="tbbox4"><span class="ys3">LV1</span>(自购订单)<br><?php  echo $dldata['jd4'];?></div>
									</div>
									
									<div class="daylist">
										<div class="tbbox2"><span class="ys1">LV2</span>(贡献订单)<br><?php  echo $dldata['tb14'];?></div>
										<div class="tbbox3"><span class="ys2">LV2</span>(贡献订单)<br><?php  echo $dldata['pdd14'];?></div>
										<div class="tbbox4"><span class="ys3">LV2</span>(贡献订单)<br><?php  echo $dldata['jd14'];?></div>
									</div>
									
									<div class="daylist">
										<div class="tbbox2"><span class="ys1">LV3</span>(贡献订单)<br><?php  echo $dldata['tb24'];?></div>
										<div class="tbbox3"><span class="ys2">LV3</span>(贡献订单)<br><?php  echo $dldata['pdd24'];?></div>
										<div class="tbbox4"><span class="ys3">LV3</span>(贡献订单)<br><?php  echo $dldata['jd24'];?></div>
									</div>
							</div>								
						</div>
						<!-- 昨天天结束 -->
						
						<!-- 本月开始 -->
						<div class="daybox tab-show"  style="display: none;">
							<div class="toptext">本月预估成交收入： ¥ <?php  echo $dldata['tb6']+$dldata['tb16']+$dldata['tb26']+$dldata['pdd6']+$dldata['pdd16']+$dldata['pdd26']+$dldata['jd6']+$dldata['jd16']+$dldata['jd26']?></div>
							<div class="topbox">
									<div class="tbbox">
										<p>淘宝成交</p>
										<span><?php  echo $dldata['tb6']+$dldata['tb16']+$dldata['tb26']?></span>
									</div>
									<div class="pddbox">
										<p>拼多多成交</p>
										<span><?php  echo $dldata['pdd6']+$dldata['pdd16']+$dldata['pdd26']?></span>
									</div>
									<div class="jdbox">
										<p>京东成交</p>
										<span><?php  echo $dldata['jd6']+$dldata['jd16']+$dldata['jd26']?></span>
									</div>
									
									<div class="daylist">
										<div class="tbbox2"><span class="ys1">淘宝</span>订单<br><?php  echo $dldata['tb5'];?>笔</div>
										<div class="tbbox3"><span class="ys2">拼多多</span>订单<br><?php  echo $dldata['pdd5'];?>笔</div>
										<div class="tbbox4"><span class="ys3">京东</span>订单<br><?php  echo $dldata['jd5'];?>笔</div>
									</div>
									
									<div class="daylist">
										<div class="tbbox2"><span class="ys1">LV1</span>(自购订单)<br><?php  echo $dldata['tb6'];?></div>
										<div class="tbbox3"><span class="ys2">LV1</span>(自购订单)<br><?php  echo $dldata['pdd6'];?></div>
										<div class="tbbox4"><span class="ys3">LV1</span>(自购订单)<br><?php  echo $dldata['jd6'];?></div>
									</div>
									
									<div class="daylist">
										<div class="tbbox2"><span class="ys1">LV2</span>(贡献订单)<br><?php  echo $dldata['tb16'];?></div>
										<div class="tbbox3"><span class="ys2">LV2</span>(贡献订单)<br><?php  echo $dldata['pdd16'];?></div>
										<div class="tbbox4"><span class="ys3">LV2</span>(贡献订单)<br><?php  echo $dldata['jd16'];?></div>
									</div>
									
									<div class="daylist">
										<div class="tbbox2"><span class="ys1">LV3</span>(贡献订单)<br><?php  echo $dldata['tb26'];?></div>
										<div class="tbbox3"><span class="ys2">LV3</span>(贡献订单)<br><?php  echo $dldata['pdd26'];?></div>
										<div class="tbbox4"><span class="ys3">LV3</span>(贡献订单)<br><?php  echo $dldata['jd26'];?></div>
									</div>
							</div>								
						</div>
						<!-- 本月结束 -->
						
						<!-- 上月开始 -->
						<div class="daybox tab-show"  style="display: none;">
							<div class="toptext">上月预估结算收入： ¥ <?php  echo $dldata['tb8']+$dldata['tb18']+$dldata['tb28']+$dldata['pdd8']+$dldata['pdd18']+$dldata['pdd28']+$dldata['jd8']+$dldata['jd18']+$dldata['jd28']?></div>
							<div class="topbox">
									<div class="tbbox">
										<p>淘宝成交</p>
										<span><?php  echo $dldata['tb8']+$dldata['tb18']+$dldata['tb28']?></span>
									</div>
									<div class="pddbox">
										<p>拼多多成交</p>
										<span><?php  echo $dldata['pdd8']+$dldata['pdd18']+$dldata['pdd28']?></span>
									</div>
									<div class="jdbox">
										<p>京东成交</p>
										<span><?php  echo $dldata['jd8']+$dldata['jd18']+$dldata['jd28']?></span>
									</div>
									
									<div class="daylist">
										<div class="tbbox2"><span class="ys1">淘宝</span>订单<br><?php  echo $dldata['tb7'];?>笔</div>
										<div class="tbbox3"><span class="ys2">拼多多</span>订单<br><?php  echo $dldata['pdd7'];?>笔</div>
										<div class="tbbox4"><span class="ys3">京东</span>订单<br><?php  echo $dldata['jd7'];?>笔</div>
									</div>
									
									<div class="daylist">
										<div class="tbbox2"><span class="ys1">LV1</span>(自购订单)<br><?php  echo $dldata['tb8'];?></div>
										<div class="tbbox3"><span class="ys2">LV1</span>(自购订单)<br><?php  echo $dldata['pdd8'];?></div>
										<div class="tbbox4"><span class="ys3">LV1</span>(自购订单)<br><?php  echo $dldata['jd8'];?></div>
									</div>
									
									<div class="daylist">
										<div class="tbbox2"><span class="ys1">LV2</span>(贡献订单)<br><?php  echo $dldata['tb18'];?></div>
										<div class="tbbox3"><span class="ys2">LV2</span>(贡献订单)<br><?php  echo $dldata['pdd18'];?></div>
										<div class="tbbox4"><span class="ys3">LV2</span>(贡献订单)<br><?php  echo $dldata['jd18'];?></div>
									</div>
									
									<div class="daylist">
										<div class="tbbox2"><span class="ys1">LV3</span>(贡献订单)<br><?php  echo $dldata['tb28'];?></div>
										<div class="tbbox3"><span class="ys2">LV3</span>(贡献订单)<br><?php  echo $dldata['pdd28'];?></div>
										<div class="tbbox4"><span class="ys3">LV3</span>(贡献订单)<br><?php  echo $dldata['jd28'];?></div>
									</div>
							</div>								
						</div>
						<!--上月结束 -->		
										
        </div>
				
				<div class="m-cent" style="margin-top:6px;">
					<div class="con3">
						<a class="a1" href="<?php  echo $this->createMobileUrl('orderlist')?>">【淘宝】订单明细</a>
						<a class="a1" href="<?php  echo $this->createMobileUrl('pddorderlist')?>">【拼多多】订单明细</a>
						<a class="a1" href="<?php  echo $this->createMobileUrl('jdorderlist')?>">【京东】订单明细</a>
						<a class="a1" href="<?php  echo $this->createMobileUrl('txlist')?>">提现记录</a>
						<a class="a1" href="<?php  echo $this->createMobileUrl('fans2',array('id'=>$share['id']))?>">我的合伙人</a>
					</div>
				</div>
			
				<style>
					.ys1{color: #ff0000;font-weight: bold;}
					.ys2{color: #eb5390;font-weight: bold;}
					.ys3{color: #523eed;font-weight: bold;}
					.boxorder{margin-top: 10px;background-color: #fff;width: 100%;height: auto;padding: 10px;}
					.boxorder li{float: left;width: 25%;text-align: center;}
					.boxorder li.on a {color: #f54c3a;border-bottom: 2px solid #ff4525;}
					.boxorder a {display: block;height: 39px;line-height: 38px;font-size: 12px;color: #565656;border-bottom: 2px solid #fff;font-size: 16px;}
					.tdgl{float: right; margin-top: 11px;  padding: 0 14px; line-height: 22px;color: #f42c15; border: 1px solid #faa69d;border-radius: 11px;}
					.daybox{width: 100%;clear: both;}
					.daybox .toptext{font-size: 16px;width: 100%;line-height: 35px;text-align: center;color: #ff0000;padding: 10px;}
					
					
					.topbox .tbbox{display: inline-block;width: 30%;background: #ff0000;text-align:center;height: 80px;border-radius: 10px;padding-top: 13px;font-size: 16px;color: #ffffff;
background-image: linear-gradient(to right, #ee8a36,#ee856b);}
					.topbox .pddbox{display: inline-block;width: 30%;background: #ff5555;text-align:center;height:80px;margin-left:3.3%;margin-right:3.3%;border-radius: 10px;padding-top: 13px;font-size: 16px;color: #ffffff;background-image: linear-gradient(to right, #ed5f99,#f7d368)}
					.topbox .jdbox{display: inline-block;width: 30%;background: #f44400;text-align:center;height: 80px;border-radius: 10px; padding-top: 13px;font-size: 16px;color: #ffffff;background-image: linear-gradient(to right, #4a37ed,#cc7bf5);}
					
					.daylist{margin-top:15px;}
					.topbox .tbbox2{display: inline-block;width: 30%;text-align:center;border-radius: 10px;padding-top: 13px;font-size: 14px;}
					.topbox .tbbox3{display: inline-block;width: 30%;text-align:center;margin-left:3.3%;margin-right:3.3%;font-size: 14px;}
					.topbox .tbbox4{display: inline-block;width: 30%;text-align:center;border-radius: 10px;padding-top: 13px;font-size: 14px;}
					
				</style>
				


						<div class="con2" style="margin-top:6px;">
								<a class="desc" href="../app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=news1&m=tiger_newhu&pid=<?php  echo $pid;?>&dluid=<?php  echo $share['id'];?>&type=1" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/images/ico9.png);">
										<p>官方公告</p>
								</a>
								<?php  if($cfg['lxddtype']==1) { ?>
								<a class="desc" href="../app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=newt&m=tiger_newhu&pid=<?php  echo $pid;?>&uid=<?php  echo $share['id'];?>" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/images/ico-my.png);">
										<p>我要拉新</p>
								</a>
								<a class="desc" href="<?php  echo $this->createMobileUrl('lxorderlist')?>" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/images/ico-lx.png);">
										<p>我的拉新订单<?php  if($cfg['lxjlrmb']) { ?> <span style="color: #ff0000;">(拉新一个奖励<?php  echo $cfg['lxjlrmb'];?>元)<?php  } ?></span></p>
								</a>
								<?php  } ?>
						</div>
        
    </div>
		
    
    <div id="kfbox">
    	<div class="kfboximg">
    		<img src="<?php  echo tomedia($cfg['kfpicurl'])?>">
    		<div class="fdclose"  onclick="kfhide()"><img src="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/images/close.png"></div>
    	</div>
    </div>
    <style>
    	#kfbox{width: 100%;position:fixed;box-sizing:border-box;top:0;background: rgba(0,0,0,.3);z-index: 99999;height:9999px;text-align: center;display: none;}
    	.kfboximg{width:100%;text-align: center;position: absolute;top: 80px;}
    	.kfboximg img{width: 60%;}
    	.fdclose{width:100%;height: 100px;text-align: center;padding-top: 20px;}
    	.fdclose img{width:44px;height:44px;}
    </style>
    
    <style>
			/* 弹窗 */
		.mbboxa{width: 100%;position:fixed;box-sizing:border-box;top:0;background: rgba(0,0,0,.3);z-index: 888;height:1280px;text-align: center}
		.tcbox{margin: 0 auto;width:80%;height:auto;background: #ffffff;position:fixed;left:10%;z-index: 99999;top:20%;border-radius: 5px}
		.tcbox .tchead{border-top-left-radius: 5px;border-top-right-radius: 5px;background: linear-gradient(90deg, #ed6e6e , #78e3f1);height:60px;font-size:20px;line-height: 60px;color: #ffffff}
		.tcbt{height:40px;line-height:40px;text-align: center;font-weight: bold;color: #ff0000;font-size:16px}
		.tcinfo{margin:0 auto;width: 80%}
		.tcinfo input{border:1px #ff0000 dashed;height:40px;line-height:40px;font-size: 16px;width: 100%;text-align:center}
		.txpric{height:90px;line-height:90px;font-size:24px;}
		.tjhj{margin-right: 10px;font-size: 30px;color: #ff0000}
		.tyj{margin-left: 10px;font-size: 30px;background: #ff0000;color: #ffffff;padding-left: 10px;padding-right: 10px;border-radius: 2px;}
		.txbot{font-size:26px;}
		.sctzbj{width:100%; height:80px;margin-top:70px;text-align: center}
		.scimg{width: 80px;height: 80px;}
		.yjbtn{width: 150px;height: 30px;height: 30px;text-align: center;margin: 0 auto;background: linear-gradient(to right, #ff4719 0%,#ff1c8f 100%);color: #ffffff;font-size: 16px;    margin-top: 15px; line-height: 30px;border-radius: 3px; display: inline-block;}
		.closebtn{position: absolute;right:-18px;top: -18px;}
		.closebtn img{width: 35px;height:35px;}
		</style>
		
			<!-- 口令弹窗 -->
			<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/js/jquery-1.7.2.min.js"></script>
			<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/clipboard.min.js"></script>
			<div class='mbboxa' id="closkl" style="display: none;">
				<div class='tcbox'>
					<div class='tchead'>渠道授权</div>
					<div class='tcxbox'>
								<div class='tcbt'>一键复制->全选->打开淘猫APP授权</div>
								<div class='tcinfo'><input  value='<?php  echo $qudaotkl;?>' type="text" id="bar"/></div>
								<div class='txbot'><div class="yjbtn" id="copy-code" data-clipboard-action="copy" data-clipboard-target="#bar">复制去授权</div></div>
					</div>  
					<div style="width:100%;text-align:left;padding-left:5px;padding-right:5px;line-height: 20px;">由于淘宝需对渠道加强精细化管理，邀请您进行淘猫的身份认证操作，届时没有进行身份认证的，将可能无法推广淘猫商品功能<br>认证成功后，刷新页面;</div>
						<div class="closebtn"><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/qtz/images/close.png"></div>
				</div> 
				
			</div>
			<script>
				jQuery(function($) {
					$('.closebtn').on('click', function(){
							$('#closkl').css('display', 'none');						
					});
	
					$('.yjbtn').on('click', function(){
						//alert(1111);			
					});
					
					if (Clipboard.isSupported()) {
							var clipboard = new Clipboard(".yjbtn");
							clipboard.on("success", function(e) {
									$(".yjbtn").css("background", "#44b549").html("复制成功");
							});
							clipboard.on("error", function(e) {
									$(".yjbtn").css("background", "red").html("复制失败");
							});
					} else {
							//$(".yjbtn").hide();
							$(".yjbtn").css("background", "red").html("手动长按复制");
					}
				});
			</script>
			<!-- 结束 -->
    
    
    <?php  if($cfg['dbcdtype']==1) { ?>
    <div class="f-nav">
        <a class="a1" href="../app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=index&m=tiger_newhu&pid=<?php  echo $pid;?>&dluid=<?php  echo $share['id'];?>">代理商城</a>
        <a class="a2" href="../app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=newcat&m=tiger_newhu&pid=<?php  echo $pid;?>&dluid=<?php  echo $share['id'];?>&hd=3">限时抢购</a>
        <a class="a3" href="<?php  echo $this->createMobileUrl('xpk')?>">商品库</a>
        <a class="a4" href="../app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=lmsearch&m=tiger_newhu&dluid=<?php  echo $share['id'];?>">超级搜</a>
        <a class="a5 on" href="<?php  echo $this->createMobileUrl('user',array('dluid'=>$dluid))?>">我的</a>
    </div>
    <?php  } ?>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/js/jquery.min.js"></script>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/js/lib.js"></script>
    <script type="text/javascript"  src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/layer/layer.js"></script>
    <script>
    	var qdtype="<?php  echo $cfg['qdtype'];?>";
    	var shareqdid="<?php  echo $share['qdid'];?>";
    	
    	if(qdtype==1){
    		if(shareqdid==0){
//  			授权渠道
				$('#closkl').css('display', 'block');	
    		}    		
    	}
		
		
		function msg(msg){
			layer.msg(msg);
		}
		function kf(){
			$("#kfbox").show();
		}
		function kfhide(){
			$("#kfbox").hide();
		}
		var uid="<?php  echo $share['id'];?>";
		pddtb();
        function pddtb(){
        	$.ajax({
                    type: "post",
                    url: "<?php  echo $this->createMobileUrl('pddtb')?>",
                    dataType: "json",
                    data: {},
                    success: function (data) {
//                  	alert(11111);
                    }
                });
        }
				
				tbyj();
				function tbyj(){
					$.ajax({
							type: "post",
							url: "<?php  echo $this->createMobileUrl('tbyj')?>",
							dataType: "json",
							data: {"uid":uid,"day":1},
							success: function (data) {
							}
					});
					$.ajax({
							type: "post",
							url: "<?php  echo $this->createMobileUrl('tbyj')?>",
							dataType: "json",
							data: {"uid":uid,"day":2},
							success: function (data) {
							}
					});
					$.ajax({
							type: "post",
							url: "<?php  echo $this->createMobileUrl('tbyj')?>",
							dataType: "json",
							data: {"uid":uid,"day":3},
							success: function (data) {
							}
					});
					$.ajax({
							type: "post",
							url: "<?php  echo $this->createMobileUrl('tbyj')?>",
							dataType: "json",
							data: {"uid":uid,"day":4},
							success: function (data) {
							}
					});
				}
				
				pddyj();
				function pddyj(){
					$.ajax({
							type: "post",
							url: "<?php  echo $this->createMobileUrl('pddyj')?>",
							dataType: "json",
							data: {"uid":uid,"day":1},
							success: function (data) {
							}
					});
					$.ajax({
							type: "post",
							url: "<?php  echo $this->createMobileUrl('pddyj')?>",
							dataType: "json",
							data: {"uid":uid,"day":2},
							success: function (data) {
							}
					});
					$.ajax({
							type: "post",
							url: "<?php  echo $this->createMobileUrl('pddyj')?>",
							dataType: "json",
							data: {"uid":uid,"day":3},
							success: function (data) {
							}
					});
					$.ajax({
							type: "post",
							url: "<?php  echo $this->createMobileUrl('pddyj')?>",
							dataType: "json",
							data: {"uid":uid,"day":4},
							success: function (data) {
							}
					});
				}
				
				jdyj();
				function jdyj(){
					$.ajax({
							type: "post",
							url: "<?php  echo $this->createMobileUrl('jdyj')?>",
							dataType: "json",
							data: {"uid":uid,"day":1},
							success: function (data) {
							}
					});
					$.ajax({
							type: "post",
							url: "<?php  echo $this->createMobileUrl('jdyj')?>",
							dataType: "json",
							data: {"uid":uid,"day":2},
							success: function (data) {
							}
					});
					$.ajax({
							type: "post",
							url: "<?php  echo $this->createMobileUrl('jdyj')?>",
							dataType: "json",
							data: {"uid":uid,"day":3},
							success: function (data) {
							}
					});
					$.ajax({
							type: "post",
							url: "<?php  echo $this->createMobileUrl('jdyj')?>",
							dataType: "json",
							data: {"uid":uid,"day":4},
							success: function (data) {
							}
					});
				}
	</script>
<script>;</script><script type="text/javascript" src="http://hztbk.wjlnfs.com/app/index.php?i=2&c=utility&a=visit&do=showjs&m=tiger_wxdaili"></script></body>

</html>