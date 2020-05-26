<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php  if($share['nickname']) { ?><?php  echo $share['nickname'];?>的<?php  if($bl['fzname']) { ?><?php  echo $bl['fzname'];?><?php  } else { ?>分站<?php  } ?><?php  } ?><?php  echo $cfg['copyright'];?></title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<link href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/layui/css/layui.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/style.css" />
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/layer.css" />
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/jquery.js"></script>
    <script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/clipboard.min.js"></script>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/layer.js"></script>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/lib.js"></script>
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
</head>

<body class="body-idx body-com">
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/footer-search.css">
    <div class="header-com so" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tuike_pdd/template/mobile/pdd/images/bj4.jpg);">
        <div class="l">
            <a href="javascript:void(0);" onclick="history.go(-1);"  class="back" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/h-back2.png);"></a>
        </div>
        <div class="r">
            <div class="so-box">
                <form id="search-form" action="<?php  echo $this->createMobileUrl('jdcjgoodslist')?>" method="get">
                	<input type="hidden" name="i" value="<?php  echo $_W['uniacid'];?>">
	                <input type="hidden" name="c" value="entry">
	                <input type="hidden" name="do" value="jdcjgoodslist">
	                <input type="hidden" name="m" value="tuike_jd">
	                <input type="hidden" name="with_coupon" value="false">    
                    <div class="inp">
                        <input type="text" class="text" name="key" id="key" value="<?php  echo $keyword;?>"  placeholder="搜索你想要的宝贝" >
                    </div>
                    <input  type="submit" value="搜索" class="sub">
                </form>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="m-ht17">
            <a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('key'=>$keyword,'type'=>$type,'px'=>0,'hd'=>$hd,'quan'=>$quan))?>" class="s <?php  if($px==0) { ?>on<?php  } ?> s1">综合</a>
            <a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('key'=>$keyword,'type'=>$type,'px'=>4,'hd'=>$hd,'quan'=>$quan))?>" class="s s2 js-hc <?php  if($px==4) { ?>on<?php  } ?>">券后价<!-- <i></i --></a>
            <a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('key'=>$keyword,'type'=>$type,'px'=>2,'hd'=>$hd,'quan'=>$quan))?>" class="s s3 js-hc  <?php  if($px==2) { ?>on<?php  } ?>">销量<!-- <i></i> --></a>
            <a href="<?php  echo $this->createMobileUrl('jdcjgoodslist',array('key'=>$keyword,'type'=>$type,'px'=>3,'hd'=>$hd,'quan'=>$quan))?>" class="s s4 <?php  if($px==3) { ?>on<?php  } ?>">奖励</a>
        </div>
        <div class="m-ht16" style="padding-top: 44px;"  id="table">
            <!-- 样式3 -->
            <ul class="ul-quan2" style="background: #f0f0f0;"  id="goods_box">
            </ul>
        </div>
    </div>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jd/public_bottom', TEMPLATE_INCLUDEPATH)) : (include template('jd/public_bottom', TEMPLATE_INCLUDEPATH));?>
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
					                    $.get("<?php  echo $this->createMobileUrl('jdcjgoodslist',array('op'=>1,'key'=>$keyword,'type'=>$type,'hd'=>$hd,'px'=>$px,'quan'=>$quan))?>&page="+page, function(res){
					                    	res=JSON.parse(res);
					                    	//alert(res);
					                    	//console.log(res);
					                    	
					                    	
					                        layui.each(res.data, function(index, item){
					                        	//if(kj==1){
					                        		
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
																					if(item.couponmoney){
																						content +='<div class="btn btn1"><span class="sp1">领券</span><span class="sp2">'+item.couponmoney+'元</span></div>';
																					}										 										
																					
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
			                                 $("#goods_box").append(content);
			
			                                //console.log(content);
					                        next(lis.join(''), page < 50);
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
    <script>
        $('.m-ht17 .s').click(function() {
            $(this).addClass('on').siblings('.s').removeClass('on');
            $(this).toggleClass('ok')
        })

        $(".text").keydown(function() {
            if ($.trim($(this).val()).length <= 1 && event.keyCode == 8) {
                $(this).siblings('.res').removeClass('on');
            } else {
                $(this).siblings('.res').addClass('on');
            }
        });
        $(".res").click(function() {
            $(this).siblings('.text').val("").focus();
            $(this).removeClass('on');
        });
    </script>
    <a class="gotop iconfont icon-shang" href="javascript:;"></a>
<script>;</script><script type="text/javascript" src="http://hztbk.wjlnfs.com/app/index.php?i=2&c=utility&a=visit&do=showjs&m=tuike_jd"></script></body>

</html>