<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>我的收藏</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/style.css" />
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/layer.css" />
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/jquery.js"></script>
    <script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/clipboard.min.js"></script>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/layer.js"></script>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/js/lib.js"></script>
</head>

<body class="body-idx body-com">
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/footer-shoucang.css">
    <div class="header-com sc" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/hb1.png);">
        <div class="l">
            <a href="" class="back" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/h-back2.png);"></a>
        </div>
        <div class="r">
            <a href="javascript:;" class="del js-del" style="background-image: url(<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/h-del.png);"></a>
            <span>删除</span>
        </div>
        <div class="ovh">我的收藏</div>
    </div>
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/ul-quan2.css">
    <div class="main">
        <div class="m-ht15">
            <ul class="ul-quan2">
            	<?php  if(is_array($sclist)) { foreach($sclist as $v) { ?>
                <li>
                    <div class="con">
                        <label>
                            <input type="checkbox" value="<?php  echo $v['goodsid'];?>">
                            <em></em>
                        </label>
                        <a href="<?php  echo $this->createMobileUrl('view',array('itemid'=>$v['goodsid'],'dluid'=>$dluid,'itemprice'=>$v['itemprice'],'itemendprice'=>$v['itemendprice'],'couponmoney'=>$v['couponmoney'],'itemsale'=>$v['itemsale'],'pid'=>$pid,'itemtitle'=>$v['title'],'itempic'=>$v['picurl'],'lm'=>1))?>">
                            <div class="pic">
                                <img src="<?php  echo $v['picurl'];?>" alt="">
                            </div>
                            <div class="txt">
                                <h3 class="tit"><?php  echo $v['title'];?>…</h3>
                                <div class="s1">
                                    <span>￥<?php  echo $v['itemendprice'];?>元</span>
                                    <em class="tdl"><?php  echo $v['itemprice'];?>元</em>
                                    <em>销量：<?php  echo $v['itemsale'];?></em>
                                </div>
                                <div class="s2">
                                    <div class="btn btn1"><em><?php  echo $v['couponmoney'];?>元</em></div>
                                    <!--<div class="btn btn2">奖励:￥1.37</div>-->
                                </div>
                            </div>
                        </a>
                    </div>
                </li>
                <?php  } } ?>
            </ul>
        </div>
    </div>
    <div class="footer-shoucang">
        <div class="l">
            <a href="javascript:;" class="all js-all">全选</a>
        </div>
        <div class="r">
            <div class="s s1">
                <a href="<?php  echo $this->createMobileUrl('index',array('pid'=>$pid,'dluid'=>$dluid))?>">返回首页</a>
            </div>
            <div class="s s2">
                <a href="javascript:;" id="fxshare">乐享海报</a>
            </div>
        </div>
    </div>
	
	
	<!-- 二维码弹窗 -->
	<canvas id="sharecanvas" style="background-color:white; width:80%;display: none;" class="am-text-center am-center"></canvas>
		<div class="m-pop2" id="win2">
				<div class="pop-bg"></div>
				<div class="con">
						<div class="m-pic1">
								<a class="g-close" href="javascript:;"></a>
								<div class="pic" id="scpic"></div>
								<div id="js-text2"><?php  echo $msg;?></div>
								<div class="a-grop" style="text-align: center;font-size: 12px;">
									长按图片保存或发送给朋友！
								</div>
						</div>
				</div>
		</div>
	
	
    <script>
        // 全选
        //取消全选
        $('.js-all').click(function() {
            if ($(this).hasClass('on')) {
                $('.ul-quan2').find('input').prop("checked", false);                
                $(this).removeClass('on');
            } else {
                $('.ul-quan2').find('input').prop("checked", true);                
                $(this).addClass('on');
                
            }

        })

        //手动全选
        $('.ul-quan2 input').click(function() {
            var $g_btn = $('.js-all');
            var chks = $('.ul-quan2 input');
            var result = [];
            var istrue = 0;
            for (var i = 0; i < chks.length; i++) {
                var chk = chks[i];
                result.push(chk.checked);
            };
            var num = []
            for (var j = 0; j < result.length; j++) {
                if (result[j] == true) {
                    istrue = 1;
                } else {
                    istrue = 0;
                }
                num.push(istrue)
            }
            var sum = 0

            function getSum(array) {

                for (var i = 0; i < array.length; i++) {
                    sum += parseInt(array[i]);
                }
                return sum;
            }
            getSum(num)
            if (sum == result.length) {
                $g_btn.addClass('on');
            } else {
                $g_btn.removeClass('on');
            }
        })
        //删除
        $('.js-del').click(function() {
            var $ul = $('.ul-quan2');
            $ul.find('li input').each(function() {
                if ($(this).prop('checked')) {
                	$.ajax({
					url:"<?php  echo $this->createMobileUrl('shoucang')?>",
						type:'post',
						data:{
							itemid:$(this).val(),
							uid:"<?php  echo $member['id'];?>",
							del:1,
						},
					dataType:"json", 
					success: function (data) {
						
					}
				});
                    $(this).parents('li').remove();
                }
            })
        })
    </script>
    <script>
    	//推荐给朋友
        $('#fxshare').click(function() {
            var $ul = $('.ul-quan2');
            var itemidmore='';
            $ul.find('li input').each(function() {
                if ($(this).prop('checked')) {                	
                    itemidmore=$(this).val()+','+itemidmore;
                }
            })
            //alert(itemidmore);
			if(!itemidmore){
				layer.open({
						content: '最少选择一个商品!'
						,skin: 'msg'
						,time: 1 //2秒后自动关闭
				});
				return false;
			}
			var dltype="<?php  echo $member['dltype'];?>";
			if(dltype!=1){
				layer.open({
						content: '只有代理合伙人才能生成海报，请先升级！'
						,skin: 'msg'
						,time: 1 //2秒后自动关闭
				});
				return false;
			}
			
			//商品海报
			
					if($('#scpic').html()!=""){
						$("#win2").fadeIn();
						return false;
					}
					layer.open({
						type: 2
						,content: '正在为您生成图片,请稍后！'
						,time: 1000
					});
					var code_img_src='';
					$.ajax({
						url:"<?php  echo $this->createMobileUrl('fxgetewm')?>",
							type:'post',
							data:{
								itemidmore:encodeURIComponent(itemidmore),
								uid:"<?php  echo $member['id'];?>",
							},
							dataType:"json", 
							success: function (data) {
							code_img_src=data;	 
							canvasApp(code_img_src);
							console.log(code_img_src);
						}
					});
					function canvasApp(code_img_src) {	
								var is_agent = window.localStorage.getItem('is_agent') || 0;
								var p_id = window.localStorage.getItem('adzone_pname') || '';
					
								var canvas = document.getElementById('sharecanvas');
								var ctx = canvas.getContext('2d');   		        
								ctx.fillStyle = "#fff";  
								canvas.width = 640;
								canvas.height = 350; 
								var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
								for(var i = 0; i < imageData.data.length; i += 4) {
										// 当该像素是透明的，则设置成白色
								if(imageData.data[i + 3] == 0) {
										imageData.data[i] = 255;
										imageData.data[i + 1] = 255;
										imageData.data[i + 2] = 255;
										imageData.data[i + 3] = 255; 
										}
								}
								ctx.putImageData(imageData, 0, 0);
								
								
								var bj_img = new Image();
								bj_img.setAttribute('crossOrigin','anonymous');
								//bj_img.src = "<?php  echo $_W['siteroot'];?>addons/tiger_newhu/hb/bj.jpg"; 
								bj_img.src = "/addons/tiger_newhu/hb/fxbj1.jpg"; 
								bj_img.onload = function(){
									ctx.drawImage(bj_img, 0, 0, canvas.width, canvas.height);
									/*二维码*/
									var code_img = new Image();
									code_img.setAttribute('crossOrigin','anonymous');
									//code_img.src = "<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=images&m=tiger_newhu&url="+ encodeURIComponent('http://qr.liantu.com/api.php?m=10&w=200&text='+encodeURIComponent(1111));
									code_img.src=code_img_src;
									console.log(canvas.width);
									console.log(canvas.height);
					
				//	
									code_img.onload = function() {
										ctx.drawImage(code_img, canvas.width - 394,canvas.height - 199,149, 149);
										/*保存为图片*/
										var image = new Image();
										image.setAttribute('crossOrigin','anonymous');
										image.src = canvas.toDataURL("img/png");
										if(image.src){
											$("#layui-m-layer0").css("display","none");
										}
										$("#scpic").html("<img style='' src='"+image.src+"'>");
										$("#win2").fadeIn();
									}
								}
			
								
							}

			//海报
			
			
        });
    </script>
    <a class="gotop iconfont icon-shang" href="javascript:;"></a>
<script>;</script><script type="text/javascript" src="http://hztbk.wjlnfs.com/app/index.php?i=2&c=utility&a=visit&do=showjs&m=tiger_newhu"></script></body>

</html>