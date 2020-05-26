<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no">
<title>合伙人申请</title>

<link rel="stylesheet" type="text/css" href="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/css/amazeui.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/css/publicstyle.css"/>

<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/js/amazeui.min.js"></script>

</head>

<style>


@media screen and (min-width: 640px) {
    .fq-promotion,.fq-camera,.am-gotop-fixed{
        max-width: 640px;
        margin-left: calc((100% - 640px) / 2);
        margin-right: calc((100% - 640px) / 2);
    }

    .fq-grandeur-menu{
      max-width: 640px;
    }
}
</style>

<body>

<div class="am-modal am-modal-alert" tabindex="-1" id="fq_alert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd" id="fq_alert_title"></div>
    <div class="am-modal-bd" id="fq_alert_info">
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>

<div class="am-modal am-modal-confirm" tabindex="-1" id="fq_confirm">
  <div class="am-modal-dialog">
    <div class="am-modal-hd" id="fq_confirm_title"></div>
    <div class="am-modal-bd" id="fq_confirm_info"></div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>
  
<link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/icon_font/iconfont.css">
<style>
    body{margin:auto;max-width:640px;background:#F2F2F2}
img{width:100%}
header{position:relative}
header div{position:absolute;top:0;width:100%}
.fq-apply-message{border-radius:5px}
.fq-apply-message .am-input-group{display:flex;align-items:center}
.fq-apply-message i{display:flex;width:30px;color:#C9B174;font-size:24px;justify-content:center}
.fq-apply-message .am-input-group input{border:none;color:#333}
.fq-apply-message textarea{width:100%;border:none;background:#F4F4F4}
input[type=text]::-webkit-input-placeholder,textarea::-webkit-input-placeholder{color:#B7B7B7}
.fq-apply-button{width:50%;border:none;background:#C9B174;box-shadow:0 6px 6px rgba(199,167,85,.22)}

</style>

<div class="am-modal am-modal-confirm" tabindex="-1" id="fq_true_confirm">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"></div>
        <div class="am-modal-bd" id="fq_true_confirm_info"></div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm>确定</span>
            <span class="am-modal-btn" data-am-modal-cancel>取消</span>
        </div>
    </div>
</div>

<header data-uid="67440994">
    <div>
        <a href="javascript:void(0);" onclick="back();" style="position:absolute;top:2px;color:#fff;width:45px;height:100%;padding-left:10px;font-size:25px;"
            class="am-inline-block am-text-middle am-icon-angle-left"></a>
        <!-- <div class="am-per-center am-text-center am-padding-vertical-sm" style="color:#fff;font-size:16px;">申请代理</div> -->
    </div>
		<?php  if($dlcfg['dlpicurl']) { ?>
			<img src="<?php  echo tomedia($dlcfg['dlpicurl'])?>" /> 
		<?php  } else { ?>
			<img src="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/images/bj.jpg" /> 
		<?php  } ?>
</header>
<input type="hidden" name="orderno" id="orderno">
<input type="hidden" name="orderid" id="orderid">
<div class="fq-apply-message fq-background-white am-padding am-margin-top-lg am-margin-horizontal-sm">
    <div class="am-input-group am-center am-padding-bottom" style=" border-bottom: 1px solid #f5f0ec;">
        <i class="icon iconfont icon-weixin"></i>
        <input class="fq-login-user am-text-default am-form-field" type="text" placeholder="请输入wx号" id="js_wechatid" value="<?php  echo $member['weixin'];?>">
    </div>
	<div class="am-input-group am-center am-margin-top am-padding-bottom" style=" border-bottom: 1px solid #f5f0ec;">
		<i class="icon iconfont icon-xingming"></i>
		<input class="fq-login-user am-text-default am-form-field" type="text" placeholder="请输入姓名" id="js_name" value="<?php  echo $member['tname'];?>">
	</div>
    <div class="am-input-group am-center am-margin-top am-padding-bottom" style=" border-bottom: 1px solid #f5f0ec;">
        <i class="icon iconfont icon-shouji"></i>
        <input class="fq-login-user am-text-default am-form-field" type="text" placeholder="手机号（用于登录合伙人系统）" id="js_phone" value="<?php  echo $member['tel'];?>">
    </div>
    <!-- <div class="am-input-group am-center am-padding-top am-padding-bottom" style=" border-bottom: 1px solid #f5f0ec;">
			<i class="icon iconfont icon-shouji"></i>
			<input class="fq-login-user am-text-default am-form-field" type="text" placeholder="请输入验证码" id="js_smscode">
			<button class="am-btn am-btn-xs" style="padding: 0;width: 110px;height: 28px;border: 1px solid #C9B174;color: #C9B174;border-radius: 5px;padding: 0 5px;background: none;" id="js_send_ms">发送验证码</button>
		</div> -->
	<div class="am-input-group am-center am-margin-top">
		<i class="icon iconfont icon-mima"></i>
		<input class="fq-login-user am-text-default am-form-field" type="text" placeholder="登录密码（用于登录合伙人系统）" id="js_password" value="">
    </div>
</div>
<div class="fq-apply-message fq-background-white am-padding am-margin-top am-margin-horizontal-sm">
    <textarea  cols="20" rows="5" class="am-text-sm am-padding-sm"  placeholder="申请理由" id="js_introduc"><?php  echo $member['dlmsg'];?></textarea>
</div>

<?php  if($cfg['dlsqtype']==1) { ?>
<div class="am-margin-top am-margin-horizontal-sm am-text-center " style="color: #ff0000;">- 申请条件 - </div>
<div class="fq-apply-message fq-background-white am-padding am-margin-top am-margin-horizontal-sm">
	<div class="am-g">
		<div class="am-u-sm-12 am-text-middle  am-text-center">
			<span style="font-size:26px;"><?php  echo $cfg['fsnum'];?>+</span>
			<div style="font-size: 10px;color: #777;">当前直属粉丝人数<?php  echo $fsnum;?>人</div>
		</div>
		<!-- <div class="am-u-sm-6 am-text-middle  am-text-center" style="border-left:1px #777 solid ;">
			<span style="font-size:26px;"><?php  echo $cfg['dlnum'];?>+</span>
			<div style="font-size: 10px;color: #777;">当前直属合伙人人数<?php  echo $dlnum;?>人</div>
		</div> -->
	</div>
</div>
<?php  } ?>

<?php  if($member['dltype']==2) { ?>
<button  class="fq-apply-button am-text-center am-center am-round am-margin-vertical-xl am-padding-vertical-sm" onclick="kf();" style="background: #00ad21;color: #ffffff;">代理申请审核中</button>
<?php  } else if($member['dltype']==1) { ?>
<!-- <a href="<?php  echo $this->createMobileUrl('user')?>" class="flow-anurl" />您已经是代理，点击进入代理中心</a> -->
<button  class="fq-apply-button am-text-center am-center am-round am-margin-vertical-xl am-padding-vertical-sm" id="js_submit3" style="background: #ff7200;color: #ffffff;">进入代理中心</button>
<?php  } else { ?> 
    <?php  if($bl['dlfftype']==1) { ?>
			  <button  class="fq-apply-button am-text-center am-center am-round am-margin-vertical-xl am-padding-vertical-sm" id="js_submit2">付(<?php  echo $bl['dlffprice'];?>元)申请开通</button>
    <?php  } else { ?>
       <button  class="fq-apply-button am-text-center am-center am-round am-margin-vertical-xl am-padding-vertical-sm" id="js_submit">立即申请</button>
    <?php  } ?>
<?php  } ?>


<div class="am-hide"></div>
<div class="am-hide"></div>	


<script>;</script><script type="text/javascript" src="http://hztbk.wjlnfs.com/app/index.php?i=2&c=utility&a=visit&do=showjs&m=tiger_wxdaili"></script></body>
</html>

<div class="am-modal am-modal-confirm" tabindex="-1" id="fq_confirm_msg">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"></div>
        <div class="am-modal-bd" id="fq_confirm_msg_info"></div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" id="qdbotn" data-am-modal-confirm>确定</span>
        </div>
    </div>
</div>

<script>
    function back() {
        window.history.back();
    }

    function fq_alert(info) {
        $('#fq_alert_info').html(info);
        $('#fq_alert').modal();
    }
</script>
<?php  echo register_jssdk(false);?>
<script>
    var id = "<?php  echo $member['id'];?>";
    var wx_number = '';
    var wx_code = '';
    if("<?php  echo tomedia($dlcfg['kfpicurl'])?>") {
        wx_code ="<?php  echo tomedia($dlcfg['kfpicurl'])?>";
    }
    $(function() {

        /*验证身份*/
        $('#js_send_ms').click(function() {
            var phone = $.trim($('#js_phone').val());
            if(phone.length == 0) return fq_alert('请输入手机号');
            if(phone.match(/^1[3456789]\d{9}$/) == null) return fq_alert('请输入正确的手机号');
            var sendMs = $(this);
            sendMs.attr('disabled',true);
            $.ajax({
				url:"./index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=sms&m=tiger_newhu",
                type:'POST',
				dataType:'json',
                data:{"tel":phone,"type":2}
            }).done(function(res) {
                console.log(res);
                fq_alert(res.data);

                if(res.error == 1) {
                    var seconds = 1800;
                    var interval = setInterval(function() {
                        sendMs.text(seconds + '秒');
                        seconds--;
                        if(seconds <= 0) {
                            clearInterval(interval);
                            sendMs.text('获取').attr('disabled',false);
                            return;
                        }
                    },1000);
                } else {
                    sendMs.attr('disabled',false);
                }
            }).fail(function() {
                sendMs.attr('disabled',false);
                fq_alert('发送失败，请稍候再试。');
            });
        });

        /*提交申请*/
        $('#js_submit').click(function() {
            var wechatid = $.trim($('#js_wechatid').val());
			var dlsqtype="<?php  echo $cfg['dlsqtype'];?>";
			if(dlsqtype==1){
				var dlnum=parseInt("<?php  echo $cfg['dlnum'];?>");
				var fsnum=parseInt("<?php  echo $cfg['fsnum'];?>");
				var xzdlnum=parseInt("<?php  echo $dlnum;?>");
				var xzfsnum=parseInt("<?php  echo $fsnum;?>");
// 				if(dlnum){
// 					if(dlnum>xzdlnum){
// 						fq_alert('暂时不能申请，合伙人人数未达到！');
// 						return;
// 					}
// 				}				
				if(fsnum>xzfsnum){
					fq_alert('暂时不能申请，直属粉丝人数未达到！');
					return;
				}
			}
            if(wechatid.length == 0) {
                fq_alert('请输入微信号');
                return;
            }
            var phone = $.trim($('#js_phone').val());
            if(phone.match(/^1[3456789]\d{9}$/) == null) {
                fq_alert('手机号格式不正确');
                return;
            }
//             var smscode = $.trim($('#js_smscode').val()) || '';
//             if(smscode.length == 0 && '1' == 1) return fq_alert('请输入验证码');

            var password = $.trim($('#js_password').val()) || '';
						//alert(password);
            if(password.length < 6 || password.length > 11) {
                //6位密码
                fq_alert('请填写6~11位的密码');
                return;
            }
            
            if(password.match(/[^a-zA-Z0-9]/)) {
                fq_alert('密码只支持数字和字母');
                return;
            }
            var introduc = $.trim($('#js_introduc').val());
            if(introduc.length == 0) {
                fq_alert('请填写申请理由');
                return;
            }
            $('#fq_true_confirm_info').text('确认提交代理申请？');
            $('#fq_true_confirm').modal({
                onConfirm:function() {
                    var wechatid = $.trim($('#js_wechatid').val());//微信ID
					var name=$.trim($('#js_name').val());//姓名
                    var phone = $.trim($('#js_phone').val());//手机
                    var introduc = $.trim($('#js_introduc').val());//申请理由
                    //var smscode = $.trim($('#js_smscode').val());//验证码
					var password = $.trim($('#js_password').val());//

                    $('#js_submit').html('申请提交中 <i class="am-icon-spinner am-icon-spin"></i>').attr('disabled',true);
                    $.ajax({
                        url:"<?php  echo $this->createMobileUrl('dlreg')?>",
                        type:'post',
												dataType:'json',
                        data:{"tel":phone,"dlmsg":introduc,"pcpasswords":password,"uid":id,"weixin":wechatid,"tname":name}
                    }).done(function(res) {
											//console.log(res);
											//alert(res.statusCode);
                        if(res.statusCode == 200) {
                            var msg = res.msg;
                            if(wx_code.length > 0) {
                                msg += '，请您添加招商专员微信通过人工审核！<br /><img src="'+wx_code+'" ><br>长按二维码识别添加';
                            } else {
                                msg += '。';
                            }
                            $('#fq_confirm_msg_info').html(msg);
                            $('#fq_confirm_msg').modal({closeViaDimmer:false});
                        } else {
                            if(res.url == 1) {
                                var msg = '您已报名申请过合伙人系统，请您添加招商专员微信通过人工审核！';
                                if(wx_code.length > 0) {
                                    msg += '<br /><img src="'+wx_code+'" ><br>长按二维码识别添加';
                                }
                                $('#fq_confirm_msg_info').html(msg);
                                $('#fq_confirm_msg').modal({closeViaDimmer:false});
                            } else {
                                fq_alert(res.msg);
                            }
                        }
                        $('#js_submit').html('立即申请').attr('disabled',false);
                    }).fail(function() {
                        fq_alert('网络错误，请稍候提交。');
                        $('#js_submit').html('立即申请').attr('disabled',false);
                    });
                }
            });
        });
				
				//代理付费
				$("#js_submit2").click(function(){
						var wechatid = $.trim($('#js_wechatid').val());
						var dlsqtype="<?php  echo $cfg['dlsqtype'];?>";
						if(dlsqtype==1){
							var dlnum=parseInt("<?php  echo $cfg['dlnum'];?>");
							var fsnum=parseInt("<?php  echo $cfg['fsnum'];?>");
							var xzdlnum=parseInt("<?php  echo $dlnum;?>");
							var xzfsnum=parseInt("<?php  echo $fsnum;?>");
							if(dlnum){
								if(dlnum>xzdlnum){
									fq_alert('暂时不能申请，合伙人人数未达到！');
									return;
								}
							}				
							if(dlnum){
								if(fsnum>xzfsnum){
									fq_alert('暂时不能申请，直属粉丝人数未达到！');
									return;
								}
							}
						}
						if(wechatid.length == 0) {
								fq_alert('请输入微信号');
								return;
						}
						var phone = $.trim($('#js_phone').val());
						if(phone.match(/^1[3456789]\d{9}$/) == null) {
								fq_alert('手机号格式不正确');
								return;
						}
// 						var smscode = $.trim($('#js_smscode').val()) || '';
// 						if(smscode.length == 0 && '1' == 1) return fq_alert('请输入验证码');

						var password = $.trim($('#js_password').val()) || '';
						//alert(password);
						if(password.length < 6 || password.length > 11) {
								//6位密码
								fq_alert('请填写6~11位的密码');
								return;
						}
						
						if(password.match(/[^a-zA-Z0-9]/)) {
								fq_alert('密码只支持数字和字母');
								return;
						}
						var introduc = $.trim($('#js_introduc').val());
						if(introduc.length == 0) {
								fq_alert('请填写申请理由');
								return;
						}
						
						var wechatid = $.trim($('#js_wechatid').val());//微信ID
						var name=$.trim($('#js_name').val());//姓名
						var phone = $.trim($('#js_phone').val());//手机
						var introduc = $.trim($('#js_introduc').val());//申请理由
						//var smscode = $.trim($('#js_smscode').val());//验证码
						var password = $.trim($('#js_password').val());//
						$('#js_submit2').html('支付申请提交中 <i class="am-icon-spinner am-icon-spin"></i>').attr('disabled',true);
						$.ajax({
									url:'<?php  echo $this->createMobileUrl("Getpay");?>',
									type:'post',
									dataType:'json',
									//data:{"uid":id},
									data:{"tel":phone,"dlmsg":introduc,"pcpasswords":password,"uid":id,"weixin":wechatid,"tname":name},
									success:function(res){
											var json =res;
											if(json.errcode == 0){
															$("#orderno").val(json.orderno);
															$("#orderid").val(json.orderid);
															//alert(json.orderno);
															//alert(json.orderid);
															wx.chooseWXPay({
																		timestamp: json.timeStamp, 
																		nonceStr: json.nonceStr, 
																		package: json.package, 
																		signType: json.signType, 
																		paySign: json.paySign,
																		success: function (res) {
																				//alertFun(json.package);
																				// 支付成功后的回调函数
																				//var str = JSON.stringify(res);
																				//alert("支付成功")
																				checkorder();
																		}
																});				       						  
											}else{	 
												fq_alert(json.errmsg);
												return;
											}
									}
							});
						
				
				        
				});
							
							function checkorder(){
							          //alert(232323);
							    			var orderno =  $("#orderno").val();
							    			var orderid =  $("#orderid").val();
												//alert(orderno);
												//alert(333);
 												var wechatid1 = $.trim($('#js_wechatid').val());//微信ID
 												var name1=$.trim($('#js_name').val());//姓名
												var phone1 = $('#js_phone').val();//手机
 												var introduc1 = $.trim($('#js_introduc').val());//申请理由
 												//var smscode1 = $.trim($('#js_smscode').val());//验证码
 												var password1 = $.trim($('#js_password').val());
							    			if(orderno.length == 0){
													fq_alert('订单号为空');
													//alert("订单号为空");
													return;
							    			}
												//alert(phone1);
							    		   	$.ajax({
														type:'post',
														dataType:'json',
														data:{"tel":phone1,"dlmsg":introduc1,"pcpasswords":password1,"uid":id,"weixin":wechatid1,"tname":name1,"orderno":orderno,"orderid":orderid},
														url:'<?php  echo $this->createMobileUrl("CheckJsPayResult");?>',
														success:function(data){
							    					  var json = data;
							    					  if(json.errcode == 0){
																  //fq_alert('支付成功！');
																	kf();
							    					  }else{	 
							    						  checkorder();
							    					  }
							    				 }
							    			 });
							    		}
						
						
						$('#js_submit3').click(function() {
							 window.location.href='<?php  echo $this->createMobileUrl("member");?>';
						});
					
											
				
				
				
    });
		
		function kf(){												
			var		msg1 = '申请成功，请您添加招商专员微信通过人工审核！<br /><img src="'+wx_code+'" ><br>长按二维码识别添加';											
			$('#fq_confirm_msg_info').html(msg1);			
			$('#fq_confirm_msg').modal({
				   onConfirm:function() {
						 location.reload();
					 }
				});
		}
		$('#qdbotn').click(function() {
			 location.reload();
		});
</script>