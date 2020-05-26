<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php  if($member['id']) { ?>绑定手机号<?php  } else { ?>注册<?php  } ?></title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/css/style.css" />
</head>

<body class="white">
    <div class="header  ">
        <p></p>
        <h3 class="tit"><?php  if($member['id']) { ?>绑定手机号<?php  } else { ?>注册<?php  } ?></h3>
        <a href="javascript:void(0)" class="return" onClick="javascript:history.back()"></a>
        <!-- <div class="m-select">
            <a href="javascript:void;" class="all">全部</a>
            <div class="con">
                <a href="">111</a>
                <a href="">222</a>
            </div>
        </div> -->
        <div class="m-calendar"></div>
    </div>
    <div class="m-login m-login2">
        <form>
			<div class="desc">
					<i class="i3"></i>
					<div class="inp-box">
							<input type="text" placeholder="昵称" name="nickname" id="nickname" value="<?php  echo $member['nickname'];?>" class="inp  inp3" />
					</div>
			</div>
            <div class="desc">
                <i class="i1"></i>
                <div class="inp-box">
                    <input type="text" placeholder="请输入您的手机号" name="pcuser" id="pcuser" value="<?php  echo $member['pcuser'];?>" class="inp" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();" />
                </div>
            </div>
			
            <div class="desc">
                <i class="i3"></i>
                <div class="inp-box2 fix">
                    <input type="text" name="yaoqingma" id="yaoqingma" placeholder="请输入邀请码(选填)" value="<?php  echo $member['yaoqingma'];?>" class="inp inp3" />
                </div>
            </div>
			
			<?php  if($cfg['smskgtype']==1) { ?>
            <div class="desc desc2">
                <i class="i4"></i>
                <div class="inp-box3">
                    <input type="code" id="code" value="" placeholder="请输入验证码" class="inp inp4" />
                    <input class="inp5" id="btnSendCode" type="button" value="获取验证码" onClick="sendMessage()" />
                </div>
            </div>
			<?php  } ?>
            <div class="desc">
                <i class="i2"></i>
                <div class="inp-box">
                    <input type="password" id="password" placeholder="请输入6-32位密码" value="<?php  echo $member['pcpasswords'];?>" class="inp inp2 js-inp" />
                    <div class="eye js-check"></div>
                </div>
            </div>
            <a href="javascript:void(0)" class="login" id="reg"><?php  if($member['id']) { ?>绑定手机号<?php  } else { ?>注册<?php  } ?></a>
            <div class="check">
                <label>
                <input type="checkbox" class="checkbox" />
                同意<a href="<?php  echo $cfg['regurlxy'];?>">《用户协议》</a>
            </label>
            </div>
        </form>
    </div>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/js/jquery.min.js"></script>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/js/lib.js"></script>
		<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/js/layer_mobile/layer.js"></script>
    <script>
        // 验证码倒计时
        var InterValObj; //timer变量，控制时间
        var count = 30; //间隔函数，1秒执行
        var curCount; //当前剩余秒数
        var code = ""; //验证码
        var codeLength = 6; //验证码长度
        function sendMessage() {
            curCount = count;
            var dealType; //验证方式            
//             if ($("#phone").attr("checked") == true) {
//                 dealType = "phone";
//             } else {
//                 dealType = "email";
//             }
            //产生验证码
            for (var i = 0; i < codeLength; i++) {
                code += parseInt(Math.random() * 9).toString();
            }
            //设置button效果，开始计时
            $("#btnSendCode").attr("disabled", "true");
            $("#btnSendCode").val(+curCount + "秒再获取");
            InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
            //向后台发送处理数据
						$.ajax({
								url:"<?php  echo $this->createMobileUrl('sms')?>",
								method: 'post',
								data: {'tel':$("#pcuser").val(),'uid':'','type':2},
								success:function(res){
										
								}
						});
						
						
						
							//timer处理函数
							function SetRemainTime() {
									if (curCount == 0) {
											window.clearInterval(InterValObj); //停止计时器
											$("#btnSendCode").removeAttr("disabled"); //启用按钮
											$("#btnSendCode").val("重新发送验证码");
											code = ""; //清除验证码。如果不清除，过时间后，输入收到的验证码依然有效    
									} else {
											curCount--;
											$("#btnSendCode").val(+curCount + "秒再获取");
									}
							}
				}
				
				
				
				
				
				$('#reg').on('click', function() {
					var uid = "<?php  echo $member['id'];?>";//用户uid
					var openid="<?php  echo $member['from_user'];?>";
					var unionid="<?php  echo $member['unionid'];?>";
					var pcuser=$("#pcuser").val();
					var password=$("#password").val();
					var yaoqingma=$("#yaoqingma").val();
					var code=$("#code").val();
					var nickname=$("#nickname").val();

					$.ajax({
							type:'post',
							url:"<?php  echo $this->createMobileUrl('reg')?>",
							dataType:'json',
							data:{"from_user":openid,"unionid":unionid,"uid":uid,"pcuser":pcuser,"pcpasswords":password,"yaoqingma":yaoqingma,"code":code,"nickname":nickname},
							success:function(res){
								//alert(res);
								if(res.status==1){
									layer.open({
											content: res.msg
											,skin: 'msg'
											,time: 6 //2秒后自动关闭
										});
									if(res.tzurl){
										//alert(res.tzurl);
										setTimeout(function() {
											window.location.href=res.tzurl
										}, 1000);
									}else{
										setTimeout(function() {
												window.location.href="<?php  echo $this->createMobileUrl('index')?>";
										}, 1000);
										
									}
									//alert(res.tzurl);
									return false;
								}else{
									// alert(JSON.stringify(res));
									layer.open({
										content: res.msg
										,skin: 'msg'
										,time: 3 //2秒后自动关闭
									});
								return false;
								}
								
							}
						});
				});
    </script>
<script>;</script><script type="text/javascript" src="http://hztbk.wjlnfs.com/app/index.php?i=2&c=utility&a=visit&do=showjs&m=tiger_newhu"></script></body>

</html>