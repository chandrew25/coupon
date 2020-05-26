<?php defined('IN_IA') or exit('Access Denied');?><?php  if($dblist) { ?>
<!-- 首页底部 -->
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/css/footer-idx.css">
    <!-- 首页底部 end-->
    <div class="footer-idx">
        <div class="fd-nav">
        	
        	<?php  if(is_array($dblist)) { foreach($dblist as $v) { ?>
            <a href="<?php  echo $v['wlurl'];?>&pid=<?php  echo $pid;?>&dluid=<?php  echo $dluid;?>">
                <i class="icon1" style="background-image: url(<?php  echo tomedia($v['picurl'])?>);"></i>
                <i class="icon2" style="background-image: url(<?php  echo tomedia($v['picurl'])?>);"></i>
                <span><?php  echo $v['title'];?></li></span>
            </a>
 			<?php  } } ?>
            
        </div>
    </div>
<?php  } ?>
