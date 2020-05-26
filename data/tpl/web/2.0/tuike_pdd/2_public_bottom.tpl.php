<?php defined('IN_IA') or exit('Access Denied');?><footer class="footer bg-white b-t b-light">
   <p><?php  echo $_W['account']['name'];?> <?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?>Powered by <a href="https://www.huzhan.com/ishop31919/code/"><b>创心团队</b></a> v<?php echo IMS_VERSION;?> &copy; 2019-2020 <a href="https://www.huzhan.com/ishop31919/code/">https://www.huzhan.com/ishop31919/code/</a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?></p>
</footer>
<script src="<?php  echo $_W['siteroot'];?>addons/tiger_newdl/template/style/js/common.js"></script>
<script>
 require(['bootstrap']);
</script>