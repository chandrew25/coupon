<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en" class="app">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>推京客-京东优惠券</title>	
	<!--[if lt IE 9]> 
	<script src="<?php  echo $_W['siteroot'];?>addons/tuike_jd/template/style/js/ie/html5shiv.js" cache="false"></script> 
	<script src="<?php  echo $_W['siteroot'];?>addons/tuike_jd/template/stylejs/ie/respond.min.js" cache="false"></script> 
	<script src="<?php  echo $_W['siteroot'];?>addons/tuike_jd/template/stylejs/ie/excanvas.js" cache="false"></script> 
	<![endif]-->
    <script type="text/javascript">
	if(navigator.appName == 'Microsoft Internet Explorer'){
		if(navigator.userAgent.indexOf("MSIE 5.0")>0 || navigator.userAgent.indexOf("MSIE 6.0")>0 || navigator.userAgent.indexOf("MSIE 7.0")>0) {
			alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
		}
	}
	window.sysinfo = {
		<?php  if(!empty($_W['uniacid'])) { ?>'uniacid': '<?php  echo $_W['uniacid'];?>',<?php  } ?>
		<?php  if(!empty($_W['acid'])) { ?>'acid': '<?php  echo $_W['acid'];?>',<?php  } ?>
		<?php  if(!empty($_W['openid'])) { ?>'openid': '<?php  echo $_W['openid'];?>',<?php  } ?>
		<?php  if(!empty($_W['uid'])) { ?>'uid': '<?php  echo $_W['uid'];?>',<?php  } ?>
		'siteroot': '<?php  echo $_W['siteroot'];?>',
		'siteurl': '<?php  echo $_W['siteurl'];?>',
		'attachurl': '<?php  echo $_W['attachurl'];?>',
		'attachurl_local': '<?php  echo $_W['attachurl_local'];?>',
		'attachurl_remote': '<?php  echo $_W['attachurl_remote'];?>',
		<?php  if(defined('MODULE_URL')) { ?>'MODULE_URL': '<?php echo MODULE_URL;?>',<?php  } ?>
		'cookie' : {'pre': '<?php  echo $_W['config']['cookie']['pre'];?>'},
		'account' : <?php  echo json_encode($_W['account'])?>
	};
	</script>


    <link rel="stylesheet" href="./resource/css/bootstrap.min.css" type="text/css" />
    <link href="./resource/css/common.css?v=20170802" rel="stylesheet">
	<link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tuike_jd/template/style/css/common.css" >
    <!--<link rel="stylesheet" href="./resource/css/font-awesome.min.css" type="text/css" />-->
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tuike_jd/template/style/css/animate.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tuike_jd/template/style/css/style.min.css" type="text/css" />
    <script>var require = { urlArgs: 'v=20160921' };</script>
	<script type="text/javascript" src="./resource/js/lib/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="./resource/js/app/util.js?v=20160921"></script>
	<script type="text/javascript" src="./resource/js/app/common.min.js?v=20160921"></script>
	<script type="text/javascript" src="./resource/js/require.js?v=20160921"></script>
	<script type="text/javascript" src="./resource/js/app/config.js?v=20160921"></script>

</head>
<body>
	<section class="vbox">
       <!--头部开始-->
		<header class="bg-black dk header navbar navbar-fixed-top-xs">
		    <div class="navbar-header aside-md"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="<?php  echo $_W['siteroot'];?>addons/tuike_jd/template/style/images/logo.png" style="max-height: 30px;margin-top:11px;" class="m-r-sm"></a> <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a> </div>
		    <ul class="nav navbar-nav hidden-xs">
		      <li class="dropdown"> 
		      	<a href="<?php  echo $this->createWebUrl('set')?>" > <i class="fa fa-building-o"></i> 授权</a>
		      </li>
		      <!--<li class="dropdown" > 
		      	<a href="<?php  echo $this->createWebUrl('mposter')?>"  > <i class="fa fa-comment-o"></i> 会员管理</a>
		      </li>-->

		    </ul>
		    <ul class="nav navbar-nav navbar-right hidden-xs nav-user" style="margin-right:10px;">
		      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/public/images/avatar.jpg"> </span> <?php  echo $_W['account']['name'];?><b class="caret"></b> </a>
		       
		      </li>
		    </ul>
		</header>
		<!--头部结束-->
        <style>
        #dndArea{height:300px}
        .webuploader-container{margin-bottom:100px;}
        </style>

        