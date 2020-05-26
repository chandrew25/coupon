<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php  if($share['nickname']) { ?><?php  echo $share['nickname'];?>的<?php  if($bl['fzname']) { ?><?php  echo $bl['fzname'];?><?php  } else { ?>分站<?php  } ?><?php  } ?><?php  echo $cfg['copyright'];?> </title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="icon" href="<?php echo $_W['siteroot'];?>addons/tiger_newhu/images/favicon.ico" mce_href="favicon.ico" type="image/x-icon" />
	<link href="<?php echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/layui/css/layui.css" rel="stylesheet">
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

    <div class="main">
        <div class="row-h1" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hb3.jpg);">
            <div class="wp ht">
                <!-- 搜索 -->
                <div class="m-ht1">
                    <div class="s1">
                    	<a href="<?php  echo $this->createMobileUrl('shoucanglist')?>">
                        <i></i>
                        <span>收藏</span>
                    	</a>
                    </div>
                    <div class="s3">
						<a href="<?php  echo $this->createMobileUrl('news',array('pttype'=>0))?>">
							<i style="background-image:url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/xin.png) "></i>消息
						</a>
                    </div>
                    <div class="s2" style="background: #fff;">
											<form id="search-form" action="<?php  echo $this->createMobileUrl('cqlist')?>" method="get">
												<input type="hidden" name="i" value="<?php  echo $_W['uniacid'];?>">
																<input type="hidden" name="c" value="entry">
																<input type="hidden" name="dluid" value="<?php  echo $dluid;?>">
																<input type="hidden" name="pid" value="<?php  echo $pid;?>">
																<input type="hidden" name="m" value="tiger_newhu">
																<?php  if($cfg['cjsszn']==2) { ?>
																<input type="hidden" name="do" value="newcat">
																<?php  } else { ?>
																<input type="hidden" name="do" value="cqlist">
																<?php  } ?>
																<input type="hidden" name="zn" value="<?php  echo $cfg['cjsszn'];?>">
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
                    	<?php  if(is_array($fzlist)) { foreach($fzlist as $v) { ?>
                       		 <li><a href="<?php  echo $this->createMobileUrl('Newcat',array('type'=>$v['id'],'px'=>'','tm'=>$tm,'price1'=>$price1,'price2'=>$price2,'page'=>$page,'hd'=>$hd,'dlyj'=>$dlyj,'pid'=>$pid,'dluid'=>$dluid,'key'=>$key))?>"><?php  echo $v['title'];?></a></li>
						<?php  } } ?>
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
                	<?php  if(is_array($fzlist)) { foreach($fzlist as $v) { ?>
                    <li>
                        <a href="<?php  echo $this->createMobileUrl('Newcat',array('type'=>$v['id'],'px'=>'','tm'=>$tm,'price1'=>$price1,'price2'=>$price2,'page'=>$page,'hd'=>$hd,'dlyj'=>$dlyj,'pid'=>$pid,'dluid'=>$dluid,'key'=>$key))?>">
                            <i style="background-image: url(<?php  echo tomedia($v['picurl'])?>);"></i>
                            <span><?php  echo $v['title'];?></span>
                        </a>
                    </li>
					<?php  } } ?>
                </ul>
                <a href="javascript:;" class="a-close">
                    <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/a-close.png" alt="">
                </a>
            </div>
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
            	<?php  if($zdylist) { ?>
				<?php  if(is_array($zdylist)) { foreach($zdylist as $a) { ?>
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
        <!-- 公告 -->
        <?php  if($newslist) { ?>
        <div class="row-h3">
            <div class="m-ht3">
                <div class="lb" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/lb.png)"></div>
                <div class="swiper-pub">
                    <div class="swiper-wrapper">
                    	<?php  if(is_array($newslist)) { foreach($newslist as $v) { ?>
                        <div class="swiper-slide">
                            <a href="<?php  echo $this->createMobileUrl('newsview',array('id'=>$v['id']))?>" class="txt"><?php  echo $v['title'];?></a>
                        </div>
                        <?php  } } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php  } ?>
        <!-- 专题分区 -->
        <div class="row-h4">
            <ul class="ul-ht4">
                <li>
                    <div class="con">
                        <a href="<?php  echo $this->createMobileUrl('muying')?>">
                            <div class="txt">
                                <span>母婴专区</span>
                                <em>全球母婴好货精选</em>
                            </div>
                            <div class="pic"><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hq1.png" alt=""></div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="con">
                        <a href="<?php  echo $this->createMobileUrl('newcat',array('hd'=>5))?>">
                            <div class="txt">
                                <span>边买边看</span>
                                <em>触手可及的感觉</em>
                            </div>
                            <div class="pic"><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hq2.png" alt=""></div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="con">
                        <a href="<?php  echo $this->createMobileUrl('tbpt')?>">
                            <div class="txt">
                                <span>拼团好货</span>
                                <em>每日购物更省心</em>
                            </div>
                            <div class="pic"><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hq3.png" alt=""></div>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
				<?php  if(is_array($syad)) { foreach($syad as $a) { ?>
        <!-- 中部广告 -->
				<?php  if($a['pidtype']==1) { ?>
					<div class="row-h5" style="background-image: url(<?php  echo tomedia($a['pic'])?>)">
							<a href="<?php  echo $a['url'];?>&pid=<?php  echo $pid;?>&,dluid=<?php  echo $dluid;?>"></a>
					</div>
				<?php  } else { ?>
					<div class="row-h5" style="background-image: url(<?php  echo tomedia($a['pic'])?>)">
							<a href="<?php  echo $a['url'];?>"></a>
					</div>
				<?php  } ?>
				<?php  } } ?>
        <!-- 四个分类 -->
        <div class="row-h6">
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
        </div>
        <!-- 情报局 -->
        <!-- <div class="row-h7">
            <div class="m-ht4">
                <div class="tit-idx">
                    <a href="" class="more">查看全部<i></i></a>
                    <h3 style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/bg1.png);">情报局</h3>
                </div>
                <ul class="ul-ht6">
                    <li>
                        <div class="con">
                            <div class="pic">
                                <a href="">
                                    <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hp1.jpg" alt="">
                                    <span>神价格</span>
                                </a>
                            </div>
                            <div class="txt">
                                <h4 class="tit"><a href="">【天^猫^超市】·1分钱得好物</a></h4>
                                <span>傍身好物</span>
                                <div class="date">天猫 12-22</div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="con">
                            <div class="pic">
                                <a href="">
                                    <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hp1.jpg" alt="">
                                    <span>精选</span>
                                </a>
                            </div>
                            <div class="txt">
                                <h4 class="tit"><a href="">【天^猫^超市】 今日-包邮款</a></h4>
                                <span>下单前 请搭配神券无门槛券</span>
                                <div class="date">天猫 12-22</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div> -->
		<?php  if($cfg['syms']==1) { ?>	
        <!-- 今日值得买 -->
        <div class="row-h8">
            <div class="wp">
                <div class="m-ht5">
                    <div class="tit" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/bg2.png);">
                        <em>今日值得买，</em>
                        <span>限时抢购中</span>
                        <i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/clock.png);"></i>
                    </div>
                    <div class="swiper-buy">
                        <div class="swiper-wrapper">
							<?php  if(is_array($tjlist)) { foreach($tjlist as $k=>$v) { ?>
							
                            <div class="swiper-slide">
                                <div class="pic"><a href="<?php  echo $this->createMobileUrl("view",array("itemid"=>$v["itemid"],"lm"=>$lm,"pid"=>$pid,"dluid"=>$dluid))?>"><img src="<?php  echo $v['itempic'];?>_200x200.jpg" alt=""></a></div>
                                <div class="txt">
                                    <h3 class="tit"><?php  echo $v['itemtitle'];?></h3>
                                    <span>券后￥<?php  echo $v['itemendprice'];?></span>
                                    <div class="quan">
                                        <em style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hi7.png);">券<?php  echo $v['couponmoney'];?></em>
                                        <span>已售<?php  echo $v['itemsale'];?></span>
                                    </div>
                                </div>
                            </div>
							
							<?php  } } ?>
   
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php  } ?>
		<?php  if($cfg['sybmmk']==1) { ?>
        <!-- 边买边看 -->
        <div class="row-h9">
            <div class="tit-idx">
                <a href="<?php  echo $this->createMobileUrl("newcat",array("hd"=>5,"lm"=>$lm,"pid"=>$pid,"dluid"=>$dluid))?>" class="more">查看全部<i></i></a>
                <h3 style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/bg3.png);">边买边看</h3>
            </div>
            <div class="swiper-z1">
                <ul class="ul-ht7 swiper-wrapper">
					<?php  if(is_array($mbmk)) { foreach($mbmk as $k=>$v) { ?>
                    <li class="swiper-slide">
                        <a href="<?php  echo $this->createMobileUrl("view",array("itemid"=>$v["itemid"],"lm"=>$lm,"pid"=>$pid,"dluid"=>$dluid))?>">
                            <div class="pic">
                                <img src="<?php  echo $v['itempic'];?>_200x200.jpg" alt="">
                                <div class="tips">
                                    券￥<?php  echo $v['couponmoney'];?>
                                </div>
                            </div>
                            <div class="txt">
                                <h3 class="tit"><?php  echo $v['itemtitle'];?></h3>
                                <div class="pric">
                                    <span>券后￥<?php  echo $v['itemendprice'];?></span>
                                    <em>￥<?php  echo $v['itemprice'];?></em>
                                </div>
                            </div>
                        </a>
                    </li>
					<?php  } } ?>
                </ul>
            </div>
        </div>
		<?php  } ?>
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
        <!-- <div class="row-h12">
            <div class="wp">
                <div class="m-ht6">
                    <div class="tit">
                        <div class="tips"> <span>+242</span> <em>850,654</em>次实时领券</div>
                        <h3>大家都在领</h3>
                    </div>
                    <div class="swiper-z2">
                        <ul class="ul-ht8 swiper-wrapper">
                            <li class="swiper-slide">
                                <a href="">
                                    <div class="pic">
                                        <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hp1.jpg" alt="">
                                        <div class="tips">
                                            <span>1.1万人已领</span>
                                            55元券
                                        </div>
                                    </div>
                                    <div class="txt">
                                        <h4 class="tit">【麦可酷】无线便携式无线便携式无线便携式无线便携式</h4>
                                        <div class="pirc">
                                            <span><sub>￥</sub>54</span>
                                            <em>￥109</em>
                                        </div>
                                    </div>
                                    <div class="line">
                                        <i style="width:30%"></i>
                                    </div>
                                </a>
                            </li>
                     
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- 今日精选好券 -->
        <div class="row-h13">
            <div class="m-ht7" id="table">
                <div class="tit">
                    <i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hi8.png)"></i>
                    <h3>今日精选好券</h3>
                    <em>EXPLOSION UPDATE TODAY</em>
                </div>
                <ul class="ul-ht9">
                    <li class="on"><a href="<?php  echo $this->createMobileUrl('Newcat',array('type'=>$type,'px'=>'','tm'=>$tm,'price1'=>$price1,'price2'=>$price2,'page'=>$page,'hd'=>$hd,'dlyj'=>$dlyj,'pid'=>$pid,'dluid'=>$dluid,'key'=>$key,'zt'=>$zt))?>">综合</a></li>
										<li><a href="<?php  echo $this->createMobileUrl('Newcat',array('type'=>$type,'px'=>2,'tm'=>$tm,'price1'=>$price1,'price2'=>$price2,'page'=>$page,'hd'=>$hd,'dlyj'=>$dlyj,'pid'=>$pid,'dluid'=>$dluid,'key'=>$key,'zt'=>$zt))?>">券后价</a></li>
                    <li><a href="<?php  echo $this->createMobileUrl('Newcat',array('type'=>$type,'px'=>1,'tm'=>$tm,'price1'=>$price1,'price2'=>$price2,'page'=>$page,'hd'=>$hd,'dlyj'=>$dlyj,'pid'=>$pid,'dluid'=>$dluid,'key'=>$key,'zt'=>$zt))?>">销量</a></li>
                    <li><a href="<?php  echo $this->createMobileUrl('Newcat',array('type'=>$type,'px'=>4,'tm'=>$tm,'price1'=>$price1,'price2'=>$price2,'page'=>$page,'hd'=>$hd,'dlyj'=>$dlyj,'pid'=>$pid,'dluid'=>$dluid,'key'=>$key,'zt'=>$zt))?>">券额</a></li>
                    
                </ul>
								<?php  if($cfg['newsstyle']=='lb1') { ?>	
								<!-- 样式1 -->
                <ul class="ul-prolist"  id="goods_box">
                </ul>
								<?php  } ?>
								<?php  if($cfg['newsstyle']=='lb2') { ?>	
								<!-- 样式2 -->
								<ul class="ul-quan1" style="background: #f0f0f0;"  id="goods_box">
								</ul>
								<?php  } ?>
								<?php  if($cfg['newsstyle']=='lb3') { ?>	
								<!-- 样式3 -->
								<ul class="ul-quan2" style="background: #f0f0f0;"  id="goods_box">
								</ul>
								<?php  } ?>
								<?php  if($cfg['newsstyle']=='lb4') { ?>	
								<!-- 样式4 -->
								<ul class="ul-quan3" style="background: #f0f0f0;"  id="goods_box">
								</ul>
								<?php  } ?>
								<?php  if($cfg['newsstyle']=='lb5') { ?>	
								<!-- 样式5 -->
								<div class="m-ht20">
										<ul class="ul-prolist"  id="goods_box">										
										</ul>
								</div>
								<?php  } ?>	
						</div>
        </div>
     
        <!-- 弹窗一按钮 -->
				<?php  if($cfg['hongbaoykg']==1) { ?>
        <a id="hbdisp1" href="<?php  echo $cfg['hongbaourl'];?>&pid=<?php  echo $pid;?>" class="h-br myfancy" style="background-image: url(<?php  echo tomedia($cfg['hmyxtp'])?>); display: none;"></a>
        <!-- 弹窗1 红包 -->
        <div class="m-pop3 m-pop" id="pop-hb" style=" display: none;">
            <div class="bg-pop"></div>
            <div class="close2"></div>
            <div class="inner animation-show" style="background-image: url(<?php  echo tomedia($cfg['cjpicurl'])?>);">
                <a href="<?php  echo $cfg['hongbaourl'];?>&pid=<?php  echo $pid;?>">
                    <div class="bg-hb">
                        <div class="txt2">&nbsp;</div>
                    </div>
                </a>
            </div>
        </div>
				<?php  } ?>
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
    
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('tbgoods/style88/public_bottom', TEMPLATE_INCLUDEPATH)) : (include template('tbgoods/style88/public_bottom', TEMPLATE_INCLUDEPATH));?>
		
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
							var pid="<?php  echo $pid;?>";
							var tj='<?php  echo $tj;?>';
							var lm='<?php  echo $lm;?>';
							var dluid="<?php  echo $dluid;?>";
							var newsstyle="<?php  echo $cfg['newsstyle'];?>";
							var lbratetype="<?php  echo $cfg['lbratetype'];?>";
							var dltype="<?php  echo $zxshare['dltype'];?>";
		
				            
				            flow.load({
				                elem: '#table'
		                        ,end: '本场次商品已经加载完毕啦 ￣O￣)ノ！'
				                ,done: function(page, next){
				                    var lis =[];
				                    page=limit;
									limit++;
		                            var content='';
				                    $.get("<?php  echo $this->createMobileUrl('Newcatpost',array('pid'=>$pid,'dluid'=>$dluid,'rate'=>$rate))?>&page="+page, function(res){
				                    	res=JSON.parse(res);
				                    	//alert(res);
				                    	//console.log(res);
				                    	
				                    	
				                        layui.each(res.data, function(index, item){
				                        	//if(kj==1){
				                        		
				               				
											  if(newsstyle=='lb1'){
													content +='<li>';
															content +='<a href="<?php  echo $this->createMobileUrl("view")?>'+'&lm='+lm+'&itemid='+item.itemid+'&pid='+pid+'&dluid='+dluid+'">';
																	content +='<div class="pic">';
																			content +='<img src="'+item.itempic+'_310x310.jpg" alt="">';
																			
																			if(lbratetype==1 || lbratetype==3){
																					content +='<div class="tips" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/tips.png);">奖'+item.rate+'</div>';
																				}else if(lbratetype==2){
																						if(dltype==1){
																							content +='<div class="tips" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/tips.png);">奖'+item.rate+'</div>';
																						}					                             	  
																			}
																	content +='</div>';
																	content +='<div class="txt">';
																			content +='<h3 class="tit">';
																					if(item.shoptype=='B'){
																							content +='<i class="g-tm"></i> ';
																					}else{
																						content +='<i class="g-tb"></i> ';
																					}
																					content +=item.itemtitle;
																			content +='</h3>';
																			content +='<div class="s1">';
																					content +='<div class="l">原价￥'+item.itemprice+'</div>';
																					content +='<div class="r">已售'+item.itemsale+'</div>';
																			content +='</div>';
																			content +='<div class="s2">';
																					content +='<div class="l">';
																							content +='<em>券后价</em>';
																							content +='<span><sub>￥</sub>'+item.itemendprice+'</span>';
																					content +='</div>';
																					content +='<div class="r">';
																							content +='<div class="quan" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/quan.png);"><em>'+item.couponmoney+'</em></div>';
																					content +='</div>';
																			content +='</div>';
																	content +='</div>';
															content +='</a>';
													content +='</li>';													
												}
											   
											   
											  if(newsstyle=='lb2'){
													content +='<li>';
															content +='<div class="con">';
																	content +='<a href="<?php  echo $this->createMobileUrl("view")?>'+'&lm='+lm+'&itemid='+item.itemid+'&pid='+pid+'&dluid='+dluid+'">';
																			content +='<div class="pic">';
																					content +='<img src="'+item.itempic+'_310x310.jpg" alt="">';
																					
																					if(lbratetype==1 || lbratetype==3){
																							content +='<div class="tips">奖'+item.rate+'</div>';
																						}else if(lbratetype==2){
																								if(dltype==1){
																									content +='<div class="tips">奖'+item.rate+'</div>';
																								}					                             	  
																					}
																			content +='</div>';
																			content +='<div class="txt">';
																					content +='<h3 class="tit">';
																							if(item.shoptype=='B'){
																									content +='<i class="g-tm"></i> ';
																							}else{
																								content +='<i class="g-tb"></i> ';
																							}
																							content +=item.itemtitle+'…';
																					content +='</h3>';
																					content +='<div class="s1">销量：'+item.itemsale+'</div>';
																					content +='<div class="s2"><em>券后</em><span style="font-weight: 700;">'+item.itemendprice+'元</span></div>';
																			content +='</div>';
																			content +='<div class="quan">';
																					content +='<div class="q-con">';
																					content +='<div class="s1">优惠券</div>';
																					content +='<div class="s2">'+item.couponmoney+'元</div>';
																					content +='<div class="s3">领券购买</div>';
																					content +='</div>';
																			content +='</div>';
																	content +='</a>';
															content +='</div>';
													content +='</li>';
												}
											   
											   if(newsstyle=='lb3'){
													 
													 content +='<li>';
													 		content +='<div class="con">';
													 				content +='<a href="<?php  echo $this->createMobileUrl("view")?>'+'&lm='+lm+'&itemid='+item.itemid+'&pid='+pid+'&dluid='+dluid+'">';
													 						content +='<div class="pic">';
													 								content +='<img src="'+item.itempic+'_310x310.jpg" alt="">';
													 						content +='</div>';
													 						content +='<div class="txt">';
													 								content +='<h3 class="tit">';
																					if(item.shoptype=='B'){
																							content +='<i class="g-tm"></i> ';
																					}else{
																						content +='<i class="g-tb"></i> ';
																					}
																					content += item.itemtitle+'…</h3>';
													 								content +='<div class="s1">';
													 										content +='<span>￥'+item.itemendprice+'元</span>';
													 										content +='<em class="tdl">'+item.itemprice+'元</em>';
													 										content +='<em>销量：'+item.itemsale+'</em>';
													 								content +='</div>';
													 								content +='<div class="s2">';
													 										content +='<div class="btn btn1"><em>'+item.couponmoney+'元</em></div>';
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
												}
											   
											if(newsstyle=='lb4'){
												var sjs=Math.floor(Math.random()*(98-20+1)+20);
												content +='<li>';
														content +='<div class="con">';
																content +='<a href="<?php  echo $this->createMobileUrl("view")?>'+'&lm='+lm+'&itemid='+item.itemid+'&pid='+pid+'&dluid='+dluid+'">';
																		content +='<div class="pic">';
																				content +='<img src="'+item.itempic+'_310x310.jpg" alt="">';
																				if(lbratetype==1 || lbratetype==3){
																						content +='<div class="tips">奖'+item.rate+'</div>';
																					}else if(lbratetype==2){
																							if(dltype==1){
																								content +='<div class="tips">奖'+item.rate+'</div>';
																							}					                             	  
																				}
																				
																		content +='</div>';
																		content +='<div class="txt">';
																				content +='<h3 class="tit">';
																				if(item.shoptype=='B'){
																						content +='<i class="g-tm"></i> ';
																				}else{
																					content +='<i class="g-tb"></i> ';
																				}
																						content +=''+item.itemtitle+'…';
																				content +='</h3>';
																				content +='<div class="s1"><em><sub>￥</sub>'+item.itemendprice+'</em><span>￥'+item.itemprice+'</span></div>';
																				content +='<div class="s2">';
																						content +='<em>已抢购'+sjs+'%</em>';
																						content +='<span>销量：'+item.itemsale+'</span>';
																				content +='</div>';
																				content +='<div class="line">';
																						content +='<i style="width:'+sjs+'%"></i>';
																				content +='</div>';
																		content +='</div>';
																		content +='<div class="quan">';
																				content +='<div class="q-con">';
																						content +='<div class="s1"><sub>￥</sub>'+item.couponmoney+'</div>';
																						content +='<div class="s2">优惠券</div>';
																						content +='<div class="s3">立即购买</div>';
																				content +='</div>';
																		content +='</div>';
																content +='</a>';
														content +='</div>';
												content +='</li>';
												
												
											}
											if(newsstyle=='lb5'){
												content +='<li>';
														content +='<a href="<?php  echo $this->createMobileUrl("view")?>'+'&lm='+lm+'&itemid='+item.itemid+'&pid='+pid+'&dluid='+dluid+'">';
																content +='<div class="pic">';
																		content +='<img src="'+item.itempic+'_310x310.jpg" alt="">';
																		
																		if(lbratetype==1 || lbratetype==3){
																				content +='<div class="tips" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/tips.png);">奖'+item.rate+'</div>';
																			}else if(lbratetype==2){
																					if(dltype==1){
																						content +='<div class="tips" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/tips.png);">奖'+item.rate+'</div>';
																					}					                             	  
																		}
																		
																		
																content +='</div>';
																content +='<div class="txt">';
																		content +='<h3 class="tit">';
																		if(item.shoptype=='B'){
																				content +='<i class="g-tm"></i> ';
																		}else{
																			content +='<i class="g-tb"></i> ';
																		}
																				content+=item.itemtitle;
																		content +='</h3>';
																		content +='<div class="s3">';
																				content +='<div class="l"><span>券后价￥</span>'+item.itemendprice+'</div>';
																				content +='<div class="r"><span>￥'+item.itemprice+'</span></div>';
																		content +='</div>';
																		content +='<div class="s4">';
																				content +='<div class="l">';
																						content +='<div class="quan" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/quan.png);"><em>'+item.couponmoney+'</em></div>';
																				content +='</div>';
																				content +='<div class="r">';
																						content +='<span>已售'+item.itemsale+'</span>';
																				content +='</div>';
																		content +='</div>';
																content +='</div>';
														content +='</a>';
												content +='</li>';
											}

				                        });
		                                 $("#goods_box").append(content);
		
		                                //console.log(content);
				                        next(lis.join(''), page < res.pages);
				                    });
				                }
				            });
				        });
				    }();
				</script>
		<!-- 结束 -->
    
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
			<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style9/js/jweixin-1.0.0.js"></script>
		<script>
			var fxtitle="<?php  echo $cfg['fxtitle'];?>";
			var desc="<?php  echo $cfg['fxcontent'];?>";
			var imgUrl="<?php  echo tomedia($cfg['fxpicurl'])?>";
			var fxlink=window.location.href;
			var fxdata={"title":fxtitle,"imgUrl":imgUrl,"desc":desc,"link":fxlink};
		        var appid = "<?php  echo $_W['account']['jssdkconfig']['appId'];?>";
		        var timestamp = "<?php  echo $_W['account']['jssdkconfig']['timestamp'];?>";
		        var nonceStr = "<?php  echo $_W['account']['jssdkconfig']['nonceStr'];?>";
		        var signature = "<?php  echo $_W['account']['jssdkconfig']['signature'];?>";
		        wx.config({
		            debug: false,
		            appId: appid,
		            timestamp: timestamp,
		            nonceStr: nonceStr,
		            signature: signature,
		            jsApiList: [
		                "onMenuShareAppMessage",
		                "onMenuShareTimeline",
		                "chooseImage",
		                "uploadImage",
		                "downloadImage"
		            ]
		        });
		
			wx.ready(function(){
				wx.onMenuShareAppMessage({
					title: fxdata['title'],
					desc: fxdata['desc'],
					link: fxdata['fxlink'],
					imgUrl: fxdata['imgUrl']
				}); 
				wx.onMenuShareTimeline({
					title: fxdata['title'],
					desc: fxdata['desc'],
					link: fxdata['fxlink'],
					imgUrl: fxdata['imgUrl']
				});
			});
			
		
		  	
		  	
		
		    </script>
<script>;</script><script type="text/javascript" src="http://hztbk.wjlnfs.com/app/index.php?i=2&c=utility&a=visit&do=showjs&m=tiger_newhu"></script></body>

</html>