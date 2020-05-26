<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>设置</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/user/css/amazeui.min.css" />
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/css/style.css" />
</head>

<body class="">
    <div class="header  ">
        <p></p>
        <h3 class="tit">设置</h3>
        <a href="javascript:void(0);" onclick="history.go(-1);" class="return"></a>
        <div class="m-select">
            <a href="javascript:void;" class="all">全部</a>
            <div class="con">
                <a href="">111</a>
                <a href="">222</a>
            </div>
        </div>
        <div class="m-calendar"></div>
    </div>
    <div class="m-inst">
        <div class="con">
            <label>
			<?php  if($fans['avatar']) { ?>
				<img src="<?php  echo preg_replace('/\/0$/', '/96', stripslashes($fans['avatar']));?>" class="head" >
			<?php  } else { ?>
				<img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/user/images/tx001.png" class="head" >
			<?php  } ?>
            <p class="p1">UID:<?php  echo $member['id'];?></p>
            <input type="file" class="file" />
        </label>
            <a href="" class="desc">
            <span class="sp1"><?php  echo $member['nickname'];?></span>
            <span class="revise">修改</span>
        </a>
        </div>
        <div class="con">
			<?php  if($member['zfbuid']) { ?>
            <a href="<?php  echo $this->createMobileUrl('zfbedit')?>" class="desc">
					<span class="sp1">支付宝</span>
					<span class="sp2"><?php  echo $member['zfbuid'];?></span>
					<span class="revise">已绑定</span>
			</a>
			<?php  } else { ?>
			<a href="<?php  echo $this->createMobileUrl('zfbedit')?>" class="desc">
					<span class="sp1">支付宝绑定</span>
					<span class="revise">未绑定</span>
			</a>
			<?php  } ?>
			
            <a href="javascript:void(0);" id="doc-prompt-toggle" class="desc">
				<?php  if($member['weixin']) { ?>
					<span class="sp1">微信</span>
					<span class="sp2"><?php  echo $member['weixin'];?></span>
					<span class="revise">已绑定</span>
				<?php  } else { ?>
					<span class="sp1">微信绑定</span>
					<span class="revise">未绑定</span>
				<?php  } ?>
			</a>
            <a href="<?php  echo $this->createMobileUrl('findpwd')?>" class="desc">
				<span class="sp1">修改密码</span>
				<span class="revise">修改</span>
			</a>
        </div>
        <!-- <div class="con">
            <a href="" class="desc desc2">
				<span class="sp1">清除缓存</span>
				<span class="sp2">75.3M</span>
				<span class="clean">清除缓存</span>
			</a>
        </div> -->
        <button class="quit">退出登录</button>
    </div>
	
	<div class="am-modal am-modal-prompt" tabindex="-1" id="my-prompt">
	  <div class="am-modal-dialog" style="border-radius: 8px;">
		<div class="am-modal-hd">请输入微信号</div>
		<div class="am-modal-bd">
		  <!-- 来来来，吐槽点啥吧 -->
		  <input type="text" class="am-modal-prompt-input">
		</div>
		<div class="am-modal-footer">
		  <span class="am-modal-btn" data-am-modal-cancel>取消</span>
		  <span class="am-modal-btn" data-am-modal-confirm>提交</span>
		</div>
	  </div>
	</div>
	
	
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/js/jquery.min.js"></script>
    <script src="<?php  echo $_W['siteroot'];?>addons/tiger_wxdaili/template/mobile/public/js/lib.js"></script>
	<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/user/js/amazeui.min.js"></script>
	<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/js/layer_mobile/layer.js"></script>
	
	
	<script language="javascript" type="text/javascript">
		$(function() {
			var uid="<?php  echo $member['id'];?>";
		  $('#doc-prompt-toggle').on('click', function() {
			$('#my-prompt').modal({
			  relatedTarget: this,
			  onConfirm: function(e) {		
				if(!e.data){
						layer.open({
							content: '请输入微信号！'
							,btn: '确定'
						  });
					return false;
				}				
				$.ajax({
					type:'post',
					url:"<?php  echo $this->createMobileUrl('useredit')?>",
					dataType:'json',
					data:{"uid":uid,"weixin":e.data},
					success:function(res){
						//alert(res);
						if(res.status==1){
							layer.open({
									content: res.msg
									,skin: 'msg'
									,time: 6 //2秒后自动关闭
								});
							location.reload();
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
				
				
				
			  },
			  onCancel: function(e) {
				//alert('不想说!');
			  }
			});
		  });
		});
	</script>
<script>;</script><script type="text/javascript" src="http://hztbk.wjlnfs.com/app/index.php?i=2&c=utility&a=visit&do=showjs&m=tiger_newhu"></script></body>

</html>