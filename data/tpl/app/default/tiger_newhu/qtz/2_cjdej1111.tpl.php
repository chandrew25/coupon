<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />

    <title>超级好货大额券榜</title>
    <meta name="description" content="超级好货大额券榜" />
    <meta name="keywords" content="超级好货大额券榜" />

    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/qtz/css/m-cui.css">
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/qtz/css/m-lib.css" />

<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/js/jquery-1.7.2.min.js"></script>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/qtz/js/lib.js"></script>
</head>
<body>

    <div class="slot-ban" id="top">
        <a href=""><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/qtz/images/dej.jpg" alt=""></a>
    </div>

    <div class="slot-tabs">
        <div class="header-nav">
            <ul class="header-nav-list">
                <li class="item active js-nav-item"><a href="javascript:;"   onclick="classtype(7577);"><span>精选</span></a></li>
                <li class="item js-nav-item"><a href="javascript:;"  onclick="classtype(8034);"><span>女装</span></a></li>
                <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8036);"><span>家居家装</span></a></li>
                <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8035);"><span>数码家电</span></a></li>
                <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8172);"><span>母婴</span></a></li>
                <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8173);"><span>食品</span></a></li>
                <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8038);"><span>男装</span></a></li>
                <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8040);"><span>美妆个护</span></a></li>
                <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8170);"><span>运动户外</span></a></li>
                <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8169);"><span>内衣</span></a></li>
                <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8171);"><span>鞋包配饰</span></a></li>
            </ul>
            <div class="filter-icon js_nav"></div>
        </div>
    </div>
    <ul class="header-nav-cont">
        <li class="item active js-nav-item"><a href="javascript:;"   onclick="classtype(7577);"><span>精选</span></a></li>
        <li class="item js-nav-item"><a href="javascript:;"  onclick="classtype(8034);"><span>女装</span></a></li>
        <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8036);"><span>家居家装</span></a></li>
        <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8035);"><span>数码家电</span></a></li>
        <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8172);"><span>母婴</span></a></li>
        <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8173);"><span>食品</span></a></li>
        <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8038);"><span>男装</span></a></li>
        <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8040);"><span>美妆个护</span></a></li>
        <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8170);"><span>运动户外</span></a></li>
        <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8169);"><span>内衣</span></a></li>
        <li class="item js-nav-item"><a href="javascript:;" onclick="classtype(8171);"><span>鞋包配饰</span></a></li>
    </ul>

    <div class="slot-list" id="table">
        <div class="list active" id="list">
			
           <!-- <a class="item" href="">
                <div class="pic"><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/qtz/images/img-01.webp" alt=""></div>
                <div class="txt">
                    <div class="name"><img class="icon" src="images/icon-tab.png">1【双12预售】日本资生堂可悠然美肌沐浴露550ml*2+替换装400ml*2</div>
                    <div class="info">
                        <span class="price">现价&nbsp;¥<i>129</i></span>
                        <span class="sell">已售42件</span>
                    </div>
                    <div class="discount-price">
                        <div class="coupon-icon">
                            <span class="coupon-icon-left">券</span>
                            <span class="coupon-icon-right">10元</span>
                        </div>
                        <span class="price-title">券后价</span>
                        <span class="price-num"><i>¥</i>119.00</span>
                    </div>
                </div>
            </a> -->
       
        </div>
    </div>
		<div class="bottomnav">生成口令购买</div>
		<style>
			.bottomnav{
				position: fixed;
				bottom: 0;
				text-align: center;
				height: 40px;
				line-height: 40px;
				background:linear-gradient(to right, #ff4719 0%,#ff1c8f 100%);
				width: 100%;
				color: #ffffff;
			}
			/* 弹窗 */
		.mbboxa{width: 100%;position:fixed;box-sizing:border-box;top:0;background: rgba(0,0,0,.3);z-index: 888;height:1280px;text-align: center}
		.tcbox{margin: 0 auto;width:80%;height:210px;background: #ffffff;position:fixed;left:10%;z-index: 99999;top:20%;border-radius: 5px}
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
			<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/clipboard.min.js"></script>
			<div class='mbboxa' id="closkl" style="display: none;">
				<div class='tcbox'>
					<div class='tchead'>口令购买</div>
					<div class='tcxbox'>
								<div class='tcbt'>一键复制->全选->打开淘APP购买</div>
								<div class='tcinfo'><input  value='<?php  echo $tkl;?>' type="text" id="bar"/></div>
								<div class='txbot'><div class="yjbtn" id="copy-code" data-clipboard-action="copy" data-clipboard-target="#bar">一键复制</div></div>
					</div>  
						<div class="closebtn"><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/qtz/images/close.png"></div>
				</div> 
				
			</div>
			<script>
				jQuery(function($) {
					$('.closebtn').on('click', function(){
							$('#closkl').css('display', 'none');						
					});
					$('.bottomnav').on('click', function(){
							$('#closkl').css('display', 'block');						
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

    <div class="pop-bg"></div>

    <a href="#top" class="to-top"></a>
	
	
	<link href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/layui/css/layui.css" rel="stylesheet">
	<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/layui/layui.js" charset="utf-8"></script>
	
	<script type="text/javascript">
		var  limit=1;
		var MaterialId="<?php  echo $MaterialId;?>";
		function classtype(a){
			MaterialId=a;
			//alert(MaterialId);
			$("#list").html("");
						;!function(){
							layui.use('flow', function(){
								var $ = layui.jquery;
								var flow = layui.flow;		
													
				
			
								// alert(tzurl);
								flow.load({
									elem: '#table'
									,end: '本场次商品已经加载完毕啦 ￣O￣)ノ！'
									,done: function(page, next){
										var lis =[];
										//var lbratetype="<?php  echo $cfg['lbratetype'];?>";
										//var dltype="<?php  echo $zxshare['dltype'];?>";
										page=limit;
										limit++;
										
										console.log(page);
										console.log("<?php  echo $this->createMobileUrl('cjdej1111',array('tj'=>$tj,'key'=>$key,'tm'=>$tm,'typeid'=>$typeid,'pid'=>$pid,'zn'=>$zn,'lx'=>$lx,))?>&page="+page+"&MaterialId="+MaterialId);
										var tmpl='';
															
										$.get("<?php  echo $this->createMobileUrl('cjdej1111',array('tj'=>$tj,'key'=>$key,'tm'=>$tm,'typeid'=>$typeid,'pid'=>$pid,'zn'=>$zn,'lx'=>$lx))?>&page="+page+"&MaterialId="+MaterialId, function(res){
										// alert(res); 
										res=JSON.parse(res);
											
											
											console.log(res);
											layui.each(res.data, function(index, item){
												
												tmpl+='<a class="item" href="<?php  echo $this->createMobileUrl("view")?>'+'&id='+item.id+'&dluid=<?php  echo $dluid;?>&lm='+item.lm+'&itemid='+item.itemid+'&org_price='+item.itemprice+'&price='+item.itemendprice+'&coupons_price='+item.couponmoney+'&goods_sale='+item.itemsale+'&title='+item.itemtitle+'&pic_url='+encodeURIComponent(item.itempic)+'&pid='+item.pid+'">';
													tmpl+='<div class="pic"><img src="'+item.itempic+'" alt=""></div>';
													tmpl+='<div class="txt">';
														tmpl+='<div class="name">'+item.itemtitle+'</div>';
														tmpl+='<div class="info">';
															tmpl+='<span class="price">现价&nbsp;¥<i>'+item.itemprice+'</i></span>';
															tmpl+='<span class="sell">已售'+item.itemsale+'件</span>';
														tmpl+='</div>';
														tmpl+='<div class="discount-price">';
														if(item.couponmoney){
															tmpl+='<div class="coupon-icon">';
																tmpl+='<span class="coupon-icon-left" style="height: 15px;line-height: 15px;">券</span>';
																tmpl+='<span class="coupon-icon-right">'+item.couponmoney+'元</span>';
															tmpl+='</div>';
														}	
															tmpl+='<span class="price-title">券后价</span>';
															tmpl+='<span class="price-num"><i>¥</i>'+item.itemendprice+'</span>';
														tmpl+='</div>';
													tmpl+='</div>';
												tmpl+='</a>';	
											});
											$("#list").append(tmpl);
											
											console.log(page);
											next(lis.join(''), page < res.pages);
										});
									}
								});
								
								//按屏加载图片
								  flow.lazyimg({
									elem: '#table img'
									//,scrollElem: '#LAY_demo3' //一般不用设置，此处只是演示需要。
								  });
							});
						}();
		}
		
	   $(document).delegate("a", "click", function (e) {
	
	        var url = $(this).attr("href");
			//alert(url);
	        if($("#list a").length == 0) return;
	        window.localStorage.setItem("top", document.body.scrollTop);
	        window.localStorage.setItem("html", $("#list").html());
	        window.localStorage.setItem("url", window.location.href);
				// alert( $("#list").html());
			
	    });
		
	
	    if(window.localStorage.getItem("url") == window.location.href && window.localStorage.getItem("top") != "null") {
			
	      $("#list").html(window.localStorage.getItem("html"));
	        document.body.scrollTop = window.localStorage.getItem("top");
	        window.localStorage.setItem("top", "null");
	        window.localStorage.setItem("html", "null");
	        window.localStorage.setItem("url", "null");		
			 	//alert(limit);
			var le=$("#list a").length;
			limit=1+Math.ceil(le/20);
			 window.localStorage.setItem("limit", limit);
			 window.localStorage.getItem("limit")
	    }	
	
							
							
			    ;!function(){
			        layui.use('flow', function(){
			            var $ = layui.jquery;
			            var flow = layui.flow;		
											
		
  
			           // alert(tzurl);
			            flow.load({
			                elem: '#table'
	                        ,end: '本场次商品已经加载完毕啦 ￣O￣)ノ！'
			                ,done: function(page, next){
			                    var lis =[];
			                    //var lbratetype="<?php  echo $cfg['lbratetype'];?>";
			            		//var dltype="<?php  echo $zxshare['dltype'];?>";
			                    page=limit;
								limit++;
								
								console.log(page);
								console.log("<?php  echo $this->createMobileUrl('cjdej1111',array('tj'=>$tj,'key'=>$key,'tm'=>$tm,'typeid'=>$typeid,'pid'=>$pid,'zn'=>$zn,'lx'=>$lx,))?>&page="+page+"&MaterialId="+MaterialId);
	                            var tmpl='';
													
			                   	 $.get("<?php  echo $this->createMobileUrl('cjdej1111',array('tj'=>$tj,'key'=>$key,'tm'=>$tm,'typeid'=>$typeid,'pid'=>$pid,'zn'=>$zn,'lx'=>$lx))?>&page="+page+"&MaterialId="+MaterialId, function(res){
			                    // alert(res); 
								 res=JSON.parse(res);
			                    	
									 
			                    	console.log(res);
			                        layui.each(res.data, function(index, item){
										
										tmpl+='<a class="item" href="<?php  echo $this->createMobileUrl("view")?>'+'&id='+item.id+'&dluid=<?php  echo $dluid;?>&lm='+item.lm+'&itemid='+item.itemid+'&org_price='+item.itemprice+'&price='+item.itemendprice+'&coupons_price='+item.couponmoney+'&goods_sale='+item.itemsale+'&title='+item.itemtitle+'&pic_url='+encodeURIComponent(item.itempic)+'&pid='+item.pid+'">';
											tmpl+='<div class="pic"><img src="'+item.itempic+'" alt=""></div>';
											tmpl+='<div class="txt">';
												tmpl+='<div class="name">'+item.itemtitle+'</div>';
												tmpl+='<div class="info">';
													tmpl+='<span class="price">现价&nbsp;¥<i>'+item.itemprice+'</i></span>';
													tmpl+='<span class="sell">已售'+item.itemsale+'件</span>';
												tmpl+='</div>';
												tmpl+='<div class="discount-price">';
												if(item.couponmoney){
													tmpl+='<div class="coupon-icon">';
														tmpl+='<span class="coupon-icon-left" style="height: 15px;line-height: 15px;">券</span>';
														tmpl+='<span class="coupon-icon-right">'+item.couponmoney+'元</span>';
													tmpl+='</div>';
												}	
													tmpl+='<span class="price-title">券后价</span>';
													tmpl+='<span class="price-num"><i>¥</i>'+item.itemendprice+'</span>';
												tmpl+='</div>';
											tmpl+='</div>';
										tmpl+='</a>';	
			                        });
	                                 $("#list").append(tmpl);
	                                
	                                console.log(page);
			                        next(lis.join(''), page < res.pages);
			                    });
			                }
			            });
						//按屏加载图片
						flow.lazyimg({
							elem: '#table img'
							//,scrollElem: '#LAY_demo3' //一般不用设置，此处只是演示需要。
						});
			        });
			    }();
			</script>
		<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style9/js/jweixin-1.0.0.js"></script>
	<script>
		
		var key="<?php  echo $_GPC['key'];?>";
		var fxtitle="双12TOP品牌尖货榜";
		var desc="双12TOP品牌尖货榜";
		
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