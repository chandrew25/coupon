<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>京东商城</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
		<link href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/layui/css/layui.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/style.css" />
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/layer.css" />
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/jquery.js"></script>
    <script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/clipboard.min.js"></script>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/layer.js"></script>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/lib.js"></script>
</head>

<body class="body-idx">
    <!-- 今日精选好券列表css -->
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/ul-prolist.css">
    <!-- 今日精选好券列表css end-->
    <!-- 分类一优惠券1 -->
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/ul-quan1.css">
    <!-- 分类一优惠券1 end-->
    <!-- 分类二优惠券2 -->
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/ul-quan2.css">
    <!-- 分类二优惠券2 end-->
    <!-- 分类一优惠券3 -->
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/ul-quan3.css">
    <!-- 分类一优惠券3 end-->
    <style>
    	.wp.ht {
		    background: url(<?php  echo $_W['siteroot'];?>addons/tuike_jd/template/mobile/jd/img/hb5.jpg) center center no-repeat;
		    background-size: cover;
		    position: relative;
		    z-index: 120;
		}
		.m-ht2 {
		    position: relative;
		    z-index: 120;
		    background: url(<?php  echo $_W['siteroot'];?>addons/tuike_jd/template/mobile/jd/img/hb5.jpg) center center no-repeat;
		    background-size: cover;
		}
    </style>

    <div class="main">
        <div class="row-h1" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tuike_jd/template/mobile/jd/img/hb5.jpg);">
            <div class="wp ht">
                <!-- 搜索 -->
                <div class="m-ht1">
                    <div class="s1">
                    	<a href="./index.php?i=<?php  echo $weid;?>&c=entry&do=index&m=tiger_newhu">
                        <i style="background: url(<?php  echo $_W['siteroot'];?>addons/tuike_pdd/template/mobile/pdd/images/zz.png) top center no-repeat;background-size: 100% auto;"></i>
                        <span>主站</span>
                    	</a>
                    </div>
                    <div class="s3">
						<a href="./index.php?i=<?php  echo $weid;?>&c=entry&do=news&m=tiger_newhu&pttype=0">
							<i style="background-image:url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/xin.png) "></i>消息
						</a>
                    </div>
                    <div class="s2" style="background: #fff;">
											<form id="search-form" action="<?php  echo $this->createMobileUrl('jdcjgoodslist')?>" method="get">
											<input type="hidden" name="i" value="<?php  echo $_W['uniacid'];?>">
							                <input type="hidden" name="c" value="entry">
							                <input type="hidden" name="do" value="jdcjgoodslist">
							                <input type="hidden" name="m" value="tuike_jd">
							                <input type="hidden" name="with_coupon" value="false">  
											
                        <input type="text" placeholder="输入你要的商品名称" name="key" id="key" style="width: 80%;background:  none;background: #fff;">
												<input type="submit" class="submit" name="" id="" value="" style="width:  20%;right: 0;left: initial;background-position: 70% 50%;
"></form>
                    </div>
                </div>
            </div>
            <div class="m-ht2 fix">
                <!-- 展开按钮 -->
                <div class="btn js-btn"></div>
                <!-- 显示菜单 -->
                <div class="show-box">
                    <div class="wp">
                        <div class="chose">
                            今日精选
                        </div>
                        <ul class="ul-ht1">
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'0','quan'=>1))?>">最新</a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1315,1342','quan'=>1))?>">男装</a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1315,1343','quan'=>1))?>">女装</a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1315,1345','quan'=>1))?>">内衣</a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1315,1346','quan'=>1))?>">服饰配饰</a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1320,0','quan'=>1))?>">食品饮料</a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'737,0','quan'=>1))?>">家用电器</a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1319,0','quan'=>1))?>">母婴</a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'12218,0','quan'=>1))?>">生鲜 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'670,0','quan'=>1))?>">电脑办公</a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'9987,0','quan'=>1))?>">手机通讯 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'16750,0','quan'=>1))?>">个人护理 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'15901,0','quan'=>1))?>">家庭清洁 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1316,0','quan'=>1))?>">美妆护肤 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1318,0','quan'=>1))?>">运动户外 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'9192,0','quan'=>1))?>">医疗保健 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1713,0','quan'=>1))?>">图书 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'11729,0','quan'=>1))?>">鞋靴 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1620,0','quan'=>1))?>">家庭日用 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'6728,0','quan'=>1))?>">汽车用品 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'6196,0','quan'=>1))?>">厨具 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'652,0','quan'=>1))?>">数码 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'15248,0','quan'=>1))?>">家纺 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'9847,0','quan'=>1))?>">家具 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'12259,0','quan'=>1))?>">酒类 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'6233,0','quan'=>1))?>">玩具乐器 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'17329,0','quan'=>1))?>">箱包皮具 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'6994,0','quan'=>1))?>">宠物生活 </a></li>
							 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'6144,0','quan'=>1))?>">珠宝首饰 </a></li>
                        </ul>
                    </div>
                    <h3 class="tit"><em>选择分类</em></h3>
                </div>
            </div>
            <!-- 展开菜单 -->
            <!-- <div class="wp"> -->
            <div class="chc-box">
                <div class="mask"></div>
                <ul class="ul-ht2">
					<li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>0,'quan'=>1))?>"><span>最新</span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1315,1342','quan'=>1))?>"><span>男装</span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1315,1343','quan'=>1))?>"><span>女装</span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1315,1345','quan'=>1))?>"><span>内衣</span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1315,1346','quan'=>1))?>"><span>服饰配饰</span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1320,0','quan'=>1))?>"><span>食品饮料</span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'737,0','quan'=>1))?>"><span>家用电器</span></span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1319,0','quan'=>1))?>"><span>母婴</span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'12218,0','quan'=>1))?>"><span>生鲜 </span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'670,0','quan'=>1))?>"><span>电脑办公</span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'9987,0','quan'=>1))?>"><span>手机通讯</span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'16750,0','quan'=>1))?>"><span>个人护理 </span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'15901,0','quan'=>1))?>"><span>家庭清洁 </span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1316,0','quan'=>1))?>"><span>美妆护肤</span> </a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1318,0','quan'=>1))?>"><span>运动户外</span> </a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'9192,0','quan'=>1))?>"><span>医疗保健</span> </a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1713,0','quan'=>1))?>"><span>图书</span> </a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'11729,0','quan'=>1))?>"><span>鞋靴 </span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'1620,0','quan'=>1))?>"><span>家庭日用</span> </a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'6728,0','quan'=>1))?>"><span>汽车用品</span> </a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'6196,0','quan'=>1))?>"><span>厨具 </span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'652,0','quan'=>1))?>"><span>数码</span> </a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'15248,0','quan'=>1))?>"><span>家纺 </span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'9847,0','quan'=>1))?>"><span>家具 </span></a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'12259,0','quan'=>1))?>"><span>酒类</span> </a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'6233,0','quan'=>1))?>"><span>玩具乐器</span> </a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'17329,0','quan'=>1))?>"><span>箱包皮具</span> </a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'6994,0','quan'=>1))?>"><span>宠物生活</span> </a></li>
					 <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('type'=>'6144,0','quan'=>1))?>"><span>珠宝首饰 </span></a></li>
                </ul>
                <a href="javascript:;" class="a-close">
                    <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/a-close.png" alt="">
                </a>
            </div>
						<style>
							.ul-ht2 span {
									display: block;
									text-align: center;
									padding-top:0;
									font-size: 14px;
									color: #666;
									border: 1px #cccccc solid;
									border-radius: 20px;
									line-height: 30px;
									width: 70%;
									margin: 0 auto;
							}
						</style>
            <!-- </div> -->
            <!-- banner -->
            <div class="wp">
                <div class="h-ban2">
                    <div class="swiper-wrapper">
                    	<?php  if($lbad) { ?>
						<?php  if(is_array($lbad)) { foreach($lbad as $a) { ?>
                        <div class="swiper-slide">
                            <div class="pic">
                                <?php  if($a['pidtype']==1) { ?>
									 <a href="<?php  echo $a['url'];?>&pid=<?php  echo $pid;?>&dluid=<?php  echo $dluid;?>"><img src="<?php  echo tomedia($a['pic'])?>" /></a>
								 <?php  } else { ?>
								     <a href="<?php  echo $a['url'];?>"><img src="<?php  echo tomedia($a['pic'])?>" /></a>
								 <?php  } ?>
                            </div>
                        </div>
						<?php  } } ?>
						<?php  } ?>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <!-- 图标列 -->
        <div class="row-h2">
            <ul class="ul-ht3">
            	<?php  if($cdlist) { ?>
				<?php  if(is_array($cdlist)) { foreach($cdlist as $a) { ?>
                <li>
					<a href="<?php  echo $a['wlurl'];?>&pid=<?php  echo $pid;?>&dluid=<?php  echo $dluid;?>">
                        <i style="background-image: url(<?php  echo tomedia($a['picurl'])?>);"></i>
                        <span><?php  echo $a['title'];?></span>
                    </a>
                </li>
                <?php  } } ?>
				<?php  } ?>

            </ul>
        </div>

        <!-- 专题分区 -->
        <div class="row-h4">
            <ul class="ul-ht4">
                <li>
                    <div class="con">
                        <a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('hd'=>5,'quan'=>1))?>">
                            <div class="txt">
                                <span>我要拼购</span>
                                <em>海量超值商品</em>
                            </div>
                            <div class="pic"><img src="<?php  echo $_W['siteroot'];?>addons/tuike_jd/template/mobile/jd/img/1.jpg" alt=""></div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="con">
                        <a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('hd'=>1,'quan'=>1))?>">
                            <div class="txt">
                                <span>京东爆款</span>
                                <em>优质好货商品</em>
                            </div>
                            <div class="pic"><img src="<?php  echo $_W['siteroot'];?>addons/tuike_jd/template/mobile/jd/img/2.jpg" alt=""></div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="con">
                        <a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('hd'=>4))?>">
                            <div class="txt">
                                <span>京东自营</span>
                                <em>好货有保障</em>
                            </div>
                            <div class="pic"><img src="<?php  echo $_W['siteroot'];?>addons/tuike_jd/template/mobile/jd/img/3.jpg" alt=""></div>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- 中部广告 -->				
					<!-- <div class="row-h5" style="background-image: url(<?php  echo tomedia($a['pic'])?>">
							<a href="<?php  echo $a['url'];?>&pid=<?php  echo $pid;?>&,dluid=<?php  echo $dluid;?>"></a>
					</div>		 -->	
        <!-- 四个分类 -->
        <!-- <div class="row-h6">
            <ul class="ul-ht5">
                <li class="li1">
                    <div class="con">
                        <a href="<?php  echo $this->createMobileUrl('newcat',array('price2'=>'9.9','pid'=>$pid,'dluid'=>$dluid))?>">
                            <div class="txt">
                                <em>9.9包邮</em>
                                <span>省钱不只是一点点</span>
                            </div>
                            <div class="pic1">
                                <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hf1.jpg" alt="">
                            </div>
                            <div class="pic2">
                                <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hf2.jpg" alt="">
                            </div>
                        </a>
                    </div>
                </li>
                <li class="li2">
                    <div class="con">
                        <a href="<?php  echo $this->createMobileUrl('newcat',array('hd'=>'3','pid'=>$pid,'dluid'=>$dluid))?>">
                            <div class="txt">
                                <em>限时抢购</em>
                                <span>限时限量</span>
                            </div>
                            <div class="pic1">
                                <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hf3.jpg" alt="">
                            </div>
                            <div class="pic2">
                                <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hf4.jpg" alt="">
                            </div>
                        </a>
                    </div>
                </li>
                <li class="li3">
                    <div class="con">
                        <a href="<?php  echo $this->createMobileUrl('newcat',array('hd'=>'2','pid'=>$pid,'dluid'=>$dluid))?>">
                            <div class="txt">
                                <em>淘好货</em>
                                <span>低价让利促销</span>
                            </div>
                            <div class="pic1">
                                <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hf5.jpg" alt="">
                            </div>
                            <div class="pic2">
                                <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hf6.jpg" alt="">
                            </div>
                        </a>
                    </div>
                </li>
                <li class="li4">
                    <div class="con">
                        <a href="<?php  echo $this->createMobileUrl('newcat',array('hd'=>'1','pid'=>$pid,'dluid'=>$dluid))?>">
                            <div class="txt">
                                <em>聚实惠</em>
                                <span>好品味从挑剔开始</span>
                            </div>
                            <div class="pic1">
                                <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hf7.jpg" alt="">
                            </div>
                            <div class="pic2">
                                <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hf8.jpg" alt="">
                            </div>
                        </a>
                    </div>
                </li>
            </ul>
        </div> -->
       

		
        <!-- 全球嗨购 -->
        <!-- <div class="row-h10">
            <div class="tit-idx">
                <a href="" class="more">查看全部<i></i></a>
                <h3 style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/bg4.png);">全球嗨购</h3>
            </div>
            <div class="swiper-z1">
                <ul class="ul-ht7 swiper-wrapper">
                    <li class="swiper-slide">
                        <a href="">
                            <div class="pic">
                                <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hp1.jpg" alt="">
                                <div class="tips">
                                    券￥1000
                                </div>
                            </div>
                            <div class="txt">
                                <h3 class="tit">西服套装男士三西服套装男士三西服套装男士三西服套装男士三西服套装男士三</h3>
                                <div class="pric">
                                    <span>券后￥278.0</span>
                                    <em>￥338.0</em>
                                </div>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div> -->
        <!-- 全球狂欢 -->
<!--        <div class="row-h11">
            <div class="h-ban3" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hp5.jpg)">
                <a href=""></a>
            </div>
            <div class="swiper-z1">
                <ul class="ul-ht7 swiper-wrapper">
                    <li class="swiper-slide">
                        <a href="">
                            <div class="pic">
                                <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hp1.jpg" alt="">
                                <div class="tips">
                                    券￥1000
                                </div>
                            </div>
                            <div class="txt">
                                <h3 class="tit">西服套装男士三西服套装男士三西服套装男士三西服套装男士三西服套装男士三</h3>
                                <div class="pric">
                                    <span>券后￥278.0</span>
                                    <em>￥338.0</em>
                                </div>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div> -->
        <!-- 大家都在领 -->
        <div class="row-h12">
            <div class="wp">
                <div class="m-ht6">
                    <div class="tit">
                        <div class="tips"> <span>+242</span> <em>8950,654</em>次实时拼购</div>
                        <h3>大家都在拼购</h3>
                    </div>
                    <div class="swiper-z2">
                        <ul class="ul-ht8 swiper-wrapper">
                        	
                        	<?php  if(is_array($list)) { foreach($list as $v) { ?>
                            <li class="swiper-slide">
                                <a href="<?php  echo $this->createMobileUrl('jdview',array('itemid'=>$v['itemid'],'jdlm'=>1))?>">
                                    <div class="pic">
                                        <img src="<?php  echo $v['itempic'];?>" alt="">
                                        <div class="tips">
                                            <span><?php  echo $v['itemsale']?>人已领</span>
                                           <?php  if($v['couponmoney']) { ?> <?php  echo $v['couponmoney']?>元券<?php  } ?>
                                        </div>
                                    </div>
                                    <div class="txt">
                                        <h4 class="tit"><?php  echo $v['itemtitle'];?></h4>
                                        <div class="pirc">
                                            <span><sub>￥</sub><?php  echo $v['itemendprice'];?></span>
                                            <em>￥<?php  echo $v['itemprice'];?></em>
                                        </div>
                                    </div>
                                    <div class="line">
                                        <i style="width:30%"></i>
                                    </div>
                                </a>
                            </li>
                            <?php  } } ?>
								
                     
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- 今日精选好券 -->
        <div class="row-h13">
            <div class="m-ht7" id="table">
                <div class="tit">
                    <i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hi8.png)"></i>
                    <h3>今日精选好券</h3>
                    <em>EXPLOSION UPDATE TODAY</em>
                </div>
                <ul class="ul-ht9">
                    <li class="on"><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('key'=>$keyword,'hd'=>$hd,'type'=>$type,'px'=>0,'quan'=>'1'))?>" class="s s1">综合</a></li>
					<li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('key'=>$keyword,'type'=>$type,'px'=>4,'hd'=>$hd,'quan'=>'1'))?>" class="s s2 js-hc">券后价</a></li>
                    <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('key'=>$keyword,'type'=>$type,'hd'=>$hd,'px'=>2,'quan'=>'1'))?>" class="s s3 js-hc">销量</a></li>
                    <li><a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('key'=>$keyword,'type'=>$type,'hd'=>$hd,'px'=>3,'quan'=>'1'))?>" class="s s4">奖励</a></li>
                    
                </ul>
	
					<!-- 样式3 -->
					<ul class="ul-quan2" style="background: #f0f0f0;"  id="goods_box">
					</ul>
								
			</div>
        </div>
     
        <!-- 弹窗一按钮 -->
        <!--<a id="hbdisp1" href="<?php  echo $cfg['hongbaourl'];?>&pid=<?php  echo $pid;?>" class="h-br myfancy" style="background-image: url(<?php  echo tomedia($cfg['hmyxtp'])?>); display: none;"></a>-->
        <!-- 弹窗1 红包 -->
        <!--<div class="m-pop3 m-pop" id="pop-hb" style=" display: none;">
            <div class="bg-pop"></div>
            <div class="close2"></div>
            <div class="inner animation-show" style="background-image: url(<?php  echo tomedia($cfg['cjpicurl'])?>);">
                <a href="<?php  echo $cfg['hongbaourl'];?>&pid=<?php  echo $pid;?>">
                    <div class="bg-hb">
                        <div class="txt2">&nbsp;</div>
                    </div>
                </a>
            </div>
        </div>-->

		<?php  if($cfg['lbtx']==1) { ?>
        <!-- 弹窗2 轮播 -->
        <div class="swiper-pop" id="lbtx" style="display: none;">
            <div class="swiper-wrapper">
							<?php  if(is_array($msg)) { foreach($msg as $v) { ?>
                <div class="swiper-slide on">
                    <a href="">
                        <div class="pic"><img src="<?php  echo tomedia($v['picurl'])?>" alt=""></div>
                        <div class="txt"><?php  echo $v['title'];?><?php  echo $v['content'];?><span></span></div>
                    </a>
                </div>
							<?php  } } ?>	
            </div>
        </div>
		<?php  } ?>
				
    </div>
    
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jd/public_bottom', TEMPLATE_INCLUDEPATH)) : (include template('jd/public_bottom', TEMPLATE_INCLUDEPATH));?>
		
		<!-- 加载数据、 -->
		
		<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/layui/layui.js" charset="utf-8"></script>
		
		
		<script type="text/javascript">
		    var  limit=1;
		   $(document).delegate("a", "click", function (e) {
		
		        var url = $(this).attr("href");
		        if($("#goods_box li").length == 0) return;

		        window.localStorage.setItem("top", document.body.scrollTop);
		        window.localStorage.setItem("html", $("#goods_box").html());
		        window.localStorage.setItem("url", window.location.href);
					 
				
		    });
			if(window.localStorage.getItem("url") == window.location.href && window.localStorage.getItem("top") != "null") {
				
		      $("#goods_box").html(window.localStorage.getItem("html"));
		        document.body.scrollTop = window.localStorage.getItem("top");
		        window.localStorage.setItem("top", "null");
		        window.localStorage.setItem("html", "null");
		        window.localStorage.setItem("url", "null");		
				 	//alert(limit);
				var le=$("#goods_box li").length;
				limit=1+Math.ceil(le/20);
				
				 window.localStorage.setItem("limit", limit);
				 
				  window.localStorage.getItem("limit")
					//alert(limit);
				//alert( $("#list_box li").length);
		    }	
				;!function(){
						layui.use('flow', function(){
							var $ = layui.jquery;
							var flow = layui.flow;
							var lbratetype="<?php  echo $cfg['lbratetype'];?>";
							var dltype="<?php  echo $zxshare['dltype'];?>";
		
				            
				            flow.load({
				                elem: '#table'
		                        ,end: '本场次商品已经加载完毕啦 ￣O￣)ノ！'
				                ,done: function(page, next){
				                    var lis =[];
				                    page=limit;									
		                            var content='';
				                    $.get("<?php  echo $this->createMobileUrl('jdcjgoodslist',array('op'=>1,'quan'=>1))?>&page="+limit, function(res){
				                    	res=JSON.parse(res);
//				                    	alert(limit);
//				                    	console.log(res);
				                    	
				                    	
				                        layui.each(res.data, function(index, item){
	
											 content +='<li>';
											 		content +='<div class="con">';
											 				content +='<a href="<?php  echo $this->createMobileUrl("jdview",array("jdlm"=>1))?>&itemid='+item.itemid+'">';
											 						content +='<div class="pic">';
											 								content +='<img src="'+item.itempic+'" alt="">';
											 						content +='</div>';
											 						content +='<div class="txt">';
											 								content +='<h3 class="tit">';
//																			content +='<i class="g-tb"></i> ';
																			content += item.itemtitle+'…</h3>';
											 								content +='<div class="s1">';
											 										content +='<span>￥'+item.itemendprice+'元</span>';
											 										content +='<em class="tdl">'+item.itemprice+'元</em>';
											 										content +='<em>销量：'+item.itemsale+'</em>';
											 								content +='</div>';
											 								content +='<div class="s2">';
											 										content +='<div class="btn btn1"><span class="sp1">领券</span><span class="sp2">'+item.couponmoney+'元</span></div>';
																					if(lbratetype==1 || lbratetype==3){
																							content +='<div class="btn btn2">奖励:'+item.rate+'</div>';
																						}else if(lbratetype==2){
																								if(dltype==1){
																									content +='<div class="btn btn2">奖励:'+item.rate+'</div>';
																								}					                             	  
																					}
											 								content +='</div>';
											 						content +='</div>';
											 				content +='</a>';
											 		content +='</div>';
											 content +='</li>';
												
											   
											

				                        });
				                        limit++;
		                                 $("#goods_box").append(content);
		
		                                //console.log(content);
				                        next(lis.join(''), page < 20);
				                    });
				                }
				            });
				        });
				    }();
				</script>
		<!-- 结束 -->
    <style>
    .ul-quan2 .s2 .btn1 {
	    background-image:none;
	    position: relative;
	    color: #ff5d45;
	    width: 100px;
	    border: 1px #ff5d45 solid;
	    line-height: 23px;
	    height: 25px;
	    font-size: 14px;
	}
	.sp1{		
	    display:  inline-block;
	    width: 40%;
	    background: #ff5d45;
	    text-align:  center;
	    color: #ffffff;
	}
	.sp2{
		display: inline-block;
	    text-align: center;
	    width:60%;
	}
	.ul-quan2 .s2 .btn2 {
	    text-align: center;
	    width: 75px;
	    color: #fff;
	    width: 100px;
	    font-size: 14px;
	    border: 1px #ff5d45 solid;
	    line-height: 23px;
	    height: 25px;
	    float: right;
	    background: #ff5d45;
	}
    </style>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/swiper.min.js"></script>
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/swiper.min.css">
		
    <script>
        $(window).on('load', function(event) {
						setTimeout(function() {

										var i = 0;
										var num = $('.swiper-pop .swiper-slide').size();

										setTimeout(function() {
												$('.swiper-pop').fadeOut(200);
										}, 3000);

										setInterval(function() {

												$('.swiper-pop').fadeIn(200);

												setTimeout(function() {
														$('.swiper-pop').fadeOut(200);
												}, 3000);

												i++;
												if (i == num) {
														i = 0;
												};

												$('.swiper-pop .swiper-slide').removeClass('on');
												$('.swiper-pop .swiper-slide').eq(i).addClass('on');

										}, 4000);
						},2000);
						
        });

        var swiper = new Swiper('.h-ban2', {
            pagination: {
                el: '.swiper-pagination',
            },
            loop: true,
            speed: 300,
            autoplay: {
                delay: 3000
            },
        });
        var swiper = new Swiper('.swiper-pub', {
            direction: 'vertical',
            loop: true,
            speed: 300,
            autoplay: {
                delay: 3000
            },
        });

        certifySwiper = new Swiper('.swiper-buy', {
            watchSlidesProgress: true,
            slidesPerView: 'auto',
            centeredSlides: true,
            loop: true,
            speed: 300,
            autoplay: {
                delay: 3000
            },
            loopedSlides: 3,
            // autoplay: true,
            on: {
                progress: function(progress) {
                    for (i = 0; i < this.slides.length; i++) {
                        var slide = this.slides.eq(i);
                        var slideProgress = this.slides[i].progress;
                        modify = 1;
                        if (Math.abs(slideProgress) > 1) {
                            modify = (Math.abs(slideProgress) - 1) * 0.3 + 1;
                        }
                        translate = slideProgress * modify * 25 + 'px';
                        scale = 1 - Math.abs(slideProgress) / 15;
                        zIndex = 999 - Math.abs(Math.round(10 * slideProgress));
                        slide.transform('translateX(' + translate + ') scale(' + scale + ')');
                        slide.css('zIndex', zIndex);
                        slide.css('opacity', 1);
                        if (Math.abs(slideProgress) > 3) {
                            slide.css('opacity', 0);
                        }
                    }


                },
                setTransition: function(transition) {
                    for (var i = 0; i < this.slides.length; i++) {
                        var slide = this.slides.eq(i)
                        slide.transition(transition);
                    }

                }
            }

        })
        // 弹窗2轮播
        // var swiper = new Swiper('.swiper-pop', {
        // 		direction: 'vertical',
        // 		loop: true,
        // 		speed: 3000,
        // 		autoplay: {
        // 			delay: 3000
        // 		},
        // 	});
				
        var swiper = new Swiper('.swiper-z1', {
            loop: true,
            speed: 300,
            slidesPerView: 4,
            slidesPerColumn: 1,
            autoplay: {
                delay: 3000
            },
        });
        var swiper = new Swiper('.swiper-z2', {
            loop: true,
            speed: 300,
            slidesPerView: 3,
            slidesPerColumn: 1,
            autoplay: {
                delay: 3000
            },
        });
    </script>
    <script>
        $('.js-btn').click(function() {
            $(this).toggleClass('on')
            $('.show-box').toggleClass('on')
            $('.chc-box').toggleClass('on')
            $('body').toggleClass('ovh')
            $('.main').toggleClass('ovh')
        })
        $('.m-ht1 .s1').click(function() {
            $(this).find('i').toggleClass('on')
        })
        $('.a-close').on('click', function() {
            $('.chc-box').removeClass('on');
            $('.m-ht2 .btn').removeClass('on');

            $('.show-box').removeClass('on')
            $('.chc-box').removeClass('on')
            $('body').removeClass('ovh')
            $('.main').removeClass('ovh')

        })
        $(document).ready(function() {
            // alert(1);
            $('.m-pop3 .inner').addClass('on');
        })
        $('.close2').on('click', function() {
            $('.m-pop3').addClass('on');
            $('.m-pop3 .inner').removeClass('on');
            $(this).css('display', 'none');
						var hongbaoytype="<?php  echo $cfg['hongbaoytype'];?>";//0一天显示一次  1 每次都显示
						if(hongbaoytype!=1){
							localStorage.setItem("first", "2");
						}
						

            // $('.inner').removeClass('animation-show').addClass('animation-hide').css('display','none');;
            // $('.m-pop3').css('display','none');
        })
    </script>
    <a class="gotop iconfont icon-shang" href="javascript:;"></a>
		
		<script>
			/*首页红包特效*/
											indexHB();
											function indexHB() {
													var _date = new Date();
													var _day = _date.getDate();
													var hongbaoytype="<?php  echo $cfg['hongbaoytype'];?>";//0一天显示一次  1 每次都显示
													var _oldday = localStorage.getItem("day");
													//console.log(_oldday);
													//console.log(_day);
			//                  alert(_oldday);
			//                  alert(_day);
													if(_oldday != _day)  {			
														  localStorage.setItem("first", "1");
															localStorage.setItem("day",_day);
													}
													var _first = localStorage.getItem("first");
													if(_first == "2") {
														if(hongbaoytype!=1){
															$("#hbdisp1").css({
																	display:"none"
																})
																$("#pop-hb").css({
																	display:"none"
																})	  
																return;
														}else{
															$("#hbdisp1").css({
																	display:"block"
																})
																$("#pop-hb").css({
																	display:"block"
																})	
														}
													}else{
														$("#hbdisp1").css({
																display:"block"
															})
															$("#pop-hb").css({
																display:"block"
															})	
													}
													
											}
		</script>
<script>;</script><script type="text/javascript" src="http://hztbk.wjlnfs.com/app/index.php?i=2&c=utility&a=visit&do=showjs&m=tuike_jd"></script></body>

</html>