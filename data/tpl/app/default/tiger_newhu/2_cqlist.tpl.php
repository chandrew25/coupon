<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="target-densitydpi=286, width=640, user-scalable=no" />
<title>超级搜索</title>
<link href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/css/css.css" rel="stylesheet" />
<link href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/css/swiper-3.3.1.min.css" rel="stylesheet" />
<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/js/jquery-1.7.2.min.js"></script>
<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/js/swiper-3.3.1.jquery.min.js"></script>
</head>

<body style="background:#f5f5f5">
<div class="topt mgz"></div>
<div class="top mgz">
    <a href="<?php  echo $this->createMobileUrl('lmsearch',array('dluid'=>$dluid,pid=>$pid))?>"><div class="topl"><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/left.png" align='absmiddle' style='margin-top:-4px;'></div></a>
    <form action="<?php  echo $this->createMobileUrl('cqlist')?>" method="get" accept-charset="utf-8" id="J_Form" onsubmit="return checkForm(this);">
    	<input type="hidden" name="i" value="<?php  echo $_W['uniacid'];?>">
        <input type="hidden" name="c" value="entry">
        <input type="hidden" name="m" value="tiger_newhu">
        <input type="hidden" name="do" value="cqlist">
        <input type="hidden" name="zn" value="<?php  echo $zn;?>">
        <input type="hidden" name="tm" value="<?php  echo $tm;?>">     
				<input type="hidden" name="dluid" value="<?php  echo $dluid;?>">  
        <input type="hidden" name="pid" value="<?php  echo $pid;?>">
    <div class="topm"><input type="text" name="key" id="key" value="<?php  if($key) { ?><?php  echo $key;?><?php  } ?>" placeholder="搜索标题或关键词"></div>
    <input type="submit" id="submit" value="" class="suban">
    <!--<a href="#"><div class="topr"><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/t2.png" align='absmiddle' style='margin-top:-4px;'></div></a>-->
    <style>
    	.suban{position: absolute;right: 30px;top:21px;background: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/t2.png) no-repeat; width: 34px;height: 50px;border:0;}
    </style>	
</div>


<div class="con12 mgz bgbai">
    <div class="con12tt mgz"></div>
    <div class="con12t ov">
        <ul>
            <li><a <?php  if($lx==1 || $lx=='') { ?>class="hover"<?php  } ?> href="<?php  echo $this->createMobileUrl('cqlist',array('key'=>$key,'lx'=>1,'pid'=>$pid,'tm'=>$tm,'dluid'=>$dluid,'zn'=>$zn))?>" >综合排序</a></li>
            <li><a <?php  if($lx==2) { ?>class="hover"<?php  } ?> href="<?php  echo $this->createMobileUrl('cqlist',array('key'=>$key,'lx'=>2,'pid'=>$pid,'tm'=>$tm,'dluid'=>$dluid,'zn'=>$zn,'zn'=>$zn))?>">月销量</a></li>
            <li><a <?php  if($lx==4) { ?>class="hover"<?php  } ?> href="<?php  echo $this->createMobileUrl('cqlist',array('key'=>$key,'lx'=>4,'pid'=>$pid,'tm'=>$tm,'dluid'=>$dluid))?>">有券</a></li>
            <!--<li><a <?php  if($lx==4) { ?>class="hover"<?php  } ?> href="<?php  echo $this->createMobileUrl('cqlist',array('key'=>$_GPC['key'],'lx'=>4,'pid'=>$pid,'tm'=>1,'dluid'=>$dluid))?>">天猫</a></li>-->
            <li><a <?php  if($lx==3) { ?>class="hover"<?php  } ?> href="<?php  echo $this->createMobileUrl('cqlist',array('key'=>$key,'lx'=>3,'tm'=>1,'tm'=>$tm,'pid'=>$pid,'dluid'=>$dluid,'zn'=>$zn))?>" >价格</a></li>
        </ul>
    </div>
    <div class="con12m mgz">
        <ul>
            <li>
            	<a href="#">
                <label>
                <div class="con12ml f"><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/t37.png" align='absmiddle' style="margin-top:-4px; margin-right:18px"></div>
                <div class="con12mm f xi24">仅看天猫商品</div>
                <div class="con12mr f">
                    <div <?php  if($tm==1) { ?>class="tmanbt2"<?php  } else { ?>class="tmanbt1"<?php  } ?> id="antm"></div>
                </div>
                </label>
                </a>
            </li>
            <li><a href="#">
                <label>
                <div class="con12ml f"><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/t38.png" align='absmiddle' style="margin-top:-4px; margin-right:18px"></div>
                <div class="con12mm f xi24">优先站内商品</div>
                <div class="con12mr f">
                   <div <?php  if($zn==1) { ?>class="tmanbt2"<?php  } else { ?>class="tmanbt1"<?php  } ?> id="anznss"></div>
                </div>
                </label>
                </a>
            </li>
        </ul>
    </div>
    <style>
    	.tmanbt1{    
		    -webkit-appearance: none;
		    width: 72px;
		    height: 40px;
		    top: 13px;
		    background: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/t43.png);
		    display: inline-block;
		    position: relative;
		    background-size: contain;
		}
		.tmanbt2{    
		    -webkit-appearance: none;
		    width: 72px;
		    height: 40px;
		    top: 13px;
		    background: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/t44.png);
		    display: inline-block;
		    position: relative;
		    background-size: contain;
		}
    </style>
    <!---->
<div style="margin-left: auto;margin-right: auto;width: 640px;">
	<div class="moregd" id="moregd">
			<ul id="keylist"></ul>
    </div>
</div>
	<style>
		.moregd{
			border: 1px #f4f4f4 solid;
			position: fixed;
			z-index: 500;
			width: 99.5%;
			top:61px;
			background: #ffffff;
			display: none;
			left: 50%;
			margin-left: -210px;
    		width: 417px;
		}
		.moregd li{padding-left: 10px;font-size: 18px;height:45px;line-height:45px;}
			.moregd li a{color: #545454;}
	</style>
	<script>
					$('#key').bind('input propertychange',function(){
		            	var gdkey=$(this).val();
		            	if(gdkey){
		            		$("#moregd").show();  
		            		$.ajax({
					            url: "https://suggest.taobao.com/sug?code=utf-8&q="+gdkey+"&callback=jsonp",
					            dataType: 'jsonp',
					            jsonp: 'callback',
					            success: function (result) {
					            	//console.log(result);
					            	if(result.result){
					            		var len = result.result.length;
					            		var gdkey = '';
					            		if(len){
					            			for (var i = 0; i < len; i++) {
						                        gdkey+= '<li id="liskeyname">'+result.result[i][0]+'</li>';
						                        //console.log(result.result[i][0]);
						                    }
						            		$("#keylist").html(gdkey);
						            		$('#moregd li').click(function(){
						            			$("#key").val($(this).text());
												$("#moregd").hide();
												$tzzulr="<?php  echo $this->createMobileUrl('cqlist',array('dluid'=>$dluid,'pid'=>$pid))?>&key="+$(this).text();
												window.location.href=$tzzulr;
											})
					            		}else{
					            			$("#moregd").hide();
					            		}					            		
					            	}
					            }
					        });		                    
		               }else{
		                	$("#moregd").hide();  
		               }
					});	
					
					
					</script>
<!---->
    <div class="con12f ov" style="padding-bottom: 20px;padding-top: 70px;" id="table">
    	<?php  if($cqdata['itemprice']) { ?> 
    	<ul id="list2">
            <li style="border: 3px #ff7415 dotted;">
                <div class="con12fl f"><a href="<?php  echo $this->createMobileUrl('view',array('itemid'=>$cqdata['itemid'],'dluid'=>$dluid,'itemprice'=>$cqdata['itemprice'],'itemendprice'=>$cqdata['itemendprice'],'couponmoney'=>$cqdata['couponmoney'],'itemsale'=>$cqdata['itemsale'],'pid'=>$pid,'title'=>$cqdata['itemtitle'],'itempic'=>$cqdata['itempic'],'lm'=>$cqdata['lm']))?>"><img src="<?php  echo $cqdata['itempic'];?>_200x200q60.jpg" style="width:226px; height:226px"></a></div>
                <div class="con12fr f">
                    <div class="con12frt ov xi22">              
                        <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/t42.png" align='absmiddle' style="margin-top:-4px; margin-right:10px;">   
                       <a href="<?php  echo $this->createMobileUrl('view',array('itemid'=>$cqdata['itemid'],'dluid'=>$dluid,'itemprice'=>$cqdata['itemprice'],'itemendprice'=>$cqdata['itemendprice'],'couponmoney'=>$cqdata['couponmoney'],'itemsale'=>$cqdata['itemsale'],'pid'=>$pid,'title'=>$cqdata['itemtitle'],'itempic'=>$cqdata['itempic'],'lm'=>$cqdata['lm']))?>"><?php  echo $cqdata['itemtitle'];?></a>
                    </div>
                    <div class="con12frm xi20" style="color:#909090">现价￥<?php  echo $cqdata['itemprice'];?> &nbsp;&nbsp;&nbsp;已售<?php  echo $cqdata['itemsale'];?></span></div>
                 
                    <div class="con12frf xi20"><span class="xi20 hui">券后价</span>￥<span class="xi30"><?php  echo $cqdata['itemendprice'];?></span></div>
                    <div class="con7x2 ov" style="height:38px;">
                        <div class="con7x2l f">
                            <div class="con7x2ll f xi18 bai">领券</div>
                            <div class="con7x2lr f xi18">减<?php  echo intval($cqdata['couponmoney'])?></div>
                        </div>
                        <div class="con7x2m f xi18 hui" style="margin-left:10px;">
                          <?php  if($cqdata['couponsurplus']) { ?>  剩余<?php  echo $cqdata['couponsurplus'];?>张<?php  } ?>
                        </div>
                    </div>
                  <a href="<?php  echo $this->createMobileUrl('view',array('itemid'=>$cqdata['itemid'],'dluid'=>$dluid,'itemprice'=>$cqdata['itemprice'],'itemendprice'=>$cqdata['itemendprice'],'couponmoney'=>$cqdata['couponmoney'],'itemsale'=>$cqdata['itemsale'],'pid'=>$pid,'title'=>$cqdata['itemtitle'],'itempic'=>$cqdata['itempic'],'lm'=>$cqdata['lm']))?>"><div class="xf xi20 cen"><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/t40.png" align='absmiddle'><br>猜你喜欢</div></a>
                </div>
            </li>
        </ul>
        <?php  } ?>
    
    	<?php  if($list) { ?>
    	<ul id="list2">
        	<?php  if(is_array($list)) { foreach($list as $v) { ?>
        	  <?php  if($v['itemprice']) { ?>
	            <li >
	                <div class="con12fl f"><a href="<?php  echo $this->createMobileUrl('view',array('id'=>$v['id'],'dluid'=>$dluid,'lm'=>$v['lm'],'itemid'=>$v['itemid'],'org_price'=>$v['itemprice'],'itemprice'=>$v['itemprice'],'price'=>$v['itemendprice'],'coupons_price'=>$v['couponmoney'],'couponmoney'=>$v['couponmoney'],'goods_sale'=>$v['itemsale'],'title'=>$v['itemtitle'],'pic_url'=>$v['itempic'],'pid'=>$v['pid']))?>"><img src="<?php  echo $v['itempic'];?>_200x200q60.jpg" style="width:226px; height:226px"></a></div>
	                <div class="con12fr f">
	                    <div class="con12frt ov xi22" style="height: 33px;">    
													<?php  if($v['shoptype']==1) { ?>
	                        <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/t42.png" align='absmiddle' style="margin-top:-4px; margin-right:10px;">   
													<?php  } else { ?>
													<img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/t46.png" align='absmiddle' style="margin-top:-4px; margin-right:10px;">   

													<?php  } ?>
	                        <a href="<?php  echo $this->createMobileUrl('view',array('id'=>$v['id'],'dluid'=>$dluid,'lm'=>$v['lm'],'itemid'=>$v['itemid'],'org_price'=>$v['itemprice'],'itemprice'=>$v['itemprice'],'price'=>$v['itemendprice'],'coupons_price'=>$v['couponmoney'],'couponmoney'=>$v['couponmoney'],'goods_sale'=>$v['itemsale'],'title'=>$v['itemtitle'],'pic_url'=>$v['itempic'],'pid'=>$v['pid']))?>"><?php  echo $v['itemtitle'];?></a>
	                    </div>
						<?php  if($v['shopTitle']) { ?><div class="con12frm xi20" style="color:#909090"><?php  echo $v['shopTitle'];?></div><?php  } ?>
	                    <div class="con12frm xi20" style="color:#909090">现价￥<?php  echo $v['itemprice'];?> &nbsp;&nbsp;&nbsp;已售<?php  echo $v['itemsale'];?></span></div>
	                 
	                    <div class="con12frf xi20"><span class="xi20 hui">券后价</span>￥<span class="xi30"><?php  echo $v['itemendprice'];?></span></div>
	                    <div class="con7x2 ov" style="height:38px;">
	                        <div class="con7x2l f">
	                            <div class="con7x2ll f xi18 bai">领券</div>
	                            <div class="con7x2lr f xi18">减<?php  echo intval($v['couponmoney'])?></div>
	                        </div>
	                        <div class="con7x2m f xi18 hui" style="margin-left:10px;">
	                          <?php  if($v['couponsurplus']) { ?>  剩余<?php  echo $v['couponsurplus'];?>张<?php  } ?>
	                        </div>
	                    </div>
											<?php  if($v['rate']) { ?>
	                    <a href="<?php  echo $this->createMobileUrl('view',array('id'=>$v['id'],'dluid'=>$dluid,'lm'=>$v['lm'],'itemid'=>$v['itemid'],'org_price'=>$v['itemprice'],'itemprice'=>$v['itemprice'],'price'=>$v['itemendprice'],'coupons_price'=>$v['couponmoney'],'couponmoney'=>$v['couponmoney'],'goods_sale'=>$v['itemsale'],'title'=>$v['itemtitle'],'pic_url'=>$v['itempic'],'pid'=>$v['pid']))?>"><div class="xf xi20 cen"><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/t40.png" align='absmiddle'><br>奖￥<span class="xi22"><?php  echo $v['rate'];?></span></div></a>
											<?php  } else { ?>
											<a href="<?php  echo $this->createMobileUrl('view',array('id'=>$v['id'],'dluid'=>$dluid,'lm'=>$v['lm'],'itemid'=>$v['itemid'],'org_price'=>$v['itemprice'],'itemprice'=>$v['itemprice'],'price'=>$v['itemendprice'],'coupons_price'=>$v['couponmoney'],'couponmoney'=>$v['couponmoney'],'goods_sale'=>$v['itemsale'],'title'=>$v['itemtitle'],'pic_url'=>$v['itempic'],'pid'=>$v['pid']))?>"><div class="xf xi20 cen"><img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/t40.png" align='absmiddle'><br>详情</div></a>
											<?php  } ?>
	                </div>
	            </li>
              <?php  } ?>
            <?php  } } ?>
        </ul>
        <?php  } ?>
    
        <ul id="list">

        </ul>

    </div>
</div>

<?php  if($cfg['jdppddtype']==1) { ?>
<div class="footer-search">
    <div class="l">
        <a href="<?php  echo $_W['siteroot']?>app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=jdcjgoodslist&m=tuike_jd&key=<?php  echo $key;?>">
            <i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/h-jd.png);"></i>
            <span>京东搜索</span>
        </a>
    </div>
    <div class="r">
        <a href="./index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=pddgoodslist&m=tuike_pdd&key=<?php  echo $key;?>">
            <i style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/h-pdd.png);"></i>
            <span>拼多多搜索</span>
        </a>
    </div>
</div>
<?php  } ?>
<style>
	.footer-search {
    overflow: hidden;
    height:80px;
    line-height: 80px;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: rgba(255,255,255,.9);
}
.footer-search .l, .footer-search .r {
    width: 50%;
    text-align: center;
    display: inline-block;
}
.footer-search i {
    display: inline-block;
    vertical-align: middle;
    background: center center no-repeat;
    background-size: contain;
    width: 25px;
    height: 25px;
}
.footer-search span {
    font-size: 24px;
    color: #000;
    display: inline-block;
    vertical-align: middle;
}
</style>


<div class="footerf mgz"></div>

<script>
	$(".con1 li:last-child").toggle(function(){
		$('.con1f').slideDown();
		$('.con1 li:last-child').css('background','url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/shangjiantou.png) center center no-repeat');
		$('.mengban').slideDown();

    },function(){
		$('.con1f').slideUp();
		$('.con1 li:last-child').css('background','url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/xiajiantou.png) center center no-repeat');
		$('.mengban').slideUp();
	});
	
//	$(".con12t li:last-child").toggle(function(){
//			$('.con12t li:last-child').css('background','url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/p1.png) 108px center no-repeat')
//	    },function(){
//			$('.con12t li:last-child').css('background','url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/cqlist/images/p2.png) 108px center no-repeat')
//	});
</script>

<link href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/layui/css/layui.css" rel="stylesheet">
<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style99/js/layui/layui.js" charset="utf-8"></script>
<style>
.layui-flow-more a i{color:#ff006c;}
</style>

<script type="text/javascript">
	
	$("#antm").click(function(){
	    var an=$('#antm').attr('class');
	  	if(an=="tmanbt1"){//没选中
	  		$("#antm").removeClass(); //移除p元素的所有class 
	  		$("#antm").addClass("tmanbt2");
	  		tzurl="<?php  echo $this->createMobileUrl('cqlist',array('tj'=>$tj,'key'=>$key,'tm'=>1,'typeid'=>$typeid,'pid'=>$pid,'lx'=>$lx,'zn'=>$zn,'page'=>$page))?>";
	  		window.location.href=tzurl;
	  	}
	  	if(an=="tmanbt2"){//选中
	  		$("#antm").removeClass(); //移除p元素的所有class 
	  		$("#antm").addClass("tmanbt1");
	  		tzurl="<?php  echo $this->createMobileUrl('cqlist',array('tj'=>$tj,'key'=>$key,'typeid'=>$typeid,'pid'=>$pid,'lx'=>$lx,'zn'=>$zn,'page'=>$page))?>";
	  		window.location.href=tzurl;
	  	}
	});
	
	$("#anznss").click(function(){
	    var an=$('#anznss').attr('class');
	  	if(an=="tmanbt1"){//没选中
	  		$("#anznss").removeClass(); //移除p元素的所有class 
	  		$("#anznss").addClass("tmanbt2");//站站
	  		tzurl="<?php  echo $this->createMobileUrl('cqlist',array('tj'=>$tj,'key'=>$key,'tm'=>$tm,'typeid'=>$typeid,'pid'=>$pid,'lx'=>$lx,'zn'=>1,'page'=>$page))?>";
	  		window.location.href=tzurl;
	  	}
	  	if(an=="tmanbt2"){//选中
	  		$("#anznss").removeClass(); //移除p元素的所有class 
	  		$("#anznss").addClass("tmanbt1");
	  		tzurl="<?php  echo $this->createMobileUrl('cqlist',array('tj'=>$tj,'key'=>$key,'tm'=>$tm,'typeid'=>$typeid,'pid'=>$pid,'lx'=>$lx,'page'=>$page))?>";
	  		window.location.href=tzurl;
	  	}
	});
	
	var  limit=1;



   $(document).delegate("a", "click", function (e) {

        var url = $(this).attr("href");
        if($("#list li").length == 0) return;
        //e.preventDefault();
        //$(this).attr("target", "_blank");

        //isLoadingOrIsLoaded("", true, false);
	
        window.localStorage.setItem("top", document.body.scrollTop);
        window.localStorage.setItem("html", $("#list").html());
        window.localStorage.setItem("url", window.location.href);
			 
		
    });
	

    if(window.localStorage.getItem("url") == window.location.href && window.localStorage.getItem("top") != "null") {
		
      $("#list").html(window.localStorage.getItem("html"));
        document.body.scrollTop = window.localStorage.getItem("top");
        window.localStorage.setItem("top", "null");
        window.localStorage.setItem("html", "null");
        window.localStorage.setItem("url", "null");		
		 	//alert(limit);
		var le=$("#list li").length;
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
		           // alert(tzurl);

		            flow.load({
		                elem: '#table'
                        ,end: '本场次商品已经加载完毕啦 ￣O￣)ノ！'
		                ,done: function(page, next){
		                    var lis =[];
		                    var lbratetype="<?php  echo $cfg['lbratetype'];?>";
		            		var dltype="<?php  echo $zxshare['dltype'];?>";
		                    page=limit;
							limit++;
							console.log(page);
							console.log("<?php  echo $this->createMobileUrl('cqlistajax',array('tj'=>$tj,'key'=>$key,'tm'=>$tm,'typeid'=>$typeid,'pid'=>$pid,'zn'=>$zn,'lx'=>$lx))?>&page="+page);
                            var tmpl='';
												
		                   // $.get("<?php  echo $this->createMobileUrl('cqlistajax',array('tj'=>$tj,'key'=>$key,'typeid'=>$typeid,'pid'=>$pid,'lx'=>$lx))?>"+page, function(res){	
		                   	 $.get("<?php  echo $this->createMobileUrl('cqlistajax',array('tj'=>$tj,'key'=>$key,'tm'=>$tm,'typeid'=>$typeid,'pid'=>$pid,'zn'=>$zn,'lx'=>$lx))?>&page="+page, function(res){
		                     res=JSON.parse(res);
		                    	//alert(res);  
		                    	console.log(res);
		                        layui.each(res.data, function(index, item){
		                        	
//									        tmpl+='<img class="gl-img" src="'+item.itempic+'_240x240.jpg" alt="">'; 
//									        tmpl+='<div class="gl-content">'; 
//									           tmpl+=' <p class="glc-title">'+item.itemtitle+'</p>'; 
									           
tmpl+='<li>';
tmpl+='<div class="con12fl f"><a href="<?php  echo $this->createMobileUrl("view")?>'+'&id='+item.id+'&dluid=<?php  echo $dluid;?>&lm='+item.lm+'&itemid='+item.itemid+'&org_price='+item.itemprice+'&price='+item.itemendprice+'&coupons_price='+item.couponmoney+'&goods_sale='+item.itemsale+'&title='+item.itemtitle+'&pic_url='+encodeURIComponent(item.itempic)+'&pid='+item.pid+'"><img src="'+item.itempic+'_240x240.jpg" style="width:226px; height:226px;"></a></div>';
tmpl+='<div class="con12fr f">';
tmpl+='<div class="con12frt ov xi22" style="height:33px">';

if(item.shoptype==1){
	tmpl+='<img src="<?php  echo $_W["siteroot"];?>addons/tiger_newhu/template/mobile/cqlist/images/t42.png" align="absmiddle" style="margin-top:-4px;margin-right: 10px;">';
}else{
	tmpl+='<img src="<?php  echo $_W["siteroot"];?>addons/tiger_newhu/template/mobile/cqlist/images/t46.png" align="absmiddle" style="margin-top:-4px;margin-right: 10px;">';
}


tmpl+='<a href="<?php  echo $this->createMobileUrl("view")?>'+'&id='+item.id+'&dluid=<?php  echo $dluid;?>&lm='+item.lm+'&itemid='+item.itemid+'&org_price='+item.itemprice+'&price='+item.itemendprice+'&coupons_price='+item.couponmoney+'&goods_sale='+item.itemsale+'&title='+item.itemtitle+'&pic_url='+encodeURIComponent(item.itempic)+'&pid='+item.pid+'">'+item.itemtitle+'</a></div>';
if(item.shopTitle){
	tmpl+=' <div class="con12frm xi20" style="color:#ff6b06">'+item.shopTitle+'</div>';
}

if(item.itemprice){
	tmpl+=' <div class="con12frm xi20" style="color:#909090">现价￥'+item.itemprice+' &nbsp;&nbsp;&nbsp;已售'+item.itemsale+' </div>';
}else{
	tmpl+=' <div class="con12frm xi20" style="color:#909090">已售'+item.itemsale+' </div>';
}
if(item.coupons_price){
tmpl+='<div class="con12frf xi20"><span class="xi20 hui">券后价</span>￥<span class="xi30">'+item.itemendprice+'</span></div>';
}else{
	tmpl+='<div class="con12frf xi20"><span class="xi20 hui">券后价</span>￥<span class="xi30">'+item.itemendprice+'</span></div>';
}
tmpl+=' <div class="con7x2 ov" style="height:38px;">';
if(item.couponmoney){
	tmpl+='   <div class="con7x2l f">';
	tmpl+='      <div class="con7x2ll f xi18 bai">领券</div>';
	tmpl+='       <div class="con7x2lr f xi18">减'+item.couponmoney+'</div>';
	tmpl+='   </div>';
	tmpl+='   <div class="con7x2m f xi18 hui" style="margin-left:10px;">剩余'+item.couponnum+'张 </div>';
}

tmpl+='</div>';

	if(lbratetype==1 || lbratetype==3){
	 	tmpl+='<a href="<?php  echo $this->createMobileUrl("view")?>'+'&id='+item.id+'&dluid=<?php  echo $dluid;?>&lm='+item.lm+'&itemid='+item.itemid+'&org_price='+item.itemprice+'&price='+item.itemendprice+'&coupons_price='+item.couponmoney+'&goods_sale='+item.itemsale+'&title='+item.itemtitle+'&pic_url='+encodeURIComponent(item.itempic)+'&pid='+item.pid+'"><div class="xf xi20 cen"><img src="<?php  echo $_W["siteroot"];?>addons/tiger_newhu/template/mobile/cqlist/images/t40.png" align="absmiddle"><br>奖<span class="xi22">'+item.rate+'</span></div></a>';
	}else if(lbratetype==2){
	 	if(dltype==1){
	  		  tmpl+='<a href="<?php  echo $this->createMobileUrl("view")?>'+'&id='+item.id+'&dluid=<?php  echo $dluid;?>&lm='+item.lm+'&itemid='+item.itemid+'&org_price='+item.itemprice+'&price='+item.itemendprice+'&coupons_price='+item.couponmoney+'&goods_sale='+item.itemsale+'&title='+item.itemtitle+'&pic_url='+encodeURIComponent(item.itempic)+'&pid='+item.pid+'"><div class="xf xi20 cen"><img src="<?php  echo $_W["siteroot"];?>addons/tiger_newhu/template/mobile/cqlist/images/t40.png" align="absmiddle"><br>奖￥<span class="xi22">'+item.rate+'</span></div></a>';
	 	}else{
	 		tmpl+='<a href="<?php  echo $this->createMobileUrl("view")?>'+'&id='+item.id+'&dluid=<?php  echo $dluid;?>&lm='+item.lm+'&itemid='+item.itemid+'&org_price='+item.itemprice+'&price='+item.itemendprice+'&coupons_price='+item.couponmoney+'&goods_sale='+item.itemsale+'&title='+item.itemtitle+'&pic_url='+encodeURIComponent(item.itempic)+'&pid='+item.pid+'"><div class="xf xi20 cen"><img src="<?php  echo $_W["siteroot"];?>addons/tiger_newhu/template/mobile/cqlist/images/t40.png" align="absmiddle"><br>详情</div></a>';
	 	}
	 }else{
	 	tmpl+='<a href="<?php  echo $this->createMobileUrl("view")?>'+'&id='+item.id+'&dluid=<?php  echo $dluid;?>&lm='+item.lm+'&itemid='+item.itemid+'&org_price='+item.itemprice+'&price='+item.itemendprice+'&coupons_price='+item.couponmoney+'&goods_sale='+item.itemsale+'&title='+item.itemtitle+'&pic_url='+encodeURIComponent(item.itempic)+'&pid='+item.pid+'"><div class="xf xi20 cen"><img src="<?php  echo $_W["siteroot"];?>addons/tiger_newhu/template/mobile/cqlist/images/t40.png" align="absmiddle"><br>详情</div></a>';
	 	
	 }


tmpl+='</div>';
tmpl+=' </li>';

		                        });
                                 $("#list").append(tmpl);
                                
                                console.log(page);
		                        next(lis.join(''), page < res.pages);
		                    });
		                }
		            });
		        });
		    }();
		</script>
	<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style9/js/jweixin-1.0.0.js"></script>
<script>
	
	var key="<?php  echo $_GPC['key'];?>";
	var fxtitle="超级搜索";
	var desc="超级搜索";
	if(key){
		fxtitle="我正在找<?php  echo $_GPC['key'];?>";
		desc="<?php  echo $_GPC['key'];?>";
	}
	
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