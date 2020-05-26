<?php defined('IN_IA') or exit('Access Denied');?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php  echo $qtz['title'];?></title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/zt/css/style.css?time=2019">
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/zt/js/jquery.min.js"></script>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/zt/js/lib.js?time=2019"></script>
</head>
<body>

    <div class="slot-ban" id="top">
        <a href="javascript:;"><img src="<?php  echo tomedia($qtz['picurl'])?>" alt=""></a>
    </div>
	
	<?php  if($catlist['0']['1']) { ?>
	<div class="slot-tabs">
	    <div class="header-nav">
	        <ul class="header-nav-list">
	            <?php  if(is_array($catlist)) { foreach($catlist as $k=>$v) { ?>
	            <li class="item <?php  if($qtz['cateid']==$v['1']) { ?>active<?php  } ?> js-nav-item"><a href="javascript:;"   onclick="classtype(<?php  echo $v['1'];?>);"><span><?php  echo $v['0'];?></span></a></li>
	            <?php  } } ?>
	        </ul>
	        <div class="filter-icon js_nav"></div>
	    </div>
	</div>
	<ul class="header-nav-cont">
	   <?php  if(is_array($catlist)) { foreach($catlist as $k=>$v) { ?>
			<li class="item <?php  if($qtz['cateid']==$v['1']) { ?>active<?php  } ?> js-nav-item"><a href="javascript:;"   onclick="classtype(<?php  echo $v['1'];?>);"><span><?php  echo $v['0'];?></span></a></li>
	   <?php  } } ?>
	</ul>
	<?php  } ?>
	



    <div class="slot-list" id="table" <?php  if($qtz['bjcolor']) { ?>style="min-height: 100vh; background: <?php  echo $qtz['bjcolor'];?>;"<?php  } else { ?>style="min-height: 100vh;"<?php  } ?>>
        <ul class="list active" id="list">
			
           <!-- <li>
                <a class="item" href="">
                    <div class="pic"><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/zt/images/img-1.jpg" alt=""></div>
                    <div class="txt">
                        <div class="name">1【双12预售】日本资生堂可悠然美肌沐浴露550ml*2+替换装400ml*2</div>
                        <div class="discount-price">
                            <div class="coupon-icon">
                                <span class="coupon-icon-left">券</span>
                                <span class="coupon-icon-right">510元</span>
                            </div>
                            <span class="sell">已售42件</span>
                        </div>
                        <div class="info">
                            <div class="price">券后<span>¥<i>49.00</i></span></div>
                            <div class="addr">太平鸟联合创景专卖店</div>
                        </div>
                    </div>
                </a>
                <div class="btns-wp">
                    <a href=""><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/zt/images/icon-wallet.png" alt="" class="icon">赚<i class="unit">￥</i><span class="money">6.37</span></a>
                    <a href=""><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/zt/images/icon-share.png" alt="" class="icon">赚<i class="unit">￥</i><span class="money">6.37</span></a>
                </div>
            </li> -->
     
        </ul>
    </div>

    <div class="pop-bg"></div>

    <a href="#top" class="to-top"></a>
	
	
	
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
				<div class='tchead'>淘礼金口令购买</div>
				<div class='tcxbox'>
							<div class='tcbt'>一键复制->全选->打开淘APP购买</div>
							<div class='tcinfo'><input  value='' name="tkl" type="text" id="bar"/></div>
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
	
	<link href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/layui/css/layui.css" rel="stylesheet">
		<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/layui/layui.js" charset="utf-8"></script>
		
		<script type="text/javascript">
			var  limit=0;
			var tigerapp="<?php  echo $tigerapp;?>";
			var MaterialId="<?php  echo $MaterialId;?>";
			function classtype(a){
				MaterialId=a;
				limit=0;
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
											
											//console.log(page);
											//console.log("<?php  echo $this->createMobileUrl('cjdej1111',array('tj'=>$tj,'key'=>$key,'tm'=>$tm,'typeid'=>$typeid,'pid'=>$pid,'zn'=>$zn,'lx'=>$lx,))?>&page="+page+"&MaterialId="+MaterialId);
											var tmpl='';
																
											$.get("<?php  echo $this->createMobileUrl('wnqtzgoods',array('op'=>'toajax','id'=>$id,'tj'=>$tj,'key'=>$key,'tm'=>$tm,'typeid'=>$typeid,'pid'=>$pid,'zn'=>$zn,'lx'=>$lx))?>&page="+page+"&MaterialId="+MaterialId, function(res){
											// alert(res); 
											res=JSON.parse(res);
												
												
												console.log(res);
												layui.each(res.data, function(index, item){
													
	
				tmpl+='<li>';
				if(MaterialId==18847){
					tmpl+='<a data-url='+item.url+'  data-title='+item.itemtitle+' data-picurl='+item.itempic+' onclick="openProductWinlj(this)">';
				}else{
					if(tigerapp==1){
						tmpl+='<a data-yj='+item.yj+' data-sj='+item.sj+' data-itemid='+item.itemid+' data-itemprice='+item.itemprice+' data-itemendprice='+item.itemendprice+' data-couponmoney='+item.couponmoney+' data-itemsale='+item.itemsale+' data-itemtitle='+item.itemtitle+' data-itempic='+item.itempic+' href="javascript:;" onclick="openProductWin(this)">';
					}else{
						tmpl+='<a class="item" href="<?php  echo $this->createMobileUrl("view")?>'+'&id='+item.id+'&dluid=<?php  echo $dluid;?>&lm='+item.lm+'&itemid='+item.itemid+'&org_price='+item.itemprice+'&price='+item.itemendprice+'&coupons_price='+item.couponmoney+'&goods_sale='+item.itemsale+'&title='+item.itemtitle+'&pic_url='+encodeURIComponent(item.itempic)+'">';
					}	
				}
				
							
				tmpl+='<div class="pic"><img src="'+item.itempic+'_250x250.jpg" alt=""></div>';
				tmpl+='<div class="txt">';
				tmpl+='<div class="name">';
				//alert(item.shoptype)
				if(item.shoptype!=null){
					if(item.shoptype==1){
						tmpl+='<i class="g-tm"></i>';
					}else{
						tmpl+='<i class="g-tb"></i>';
					}
				}
				tmpl+=item.itemtitle+'</div>';
				tmpl+='<div class="discount-price">';
				if(item.couponmoney){
					tmpl+=' <div class="coupon-icon">';
					tmpl+=' <span class="coupon-icon-left">券</span>';		
					tmpl+=' <span class="coupon-icon-right">'+item.couponmoney+'元</span>';
					tmpl+='</div>';
				}		
				tmpl+=' <span class="sell">已售'+item.itemsale+'件</span>';
				tmpl+='</div>';
				tmpl+='<div class="info">';
				if(MaterialId==18847){
					tmpl+='  <div class="price">礼金价<span>¥<i>1</i></span></div>';
				}else{
					tmpl+='  <div class="price">券后<span>¥<i>'+item.itemendprice+'</i></span></div>';
				}				
				
				if(item.shopTitle){
					tmpl+=' <div class="addr">'+item.shopTitle+'</div>';
				}		
				tmpl+=' </div>';
				tmpl+='</div>';
				tmpl+='</a>';
				tmpl+='<div class="btns-wp">';
				//tmpl+='  <a href=""><img src="<?php  echo $_W["siteroot"];?>addons/tiger_newhu/template/mobile/zt/images/icon-wallet.png" alt="" class="icon">赚<i class="unit">￥</i><span class="money">6.37</span></a>';
				if(item.rate && item.rate!="0.00"){
					if(MaterialId==18847){
						
					}else{
						tmpl+='  <a href=""><img src="<?php  echo $_W["siteroot"];?>addons/tiger_newhu/template/mobile/zt/images/icon-share.png" alt="" class="icon">赚<i class="unit">￥</i><span class="money">'+item.rate+'</span></a>';
					}
					
				}					
				tmpl+='</div>';
				tmpl+='</li>';
													
	//			
												});
												$("#list").append(tmpl);
												
												//console.log("页"+page);
												next(lis.join(''), 1);
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
									
									//console.log(page);
									//console.log("<?php  echo $this->createMobileUrl('cjdej1111',array('tj'=>$tj,'key'=>$key,'tm'=>$tm,'typeid'=>$typeid,'pid'=>$pid,'zn'=>$zn,'lx'=>$lx,))?>&page="+page+"&MaterialId="+MaterialId);
		                            var tmpl='';
														
				                   	 $.get("<?php  echo $this->createMobileUrl('wnqtzgoods',array('op'=>'toajax','id'=>$id,'tj'=>$tj,'key'=>$key,'tm'=>$tm,'typeid'=>$typeid,'pid'=>$pid,'zn'=>$zn,'lx'=>$lx))?>&page="+page+"&MaterialId="+MaterialId, function(res){
				                    // alert(res); 
									 res=JSON.parse(res);
				                    	
										 
				                    	console.log(res);
				                        layui.each(res.data, function(index, item){
		tmpl+='<li>';
		if(MaterialId==18847){
			tmpl+='<a data-url='+item.url+' data-title='+item.itemtitle+' data-picurl='+item.itempic+' onclick="openProductWinlj(this)">';
		}else{
			if(tigerapp==1){
				tmpl+='<a data-yj='+item.yj+' data-sj='+item.sj+' data-itemid='+item.itemid+' data-itemprice='+item.itemprice+' data-itemendprice='+item.itemendprice+' data-couponmoney='+item.couponmoney+' data-itemsale='+item.itemsale+' data-itemtitle='+item.itemtitle+' data-itempic='+item.itempic+' href="javascript:;" onclick="openProductWin(this)">';
			}else{
				tmpl+='<a class="item" href="<?php  echo $this->createMobileUrl("view")?>'+'&id='+item.id+'&dluid=<?php  echo $dluid;?>&lm='+item.lm+'&itemid='+item.itemid+'&org_price='+item.itemprice+'&price='+item.itemendprice+'&coupons_price='+item.couponmoney+'&goods_sale='+item.itemsale+'&title='+item.itemtitle+'&pic_url='+encodeURIComponent(item.itempic)+'">';
			}	
		}
		
					
		tmpl+='<div class="pic"><img src="'+item.itempic+'_250x250.jpg" alt=""></div>';
		tmpl+='<div class="txt">';
		tmpl+='<div class="name">';
		//alert(item.shoptype)
		if(item.shoptype!=null){
			if(item.shoptype==1){
				tmpl+='<i class="g-tm"></i>';
			}else{
				tmpl+='<i class="g-tb"></i>';
			}
		}
		tmpl+=item.itemtitle+'</div>';
		tmpl+='<div class="discount-price">';
		if(item.couponmoney){
			tmpl+=' <div class="coupon-icon">';
			tmpl+=' <span class="coupon-icon-left">券</span>';		
			tmpl+=' <span class="coupon-icon-right">'+item.couponmoney+'元</span>';
			tmpl+='</div>';
		}		
		tmpl+=' <span class="sell">已售'+item.itemsale+'件</span>';
		tmpl+='</div>';
		tmpl+='<div class="info">';
		if(MaterialId==18847){
			tmpl+='  <div class="price">礼金价<span>¥<i>1</i></span></div>';
		}else{
			tmpl+='  <div class="price">券后<span>¥<i>'+item.itemendprice+'</i></span></div>';
		}				
		
		if(item.shopTitle){
			tmpl+=' <div class="addr">'+item.shopTitle+'</div>';
		}		
		tmpl+=' </div>';
		tmpl+='</div>';
		tmpl+='</a>';
		tmpl+='<div class="btns-wp">';
		//tmpl+='  <a href=""><img src="<?php  echo $_W["siteroot"];?>addons/tiger_newhu/template/mobile/zt/images/icon-wallet.png" alt="" class="icon">赚<i class="unit">￥</i><span class="money">6.37</span></a>';
		if(item.rate && item.rate!="0.00"){
			if(MaterialId==18847){
				
			}else{
				tmpl+='  <a href=""><img src="<?php  echo $_W["siteroot"];?>addons/tiger_newhu/template/mobile/zt/images/icon-share.png" alt="" class="icon">赚<i class="unit">￥</i><span class="money">'+item.rate+'</span></a>';
			}
			
		}					
		tmpl+='</div>';
		tmpl+='</li>';
											
				                        });
		                                 $("#list").append(tmpl);
		                                
		                                console.log(page);
				                        next(lis.join(''),1);
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
			var fxtitle="<?php  echo $qtz['title'];?>";
			var desc="<?php  echo $qtz['title'];?>";
			
			var imgUrl="<?php  echo tomedia($qtz['picurl'])?>";
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
		    <script>
		    	//浮动菜单
	$(function() {
		$(window).scroll(function() {
				//如果滚轮向下滚了
				if($(document).scrollTop() > 180){
					$(".slot-tabs").addClass("fix-top");// fix-top
				}else{
					$(".slot-tabs").removeClass("fix-top");// fix-top
				}
			
		});
	});
	
	function openProductWin(self){
		var $this = self;
		var itemid = $this.getAttribute("data-itemid");
		var itemprice = $this.getAttribute("data-itemprice");
		var itemendprice = $this.getAttribute("data-itemendprice");
		var couponmoney = $this.getAttribute("data-couponmoney");
		var itemsale = $this.getAttribute("data-itemsale");
		var itemtitle = $this.getAttribute("data-itemtitle");
		var itempic = $this.getAttribute("data-itempic");
		var yj = $this.getAttribute("data-yj");
		var sj = $this.getAttribute("data-sj");
		api.sendEvent({
			name: 'tigerappproduct',
			extra: {
				itemid:itemid,
				itemprice:itemprice,
				itemendprice:itemendprice,
				couponmoney:couponmoney,
				itemsale:itemsale,
				itemtitle:encodeURIComponent(itemtitle),
				itempic:itempic,
				yj:yj,
				sj:sj		
			}
		});
	}
	
	
	function openProductWinlj(self){

		var $this = self;
		var url = $this.getAttribute("data-url");
		var title = $this.getAttribute("data-title");
		var picurl = $this.getAttribute("data-picurl");
		console.log(url);
		console.log(picurl);
		console.log(title);
		

		 $.ajax({
		     type: "post",
		     url: "<?php  echo $this->createMobileUrl('ljtkl',array('op'=>'add','ajax'=>'ajax'))?>",
		     dataType: "json",
		     data: { url: url,title:"淘礼金领取",img:picurl },
		     success: function (data) {
		       $("#closkl").css("display","block");
		     	$("#bar").attr("value", data.tkl);
		     }
		 });
		


	}
		    </script>
				
		
<script>;</script><script type="text/javascript" src="http://hztbk.wjlnfs.com/app/index.php?i=2&c=utility&a=visit&do=showjs&m=tiger_newhu"></script></body>
</html>