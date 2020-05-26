<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php  if($ztview['title']) { ?><?php  echo $ztview['title'];?><?php  } ?><?php  if($share['nickname']) { ?><?php  echo $share['nickname'];?>的<?php  if($bl['fzname']) { ?><?php  echo $bl['fzname'];?><?php  } else { ?>分站<?php  } ?><?php  } ?><?php  if($hd==1) { ?>聚划算<?php  } else if($hd==2) { ?>淘抢购<?php  } ?> <?php  if($key) { ?><?php  echo $key;?><?php  } else { ?><?php  echo $fzview['title'];?><?php  } ?> <?php  if($px==1) { ?>销量最高<?php  } else if($px==2) { ?>价格最低<?php  } else if($px==3) { ?>优惠券最高<?php  } ?> <?php  echo $cfg['copyright'];?> </title>
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
    <div class="header-com so" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hb1.png);">
        <div class="l">
            <a href="javascript:void(0);" onclick="history.go(-1);"  class="back" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/h-back2.png);"></a>
        </div>
        <div class="r">
            <div class="so-box">
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
					<input type="hidden" name="zn" value="1">
                    <div class="inp">
                        <input type="text" class="text" name="key" id="key" value="<?php  echo $key;?>"  placeholder="搜索你想要的宝贝" >
                    </div>
                    <input  type="submit" value="搜索" class="sub">
                </form>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="m-ht17">
            <a href="<?php  echo $this->createMobileUrl('Newcat',array('type'=>$type,'px'=>'','tm'=>$tm,'price1'=>$price1,'price2'=>$price2,'page'=>$page,'hd'=>$hd,'dlyj'=>$dlyj,'pid'=>$pid,'dluid'=>$dluid,'key'=>$key,'zt'=>$zt))?>" class="s <?php  if($px=='') { ?>on<?php  } ?> s1">综合</a>
            <a href="<?php  echo $this->createMobileUrl('Newcat',array('type'=>$type,'px'=>2,'tm'=>$tm,'price1'=>$price1,'price2'=>$price2,'page'=>$page,'hd'=>$hd,'dlyj'=>$dlyj,'pid'=>$pid,'dluid'=>$dluid,'key'=>$key,'zt'=>$zt))?>" class="s s2 js-hc <?php  if($px==2) { ?>on<?php  } ?>">券后价<!-- <i></i --></a>
            <a href="<?php  echo $this->createMobileUrl('Newcat',array('type'=>$type,'px'=>1,'tm'=>$tm,'price1'=>$price1,'price2'=>$price2,'page'=>$page,'hd'=>$hd,'dlyj'=>$dlyj,'pid'=>$pid,'dluid'=>$dluid,'key'=>$key,'zt'=>$zt))?>" class="s s3 js-hc  <?php  if($px==1) { ?>on<?php  } ?>">销量<!-- <i></i> --></a>
            <a href="<?php  echo $this->createMobileUrl('Newcat',array('type'=>$type,'px'=>4,'tm'=>$tm,'price1'=>$price1,'price2'=>$price2,'page'=>$page,'hd'=>$hd,'dlyj'=>$dlyj,'pid'=>$pid,'dluid'=>$dluid,'key'=>$key,'zt'=>$zt))?>" class="s s4 <?php  if($px==3) { ?>on<?php  } ?>">券额</a>
        </div>
        <div class="m-ht16" style="padding-top: 44px;"  id="table">
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
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('tbgoods/style88/public_bottom', TEMPLATE_INCLUDEPATH)) : (include template('tbgoods/style88/public_bottom', TEMPLATE_INCLUDEPATH));?>
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
					                    $.get("<?php  echo $this->createMobileUrl('Newcatpost',array('type'=>$type,'px'=>$px,'tm'=>$tm,'price1'=>$price1,'price2'=>$price2,'hd'=>$hd,'dlyj'=>$dlyj,'pid'=>$pid,'dluid'=>$dluid,'zt'=>$zt,'rate'=>$rate,'key'=>$key))?>&page="+page, function(res){
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
		
			<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style9/js/jweixin-1.0.0.js"></script>
		<script>
			var fxtitle=$("title").html();
			var desc=$("title").html();
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