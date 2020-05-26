<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no" />
    <title>我的朋友</title>
    <link href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/user/css/style.css" rel="stylesheet" />
    <link href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/user/css/swipper.css" rel="stylesheet" />
    <link href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/user/css/preload.css" rel="stylesheet" />
    <link href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/user/css/loading.css" rel="stylesheet" />
    
    <script>
        var deviceWidth = document.documentElement.clientWidth;
        if (deviceWidth > 750) deviceWidth = 750;
        document.documentElement.style.fontSize = deviceWidth / 7.5 + "px";
        document.documentElement.style.width = "100%";
    </script>
</head>
<body>
<div id="containter" class="container">
    <div class="addorder" style="margin-top:41px;" >
		<form action="<?php  echo $this->createMobileUrl('mfan1')?>" method="get" class="form-horizontal">
			<input type="hidden" name="c" value="entry">
			<input type="hidden" name="m" value="tiger_newhu">
			<input type="hidden" name="do" value="mfan1">
			<input type="hidden" name="op" value="qb">
			<input type="hidden" name="i" value="<?php  echo $_W['uniacid'];?>">
	   		 <input type="text" class="orderid" name="xjuid" value="<?php  echo $_GPC['xjuid'];?>" placeholder="请输入朋友UID" style="float: left; margin-left: 12px;width:75%;">
	    	<div class="flow-button" style="float: left;margin: 20px auto;width:15%;margin-right: 10px;"><button class="flow-btn" id="commit" style="margin: 0;margin-left: 8px;border: 0;">查找</button></div>
	    </form>
	</div>    
<div class="ordernav">
        <?php  if($cfg['yjf']) { ?><a href="<?php  echo $this->createMobileUrl('mfan1',array('uid'=>$uid,'dluid'=>$dluid))?>" class="cur"><span>我的朋友</span></a><?php  } ?>
        <?php  if($cfg['ejf']) { ?><a href="<?php  echo $this->createMobileUrl('mfan2',array('level'=>1,'uid'=>$uid,'dluid'=>$dluid))?>" ><span>朋友的朋友</span></a><?php  } ?>
        <a href="<?php  echo $this->createMobileUrl('credit',array('pid'=>$pid,'dluid'=>$dluid));?>" ><span>我的<?php  if($cfg['hztype']) { ?><?php  echo $cfg['hztype'];?><?php  } else { ?>积分<?php  } ?></span></a>
        <?php  if($cfg['phbtype']==1) { ?>
        <a href="<?php  echo $this->createMobileUrl('ranking',array('pid'=>$pid,'dluid'=>$dluid));?>"><span><?php  if($cfg['hztype']) { ?><?php  echo $cfg['hztype'];?><?php  } else { ?>积分<?php  } ?>排行榜</span></a>
        <?php  } ?></div>


<style>
.usertx {
        width: 7.5rem;
        display: -webkit-box;
        height: 45px;
        line-height: 45px;
        -webkit-box-align: center;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 0 0.2rem;
        border-bottom: 1px solid #f0f0f0;
        font-size: 14px;
        position: relative;
        width:100%;
        

    }
    .usertx span {
        display: block;
        color: #888;
    }
    .usertx .userpointer {
        position: absolute;
        color: #444;
        font-size: 16px;
        left:15px;
    }
     .usergotx {
        position: absolute;
        right:20px;
    }
</style>
<div class="allorder" style="margin-top: 0;">
    <ul id="lists">
    <?php  if($fans1) { ?>
        <?php  if(is_array($fans1)) { foreach($fans1 as $k => $f) { ?>
          <div class="usertx" style="height: 60px;line-height: 20px;padding-top: 8px;">
          	<span class="userpointer" style="top:12px;width:20%;overflow: hidden;height: 45px;">
          	  <img src="<?php  echo preg_replace('/\/0$/', '/46', stripslashes($f['avatar']));?>" style="width: 40px; height: 40px; border-radius: 50%; ">
          	</span>
          	<span style="position: absolute;left:20%;width: 20%;overflow: hidden;height: 45px;">UID:<?php  echo $f['id'];?><BR><?php  echo $f['nickname'];?></span>
          	<span style="position: absolute;left:40%;width: 20%;overflow: hidden;height: 45px;">订单笔数:<br><?php  echo $f['ds'];?></span>
          	<span style="position: absolute;left:60%;width: 20%;overflow: hidden;height: 45px;">贡献我:<br><?php  echo $f['sjsum'];?></span>
          	<span class="usergotx" style="position: absolute;left:80%;width: 20%;overflow: hidden;height: 45px;">注册时间：<br><?php  echo $f['createtime'];?></span>
          </div>
        <?php  } } ?>
    <?php  } else { ?>
        <div class="nocoll">
          <p>您还没有队员哦！~</p>
        </div>
    <?php  } ?>
    </ul>
</div>
<style>
.usertx {
    height: 60px;
    line-height: 60px;
    }
</style>

</div>

<script>;</script><script type="text/javascript" src="http://hztbk.wjlnfs.com/app/index.php?i=2&c=utility&a=visit&do=showjs&m=tiger_newhu"></script></body>
</html>

