<?php defined('IN_IA') or exit('Access Denied');?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-dns-prefetch-control" content="on"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta content="telephone=no" name="format-detection"/>
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
        <title>整点限时抢-咚咚抢</title>
        <meta name="Keywords" content="老虎淘客叮咚抢"/>
        <meta name="Description" content="老虎淘客叮咚抢"/>
        <link href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/css/ddq/wap_common.css" rel="stylesheet">
        <link href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/css/ddq/wapshoufa.css?v=201710171737" rel="stylesheet"/>
         <script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/jquery-1.8.3.min.js"></script>
        <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/lazyload.js?v=201709111616" ></script>
        <!-- 皮肤 S-->
                <!-- 皮肤 E-->
    </head>
    <style>
        html {
            background: none
        }
    </style>
    <body data-appid="1" data-in="1">
        <div class="main-title clearfix theme-bg-color-1">
            <a href="javascript:void(0)" class="main-back"></a>
            <div class="menu-detail">
                <span>整点限时抢-咚咚抢</span>
            </div>
            <a class="mui-action-menu main-home" href="<?php  echo $this->createMobileUrl('index',array('pid'=>$pid,'dluid'=>$dluid))?>"></a>
        </div>

        <!-- 主界面具体展示内容 -->
        
<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/swiper-3.4.2.jquery.min.js?v=201710171737"></script>
<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/vue.min.js?v=201710171737"></script>
<link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/css/swiper-3.4.2.min.css?v=201710171737">

<style>
    .goods-block{
        width: 94%;
        padding:0 3%;
        background-color: #fff;
        /*min-height: 800px;*/
    }
    .goods-list{
        width: 100%;
        padding: 15px 0;
        border-bottom: 1px solid #eee;
        /*border: 1px solid red;*/
        display: block;
    }
    .goods-list:last-child {
        border-bottom: none;
    }
    .gl-img{
        /*width: 120px;*/
        /*height: 120px;*/
        width: 35%;
        vertical-align: middle;
        float: left;
    }
    .gl-content{
        height: 120px;
        width: 60%;
        margin-left: 3%;
        float: left;
        text-align: left;
        font-family: "Microsoft yahei";
    }
    .glc-title{
        font-size: 1em;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        color: #333;
    }
    .glc-des{
        font-size: 0.9em;
        color: #FF7580;
        overflow: hidden;
        text-align: justify;
    }
    .yhq{
        width:50px;
        height: 18px;
        background-color: #FF9960;
        float: left;
    }
    .zsz{
        font-size: 0.7em;
        border: 1px solid #FF9960;
        color: #FF9960;
        float: left;
        margin-left: 3%;
        padding:0 3px;
    }
    .hasq{
        font-size: 0.7em;
        float: right;
        color: #aaa;
    }
    .hasq span{
        color: #FF9960;
        font-family: Arial;
    }
    .cf{
        clear: both;
    }
    .glc-price{
        font-size: 1.1em;
        color: #df2434;
        float: left;
        font-family: Arial;
        font-weight:bold;
    }
    .priceNum{
        font-size: 1.1em!important;
        color: #df2434!important;
        font-family: Arial!important;
        font-weight:bold!important;
    }
    .glc-price span{
        color: #aaa;
        font-size: 0.7em;
        font-weight: normal;
    }
    .glc-btn {
        float: right;
        background-color: #df2434;
        color: #fff;
        text-align: center;
        border-radius: ;
    }
    .glc-zdt{
        clear: both;
        height:20px;
    }
    .gl-bot{
        margin: 5px 0;
    }
    .swiper-container {
        height: 100%;
        width: 100%;
        position: relative;
    }
    .qunjine{
        display: inline-block;
        margin-left:-2px;
        font-family: Arial;
    }
    .ykq{
        width: 25%;
        margin-top: 10px;
        text-align: center;
        font-size: 1em;
        float: left;
    }
    .ykq p{
        font-size: 0.7em;
        color: #999;
    }

    .swiper-slide{
        text-align: center;
        vertical-align: middle;
        padding-top: 10px;
        color: #fff!important;
        font-family:Arial;
    }
    .swiper-slide p{
        font-size: 12px;
        color: #999;
        font-family: "Microsoft yahei";
        margin-top: -1px;
    }
    .perple{
        width: 25%;height: 100%;background-color: #A928F2;position: absolute;bottom: 0
    }
    .perple i{
        border-top: 8px solid #A928F2;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        position: absolute;
        bottom: -8px;
        left: 50%;
        margin-left: -10px
    }
    .goods_coupon {
        position: relative;
        /*width: 50px;*/
        padding: 0 5px;
        height: 18px;
        background: #FF9960;
        border-radius: 2px;
        line-height: 18px;
        text-align: center;
        font-size: 12px;
        color: white;
        float: left;
    }
    .clb{
        position: absolute;
        width: 6px;
        background-color: #fff;
        border-radius: 100%;
        margin-top: -3px;
        top: 50%;
        height: 6px;
    }
    .c_l{
        left: -3px;
    }
    .c_r{
       right:-3px;
    }
    .mylist{
        display: none;
    }
    .fixed{
        position: fixed;
        top:44px;
    }
    .wap-navTime{
        z-index: 9999;
    }
    @media screen and (max-width : 320px) {
        .wap-banner{
            width: 100%;/*height: 90px;*/margin-top: 44px;
        }
        .wap-navTime {
            width: 100%;  height: 45px;  background-color: #333;  color: #fff;
        }
        .swiper-slide{
            font-size: 1em;padding-top: 5px;
        }
        .goods-list{
            height: 100px;
        }
        .gl-content{
            font-size: 14px;
        }
        .glc-des{
            height: 32px;
            margin: 6px 0;
        }
        .glc-btn{
            width: 58px;
            height: 19px;
            line-height: 19px;
            font-size: 0.7em;
        }
    }
    @media screen and (min-width: 321px) and (max-width : 375px) {
        .wap-banner{
            width: 100%;/*height: 110px;*/margin-top: 44px;
        }
        .wap-navTime {
            width: 100%;  height: 50px;  background-color: #333;  color: #fff;
        }
        .swiper-slide{
            font-size: 1.1em;padding-top: 7px;
        }
        .goods-list{
            height: 120px;
        }
        .gl-content{
            font-size: 16px;
        }
        .glc-des{
            height: 45px;
            margin: 6px 0;
        }
        .glc-btn{
            width: 65px;
            height: 22px;
            line-height: 22px;
            font-size: 0.7em;
        }
    }
    @media screen and (min-width: 376px) {
        .wap-banner{
            width: 100%;/*height: 130px;*/margin-top: 44px;
        }
        .wap-navTime {
            width: 100%;  height: 60px;  background-color: #333;  color: #fff;
        }
        .swiper-slide{
            font-size: 1.2em;padding-top: 11px;
        }
        .goods-list{
            height: 136px;
        }
        .gl-content{
            font-size: 18px;
        }
        .glc-des{
            height: 54px;
            margin: 6px 0;
        }
        .glc-btn{
            width: 70px;
            height: 25px;
            line-height: 25px;
            font-size: 0.8em;
        }
    }
    .hasNogoods {
        text-align: center;
        color: #999;
        font-size: 14px;
        padding: 40px 0;
    }
</style>



<div class="wap-banner">
    <img style="display: block;" width="100%" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/imgs/ddq_banners.jpg" alt="">
</div>
<div class="wap-navTime">
<!--    <span class="perple"><i></i></span>-->
    <div class="swiper-container">
        <div class="swiper-wrapper" style="width: 50%;">

                <!--<a href="javascript:;" class="swiper-slide" data-type="1700" data-check="0"  data-types="1">
                   昨日
                </a>-->
                <?php  if(is_array($catlist)) { foreach($catlist as $v) { ?>
                <a  href="javascript:;" class="swiper-slide" data-type="<?php  echo $v['type'];?>" data-check="<?php  echo $v['check'];?>"  data-types="<?php  echo $v['types'];?>">
                    <?php  echo $v['title'];?> <p><?php  echo $v['dtitle'];?></p>
                </a>
                <?php  } } ?>
                <!--<a href="javascript:;" class="swiper-slide" data-type="1710" data-check="0"  data-types="1">
                    13:00<p ><?php  if($kj2==1) { ?>已开抢<?php  } else { ?>即将开始<?php  } ?></p>
                </a>
                <a href="javascript:;" class="swiper-slide" data-type="1713" data-check="0"  data-types="1">
                    19:00<p><?php  if($kj3==1) { ?>已开抢<?php  } else { ?>即将开始<?php  } ?></p>
                </a>
                <a  href="javascript:;" class="swiper-slide" data-type="1713" data-check="0"  data-types="1">
                    21:00<p ><?php  if($kj4==1) { ?>已开抢<?php  } else { ?>即将开始<?php  } ?></p>
                </a>
                <a  href="javascript:;" class="swiper-slide" data-type="1713" data-check="0"  data-types="1">
                    21:00<p ><?php  if($kj4==1) { ?>已开抢<?php  } else { ?>即将开始<?php  } ?></p>
                </a>
                <a  href="javascript:;" class="swiper-slide" data-type="1713" data-check="1"  data-types="1">
                    99:00<p ><?php  if($kj4==1) { ?>已开抢<?php  } else { ?>即将开始<?php  } ?></p>
                </a>
                <a  href="javascript:;" class="swiper-slide" data-type="1713" data-check="0"  data-types="1">
                    21:00<p ><?php  if($kj4==1) { ?>已开抢<?php  } else { ?>即将开始<?php  } ?></p>
                </a>-->
  
        </div>
    </div>
</div>

<script language="javascript">
    $(".swiper-slide[data-check='1']").css("backgroundColor","#A928F2");
    $(".swiper-slide[data-check='1']").find("p").css("color","#fff");
    var creIndex = $(".swiper-slide[data-check='1']").index()-1;
    var mySwiper = new Swiper('.swiper-container',{
        direction:"horizontal",
        slidesPerView:4,
        initialSlide :creIndex,
    })
    $('.swiper-slide').click(function(){
        mySwiper.slideTo(parseInt(mySwiper.clickedIndex-1), 1000, false)
    })

//
    $(".swiper-slide").click(function(){
        $(".swiper-slide").css("backgroundColor","#333");
        $(".swiper-slide").find("p").css("color","#999")
        $(this).css("backgroundColor","#A928F2");
        $(this).find("p").css("color","#fff");
        var types=$(this).attr("data-types");
        var type=$(this).attr("data-type");
        //alert(type);
        $(".jiaz").css("display","block");
        getlist(type,types);
    });
</script>



<div class="goods-block"  id="table">
    <div id="test"></div>
    <p class="jiaz" style="width: 100%;text-align: center;height: 9999px;line-height: 50px;display:none;">加载中！请稍后</p>
    <div id="list">    	
    	<!--<a href="/index.php?r=l/d&id=4129426&nav_wrap=ddq" class="goods-list my-goods-list">
	        <img class="gl-img" src="https://img.alicdn.com/imgextra/i4/1885672960/TB23wOIoSBjpuFjSsplXXa5MVXa_!!1885672960.jpg_240x240.jpg" alt="">
	        <div class="gl-content">
	            <p class="glc-title">【红粉女王】性感婚纱隐形内衣2件装</p>
	            <p class="glc-des">三种颜色随心选，秀出性感美肩【赠运费险】</p>
	            <div class="glc-zdt">
	
	                <div class="goods_coupon"><span class="c_l clb"></span><span class="c_r clb"></span><span>券 ￥</span><span class="qunjine">5</span></div>
	                                <span class="zsz">折上折</span>
	                                <p class="hasq">已抢<span>6244</span>件</p>
	            </div>
	            <div class="cf gl-bot">
	                <p class="glc-price">￥ <span class="priceNum">33</span> <span> 券后</span></p>
	                <div class="glc-btn">马上抢</div>
	            </div>
	        </div>
	    </a>-->	    
    </div>
    <!--<p class="hasNogoods">本场次商品已经加载完毕啦 ￣O￣)ノ</p>-->
</div>
<link href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/layui/css/layui.css" rel="stylesheet">
<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/layui/layui.js" charset="utf-8"></script>
<style>
.layui-flow-more a i{color:#ff006c;}
</style>
<script type="text/javascript">
	 		function getlist(hdtype,check){
	 			layui.use('flow', function(){
		            var $ = layui.jquery;
		            var flow = layui.flow;
		            var pid="<?php  echo $pid;?>";
		            var dluid="<?php  echo $dluid;?>";
		            var lbratetype="<?php  echo $cfg['lbratetype'];?>";
		            var kj=check;
		           //alert(hdtype);

		            
		            flow.load({
		                elem: '#table'
                        ,end: '本场次商品已经加载完毕啦 ￣O￣)ノ！'
		                ,done: function(page, next){
		                    var lis =[];
                            var tmpl='';
		                    $.get("<?php  echo $this->createMobileUrl('ddq')?>&page="+page+"&hdtype="+hdtype, function(res){
		                    	res=JSON.parse(res);
		                    	$(".jiaz").css("display","none");
		                        layui.each(res.data, function(index, item){
		                        	
		                        	if(kj==1){
		                        		tmpl+='<a href="<?php  echo $this->createMobileUrl("view")?>'+'&id='+item.id+'&dluid=<?php  echo $dluid;?>&lm='+item.lm+'&itemid='+item.itemid+'&org_price='+item.itemprice+'&price='+item.itemendprice+'&coupons_price='+item.couponmoney+'&goods_sale='+item.itemsale+'&title='+item.itemtitle+'&pic_url='+encodeURIComponent(item.itempic)+'" class="goods-list my-goods-list">'; 
		                        	}else{
		                        		tmpl+='<a href="javascript:void(0)" class="goods-list my-goods-list">'; 
		                        	}
									        tmpl+='<img class="gl-img" src="'+item.itempic+'" alt="">'; 
									        tmpl+='<div class="gl-content">'; 
									           tmpl+=' <p class="glc-title">'+item.itemtitle+'</p>'; 
									            tmpl+='<p class="glc-des" style="line-height: 25px;">'+item.itemdesc+'</p>'; 
									            tmpl+='<div class="glc-zdt">'; 									
									                tmpl+='<div class="goods_coupon"><span class="c_l clb"></span><span class="c_r clb"></span><span>券 ￥</span><span class="qunjine">'+item.couponmoney+'</span></div>'; 
									                  tmpl+='<span class="zsz">折上折</span>'; 
									                  tmpl+='<p class="hasq">已抢<span>'+item.itemsale+'</span>件</p>'; 
									            tmpl+='</div>'; 
									            tmpl+='<div class="cf gl-bot">'; 
									                tmpl+='<p class="glc-price">￥ <span class="priceNum">'+item.itemendprice+'</span> <span> 券后</span></p>'; 
									                if(kj==1){
									                	tmpl+='<div class="glc-btn">马上抢</div>';
									                }else{
									                	tmpl+='<div class="glc-link glc-btn" style="background-color: rgb(207, 187, 235);">即将开始</div>';
									                }
									                
									           tmpl+=' </div>'; 
									       tmpl+=' </div>'; 
									   tmpl+=' </a>'; 
		                        });
		                         $("#list").html("");
                                 $("#list").append(tmpl);

                                console.log(res.pages);
		                        next(lis.join(''), page < res.pages);
		                    });
		                }
		            });
		        });
	 		}
	
		    ;!function(){
		    	var check="<?php  echo $xzdata['check'];?>";
		    	var type="<?php  echo $xzdata['type'];?>";
		    	//alert(check)
		        getlist(type,check);
		    }();
		</script>

        <div class="toTop">&#xe601;</div>
        <!--<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/cms_common.js?v=201710171737"></script>-->
        <div style="display: none;"></div>
    <script>;</script><script type="text/javascript" src="http://hztbk.wjlnfs.com/app/index.php?i=2&c=utility&a=visit&do=showjs&m=tiger_newhu"></script></body>
</html>