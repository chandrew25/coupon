<?php defined('IN_IA') or exit('Access Denied');?><footer class="footer bg-white b-t b-light">
    <p><?php  echo $_W['account']['name'];?> <?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?>Powered by <a href="http://www.we7.cc"><b>系统</b></a> v<?php echo IMS_VERSION;?> &copy; 2014-2015 <a href="http://www.we7.cc">www.we7.cc</a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?></p>
</footer>
<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/public/js/common.js"></script>
<script>
 require(['bootstrap']);
</script>