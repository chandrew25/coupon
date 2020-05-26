<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>会员中心</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/style.css" />
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/layer.css" />
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/jquery.js"></script>
    <script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/clipboard.min.js"></script>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/layer.js"></script>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/lib.js"></script>
</head>

<body class="body-idx">
    <div class="header-com">
        <div class="l">
            <a href="javascript:void(0);" onclick="history.go(-1);" class="back" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/h-back2.png);"></a>
        </div>
        <div class="r">
            <a href="<?php  echo $this->createMobileUrl('useredit',array('uid'=>$member['id'],'dluid'=>$dluid))?>" class="set" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/h-set.png);"></a>
        </div>
        <div class="ovh">会员中心</div>
    </div>
    <!-- 首页底部 -->
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/footer-idx.css">
    <!-- 首页底部 end-->
    <!-- 用户信息 -->
    <div class="m-ht11" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/ban2.jpg);">
        <div class="wp">
            <div class="user">
                <div class="pic">
					<?php  if($member['avatar']) { ?>
						<img src="<?php  echo $member['avatar'];?>" >
					<?php  } else { ?>
						<img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/user/images/tx001.png">
					<?php  } ?>
					</div>
                <div class="txt">
                    <div class="name">
                        <a href=""><?php  echo $fans['nickname'];?>(UID:<?php  echo $member['id'];?>)</a>
						<?php  if($member['dltype']==1) { ?>
                           <?php  if($member['tztype']==1) { ?>
								<em class="vip" style="background: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/tuanzhang.png) center center no-repeat;background-size: contain;"></em>
							<?php  } else { ?>
								<em class="vip" style="background: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hehuoren.png) center center no-repeat;background-size: contain;"></em>
							<?php  } ?>
						<?php  } else { ?>
							<em class="vip" style="background: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/putong.png) center center no-repeat;background-size: contain;"></em>
						<?php  } ?>						
                    </div>
                    <div class="copy2">
                        <span>邀请码：<i id="js-text1" style="font-style: normal;"><?php  echo $member['yaoqingma'];?></i></span>
                        <a href="javascript:;" class="copy-p2" data-clipboard-action="copy" data-clipboard-target="#js-text1">复制</a>
                    </div>
                </div>
            </div>
            <div class="num">
                <div class="jf"><?php  if($cfg['hztype']) { ?><?php  echo $cfg['hztype'];?><?php  } else { ?>积分<?php  } ?>：<?php  if($member['credit1']) { ?><?php  echo intval($member['credit1'])?><?php  } else { ?>0<?php  } ?></div>
                <div class="fs">粉丝数 <?php  if($contfans) { ?><?php  echo $contfans;?><?php  } else { ?>0<?php  } ?></div>
            </div>
        </div>
    </div>
	
    <!-- 余额 -->
    <div class="wp">
        <div class="m-ht12">
            <div class="top" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/bg6.png);">
                <a href="<?php  echo $this->createMobileUrl('tx',array('uid'=>$member['id'],'dluid'=>$dluid))?>" class="tx">立即提现</a>
                <div class="yue">
                    <div class="s1" style="    font-size: 18px;line-height: 35px;"> <span>￥<?php  if($member['credit2']) { ?><?php  echo $member['credit2'];?><?php  } else { ?>0.00<?php  } ?></span> <?php  if($cfg['yetype']) { ?><?php  echo $cfg['yetype'];?><?php  } else { ?>元<?php  } ?></div>
                    <!-- <div class="s2">每月25号-30号可提现</div> -->
                </div>
            </div>
						<?php  if($cfg['mftype']==1) { ?>
            <div class="bot">
                <div class="s">
                    <div class="t">
                        <div class="num"><sub>￥</sub><?php  echo $bydfygorder;?></div>
                        <p>本月待处理预估</p>
                    </div>
                    <div class="desc">本月待处理订单：<span><?php  echo $bydforder;?>单</span></div>
                </div>
                <div class="s">
                    <div class="t">
                        <div class="num"><sub>￥</sub><?php  echo $sydfygorder;?></div>
                        <p>上月结算预估</p>
                    </div>
                    <div class="desc">上月结算订单：<span><?php  echo $sydforder;?>单</span></div>
                </div>
            </div>
						<?php  } else { ?>
						<div class="bot"><div class="s">&nbsp;</div></div>
						<?php  } ?>
        </div>
		
		<?php  if($lblist) { ?>
        <!-- banner -->
        <div class="h-ban6-o">
            <div class="h-ban6">
                <div class="swiper-wrapper">
					<?php  if(is_array($lblist)) { foreach($lblist as $v) { ?>
                    <div class="swiper-slide">
                        <div class="pic">
                            <a href="<?php  echo $v['wlurl'];?>&dluid=<?php  echo $dluid;?>">
                                <img src="<?php  echo tomedia($v['picurl'])?>" alt="">
                            </a>
                        </div>
                    </div>
					<?php  } } ?>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
		<?php  } ?>
		<?php  if($cfg['mftype']==1) { ?>
        <!-- 我的订单 -->
        <div class="m-ht13">
            <h3 class="tit">我的订单</h3>
            <ul class="ul-ht13">
                <li>
                    <a href="<?php  echo $this->createMobileUrl('addorder',array('op'=>'add','dluid'=>$dluid))?>">
                        <i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/he1.png);"></i>
                        <h4 class="tit">添加订单</h4>
                    </a>
                </li>
                <li>
                    <a href="<?php  echo $this->createMobileUrl('orderlist',array('op'=>'qb','dluid'=>$dluid))?>">
                        <i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/he2.png);"></i>
                        <h4 class="tit">全部订单</h4>
                    </a>
                </li>
                <li>
                    <a href="<?php  echo $this->createMobileUrl('orderlist',array('op'=>'df','dluid'=>$dluid))?>">
                        <i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/he3.png);"></i>
                        <h4 class="tit">待处理</h4>
                    </a>
                </li>
                <li>
                    <a href="<?php  echo $this->createMobileUrl('orderlist',array('op'=>'yf','dluid'=>$dluid))?>">
                        <i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/he4.png);"></i>
                        <h4 class="tit">已处理</h4>
                    </a>
                </li>
            </ul>
        </div>
		<?php  } ?>
		<?php  if($cfg['mfhhtype']==1) { ?>
		<!-- 合伙人管理 -->
		<?php  if($member['dltype']==1) { ?>
		<div class="m-ht13">
				<h3 class="tit">合伙人管理</h3>
				<ul class="ul-ht14">
						<li>
								<a href="<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=user&m=tiger_wxdaili">
										<i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/dl1.png);"></i>
										<div class="txt">
												<h4 class="tit">我的收益</h4>
										</div>
								</a>
						</li>
						<li>
								<a href="<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=xpk&m=tiger_wxdaili">
										<i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/dl2.png);"></i>
										<div class="txt">
												<h4 class="tit">商品库</h4>
										</div>
								</a>
						</li>
						<li>
								<a href="<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=orderlist&m=tiger_wxdaili">
										<i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/dl3.png);"></i>
										<div class="txt">
												<h4 class="tit">我的订单</h4>
										</div>
								</a>
						</li>
				</ul>
		</div>
		<?php  } else { ?>
		<div class="m-ht13">
				<h3 class="tit">成为合伙人</h3>
				<ul class="ul-ht14">
					<a href="<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=dlreg&m=tiger_wxdaili">
						<div style="width: 100%;font-size: 16px;text-align: center;color: #ff0000;">申请成为合伙人</div>
					</a>
				</ul>
		</div>
		<?php  } ?>
		<?php  } ?>
        <!-- 会员专享 -->
        <div class="m-ht13">
            <h3 class="tit">会员专享</h3>
            <ul class="ul-ht14">
                <li>
                    <a href="<?php  echo $this->createMobileUrl('cjdej1111',array('dluid'=>$dluid))?>">
                        <i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hr1.png);"></i>
                        <div class="txt">
                            <h4 class="tit">大额优惠券</h4>
                            <span>超值上百券</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="./index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=hongbao&m=tuike_pdd">
                        <i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hr2.png);"></i>
                        <div class="txt">
                            <h4 class="tit">多多红包</h4>
                            <span>红包免费拿</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php  echo $this->createMobileUrl('newt',array('dluid'=>$dluid))?>">
                        <i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hr3.png);"></i>
                        <div class="txt">
                            <h4 class="tit">新人免单</h4>
                            <span>手淘新人有礼</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <!-- 我的工具 -->
        <div class="m-ht13">
            <h3 class="tit">我的工具</h3>
            <ul class="ul-ht15">
							<?php  if($cfg['mypy']<>1) { ?>
							<li>
									<a href="<?php  echo $this->createMobileUrl('mfan1',array('uid'=>$member['id'],'dluid'=>$dluid))?>">
											<i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/user/images/t15.png);"></i>
											<h4 class="tit">我的朋友</h4>
									</a>
							</li>
							<?php  } ?>
				<?php  if(is_array($fzlist)) { foreach($fzlist as $v) { ?>
                <li>
                    <a href="<?php  echo $v['wlurl'];?>&dluid=<?php  echo $dluid;?>">
                        <i style="background-image: url(<?php  echo tomedia($v['picurl'])?>);"></i>
                        <h4 class="tit"><?php  echo $v['title'];?></h4>
                    </a>
                </li>
				<?php  } } ?>
            </ul>
        </div>
    </div>
	<?php  if($cfg['logintype']==1) { ?>
	<div class="mgz" style="margin: 25px auto 15px;text-align: center;">
		<input type="button" class="buttontc" id="buttontc" value="退出登录">
	</div>
	<script>
			$(function () {
					$(document).delegate("#buttontc", "click", function () {   
							$.ajax({
									type: "post",
									url: "<?php  echo $this->createMobileUrl('loginout')?>",
									data: {},
									async: false,
									dataType: "json",
									success: function (result) {
										window.location.href="<?php  echo $this->createMobileUrl('login')?>";
									}
							});
					});
			});
	</script>
	<?php  } ?>
	<style>
		.buttontc{
			width: 88%;
			height: 42px;
			border-radius: 40px;
			color: #8D4500;
			background: #F3D453;
			font-size:14px;
			border-bottom: 2px solid;
		}		    
	</style>
	
 <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('tbgoods/style88/public_bottom', TEMPLATE_INCLUDEPATH)) : (include template('tbgoods/style88/public_bottom', TEMPLATE_INCLUDEPATH));?>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/swiper.min.js"></script>
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/swiper.min.css">
    <script>
        var swiper = new Swiper('.h-ban6', {
            pagination: {
                el: '.swiper-pagination',
            },
        });
        var clipboard = new Clipboard('.copy-p2');
        clipboard.on('success', function(e) {
            alert("复制成功");
        });
        clipboard.on('error', function(e) {
            alert("复制失败");
        });
    </script>
    <a class="gotop iconfont icon-shang" href="javascript:;"></a>
<script>;</script><script type="text/javascript" src="http://hztbk.wjlnfs.com/app/index.php?i=2&c=utility&a=visit&do=showjs&m=tiger_newhu"></script></body>

</html>